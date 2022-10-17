<?php

namespace App\Http\Controllers;

use App\Models\Interview;
use Illuminate\Http\Request;
use App\Http\Requests\InterviewRequest;

class InterviewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $interview=Interview::all();
        return view('admin.interview',compact('interview'));
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
    public function store(InterviewRequest $request)
    {
        $valiator = $request->validated();
        $interview = Interview::create($request->all());

        if($request->hasFile('image') && $request->file('image')->isValid()){
            $interview->addMediaFromRequest('image')->toMediaCollection('image');
            // dd($request->image);
        }
        $interview->save();
        
        return redirect()->back()->with('message','Interview Successfully Added');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Interview  $interview
     * @return \Illuminate\Http\Response
     */
    public function show(Interview $interview)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Interview  $interview
     * @return \Illuminate\Http\Response
     */
    public function intedit(Request $request,$id){
        $interview = Interview::where('id',$id)->get();
        return view('admin.intedit',compact('interview'));
    }
    public function edit(InterviewRequest $request,$id)
    {
        $request->validated();

        $interview = Interview::find($id);
        $interview->update([
            'title' => $request->title,
            'description' => $request->description,
            'author' => $request->author,
            'image' => $request->image
        ]);
        if ($request->image == !null){
            $interview->addMedia($request->image)->toMediaCollection('image');
        }
        // $interview->save();

        return redirect()->route('admin.interview')->with('message', 'Successfully Edited');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Interview  $interview
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Interview $interview)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Interview  $interview
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $request->validate([
            'id' => 'required'
        ]);
        Interview::where('id', $request->id)->delete();
        return redirect()->back()->with('message', 'Successfully Deleted');
    }
}
