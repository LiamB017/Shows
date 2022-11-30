<?php

namespace App\Http\Controllers;

use App\Models\Actor;
use App\Http\Resources\ActorResource;
use App\Http\Resources\ActorCollection;
use App\Http\Requests\StoreActorRequest;
use App\Http\Requests\UpdateActorRequest;
use Illuminate\Http\Request;
use Illuminate\Http\Response;


class ActorController extends Controller
{
    /**
     * Display a listing of the network resource in swagger API documentation.
     *
     *
 * @OA\Get(
 *     path="/api/actors",
 *     description="Displays all the actors",
 *     tags={"Actors"},
     *      @OA\Response(
        *          response=200,
        *          description="Successful operation, Returns a list of Actors in JSON format"
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
        return new ActorCollection(Actor::all());
    }



 // POST Request
  // Allows for creation of a new Show using Swagger

    /**
     * Store a newly created show resource in storage.
     * 
     * @OA\Post(
     *      path="/api/networks",
     *      operationId="post",
     *      tags={"Networks"},
     *      summary="Create a new Network",
     *      description="Stores the Network in the Database",
     *      @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *            required={"name", "address"},
     *            @OA\Property(property="name", type="string", format="string", example="Sample name"),
     *            @OA\Property(property="address", type="string", format="string", example="Sample address"),
     *           
     *           
     *            
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


     *
     * @param  \Illuminate\Http\StoreActorRequest  $request
     * @return \Illuminate\Http\Response
     */

    public function store(StoreActorRequest $request)
    {
        $actor = Actor::create([
            'name' => $request->name,
            'age' => $request->age
        ]);

        return new ActorResource($actor);
    }


    /**
     * Display the specified resource.
     * @OA\Get(
    *     path="/api/actors/{id}",
    *     description="Gets a actor by ID",
    *     tags={"Actors"},
    *          @OA\Parameter(
        *          name="id",
        *          description="Actor id",
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
     * @param  \App\Models\Actor  $network
     * @return \Illuminate\Http\ActorResource
     */


    public function show(Actor $actor)
    {
        return new ActorResource($actor);
    }

   /**
     *Update the specified resource in storage
     *
     * @OA\Put(
     *      path="/api/networks/{id}",
     *      operationId="networks_put",
     *      tags={"Networks"},
     *      summary="Update a Network",
     *      description="Stores the updated Network in the DB",
     *      @OA\Parameter(
        *          name="id",
        *          description="Store id",
        *          required=true,
        *          in="path",
        *          @OA\Schema(
        *              type="integer")
     *          ),
     *      @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *            required={"id","name", "address"},
     *               *            @OA\Property(property="name", type="string", format="string", example="Sample name"),
     *            @OA\Property(property="address", type="string", format="string", example="Sample address"),
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
     * @param  \Illuminate\Http\Request  $actor
     * @return \Illuminate\Http\ActorResource
     */


    public function update(UpdateActorRequest $request, Actor $actor)
    {
          $actor->update($request->all());
        
          
    }

    //DELETE



    /**
     *
     *
     * @OA\Delete(
     *    path="/api/actors/{id}",
     *    operationId="actor_destroy",
     *    tags={"Actor"},
     *    summary="Delete a Actor",
     *    description="Delete an Actor By ID",
     *    @OA\Parameter(name="id", in="path", description="Id of a Actor", required=true,
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
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Actor  $actor
     * @return \Illuminate\Http\Response
     */


    public function destroy(Actor $actor)
    {
        $actor->delete();
        return response()->json(null, Response::HTTP_NO_CONTENT);
    }
}