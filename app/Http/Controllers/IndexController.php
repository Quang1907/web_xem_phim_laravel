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
        return view('pages.home', compact('categories', 'countries', 'genres', 'movies', 'phim_hot'));
    }

    public function show_list_movie($slug = null, Request $request)
    {
        $table = $request->route()->getName();
        $modelTableName =  'App\Models\\' . ucfirst($table);
        $categories = $this->categories;
        $countries = $this->countries;
        $genres = $this->genres;
        $movies = $this->movies;
        $episode = $this->episode;
        $find_slug = $modelTableName::where('status', true)->where('slug', $slug)->first();
        $list_movie = Movie::where($table . '_id', $find_slug->id)->paginate(12);
        if ($find_slug) {
            return view('pages.display', compact('categories', 'countries', 'genres', 'movies',  'list_movie', 'find_slug'));
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
            $related = Movie::where('genre_id', $phim->genre->id)->status()->get();
            return view('pages.movie', compact('categories', 'countries', 'genres', 'movies', 'phim', 'related'));
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
            return view('pages.watch', compact('categories', 'countries', 'genres', 'movies', 'phim'));
        }
        return abort(404);
    }

    public function episode()
    {
        return view('pages.episode');
    }
}
