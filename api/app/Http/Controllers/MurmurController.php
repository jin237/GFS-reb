<?php

namespace App\Http\Controllers;

use App\Http\Requests\MurmurRequest;
use App\Services\MurmurServices;

class MurmurController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  App\Services\MurmurServices  $murmurServices
     * @return \Illuminate\Http\Response
     */
    public function index(MurmurServices $murmurServices)
    {
        return response()->json($murmurServices->getAllMurmur());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\MurmurRequest  $request
     * @param  App\Services\MurmurServices  $murmurServices
     * @return \Illuminate\Http\Response
     */
    public function store(MurmurRequest $request, MurmurServices $murmurServices)
    {
        $murmurServices->postMurmur($request);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @param  App\Services\MurmurServices  $murmurServices
     * @return \Illuminate\Http\Response
     */
    public function show($id, MurmurServices $murmurServices)
    {
        return response()->json($murmurServices->getMurmur($id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\MurmurRequest  $request
     * @param  int  $id
     * @param  App\Services\MurmurServices  $murmurServices
     * @return \Illuminate\Http\Response
     */
    public function update(MurmurRequest $request, $id, MurmurServices $murmurServices)
    {
        $murmurServices->putMurmur($request, $id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @param  App\Services\MurmurServices  $murmurServices
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, MurmurServices $murmurServices)
    {
        $murmurServices->deleteMurmur($id);
    }
}
