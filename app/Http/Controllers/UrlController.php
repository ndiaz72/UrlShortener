<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Url;


class UrlController extends Controller
{
   
    public function index()
    {
        $urls = Url::all();
        return view('home', compact('urls'));
    }

    public function create()
    {
        return view('create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'original_url' => 'required|url'
        ]);

        $existingUrl = Url::where('original_url', $request->original_url)->first();

        if ($existingUrl) {
            return redirect()->route('url.create')->withErrors(['msg' => 'URL already exist!']);
        }

        $shortenedUrl = Url::generateShortenedUrl($request->original_url);
        Url::create([
            'original_url' => $request->original_url,
            'shortened_url' => $shortenedUrl
        ]);

        return redirect()->route('url.create')->with('success', 'URL created successfully!');
    }

   
    public function show($shortened)
    {
        $url = Url::where('shortened_url', $shortened)->firstOrFail();
        $original = $url->original_url;
        return view('countdown', compact('original'));
        //return redirect($url->original_url);
    }
    public function destroy($id)
    {
        $url = Url::find($id);

        if (!$url) {
            return redirect()->back()->withErrors('URL doesn\'t exist.');
        }

        $url->delete();
        return redirect()->back()->with('success', 'URL successfully deleted.');
    }
}
