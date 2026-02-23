<?php

namespace App\Http\Controllers;

use App\Models\Club;
use App\Models\Document;
use Illuminate\Http\Request;
use Inertia\Inertia;
use LaraZeus\Sky\Livewire\Page;
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
        $clubs = Club::query()->orderBy('name')->get();

        return Inertia::render('clubs', [
            'clubs' => $clubs,
        ]);
    }

    public function rules()
    {
        $documents = Document::orderBy('title')->get();

        return Inertia::render('rules', [
            'documents' => $documents,
        ]);
    }

    public function calendar()
    {
        $calendar = Post::page()->whereSlug('versenynaptar')->firstOrFail();

        return Inertia::render('calendar', [
            'calendar' => $calendar,
        ]);
    }

    public function contact()
    {
        return Inertia::render('contact');
    }
}
