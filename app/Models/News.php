<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    // use HasFactory;

    // newsに対するカスタムmodel
    protected $table = 'news';

    // IDは自動生成するものなので、書き換えることはできない
    protected $guarded = array('id');

    public static $rules = array(
        'post_category_id' => 'required|integer',
        'title'       => 'required|string|max:32',
        'summary'    => 'max:200',
        'content'    => 'required',
        'thumbnail'   => 'max:200',
        'is_show'     => 'required|boolean'
    );

    // 日本語エラーメッセージ
    public static $messages = [
        'news_category_id.required' => 'カテゴリーIDは必ず入力してください。',
        'title.required' => 'タイトルは必ず入力してください。',
        'content.required' => '詳細内容は必ず入力してください。',
        'thumbnail.max:200' => '画像ファイル名は200文字まで入力してください。',
        'summary.max:200' => '概要は200文字まで入力してください。',
        'is_show.required' => '表示フラグは必ず入力してください。0 or 1'
    ];

    public function getTitle()
    {
        $ret = $this->id . ':' . $this->title;
        return $ret;
    }

    /**
     * newsCategory function
     * ニュースカテゴリーテーブルとのリレーション
     *
     * @return void
     */
    public function newsCategory()
    {
        $items = $this->belongsTo('App\Models\Category');
        return $items;
    }
}
