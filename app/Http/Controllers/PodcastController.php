<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Podcast;
use App\Models\Episode;


class PodcastController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $podcasts = Podcast::latest()->get();
        return view('homePage')->with('podcasts', $podcasts);
    }

    public function create()
    {
        return view('addPodcast');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'description' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
        ]);

        $input = $request->all();

        if ($image = $request->file('image')) {
            $destinationPath = 'images/';
            $podcastImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $podcastImage);
            $input['image'] = "images/" . "$podcastImage";
        }

        Podcast::create($input);


        return redirect('/')->with('success', 'Podcast is successfully saved');
    }

    public function show($id)
    {
        $podcasts = Podcast::find($id);
        return view('podcastPage')->with('podcasts', $podcasts);
    }

    public function edit($id)
    {
        $podcasts = Podcast::find($id);
        return view('podcastEdit')->with('podcasts', $podcasts);
    }

    public function update(Request $request, $id)
    {

        $podcasts = Podcast::find($id);

        $request->validate([
            'name' => 'required',
        ]);

        $input = $request->all();

        if ($image = $request->file('image')) {
            $destinationPath = 'images/';
            $podcastImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $podcastImage);
            $input['image'] = "images/" . "$podcastImage";
        }

        $podcasts->update($input);

        return redirect()->route('homepage')
            ->with('success', 'Podcast updated successfully');
    }

    public function destroy($id)
    {
        $podcasts = Podcast::find($id);
        $episodes = Episode::where('podcast_id', $id);

        $podcasts->delete();
        $episodes->delete();

        return redirect('/')->with('success', 'Podcast Has beed deleted successfuly');
    }



    // ################################# EPISODES


    public function showEpisodes($id)
    {
        $episodes = Episode::Where('podcast_id', $id)->get();
        return view('episodesPage')->with('episodes', $episodes);
    }

    public function createEpisode($id)
    {
        $podcasts = Podcast::find($id);
        return view('addEpisode')->with('podcasts', $podcasts);
    }

    public function storeEpisode(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'description' => 'required',
            'podcast_id' => 'required',
        ]);

        $input = $request->all();

        Episode::create($input);


        return redirect()->back()->with('success', 'Episode is successfully saved');
    }

    public function destroyEpisode($id)
    {
        $episodes = Episode::find($id);

        $episodes->delete();

        return redirect()->back()->with('success', 'Episode Has beed deleted successfuly');
    }

    public function editEpisode($id)
    {
        $episodes = Episode::find($id);
        return view('editEpisode')->with('episodes', $episodes);
    }

    public function updateEpisode(Request $request, $id)
    {

        $episodes = Episode::find($id);

        $input = $request->all();

        $episodes->update($input);

        return redirect()->back()
            ->with('success', 'Episode updated successfully');
    }
}
