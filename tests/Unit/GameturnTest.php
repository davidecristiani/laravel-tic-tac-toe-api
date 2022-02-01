<?php

namespace Tests\Unit;

use App\Models\Gameturn;
use PHPUnit\Framework\TestCase;

class GameturnTest extends TestCase
{
    /**
     * A basic unit test .
     *
     * @return void
     */
        public function test_gameturn_won_diagonal_top_down_1()
    {
        $gameturn = new Gameturn();

        $gameturn->a1=1;
        $gameturn->b2=1;
        $gameturn->c3=1;

        $this->assertTrue($gameturn->won());
    }

    /**
     * A basic unit test .
     *
     * @return void
     */
    public function test_gameturn_won_diagonal_top_down_2()
    {
        $gameturn = new Gameturn();

        $gameturn->a1=2;
        $gameturn->b2=2;
        $gameturn->c3=2;

        $this->assertTrue($gameturn->won());
    }

    /**
     * A basic unit test .
     *
     * @return void
     */
    public function test_gameturn_won_row_2()
    {
        $gameturn = new Gameturn();

        $gameturn->a1=2;
        $gameturn->a2=2;
        $gameturn->a3=2;

        $this->assertTrue($gameturn->won());
    }

    /**
     * A basic unit test .
     *
     * @return void
     */
    public function test_gameturn_not_won_diagonal_top_down_2()
    {
        $gameturn = new Gameturn();

        $gameturn->a1=2;
        $gameturn->b2=1;
        $gameturn->c3=2;

        $this->assertFalse($gameturn->won());
    }

    /**
     * A basic unit test .
     *
     * @return void
     */
    public function test_gameturn_not_won_empty()
    {
        $gameturn = new Gameturn();

        $this->assertFalse($gameturn->won());
    }
}
