<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use App\Models\AnswerStatus;
use App\Models\Dimension;
use App\Models\Instrument;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class InstrumentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $instruments = Instrument::with('dimension')->orderBy('numbering')->get();
        return view('admin.instruments.index', compact('instruments'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $dimensions = Dimension::orderBy('order')->get();
        return view('admin.instruments.create', compact('dimensions'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'content' => 'required|string|max:255',
            'numbering' => 'required|integer|unique:instruments',
            'reverse' => 'required',
            'dimension' => 'required|in:' .  implode(',', Dimension::pluck('id')->toArray())
        ]);

        Instrument::create([
            'content' => $request->content,
            'numbering' => $request->numbering,
            'reverse' => $request->reverse,
            'dimension_id' => $request->dimension,
        ]);

        return redirect()->route('admin.instruments');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Instrument $instrument)
    {
        $dimensions = Dimension::orderBy('order')->get();
        return view('admin.instruments.edit', compact('instrument', 'dimensions'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Instrument $instrument)
    {
        $request->validate([
            'content' => 'required|string|max:255',
            'numbering' => 'required|integer|unique:instruments,numbering,' . $instrument->id,
            'reverse' => 'required',
            'dimension' => 'required|in:' .  implode(',', Dimension::pluck('id')->toArray())
        ]);

        $instrument->content = $request->content;
        $instrument->numbering = $request->numbering;
        $instrument->reverse = $request->reverse;
        $instrument->dimension_id = $request->dimension;
        $instrument->save();

        return back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Instrument $instrument)
    {
        $instrument->delete();
        return back();
    }

    public function answer(Request $request)
    {
        $lastAnswer = $request->lastAnswer;

        if (!($lastAnswer)) {
            $lastAnswer = 0;
        }

        $user = Auth::user();

        $instruments = Instrument::with(['answers' => function ($query) use ($user) {
            $query->whereHas('answerStatus', function ($query) {
                $query->where('status', 'pending');
            })->orWhere('answer_status_id', null)->where('user_id', $user->id); // nambahin relasi yang belum submitted
        }])->where('numbering', '>', $lastAnswer)->limit(Answer::LIMIT)->orderBy('numbering')->get();

        $isLastInstrument = $instruments->count() === 0;

        return view('guest.instruments.answer', compact('instruments', 'user', 'isLastInstrument'));
    }

    public function submitAnswers(Request $request)
    {
        $allRequestWithoutUnusedData = $request->except('_token', 'lastAnswer');
        $filteredAnswers = $this->getValidInput($allRequestWithoutUnusedData);

        foreach ($filteredAnswers as $answer) {
            Answer::updateOrCreate(
                ['user_id' => $answer['user_id'], 'instrument_id' => $answer['instrument_id'], 'answer_status_id' => null],
                $answer
            );
        }

        $lastAnswer = $request->lastAnswer;

        return redirect()->route('instruments.answer', ['lastAnswer' => $lastAnswer]);
    }

    public function submitAllAnswers()
    {
        $user = Auth::user();

        $answer = Answer::whereHas('answerStatus', function ($query) {
            $query->where('status', 'pending');
        })->orWhere('answer_status_id', null)->where('user_id', $user->id)->first();

        if($answer && $answer->answerStatus) {
            $answer->answerStatus->status = 'done';
            $answer->answerStatus->save();
        }

        return redirect()->route('instruments.answer');
    }

    private function getValidInput($validatedRequests): array
    {
        $results = [];
        $user_id = Auth::user()->id;

        foreach ($validatedRequests as $key => $value) {
            $instrumentId = str_replace('answer-', '', $key);

            $newArray = [
                'instrument_id' => (int) $instrumentId,
                'score' => (int) $value,
                'user_id' => $user_id
            ];

            $results[] = $newArray;
        }

        return $results;
    }
}
