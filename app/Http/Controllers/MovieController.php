<?php

namespace App\Http\Controllers;

use App\Http\Requests\Movie\StoreMovieRequest;
use App\Http\Requests\Movie\UpdateMovieRequest;
use App\Models\Category;
use App\Models\Country;
use App\Models\Genre;
use App\Models\Movie;

class MovieController extends Controller
{
    public $movies, $categories, $genres, $countries;

    public function __construct()
    {
        $this->categories = Category::pluck('title', 'id');
        $this->genres = Genre::pluck('title', 'id');
        $this->countries = Country::pluck('title', 'id');
        // $this->movies = Movie::latest()->paginate(5);
        $this->movies = Movie::all();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $movies = $this->movies;
        return view('admincp.movie.index', compact('movies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $movies = $this->movies;
        $categories = $this->categories;
        $genres = $this->genres;
        $countries = $this->countries;
        return view('admincp.movie.form', compact('movies', 'categories', 'genres', 'countries'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreMovieRequest $request)
    {
        $movie = Movie::create($request->all());
        $get_image = $request->file('image');
        if ($get_image) {
            $path = 'uploads/movie';
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.', $get_name_image));
            $new_image = $name_image . '-' . rand(0, 9999) . '.' . $get_image->getClientOriginalExtension();
            $get_image->move($path, $new_image);
            $movie->image = $new_image;
            $movie->save();
        }
        toast('Create successfully', 'success');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Movie  $movie
     * @return \Illuminate\Http\Response
     */
    public function show(Movie $movie)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Movie  $movie
     * @return \Illuminate\Http\Response
     */
    public function edit(Movie $movie)
    {
        $movies = $this->movies;
        $categories = $this->categories;
        $genres = $this->genres;
        $countries = $this->countries;
        return view('admincp.movie.form', compact('movies', 'categories', 'genres', 'countries', 'movie'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Movie  $movie
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateMovieRequest $request, Movie $movie)
    {
        $get_image = $request->file('image');

        $movie->update([
            'title' => $request->title,
            'name_eng' => $request->name_eng,
            'slug' => $request->slug,
            'description' => $request->description,
            'phim_hot' => $request->phim_hot,
            'status' => $request->status,
            'category_id' => $request->category_id,
            'genre_id' => $request->genre_id,
            'country_id' => $request->country_id,
        ]);
        if ($get_image) {
            if (!empty($movie->image)) {
                unlink('uploads/movie/' . $movie->image);
            }
            $path = 'uploads/movie';
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.', $get_name_image));
            $new_image = $name_image . '-' . rand(0, 9999) . '.' . $get_image->getClientOriginalExtension();
            $get_image->move($path, $new_image);
            $movie->image = $new_image;
        }
        $movie->save();
        toast('Create successfully', 'success');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Movie  $movie
     * @return \Illuminate\Http\Response
     */
    public function destroy(Movie $movie)
    {
        if ($movie) {
            if (!empty($movie->image)) {
                unlink('uploads/movie/' . $movie->image);
            }
            $movie->delete();
            toast("Delete successfully", 'success');
            return redirect()->back();
        }
        toast("Not found movie", 'warning');
        return redirect()->back();
    }
}
