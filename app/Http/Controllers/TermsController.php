<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TermsController extends Controller
{
    /**
     * getterms function
     * 利用規約を表示する
     * @param Request $request
     * @return void
     */
    public function getterms(Request $request)
    {
        // 利用規約を表示する

        return view('fronts.terms');
    }
}
