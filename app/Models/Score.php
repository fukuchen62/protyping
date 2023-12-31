<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Score extends Model
{
    // use HasFactory;

    // IDは自動生成するものなので、書き換えることはできない
    protected $guarded = array('id');

    // 編集できるカラム
    protected $fillable = ['is_show']; // カラム名を追加

    // バリデーションルール
    public static $rules = [
        // 'game_id' => 'required',
        // 'language_id' => 'required',
        // 'level_id' => 'required',
        // 'user_id' => 'required',
        // 'username' => 'min:0|max:30',
        // 'score' => 'max:10000',
        'is_show' => 'required',
    ];

    public function getTitle()
    {
        $ret = $this->id . ':' . $this->score;
        return $ret;
    }

    // モデルと関連する他のモデルを定義
    public function language()
    {
        return $this->belongsTo(
            Language::class,
            'language_id',
            'id'
        );
    }
}
