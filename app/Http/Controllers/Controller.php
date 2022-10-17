<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use App\Models\User;
use App\Models\Wishlist;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

//     protected $client;

//     public function __construct()
//     {
//        $this->middleware(function ($request, $next) {

//            if (Auth::guard('auth')->check()) {
//                $this->client = Auth::guard('auth')->user();
//            } else {
//                $session = session()->get('basket_token', function () {
//                    $basket_token = Str::random(32);
//                    session(['basket_token' => $basket_token]);
//                    return $basket_token;
//                });
// //                dd(session()->get('basket_token'));
//                $this->client = User::query()->firstOrCreate(['session' => $session]);
//             //    $sy1 = Order::where('user_id', $this->client->id)->count();
//                session()->put('basket_say2', $sy1);
//            }
//            return $next($request);
//        });
//     }
}