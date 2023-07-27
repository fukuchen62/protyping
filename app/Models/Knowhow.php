<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Knowhow extends Model
{
    // use HasFactory;

    // knowhowsに対するカスタムmodel
    protected $table = 'knowhows';

    // IDは自動生成するものなので、書き換えることはできない
    protected $guarded = array('id');

    // バリデーションルール
    public static $rules = [
        'post_category_id' => 'required|integer',
        'title'       => 'required|string|max:32',
        'summary'    => 'max:200',
        'content'    => 'required',
        'thumbnail'   => 'max:200',
        'is_show'     => 'required|boolean'
        // 'title' => 'required|max:60',
        // 'post_category_id' => 'required',
        // 'thumbnail' => 'max:200',
        // 'summary' => 'required|max:250',
        // 'content' => 'required|max:10000',
        // 'is_show' => 'required',
        // 'created_at' => 'required',
        // 'created_user_id' => 'required',
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
    public function postCategory()
    {
        $items = $this->belongsTo('App\Models\PostCategory');
        return $items;
    }

    public function getCategoryName()
    {
        $name = $this->postCategory->category_name;
        return $name;
    }
}
