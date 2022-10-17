<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;
use App\Http\Requests\NewsRequest;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function news()
    {
        $news = News::get();
        return view('admin.news',compact('news'));
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
    public function store(NewsRequest $request)
    {
        
        $request->validated();
        $news = News::create($request->all());
        
        // $news->addMediaFromRequest('image')->toMediaCollection('image');
        // $news->addMediaFromRequest('image')->toMediaCollection('news');

        // if($request->hasFile('image') && $request->file('image')->isValid()){
        //     $news->addMediaFromRequest('image')->toMediaCollection('news');
        // }
        // $news->addMediaCollection('image')->singleFile()->acceptsMimeTypes(['image/png', 'image/jpg', 'image/jpeg']);

        // $input = $request->all();
        // $news = News::create($input);
        if($request->hasFile('image') && $request->file('image')->isValid()){
            $news->addMediaFromRequest('image')->toMediaCollection('image');
            // dd($request->image);
        }
        $news->save();
       
        return redirect()->back()->with('message','News Successfully Added');
     
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function show(News $news)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function newsedit(Request $request,$id){

        $news = News::where('id',$id)->get();
        return view('admin.newsedit',compact('news'));

    }
    public function edit(NewsRequest $request,$id)
    {
        $request->validated();

        $news = News::find($id);
        $news->update([
            'title' => $request->title,
            'description' => $request->description,
            'author' => $request->author,
            'image' => $request->image,
        ]);
        if ($request->image == !null){
            $news->addMedia($request->image)->toMediaCollection('image');
        }
        return redirect()->route('admin.news')->with('message', 'Successfully Edited');

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, News $news)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $request->validate([
            'id' => 'required'
        ]);
        News::where('id', $request->id)->delete();
        return redirect()->back()->with('message', 'Successfully Deleted');
    }
}
