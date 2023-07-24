<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    // use HasFactory;

    // IDは自動生成するものなので、書き換えることはできない
    protected $guarded = array('id');

    // バリデーションルール
    public static $rules = [
        'contact_id' => 'required',
        'language_id' => 'required',
        'word_spell' => 'max:200',
        'japanese' => 'max:200',
        'meaning' => 'max:200',
        'usage' => 'max:200',
        'memo' => 'max:200',
        'email' => 'max:100|email',
        'status' => 'requried',
        // 'created_at' => 'required',
    ];

    public function getTitle()
    {
        $ret = $this->id . ':' . $this->word_spell;
        return $ret;
    }
}
