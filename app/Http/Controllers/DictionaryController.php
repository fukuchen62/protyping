<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Level;
use App\Models\Language;
use App\Models\Vocabulary;


class DictionaryController extends Controller
{

    /**
     * getdictionary function
     * 言語別のリストを表示
     * デフォルトはHTML
     * @param Request $request
     * @return void
     */
    public function getdictionary(Request $request)
    {
        // 検索条件を取得
        // 言語ID
        $lang_id = 1;
        if (isset($request->lang_id)) {
            $lang_id = $request->lang_id;
        }

        // 検索キーワード
        $s = '';
        if (isset($request->s)) {
            $s = $request->s;
        }

        if ($s != '') {
            // キーワードと言語と組み合わせて検索
            $items = Vocabulary::where('language_id', $lang_id)
                ->where('is_show', 1)
                ->where('deleted_at', null)
                ->where(function ($query) use ($s) {
                    $query->where('word_spell', 'like', '%' . $s . '%')
                        ->orWhere('japanese', 'like', '%' . $s . '%');
                })
                ->orderBy('word_spell', 'asc')
                ->Paginate(20);
        } else {
            // 指定言語IDだけで検索
            $items = Vocabulary::where('language_id', $lang_id)
                ->where('is_show', 1)
                ->where('deleted_at', null)
                ->orderBy('word_spell', 'asc')
                ->Paginate(20);
        }

        // モデルからデータを取得=0;
        // if (isset($request->s)) {
        //     $s = $request->s;
        //     $formIdentifier = $request->input('form_identifier');
        //     if ($formIdentifier === 'form1') {

        //         // 検索フォームからの自由検索
        //         $items = Vocabulary::where('word_spell', 'like', '%' . $s . '%')
        //             // ->orWhere('japanese', 'like', '%' . $s . '%')
        //             // ->orWhere('meaning', 'like', '%' . $s . '%')
        //             // ->orWhere('usage', 'like', '%' . $s . '%')
        //             // ->orderBy('id', 'desc')
        //             ->Paginate(20);
        //     } elseif ($formIdentifier === 'form2') {
        //         // 言語選択された場合
        //         // $language_id = $request->input('param');
        //         $lang_id = $s;
        //         $items = Vocabulary::where('language_id', $s)
        //             ->where('is_show', 1)
        //             ->orderBy('word_spell', 'asc')
        //             ->Paginate(20);
        //     } else {
        //         // 初期は一つ目の言語を表示
        //         $items = Vocabulary::where('language_id', $lang_id)
        //             ->where('is_show', 1)
        //             ->orderBy('word_spell', 'asc')
        //             ->Paginate(20);
        //     }
        // } else {
        //     // 無条件で読み込む
        //     //$items = Vocabulary::all()->simplePaginate(10);
        //     $items = Vocabulary::where('language_id', $lang_id)
        //         ->where('is_show', 1)
        //         ->orderBy('word_spell', 'asc')
        //         ->Paginate(20);
        // }

        // 言語のタイトルを取得
        $languages = Language::where('deleted_at', null)
            ->where('is_show', 1)
            ->get();

        $data = [
            's' => $s,
            'languages' => $languages,
            'lang_id' => $lang_id,
            'items' => $items,
        ];
        return view('fronts.languages_dictionary', $data);
    }
}
