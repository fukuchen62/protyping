<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostCategory extends Model
{
    // use HasFactory;

    // IDは自動生成するものなので、書き換えることはできない
    protected $guarded = array('id');

    // バリデーションルール
    public static $rules = [
        'category_name'    => 'required|string|max:200',
        'is_show'     => 'required|boolean'
    ];

    public function getTitle()
    {
        $ret = $this->id . ':' . $this->category_name;
        return $ret;
    }
}
