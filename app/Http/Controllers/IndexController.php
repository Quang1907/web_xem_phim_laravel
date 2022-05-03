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

    public function menu($slug, Request $request)
    {
        $class = 'App\Models\\' . ucfirst($request->route()->getName());
        $categories = $this->categories;
        $countries = $this->countries;
        $genres = $this->genres;
        $movies = $this->movies;
        $episode = $this->episode;
        $find_slug = $class::where('status', true)->where('slug', $slug)->first();
        return view('pages.display', compact('categories', 'countries', 'genres', 'movies', 'episode', 'find_slug'));
    }

    public function movie($slug)
    {
        $categories = $this->categories;
        $countries = $this->countries;
        $genres = $this->genres;
        $movies = $this->movies;
        $episode = $this->episode;
        $phim =  Movie::where('slug', $slug)->status()->first();
        return view('pages.movie', compact('categories', 'countries', 'genres', 'movies', 'episode', 'phim'));
    }

    public function watch()
    {
        return view('pages.watch');
    }

    public function episode()
    {
        return view('pages.episode');
    }
}
