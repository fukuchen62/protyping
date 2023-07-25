<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\News;
use App\Models\Knowhow;
use App\Models\Blog;

class TopController extends Controller
{
    public function index(Request $request)
    {
        // CustomNewsテーブルから、表示のニュースを昇順に取得

        // $items = CustomNews::orderBy('id', 'desc')
        //     // 最新３件取得
        //     ->paginate(3)
        //     ->all();
        $items = News::all();
        $data = [
            'param' => '',
            'items' => $items,
        ];

        $items2 = Knowhow::all();
        $data2 = [
            'param2' => '',
            'items2' => $items2,
        ];

        return view('fronts.index', $data, $data2);
    }

    public function about(Request $request)
    {
        return view('fronts.about');
    }

    public function privacy(Request $request)
    {
        return view('fronts.privacy_policy');
    }
}
