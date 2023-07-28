<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    // use HasFactory;

    // IDは自動生成するものなので、書き換えることはできない
    protected $guarded = array('id');

    // バリデーションルール
    public static $rules = [
        'game_name' => 'required|max:60',
        'discription' => 'max:300',
        'game_icon' => 'max:50',
        'language_id' => 'required',
        'level_id' => 'required',
    ];

    public function getTitle()
    {
        $ret = $this->id . ':' . $this->game_name;
        return $ret;
    }
}
