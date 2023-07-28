<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Knowhow extends Model
{
    // use HasFactory;

    // knowhowsに対するカスタムmodel
    // protected $table = 'knowhows';

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
    ];

    public function getTitle()
    {
        $ret = $this->id . ':' . $this->title;
        return $ret;
    }


    /**
     * newsCategory function
     * カテゴリーテーブルとのリレーション
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
