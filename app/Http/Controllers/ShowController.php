<?php

namespace App\Http\Controllers;

use App\Models\Show;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Resources\ShowResource;
use App\Http\Resources\ShowCollection;

class ShowController extends Controller
{
    /**
     * Display a listing of the show resource.
     *
     *
 * @OA\Get(
 *     path="/api/shows",
 *     description="Displays all the shows",
 *     tags={"Shows"},
     *      @OA\Response(
        *          response=200,
        *          description="Successful operation, Returns a list of Shows in JSON format"
        *       ),
        *      @OA\Response(
        *          response=401,
        *          description="Unauthenticated",
        *      ),
        *      @OA\Response(
        *          response=403,
        *          description="Forbidden"
        *      )
 * )
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
     * @OA\Post(
     *      path="/api/shows",
     *      operationId="service",
     *      tags={"Shows"},
     *      summary="Create a new Show",
     *      description="Stores the Show in the Database",
     *      @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *            required={"title", "genre", "synopsis", "user_rating", "network", "creator", "seasons", "src"},
     *            @OA\Property(property="title", type="string", format="string", example="Sample Title"),
     *            @OA\Property(property="genre", type="string", format="string", example="Sample Genre"),
     *            @OA\Property(property="synopsis", type="string", format="string", example="A long description about this great show"),
     *            @OA\Property(property="user_rating", type="integer", format="string", example="2"),
     *             @OA\Property(property="network", type="string", format="integer", example="examplenetwork"),
     *              @OA\Property(property="creator", type="string", format="string", example="Me"),
     *             @OA\Property(property="seasons", type="integer", format="integer", example="1"),
     *              @OA\Property(property="src", type="string", format="string", example="blah")
     *           
     *          )
     *      ),
     *     @OA\Response(
     *          response=200, description="Success",
     *          @OA\JsonContent(
     *             @OA\Property(property="status", type="integer", example=""),
     *             @OA\Property(property="data",type="object")
     *          )
     *     )
     * )
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
     * @OA\Get(
    *     path="/api/shows/{id}",
    *     description="Gets a show by ID",
    *     tags={"Shows"},
    *          @OA\Parameter(
        *          name="id",
        *          description="Show id",
        *          required=true,
        *          in="path",
        *          @OA\Schema(
        *              type="integer")
     *          ),
        *      @OA\Response(
        *          response=200,
        *          description="Successful operation"
        *       ),
        *      @OA\Response(
        *          response=401,
        *          description="Unauthenticated",
        *      ),
        *      @OA\Response(
        *          response=403,
        *          description="Forbidden"
        *      )
 * )
     * @param  \App\Models\Show  $book
     * @return \Illuminate\Http\ShowResource
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
     *
     * @OA\Put(
     *    path="/api/shows/{id}",
     *    operationId="put",
     *    tags={"Shows"},
     *    summary="Update a Show",
     *    description="Update Show",
     *    @OA\Parameter(name="id", in="path", description="Updatea Show", required=true,
     *        @OA\Schema(type="integer")
     *    ),
     *    @OA\Response(
     *         response=Response::HTTP_NO_CONTENT,
     *         description="Success",
     *         @OA\JsonContent(
     *         @OA\Property(property="status_code", type="integer", example="204"),
     *         @OA\Property(property="data",type="object")
     *          ),
     *       )
     *      )
     *  )
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
     *
     *
     * @OA\Delete(
     *    path="/api/shows/{id}",
     *    operationId="destroy",
     *    tags={"Shows"},
     *    summary="Delete a Show",
     *    description="Delete Show",
     *    @OA\Parameter(name="id", in="path", description="Id of a Show", required=true,
     *        @OA\Schema(type="integer")
     *    ),
     *    @OA\Response(
     *         response=Response::HTTP_NO_CONTENT,
     *         description="Success",
     *         @OA\JsonContent(
     *         @OA\Property(property="status_code", type="integer", example="204"),
     *         @OA\Property(property="data",type="object")
     *          ),
     *       )
     *      )
     *  )
     *
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Show  $show
     * @return \Illuminate\Http\Response
     */
    public function destroy(Show $show)
    {
        //

        $show->delete();
        return response()->json(null, Response::HTTP_NO_CONTENT);
    }
}
