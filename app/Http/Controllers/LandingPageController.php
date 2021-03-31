<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;

class LandingPageController extends Controller
{
    /**
     * Display a Articles, Categories & Videos model on landing page.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $data = [
            'articles' => Article::inRandomOrder()->take(5)->get(),
            // 'articles' => Article::all()->load('category'),
            'categories' => Category::with(['articles'])->get(),
            'category' => Category::has('articles', '>=', 3)->inRandomOrder()->take(3)->get(),
            //'articles' => Article::inRandomOrder()->take(5)->get(),
            // 'category' => Category::distinct()->inRandomOrder()->take(3)->get(),

        ];


        return view('website.index', $data);
    }
}