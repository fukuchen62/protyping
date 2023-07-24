<?php

namespace App\Http\Controllers;

use App\Models\Level;
use Illuminate\Http\Request;

class LevelController extends Controller
{
    public function index(Request $request)
    {
        $level = Level::all();

        $data = [
            'item' => $level,
        ];
        return view('level.test', $data);
    }
}
