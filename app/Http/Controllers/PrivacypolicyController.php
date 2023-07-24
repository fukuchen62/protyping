<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PrivacypolicyController extends Controller
{
    public function getprivacypolicy(Request $request)
    {
        return view('fronts.privacypolicy');
    }
}
