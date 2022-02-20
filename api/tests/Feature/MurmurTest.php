<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class MurmurTest extends TestCase
{
    /**
     * @test
     */
    public function api_murmurにGETメソッドでアクセスできる()
    {
        $response = $this->get('api/murmur');
        $response->assertStatus(200);
    }
}
