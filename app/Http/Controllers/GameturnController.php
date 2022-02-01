<?php

namespace App\Http\Controllers;

use App\Models\Gameturn;
use Illuminate\Http\Request;

class GameturnController extends Controller
{

    /**
     * API for creating a new game.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function newgame()
    {
        
        $gameturn          = new Gameturn();
        $gameturn->game_id = rand( 1, pow( 10, 16 ) );
        $gameturn->saveOrFail();
        $response_collection = collect( [ 'game_id' => $gameturn->game_id ] );

        return response()->json( $response_collection );
    }

    /**
     * API for play a game.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function play(Request $request)
    {
        //
    }


}
