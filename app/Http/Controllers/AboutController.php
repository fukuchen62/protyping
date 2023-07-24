<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AboutController extends Controller
{
    /**
     * getabout function
     * 私たちについてを表示する
     * @param Request $request
     * @return void
     */
    public function getabout(Request $request)
    {
        // 私たちについてを表示する

        return view('fronts.about');
    }
}
