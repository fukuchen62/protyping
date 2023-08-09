<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Language extends Model
{
    // use HasFactory;

    // IDは自動生成するものなので、書き換えることはできない
    protected $guarded = array('id');

    // バリデーションルール
    public static $rules = [
        'language_name' => 'required|max:50',
        'lang_icon' => 'max:50',
        'discription' => 'max:200',
        'is_show' => 'required',
    ];

    public function getTitle()
    {
        $ret = $this->id . ':' . $this->language_name;
        return $ret;
    }

    /**
     * bocabulary function
     * 子テーブルである単語を連結する
     * @return void
     */
    public function vocabulary()
    {
        return $this->hasOne('App\Models\Vocabulary');
    }

    public function vocabularies()
    {
        return $this->hasMany('App\Models\Vocabulary');
    }
}
