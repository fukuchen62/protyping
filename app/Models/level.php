<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Level extends Model
{
    // use HasFactory;

    // IDは自動生成するものなので、書き換えることはできない
    protected $guarded = array('id');

    // バリデーションルール
    public static $rules = [
        'level' => 'required',
    ];

    public function getTitle()
    {
        $ret = $this->id . ':' . $this->level;
        return $ret;
    }
}
