<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vocabulary extends Model
{
    // use HasFactory;

    // IDは自動生成するものなので、書き換えることはできない
    protected $guarded = array('id');

    // バリデーションルール
    public static $rules = [
        'language_id' => 'required',
        'word_spell' => 'required|max:200',
        'japanese' => 'required|max:200',
        'pronunciation' => 'max:200',
        'meaning' => 'required|max:200',
        'notion' => 'required|max:200',
        'usage' => 'max:500',
        'is_show' => 'required',
    ];

    public function getTitle()
    {
        $ret = $this->id . ':' . $this->name;
        return $ret;
    }
}
