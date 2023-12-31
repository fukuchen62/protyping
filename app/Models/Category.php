<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    // use HasFactory;

    // IDは自動生成するものなので、書き換えることはできない
    protected $guarded = array('id');

    // バリデーションルール
    public static $rules = [
        'category' => 'required|max:60',
        'is_show' => 'requried',
        'created_at' => 'required',
    ];

    public function getTitle()
    {
        $ret = $this->id . ':' . $this->category;
        return $ret;
    }
}
