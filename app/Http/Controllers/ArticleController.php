<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Session\Flash\FlashBag;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id = null)
    {

        if (request('tag')) {

            $articles =  Article::where('tag', 'like', '%' . request()->tag . '%')->simplePaginate(5);
            return view('website.pages.magazine', compact('articles'));

            /*   echo  request()->query('tag'); */
            /*  echo  request()->tag; */
            /*            echo request('tag'); */
        } else {

            $category = Category::findOrFail($id);
            $data = [
                'allArticles' => Article::all(),
                'category' => $category,
                'articles' =>  $category->articles()->simplePaginate(5),
            ];
            return view('website.pages.magazine', $data);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function show(Article $article)
    {
        //
        $comments = Comment::where('article_id', $article->id)->get();
        $relatedArticle = Article::where('tag', $article->tag)->get()->sortDesc()->except($article->id);
        return view('website.pages.index-inner')->with([
            'article' => $article,
            'articlesRelated' => $relatedArticle,
            'comments' => $comments,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function edit(Article $article)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function destroy(Article $article)
    {
        //
    }
}