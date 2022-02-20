<?php

namespace App\Http\Controllers;

use App\Models\Murmur;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MurmurController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(DB::table('murmur')
            ->select('murmur.id',
                     'murmur.user_id',
                     'content',
                     DB::raw('count(distinct likes.id) as likes'),
                     DB::raw('count(distinct louds.id) as loud'),
                     DB::raw('count(distinct replys.id) as reply'),
                     'murmur.created_at',
                     'murmur.updated_at')
            ->leftJoin('likes', 'murmur.id' , '=' , 'likes.murmur_id')
            ->leftJoin('louds', 'murmur.id' , '=' , 'louds.murmur_id')
            ->leftJoin('replys', 'murmur.id' , '=' , 'replys.murmur_id')
            ->groupBy('murmur.id')
            ->get());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
