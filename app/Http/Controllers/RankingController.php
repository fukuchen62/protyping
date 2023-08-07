<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Level;
use App\Models\Language;
use App\Models\Score;


class RankingController extends Controller
{
    public function getranking(Request $request)
    {
        // リンクボタンによって指定されたレベルを取得（デフォルトは1：初級）
        $level_id = $request->query('level_id', 1);

        // データベースからすべてのLanguageのデータを取得
        $languages = Language::all();

        // 各Languageに対応するScoreデータを取得
        $scoresByLanguage = [];
        foreach ($languages as $language) {
            $scores = Score::where('language_id', $language->id)
                ->where('level_id', $level_id) // レベル別のスコアを取得
                ->where('is_show', 1)
                ->orderBy('score', 'desc')
                ->take(10)
                ->get();

            // データが足りない場合に代替データを生成
            $diff = 10 - $scores->count();
            for ($i = 0; $i < $diff; $i++) {
                $scores[] = (object)[
                    'username' => '挑戦してね！',
                    'score' => '00',
                ];
            }

            $scoresByLanguage[$language->id] = $scores;
        }

        $data = [
            'languages' => $languages,
            'scoresByLanguage' => $scoresByLanguage,
        ];

        return view('fronts.scores_ranking', $data);
    }
}
