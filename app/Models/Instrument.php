<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Stichoza\GoogleTranslate\GoogleTranslate;

class Instrument extends Model
{
    use HasFactory;

    protected $fillable = ['content', 'numbering', 'reverse', 'dimension_id'];

    public function dimension()
    {
        return $this->belongsTo(Dimension::class);
    }

    public function answers()
    {
        return $this->hasMany(Answer::class);
    }

    public function getContentAttribute()
    {
        $locale = session()->get('locale') ?? 'id';

        $translator = new GoogleTranslate();
        $translator->setTarget($locale);

        return $translator->translate($this->attributes['content']);
    }
}
