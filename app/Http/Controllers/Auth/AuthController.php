<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Services\AuthService;
use Illuminate\Http\Request;
use App\Models\User;
use App\Rules\MatchOldPassword;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    private $authService;

    public function __construct(AuthService $authService)
    {
        $this->authService = $authService;
    }

//    public function login()
//    {
//        return view('admin.login');
//    }
public function logout(){
    Auth::guard('admin')->logout();
    return redirect()->route('admin.login.post', ['lang' => app()->getLocale()]);
}

    public function adminLoginPost(LoginRequest $request)
    {
        return $this->authService->login('admin',
            ['email' => $request->email, 'password' => $request->password, 'admin_active' => 1],
            $request->remember == "on" ? true : false);
    }


    public function adminLoginGet()
    {
        return view('admin.login');
    }

    public function index()
    {
        $user = User::all();
        return view('admin.index', compact('user'));
    }


    public function adminedit($id){
        $user = User::where('id',$id)->get();
        return view('admin.adminedit',compact('user'));
    }

    public function edit(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|min:4|max:255',
            'email' => 'required|email|min:8|max:255',
            'password' => 'required|min:3',
            'newpassword' => 'required|same:confirmation_password|min:3',
            'confirmation_password' => 'required|min:3',

        ]);

        $user = User::find($id)->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->newpassword)
        ]);
       

        return redirect()->route('admin.index')->with('message', 'Successfully Edited');
    }

    public function add(Request $request)
    {
        $request->validate([
            // 'id' => 'required' . auth()->guard('front')->id(),
            'name' => 'required|min:4|max:255',
            'email' => 'required|email|min:8|max:255',
            'password' => 'required|min:3',
            'confirmation_password' => 'required|same:password|min:3',

        ]);

        // $user = $request->merge(['admin_active' => '1' ]);
        // $user = User::create($request->all());
        $user=User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'admin_active' => 1
        ]);

        $user = User::all();
        return redirect()->back()->with('message', 'Successfully Added');
    }

    public function delete(Request $request)
    {
        $request->validate([
            'id' => 'required'
        ]);
        User::where('id', $request->id)->delete();
        return redirect()->back()->with('message', 'Successfully Deleted');
    }


}






