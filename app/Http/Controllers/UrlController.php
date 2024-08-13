<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Url;

/**
 * @OA\Info(title="URL Shortener API", version="1.0.0")
 */
class UrlController extends Controller
{
    /**
     * @OA\Get(
     *     path="/",
     *     summary="Get all URLs",
     *     @OA\Response(
     *         response=200,
     *         description="A list of URLs",
     *         @OA\JsonContent(ref="App\Http\Resources\Url")
     *     )
     * )
     */
    public function index()
    {
        $urls = Url::all();
        return view('home', compact('urls'));
    }

    /**
     * @OA\Get(
     *     path="/create",
     *     summary="Show the form to create a new URL",
     *     @OA\Response(
     *         response=200,
     *         description="View for creating a URL"
     *     )
     * )
     */
    public function create()
    {
        return view('create');
    }

    /**
     * @OA\Post(
     *     path="/shorten",
     *     summary="Create a new shortened URL",
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\MediaType(
     *             mediaType="application/json",
     *             @OA\Schema(
     *                 type="object",
     *                 required={"original_url"},
     *                 @OA\Property(property="original_url", type="string", example="http://example.com")
     *             )
     *         )
     *     ),
     *     @OA\Response(
     *         response=201,
     *         description="URL successfully created",
     *         @OA\JsonContent(
     *             @OA\Property(property="shortened_url", type="string", example="abc123")
     *         )
     *     ),
     *     @OA\Response(
     *         response=400,
     *         description="Invalid URL format",
     *         @OA\JsonContent(
     *             @OA\Property(property="msg", type="string", example="URL already exist!")
     *         )
     *     )
     * )
     */
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

    /**
     * @OA\Get(
     *     path="/{shortened}",
     *     summary="Get the original URL by shortened URL",
     *     @OA\Parameter(
     *         name="shortened",
     *         in="path",
     *         required=true,
     *         @OA\Schema(type="string")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Redirects to the original URL"
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Shortened URL not found"
     *     )
     * )
     */
    public function show($shortened)
    {
        $url = Url::where('shortened_url', $shortened)->firstOrFail();
        $original = $url->original_url;
        return view('countdown', compact('original'));
        //return redirect($url->original_url);
    }

    /**
     * @OA\Delete(
     *     path="/urls/{id}",
     *     summary="Delete a URL",
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="URL successfully deleted"
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="URL not found"
     *     )
     * )
     */
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
