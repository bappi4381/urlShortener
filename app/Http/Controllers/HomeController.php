<?php

namespace App\Http\Controllers;
use App\Models\ShortUrl;
use App\Models\visitors;
use App\Models\user;
use Illuminate\Http\Request;
use Auth;

class HomeController extends Controller
{
    public function dashboard(){
        $urls = Auth::user()->shortUrls()->get(); // Fetch the user's URLs
        $totalUrls = $urls->count();
        $totalClicks = $urls->sum('clicks');
        $totalVisitors = user::count();
        return view('user.dashboard.index',compact('totalUrls','totalClicks','totalVisitors'));
    }
    public function url(){
        return view('user.url.url');
    }
}
