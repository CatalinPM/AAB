<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class RevisorController extends Controller
{
    public function revisorDashboard()
    {
        $articles = Article::where('is_accepted', false)->get();
        //dd($articles);
        return view('revisor.dashboard', compact('articles'));
    }

    public function articleDetail(Article $article)
    {
        return view('revisor.article-detail', compact('article'));
    }

    public function acceptArticle(Article $article)
    {
        $article->is_accepted = true;
        $article->save();
        return redirect()->route('revisor.dashboard');
    }

    public function rejectArticle(Article $article)
    {
        $article->is_accepted = false;
        $article->save();
        return redirect()->route('revisor.dashboard');
    }


}
