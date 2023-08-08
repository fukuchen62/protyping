<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Knowhow;
use App\Models\PostCategory;

class KnowhowController extends Controller
{
    /**
     * getknowhow function
     * 知っトク記事情報の一覧を表示する
     * @param Request $request
     * @return void
     */
    public function getknowhow(Request $request)
    {
        // 検索条件を取得
        $cate_id = 0;
        if (isset($request->cate_id)) {
            $cate_id = $request->cate_id;
        }

        // 知っトク記事情報の一覧を表示する
        if ($cate_id != 0) {
            $knowhows = Knowhow::where('post_category_id', $cate_id)
                ->where('is_show', 1)
                ->where('deleted_at', null)
                ->get();
        } else {
            $knowhows = Knowhow::where('is_show', 1)
                ->where('deleted_at', null)
                ->get();
        }

        $count = count($knowhows);

        // 知っトク情報のカテゴリ
        $post_category = PostCategory::where('is_show', 1)
            ->where('deleted_at', null)
            ->where('id', '>=', 4)
            ->orderBy('id', 'asc')
            ->get();

        $data = [
            'param' => '',
            'count' => $count,
            'knowhows' => $knowhows,
            'post_category' => $post_category,
            'cate_id' => $cate_id,
        ];

        return view('fronts.knowhow_article', $data);
    }

    /**
     * getdetails function
     * 知っトク記事情報の詳細記事を表示する
     * @param Request $request
     * @return void
     */
    public function getdetails(Request $request)
    {
        // 知っトク記事情報の一覧を表示する
        // getで渡したparamでカテゴリーを限定する
        $id = $request->id;
        $post = Knowhow::find($id);

        // 知っトク情報のカテゴリ
        // $post_category = PostCategory::where('is_show', 1)
        //     ->where('deleted_at', null)
        //     ->where('id', '>=', 4)
        //     ->orderBy('id', 'asc')
        //     ->get();

        // 関連記事6つを取得
        $posts = Knowhow::where('is_show', 1)
            ->where('deleted_at', null)
            ->where('id', '!=', $id)
            ->orderBy('id', 'asc')
            ->limit(6)
            ->get();


        $data = [
            'post' => $post,
            'posts' => $posts,
        ];

        return view('fronts.Knowhow_details', $data);
    }
}
