<?php

namespace App\Http\Controllers;

use App\Models\Network;
use Illuminate\Http\Request;
use App\Http\Resources\NetworkResource;
use App\Http\Resources\NetworkCollection;
use App\Http\Requests\StoreNetworkRequest;
use App\Http\Requests\UpdateNetworkRequest;

class NetworkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return new NetworkCollection(Network::paginate(1));
    }

    /**
     * Store a newly created resource in storage.
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
     *
     * @param  \App\Models\Network  $network
     * @return \Illuminate\Http\Response
     */
    public function show(Network $network)
    {
        return new NetworkResource($network);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\UpdateNetworkRequest  $request
     * @param  \App\Models\Network  $network
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateNetworkRequest $request, Network $network)
    {
        //
        $network->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Network  $network
     * @return \Illuminate\Http\Response
     */
    public function destroy(Network $network)
    {
        $network->delete();
    }
}
