<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Url;
use Illuminate\Support\Str;

class UrlController extends Controller
{
    public function index()
    {
        return view('welcome');
    }

    public function shorten(Request $request)
    {
        $request->validate([
            'url' => 'required|url'
        ]);

        $originalUrl = $request->input('url');
        $existingUrl = Url::where('original_url', $originalUrl)->first();

        if ($existingUrl) {
            return redirect('/')->with('shortenedUrl', url($existingUrl->short_code));
        }

        $shortCode = $this->generateShortCode();

        Url::create([
            'original_url' => $originalUrl,
            'short_code' => $shortCode
        ]);

        return redirect('/')->with('shortenedUrl', url($shortCode));
    }

    public function redirect($code)
    {
        $url = Url::where('short_code', $code)->firstOrFail();
        return redirect($url->original_url);
    }

    private function generateShortCode()
    {
        return Str::random(12);
    }
}
