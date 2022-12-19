<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

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
        return view ('Article.index', compact('article'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $article = Article::all();
        return view('Article.create', compact('article'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // return $request;
        $img = $request->file('image_article');//Menggambil file dari form
        $filename = time(). "-". $img->getClientOriginalName(); //mengambil dan mengedit nama file dari form
        $img->move('img-article/', $filename); //proses memasukkan file kedalam direktori laravel
    
        Article::create(
            [
                "judul_article" => $request->judul_article,
                "sub_description" => $request->sub_description,
                "description" => $request->description,
                "image_article" => $filename,
                "tanggal" => $request->tanggal,
            ]
        );
        return redirect('/Article')->with('success', 'Data telah berhasil ditambah');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function show(Article $article)
    {
        return view('Article.detail', compact('article'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function edit(Article $article)
    {
        return view('Article.update', compact('article'));
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
        if($request -> image !=null){
            $img = $request->file('image_article');
            $filename = time() . "_" .
            $img->getClientOriginalName();
            $img->move('img-article', $article->id)->update(
                [
                    "judul_article" => $request->judul_article,
                    "sub_description" => $request->sub_description,
                    "description" => $request->description,
                    "image_article" => $filename,
                    "tanggal" => $request->tanggal,
                ]
            );
        }else{
            Article::where('id', $article->id)->update(
                [
                    "judul_article" => $request->judul_article,
                    "sub_description" => $request->sub_description,
                    "description" => $request->description,
                    "tanggal" => $request->tanggal,
                ]
            );
        }
        return redirect('/Article');
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
        return redirect('/Article');
    }
}
