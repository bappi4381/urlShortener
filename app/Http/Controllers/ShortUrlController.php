<?php

namespace App\Http\Controllers;

use App\Models\ShortUrl;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str; // <-- Make sure this is included
use Illuminate\Http\Request;

class ShortUrlController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    // Show form for shortening URLs
    public function index()
    {
        $urls = Auth::user()->shortUrls()->get(); // Fetch user's URLs
        return view('user.url.url', compact('urls'));
    }

    // Handle URL shortening
    public function store(Request $request)
    {   
        $request->validate([
            'original_url' => 'required|url',
        ]);
        
        $shortCode = Str::random(6);
        while (ShortUrl::where('short_code', $shortCode)->exists()) {
            $shortCode = Str::random(6);
        }

        Auth::user()->shortUrls()->create([ // Assuming User model has 'urls' relationship
            'original_url' => $request->original_url,
            'short_code' => $shortCode,
        ]);

        return redirect()->back()->with('success', 'URL shortened successfully!');
    }

    // Handle redirection
    public function show($code)
    {
        $url = ShortUrl::where('short_code', $code)->firstOrFail();
        $url->increment('clicks'); // Increment click count
        return redirect($url->original_url);
    }

}
