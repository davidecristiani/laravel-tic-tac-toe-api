<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gameturn extends Model {
    public static $players = [ 1, 2 ];
    public static $tris_positions = [ 'a1', 'a2', 'a3', 'b1', 'b2', 'b3', 'c1', 'c2', 'c3' ];
    public static $tris_rows = [ 'a', 'b', 'c' ];
    public static $tris_columns = [ '1', '2', '3' ];
    protected $hidden = [ 'id', 'created_at', 'updated_at', 'player' ];

    use HasFactory;

    public function won() {

        $winning_position_combinations = collect( [] );

        foreach ( self::$tris_rows as $row ) {
            $positions_on_same_row = collect( [ $this->{$row . '1'}, $this->{$row . '2'}, $this->{$row . '3'} ] );
            $winning_position_combinations->add( $positions_on_same_row );
        }

        foreach ( self::$tris_columns as $column ) {
            $positions_on_same_column = collect( [
                $this->{'a' . $column},
                $this->{'b' . $column},
                $this->{'c' . $column}
            ] );
            $winning_position_combinations->add( $positions_on_same_column );
        }

        $positions_diagonal_top_down = collect( [ $this->{'a1'}, $this->{'b2'}, $this->{'c3'} ] );
        $winning_position_combinations->add( $positions_diagonal_top_down );

        $positions_diagonal_top = collect( [ $this->{'a3'}, $this->{'b2'}, $this->{'c1'} ] );
        $winning_position_combinations->add( $positions_diagonal_top );

        foreach ( $winning_position_combinations as $winning_position_combination ) {
            foreach ( self::$players as $player ) {
                $status = $winning_position_combination->every( function ( $value ) use ( $player ) {
                    return $value == $player;
                } );
                if ( $status ) {
                    return true;
                }
            }
        }

        return false;
    }
}
