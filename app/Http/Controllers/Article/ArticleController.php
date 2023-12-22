<?php

namespace App\Http\Controllers\Article;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(User $user)
    {
        if (!Auth::check()) {
            return redirect()->route('login.index');
        }
        $title = '書き込み一覧';
        $articles = Article::latest()->paginate(5);
        $count = Article::count();
        return view('articles.index', compact('articles', 'count', 'title'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if (!Auth::check()) {
            return redirect()->route('login.index');
        }
        $title = '新規書き込み';
        return view('articles.create', compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Article $article, Request $request)
    {
        $request->validate(
            [
                'title' => [
                    'required',
                    'unique:articles',
                    'max:255'
                ],
                'body' => ['required'],
            ],
            [
                'title.unique' => '他に重複したタイトル名が存在しています。',
                'title.required' => 'タイトルは必須項目です。',
                'body.required' => '内容は必須項目です。'
            ]
        );


        $article->fill([
            'title' =>  $request->input('title'),
            'body' => $request->input('body')
        ])->save();


        return redirect()->route('articles.index')
            ->with('success', '登録しました。');
    }

    /**
     * CSV Download（SJISで生成する）
     */
    public function csvDownload(Article $article)
    {
        $filePath = tempnam(sys_get_temp_dir(), 'csv');
        $fp = fopen($filePath, 'w');

        $articlesArry = $article->all()->toArray();

        $csvHeader = [
            'ID',
            'タイトル',
            '内容',
            '作成日時',
            '更新日時',
        ];

        self::fputcsvWithEncoding($fp, $csvHeader);

        foreach ($articlesArry as $row) {
            self::fputcsvWithEncoding($fp, $row);
        }

        $callback = function () use ($filePath) {
            readfile($filePath);
            unlink($filePath);
        };

        $headers = [
            'Content-type' => 'text/csv',
            'Content-Disposition' => 'attachment;'
        ];
        $filename = '書き込み全件_' . date('YmdHis') . '_sjis.csv';

        return response()->streamDownload($callback, $filename, $headers);
    }

    private function fputcsvWithEncoding($fp, $csvArr)
    {
        $csvArr = $this->convertArraySjisEncoding($csvArr);
        fputcsv($fp, $csvArr);
    }
    private function convertArraySjisEncoding($arr)
    {
        return array_map(function ($val) {
            return mb_convert_encoding((string)$val, 'SJIS', 'UTF-8');
        }, $arr);
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Article $article, Request $request)
    {
        $title = '書き込み編集';
        $article = $article->find($request->id);

        return view('articles.edit', compact('article', 'title'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Article $article, Request $request)
    {

        $request->validate(
            [
                'title' => [
                    'required',
                    'unique:articles,title,' . $request->id . ',id',
                    'max:255'
                ],
                'body' => ['required'],
            ],
            [
                'title.unique' => '他に重複したタイトル名が存在しています。',
                'title.required' => 'タイトルは必須項目です。',
                'body.required' => '内容は必須項目です。'
            ]
        );

        $article->where('id', '=', $request->id)
            ->update([
                'title' => $request->input('title'),
                'body' => $request->input('body'),
            ]);

        return redirect()->route('articles.index')
            ->with('success', '変更しました。');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Article $article, Request $request)
    {
        $article->where('id', '=', $request->id)
            ->delete();

        return redirect()->route('articles.index')
            ->with('success', '削除しました。');
    }
}
