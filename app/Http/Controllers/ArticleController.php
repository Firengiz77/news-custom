<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use App\Http\Requests\ArticleRequest;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $article=Article::all();
        return view('admin.article',compact('article'));
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
    public function store(ArticleRequest $request)
    {
        $valiator = $request->validated();
        $article = Article::create($request->all());
        if($request->hasFile('image') && $request->file('image')->isValid()){
            $article->addMediaFromRequest('image')->toMediaCollection('image');
            // dd($request->image);
        }
        $article->save();
        return redirect()->back()->with('message','Article Successfully Added');
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



    public function articleedit(Request $request,$id){
        $article = Article::where('id',$id)->get();
        return view('admin.articleedit',compact('article'));
    }

    public function edit(ArticleRequest $request,$id)
    {
        $request->validated();

        $article = Article::find($id);
        $article->update([
            'title' => $request->title,
            'description' => $request->description,
            'author' => $request->author,
            'image' => $request->image,
        ]);
        if ($request->image == !null){
            $article->addMedia($request->image)->toMediaCollection('image');
        }
        return redirect()->route('admin.article')->with('message', 'Successfully Edited');
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
    public function destroy(Request $request)
    {
        $request->validate([
            'id' => 'required'
        ]);
        Article::where('id', $request->id)->delete();
        return redirect()->back()->with('message', 'Successfully Deleted');
    }
}
