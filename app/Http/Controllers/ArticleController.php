<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $article = Article::all();
        return view('article.index', [
            'article' => $article
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = Category::all(['id', 'nama']);
        return view('article.create', [
            'category' => $category,
            'article' => new Article()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $user = Auth::user();
        $user->articles()->create([
            'title' => $request->title,
            'content' => $request->content,
            'image' => request('image') ? request()->file('image')->store('images/article') : null,
            'category_id' => $request->category
        ]);

        return redirect()->route('article.index');
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
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function edit(Article $article)
    {
        $category = Category::all(['id', 'nama']);
        return view('article.update', [
            'category' => $category,
            'article' => $article
        ]);
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

        if (request('image')) {
            Storage::delete($article->image);
            $image = request()->file('image')->store('images/article');
        } elseif ($article->image) {
            $image = $article->image;
        } else {
            $image = null;
        }

        $user = Auth::user();
        $article->update([
            'user_id' => $user->id,
            'title' => $request->title,
            'content' => $request->content,
            'image' => $image,
            'category_id' => $request->category
        ]);
        // dd($request->all());
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
        return back();
    }
}
