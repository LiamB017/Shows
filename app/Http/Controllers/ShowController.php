<?php

namespace App\Http\Controllers;

use App\Models\Show;
use Illuminate\Http\Request;
use App\Http\Resources\ShowResource;
use App\Http\Resources\ShowCollection;

class ShowController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $shows = Show::all();
        
        return new ShowCollection(Show::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

// Store created new show 
        $show = Show::create($request->only([

            'title',
            'genre',
            'synopsis',
            'user_rating',
            'network' ,
            'creator',
            'seasons',
            'src',
            
        ]));

        return new ShowResource($show);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Show  $show
     * @return \Illuminate\Http\Response
     */
    public function show(Show $show)
    {
        //
           // The $show passed in is converted to JSON by the ShowResource and returned when this function is run
        return new ShowResource($show);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Show  $show
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Show $show)
    {
        //
        // Update the specified show 
        $show->update($request->only([
            'title',
            'genre',
            'synopsis',
            'user_rating',
            'network' ,
            'creator',
            'seasons',
            'src'
        ]));
     
        return new ShowResource($show);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Show  $show
     * @return \Illuminate\Http\Response
     */
    public function destroy(Show $show)
    {
        //
    }
}
