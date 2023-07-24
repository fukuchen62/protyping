<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Knowhow extends Model
{
    // use HasFactory;

    // newsに対するカスタムmodel
    protected $table = 'news';

    // IDは自動生成するものなので、書き換えることはできない
    protected $guarded = array('id');

    // バリデーションルール
    public static $rules = [
        'title' => 'required|max:60',
        'category_id' => 'required',
        'thumbnail' => 'max:200',
        'summary' => 'required|max:250',
        'content' => 'required|max:10000',
        'is_show' => 'required',
        'created_at' => 'required',
        'created_user_id' => 'required',
    ];

    public function getTitle()
    {
        $ret = $this->id . ':' . $this->title;
        return $ret;
    }
}
