<?php

namespace App\Http\Controllers;

use App\News;

class NewsController extends Controller
{
    public function __construct()
    {

        $this->middleware('role_or_permission:manage news',['only' => ['create','store','show','update','destroy']]);

    }

    public function index()
    {


         $news = News::orderBy('id', 'desc')->paginate(3);


        return view('News.list',[
            'newses' => $news
        ]);
    }


    public function create()
    {
        return view('News.create');
    }


    public function store()
    {
        $validated = request()->validate([
            'text' => ['required','min:3'],
        ]);


        $validated['creator_id'] = auth()->user()->id;

        News::create($validated);
        return redirect('/');

    }


    public function show(News $news)
    {
        return view('News.show',[
            'news' => $news
        ]);
    }

    public function update( News $news)
    {
        $validated = request()->validate([
            'text' => ['min:3']
        ]);

        $news->text = $validated['text'];

        $news->save();

        return redirect('/news');

    }

    public function destroy(News $news)
    {
        $news->delete();
        return redirect('/');
    }
}
