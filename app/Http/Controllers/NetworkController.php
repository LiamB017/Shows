<?php

namespace App\Http\Controllers;

use App\Models\Network;
use App\Http\Resources\NetworkResource;
use App\Http\Resources\NetworkCollection;
use App\Http\Requests\StoreNetworkRequest;
use App\Http\Requests\UpdateNetworkRequest;

use Illuminate\Http\Response;
use Illuminate\Http\Request;

class NetworkController extends Controller
{
    /**
     * Display a listing of the network resource in swagger API documentation.
     *
     *
 * @OA\Get(
 *     path="/api/networks",
 *     description="Displays all the networks",
 *     tags={"Networks"},
     *      @OA\Response(
        *          response=200,
        *          description="Successful operation, Returns a list of Networks in JSON format"
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
        return new NetworkCollection(Network::all());
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
     * @param  \Illuminate\Http\StoreNetworkRequest  $request
     * @return \Illuminate\Http\Response
     */

    public function store(StoreNetworkRequest $request)
    {
        $network = Network::create([
            'name' => $request->name,
            'address' => $request->address
        ]);

        return new NetworkResource($network);
    }

/**
     * Display the specified resource.
     * @OA\Get(
    *     path="/api/networks/{id}",
    *     description="Gets a network by ID",
    *     tags={"Networks"},
    *          @OA\Parameter(
        *          name="id",
        *          description="Network id",
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
     * @param  \App\Models\Network  $network
     * @return \Illuminate\Http\NetworkResource
     */


    public function show(Network $network)

    {
        return new NetworkResource($network);
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
        *          description="Network id",
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
     * @param  \Illuminate\Http\UpdateShowRequest  $request
     * @return \Illuminate\Http\NetworkResource
     */
    public function update(UpdateNetworkRequest $request, Network $network)
    {
        //
        $network->update($request->all());

        return new NetworkResource($network);

    }

     //DELETE



    /**
     *
     *
     * @OA\Delete(
     *    path="/api/networks/{id}",
     *    operationId="network_destroy",
     *    tags={"Networks"},
     *    summary="Delete a Network",
     *    description="Delete a Network By ID",
     *    @OA\Parameter(name="id", in="path", description="Id of a Network", required=true,
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
     * @param  \App\Models\Network  $network
     * @return \Illuminate\Http\Response
     */

    public function destroy(Network $network)
    {
        $network->delete();

        return(" $network Deleted");
    }
}
