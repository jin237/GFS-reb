<?php

namespace App\Services;

use App\Models\Murmur;
use Illuminate\Support\Facades\DB;

class MurmurServices
{
    public function getAllMurmur()
    {
        return DB::table('murmur')
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
            ->get();
    }

    public function postMurmur($request)
    {
        $murmur = new Murmur();
        $murmur->content = $request->json('content');
        $murmur->user_id = $request->json('user_id');
        $murmur->save();
    }

    public function getMurmur($id)
    {
        return DB::table('murmur')
            ->select('murmur.id',
                     'murmur.user_id',
                     'content',
                     DB::raw('count(distinct likes.id) as likes'),
                     DB::raw('count(distinct louds.id) as loud'),
                     DB::raw('count(distinct replys.id) as reply'),
                     'murmur.created_at',
                     'murmur.updated_at')
            ->where('murmur.id', '=', $id)
            ->leftJoin('likes', 'murmur.id' , '=' , 'likes.murmur_id')
            ->leftJoin('louds', 'murmur.id' , '=' , 'louds.murmur_id')
            ->leftJoin('replys', 'murmur.id' , '=' , 'replys.murmur_id')
            ->groupBy('murmur.id')
            ->get();
    }

    public function putMurmur($request, $id)
    {
        $murmur = Murmur::find($id);
        $murmur->content = $request->json('content');
        $murmur->save();
    }

    public function deleteMurmur($id)
    {
        $murmur = Murmur::find($id);
        $murmur->delete();
    }
}