<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    // use HasFactory;

    // IDは自動生成するものなので、書き換えることはできない
    protected $guarded = array('id');

    // バリデーションルール
    public static $rules = [
        'users_id' => 'integer',
        'games_id' => 'integer',
        'news_id' => 'integer',
        'knowhow_id' => 'integer',
    ];

    public function getTitle()
    {
        $ret = $this->id . ':' . $this->like;
        return $ret;
    }
}
