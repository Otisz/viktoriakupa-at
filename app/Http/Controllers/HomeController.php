<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use LaraZeus\Sky\Models\Post;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $posts = Post::query()
            ->select(['id', 'title', 'slug', 'description', 'published_at'])
            ->published()
            ->orderBy('published_at', 'desc')
            ->with('media')
            ->limit(6)
            ->get();

        return Inertia::render('home', [
            'posts' => $posts,
        ]);
    }

    public function aboutUs()
    {
        return Inertia::render('about-us');
    }

    public function clubs()
    {
        return Inertia::render('clubs');
    }

    public function rules()
    {
        return Inertia::render('rules');
    }

    public function calendar()
    {
        return Inertia::render('calendar');
    }

    public function contact()
    {
        return Inertia::render('contact');
    }
}
