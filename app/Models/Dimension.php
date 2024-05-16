<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Stichoza\GoogleTranslate\GoogleTranslate;

class Dimension extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'order', 'low_percentile_description', 'high_percentile_description'];

    public function answers()
    {
        return $this->hasManyThrough(Answer::class, Instrument::class);
    }

    public function getLowPercentileDescriptionAttribute()
    {
        $locale = session()->get('locale') ?? 'id';

        $translator = new GoogleTranslate();
        $translator->setTarget($locale);

        return $this->attributes['low_percentile_description'] ? $translator->translate($this->attributes['low_percentile_description']) : '';
    }

    public function getHighPercentileDescriptionAttribute()
    {
        $locale = session()->get('locale') ?? 'id';

        $translator = new GoogleTranslate();
        $translator->setTarget($locale);

        return $this->attributes['high_percentile_description'] ? $translator->translate($this->attributes['high_percentile_description']) : '';
    }
}
