<?php

namespace App\Http\Controllers\admin;

use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use App\Http\Requests\ArticleStoreRequest;
use App\Http\Requests\ArticleUpdateRequest;

class ArticleController extends Controller
{

    public function index()
    {
        $articles = Article::latest()->get();
        return view('admin.pages.articles.index')->with('articles', $articles);
    }


    public function create()
    {
        return view('admin.pages.articles.create')->with('categories', Category::all());
    }


    public function store(ArticleStoreRequest $request)
    {
        $images = $this->imageUpload($request); //Image upload call imageUpload class
        $articles = Article::create([
            'category_id' => $request->category,
            'title' => $request->title,
            'description' => $request->description,
            'tag' => $request->tag,
            'image'   => implode(' ', $images),
        ]);

        if ($articles) {
            return redirect(route('post.index'))->with('success', 'Successfully added article');
        }
    }




    public function show(Article $post)
    {

        return view('admin.pages.articles.show')->with('article', $post);
    }


    public function edit($id)
    {
        $article = Article::findOrFail($id);
        $categories = Category::all();
        return view('admin.pages.articles.edit', compact('article', 'categories'));
    }



    public function update(ArticleUpdateRequest $request, Article $post)
    {

        //  Storage::delete('public/' . $post->image); //Delete from storage folder use this method

        if ($request->has('image')) {

            $this->imageDelete($post);     //Image delete call imageDelete class 
            $images = $this->imageUpload($request); //Image upload call imageUpload class

            $post->update([
                'category_id' => $request->category,
                'title' => $request->title,
                'description' => $request->description,
                'tag' => $request->tag,
                'image'   => implode(' ', $images)
            ]);
        } else {
            $post->update([
                'category_id' => $request->category,
                'title' => $request->title,
                'description' => $request->description,
                'tag' => $request->tag
            ]);
        }

        return redirect(route('post.index'))->with('success', 'Article Updated successfully.');
    }


    public function destroy(Article $post)
    {

        $this->imageDelete($post);  //Image delete call imageDelete class
        $post->delete();
        return redirect(route('post.index'))->with('success', 'Article deleted successfully.');
    }



    public function imageUpload(Request $request)
    {

        if ($request->has('image')) {
            foreach ($request->file('image') as $image) {
                // $imagePath = $image->store('images/article', 'public'); (store image in storage folder).
                $name = $image->getClientOriginalName();
                // dd($image);
                //$imagePath = $image->move('assets/images/article', $image);
                $imagePath = $image->move('assets/images/article', $name);
                $images[] = $imagePath;
            }
        }
        return $images;
    }

    public function imageDelete(Article $post)
    {
        $images = explode(' ', $post->image);
        foreach ($images as $image) {
            File::delete($image); //Delete multiple image through loop.
        }
    }
}