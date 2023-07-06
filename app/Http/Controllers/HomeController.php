<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Posts;
use App\Models\Contacts;
use App\Models\User;
use App\Models\Country;
use App\Models\Video;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }
    public function get_users_data()
    {
        $posts = Posts::with(['tags'])->get();
        return view('home');
        dd($posts->toArray());
        $country = Country::with(['stateCities'])->find(1);
        dd($country->toArray());
        $country = Country::with(['states.cities'])->find(1);
        dd($country->toArray()['states'][1]['cities']);
        $user = User::with(['contactContactInformation', 'posts'])->find(1);
        dd($user->toArray());

        $posts = Posts::with(['categories'])
            ->where('id', 1)
            ->first();

        dd($posts->toArray());
        dd($user->toArray());
        return view('home');
    }
}
