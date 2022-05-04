<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Genre;
use App\Models\Country;
use App\Models\Movie;
use App\Models\Episode;
use Illuminate\Http\Request;


class IndexController extends Controller
{
    public $categories, $countries, $genres, $movie, $episode;

    public function __construct()
    {
        $this->categories = Category::orderBy('position', 'asc')->status()->get();
        $this->countries = Country::orderBy('id', 'desc')->status()->get();
        $this->genres = Genre::orderBy('id', 'desc')->status()->get();
        $this->movies = Movie::orderBy('id', 'desc')->status()->get();
        $this->episode = Episode::orderBy('id', 'desc')->get();
    }

    public function Homepage()
    {
        $categories = $this->categories;
        $countries = $this->countries;
        $genres = $this->genres;
        $movies = $this->movies;
        $episode = $this->episode;
        $phim_hot = Movie::orderBy('id', 'desc')->status()->where('phim_hot', true)->get();
        return view('pages.home', compact('categories', 'countries', 'genres', 'movies', 'episode', 'phim_hot'));
    }

    public function show_list_movie($slug = null, Request $request)
    {
        $tableName = 'App\Models\\' . ucfirst($request->route()->getName());
        $categories = $this->categories;
        $countries = $this->countries;
        $genres = $this->genres;
        $movies = $this->movies;
        $episode = $this->episode;
        $find_slug = $tableName::where('status', true)->where('slug', $slug)->first();
        if ($find_slug) {
            return view('pages.display', compact('categories', 'countries', 'genres', 'movies', 'episode',  'find_slug'));
        }
        return abort(404);
    }

    public function movie($slug)
    {
        $categories = $this->categories;
        $countries = $this->countries;
        $genres = $this->genres;
        $movies = $this->movies;
        $episode = $this->episode;
        $phim =  Movie::where('slug', $slug)->status()->first();
        if ($phim) {
            return view('pages.movie', compact('categories', 'countries', 'genres', 'movies', 'episode', 'phim'));
        }
        return abort(404);
    }

    public function watch($slug)
    {
        $categories = $this->categories;
        $countries = $this->countries;
        $genres = $this->genres;
        $movies = $this->movies;
        $episode = $this->episode;
        $phim =  Movie::where('slug', $slug)->status()->first();
        if ($phim) {
            return view('pages.watch', compact('categories', 'countries', 'genres', 'movies', 'episode', 'phim'));
        }
        return abort(404);
    }

    public function episode()
    {
        return view('pages.episode');
    }
}
