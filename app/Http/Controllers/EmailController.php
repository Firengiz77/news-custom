<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
Use App\Mail\ContactMe;
// use Mail;

class EmailController extends Controller
{
    public function create(){
        return view('email');

    }
    public function sendemail(Request $request){
        // dd('salam');
        $request->validate([
            'firstname'=>'required',
            'lastname' => 'required',
            'email' => 'required',
            'text' => 'required'
        ]);
 
        $data=[
            'firstname' => $request->firstname,
            'lastname' => $request->lastname,
            'email' => $request->email,
            'text'=>$request->text
        ];
        Mail::send('email-template', ['dataReceived'=>$data], function($message) use ($request) {
            $message->to($request->email, $request->firstname)
            ->subject('Laravel Test Mail');
            $message->from('b134ba7937-d007aa@inbox.mailtrap.io','’Test Mail’');
            });
            dd("DDDD");
            //Mail::to($request->email)->send(new ContactMe($data));
            // $data->save();

     return redirect('email')->with('message','Email has been send');

        // Mail::send('email-template',$data,function($message) use ($data){
        //     $message->to($data['email'])
        //     ->subject($data['text']);
        // });
        // return back()->with('message','Email send successfully');
    }
}
