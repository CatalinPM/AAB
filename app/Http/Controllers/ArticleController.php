<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\Console\Input\Input;

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
        return view('articles.create', compact('tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //diciamo che non va a buon fine
        $success = false;

        DB::beginTransaction();
        try
        {
            $article = new Article;
            $article->user_id = Auth::user()->id;
            $article->title = $request->input('title');
            $article->description = $request->input('description');
            $article->body = $request->input('body');
            $article->img = $request->file('img')->store("public/img");
            $article->category_id = $request->input('category_id');

            if($article->save()){
                //dd($request->input('tags'));
                $selectedTags = $request->input('tags');
                foreach($selectedTags as $tagId){
                $article->tags()->sync($tagId);
                }
                $success = true;
                foreach($selectedTags as $tagId){
                    $article->tags()->attach($tagId);
                }
            }
        } catch (\Exception $e){
            return $e;
        }
        if ($success){
            DB::commit();
            return redirect()->route('home')->with("message", "Articolo caricato correttamente");
        }else
        {
            DB::rollback();
            return redirect()->route('home')->with("message", "Opps! Articolo  non caricato correttamente");

        }


        //$article->tags = $request->input('tags');
        //dd($article->title,$article->description,$article->body,$article->img, $article->category_id, $article->tags);
        //dd($request);
        // $article->save();

        // $tags = new Article_tag;
        // $article->tags = $request->input('tags');

        // $article = Auth::user()->articles->create(
        //     [
        //         'title' => $request->input('title'),
        //         'description' => $request->input('description'),
        //         'body' => $request->input('body'),
        //         'img' => $request->file('img')->store("public/img"),
        //         'category_id' => $request->input('category_id')
        //     ]
        // );



    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function show(Article $article)
    {
        $articles = Article::find($article);
        //dd($article);
        $articles_tags = Article::with('tags')->get();
        //dd($tags);
        return view('articles.show', compact('articles', 'articles_tags'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function edit(Article $article)
    {
        $tags = Tag::all();
        return view('articles.edit', compact('article', 'tags'));
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
        return redirect()->route('articles.dashboard');
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
        $id = Auth::user()->id;
        $articles = Article::where('user_id', $id)->get();
        return view('articles.dashboard', compact('articles'));
    }

}
