<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

class MainController extends Controller
{
    /**
     * index function
     * トップページに表示させるデータを取得
     *
     * @param Request $request
     * @return void
     */
    public function index(Request $request)
    {
        // 更新情報のデータ3件分を取得

        // 知っトク情報を取得

        // 難易度別に各言語のランキングTOP3のデータを取得

        // viewの引数っていくつでも増やせる
        //return view('main.index', $data1,$data2…);
        return view('fronts.index');
    }
}
