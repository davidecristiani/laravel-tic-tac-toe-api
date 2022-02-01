<?php

namespace App\Http\Controllers;

use App\Models\Gameturn;
use Illuminate\Http\Request;

class GameturnController extends Controller {

    /**
     * API for creating a new game.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function newgame() {

        $gameturn          = new Gameturn();
        $gameturn->game_id = rand( 1, pow( 10, 16 ) );
        $gameturn->saveOrFail();
        $response_collection = collect( [ 'game_id' => $gameturn->game_id ] );

        return response()->json( $response_collection );
    }

    /**
     * API for play a game.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function play( Request $request ) {
        try {
            $request->validate( [
                'game_id'  => 'required|exists:gameturns',
                'player'   => 'required|in:' . implode( ',', Gameturn::$players ),
                'position' => 'required|in:' . implode( ',', Gameturn::$positions ),
            ] );
            $last_gameturn = Gameturn::where( 'game_id', $request->input( 'game_id' ) )->latest()->firstOrFail();

        } catch ( \Exception $e ) {
            return response()->json( [ 'error' => 'Parameters error: ' . $e->getMessage() ], 500 );
        }

        if ( $request->input( 'player' ) == $last_gameturn->player ) {
            return response()->json( [ 'error' => 'It is not your turn to play' ], 500 );
        }

        $position_state = $last_gameturn->{$request->input( 'position' )};
        if ( $position_state !== 0 ) {
            return response()->json( [ 'error' => 'The position is already taken by player ' . $position_state ], 500 );
        }

        //todo check victory
    }


}
