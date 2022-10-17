<?php

namespace App\Http\Controllers;

use App\Models\About;
use Illuminate\Http\Request;
use App\Http\Requests\AboutRequest;
class AboutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $about=About::all();
        return view('admin.about',compact('about'));
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
    public function store(AboutRequest $request)

    {
        $valiator = $request->validated();
        $about = About::create($request->all());

        if($request->hasFile('image') && $request->file('image')->isValid()){
            $about->addMediaFromRequest('image')->toMediaCollection('image');
            // dd($request->image);
        }
        $about->save();
        
        return redirect()->back()->with('message','About Successfully Added');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\About  $about
     * @return \Illuminate\Http\Response
     */
    public function show(About $about)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\About  $about
     * @return \Illuminate\Http\Response
     */

     
    public function aboutedit(Request $request,$id){

        $about = About::where('id',$id)->get();
        return view('admin.aboutedit',compact('about'));
    }


    public function edit(Request $request,$id)
    {
        $request->validate([
            'image' => 'required'
        ]);

        $about = About::find($id);
        $about->update([
            'image' => $request->image,
        ]);
        if ($request->image == !null){
            $about->addMedia($request->image)->toMediaCollection('image');
        }
        return redirect()->route('admin.about')->with('message', 'Successfully Edited');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\About  $about
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, About $about)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\About  $about
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $request->validate([
            'id' => 'required'
        ]);
        About::where('id', $request->id)->delete();
        return redirect()->back()->with('message', 'Successfully Deleted');
    }
}
