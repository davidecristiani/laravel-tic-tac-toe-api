<?php

namespace Tests\Feature;

use App\Models\Gameturn;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class GameturnTest extends TestCase
{
    /**
     * A basic feature test .
     *
     * @return void
     */
    public function test_newgame()
    {
        $response = $this->post('/api/newgame');
        $response->assertStatus(200);
    }

}
