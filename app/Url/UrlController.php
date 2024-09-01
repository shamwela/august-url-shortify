<?php

namespace App\Url;

use App\Http\Controllers\Controller;
use App\Mail\UrlCreated;
use App\Rules\UrlRule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redirect;
use Str;

class UrlController extends Controller
{
    public function create()
    {
        return view('url.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'url' => ['required', 'unique:url', 'min:3', new UrlRule],
        ]);
        $url = $request->url;
        // Make sure the url starts with http:// or https://
        $original_url = str_starts_with($url, 'http') ?
                $url :
                "http://{$url}";
        $short_code = Str::random(5);
        $user_id = Auth::user()->id;
        $newUrl = Url::create(compact('original_url', 'short_code', 'user_id'));

        $email = $newUrl->user->email;
        Mail::to($email)->send(new UrlCreated($newUrl));

        return redirect('/url');
    }

    public function index()
    {
        $urls = Url::orderByDesc('created_at')->get();

        return view('url.index', compact('urls'));
    }

    public function show(Url $url)
    {
        $url->access_count++;
        $url->save();

        return view('url.show', compact('url'));
    }

    public function edit(Url $url)
    {
        return view('url.edit', compact('url'));
    }

    public function update(Request $request, Url $url)
    {
        $request->validate(['url' => ['required', 'unique:url', 'min:3', new UrlRule]]);
        $url->original_url = $request->url;
        $url->short_code = Str::random(5);
        $url->save();

        return redirect('/url');
    }

    public function destroy(Url $url)
    {
        $url->delete();

        return redirect('/url');
    }

    public function stats(Url $url)
    {
        $access_count = $url->access_count;

        return "Access count: {$access_count}";
    }

    public function redirect(string $shortCode)
    {
        $url = Url::where('short_code', $shortCode)->first();
        if (! $url) {
            abort(404);
        }

        return Redirect::to($url->original_url);
    }
}
