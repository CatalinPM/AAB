<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tags = Tag::all();
        $categories = Category::all();
        return view('articles.create', compact('tags', 'categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $articles = Auth::user()->articles->create(
            [
                'title' => $request->input('title'),
                'description' => $request->input('description'),
                'body' => $request->input('body'),
                'img' => $request->file('img')->store("public/img"),
                'category_id' => $request->input('category_id')
            ]
        );
        $selectedTags = $request->input('tags');
        foreach($selectedTags as $tagId){
            $articles->tags()->attach($tagId);
        }
        return redirect()->route('home')->with("message", "Articolo caricato correttamente");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function show(Article $article)
    {
        return view('article.show', compact('article'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function edit(Article $article)
    {
        $tag = Tag::all();
        return view('article.edit', compact('article', 'tags'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Article $article)
    {
        if($request->has('img')){
            $article->update(
                [
                    'title' => $request->input('title'),
                    'description' => $request->input('description'),
                    'body' => $request->input('body'),
                    'img' => $request->file('img')->store("public/img"),
                    'category_id' => $request->input('category_id'),
                ]
            );
        }else{
            $article->update(
                [
                    'title' => $request->input('title'),
                    'description' => $request->input('description'),
                    'body' => $request->input('body'),
                    'category_id' => $request->input('category_id'),
                ]
            );
        }
        $article->tags()->detach();
        $article->tags()->sync($request->input('tags'));
        return redirect()->route('article.dashboard');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function destroy(Article $article)
    {
        $article->delete();
        return redirect()->route('articles.dashboard');
    }

    public function articles_by_category(Category $category)
    {
        $articles = Article::where('category_id', $category->id)->orderBy('created_at', 'DESC')->get();

        return view('articles.category', compact('articles', 'category'));
    }

    public function articleDashboard()
    {
        return view('articles.dashboard');
    }

}
