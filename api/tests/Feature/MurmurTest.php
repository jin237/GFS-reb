<?php

namespace Tests\Feature;

use App\Models\Murmur;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class MurmurTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
        $this->artisan('db:seed', ['--class' => 'TestDataSeeder']);
    }

    /**
     * @test
     */
    public function api_murmurにGETメソッドでアクセスできる()
    {
        $response = $this->get('api/murmur');
        $response->assertStatus(200);
    }

    /**
     * @test
     */
    public function api_murmurにidを指定してGETメソッドでアクセスできる()
    {
        $murmur = Murmur::first()->toArray();
        $id = $murmur["id"];

        $response = $this->get("api/murmur/$id");
        $response->assertStatus(200);
    }

    /**
     * @test
     */
    public function api_murmurにPOSTメソッドでアクセスできる()
    {
        $user = User::first()->toArray();
        $id = $user["id"];

        $murmur = [
            'content' => 'Test content from MurmurTest.php.',
            'user_id' => $id,
        ];

        $response = $this->postJson('api/murmur', $murmur);
        $response->assertStatus(200);
    }

    /**
     * @test
     */
    public function api_murmurにPUTメソッドでアクセスできる()
    {
        $murmur = Murmur::first()->toArray();
        $id = $murmur["id"];

        $murmur = [
            'content' => 'update content from MurmurTest.php.',
        ];

        $response = $this->putJson("api/murmur/$id", $murmur);
        $response->assertStatus(200);
    }

    /**
     * @test
     */
    public function api_murmurにDELETEメソッドでアクセスできる()
    {
        $murmur = Murmur::first()->toArray();
        $id = $murmur["id"];

        $response = $this->deleteJson("api/murmur/$id");
        $response->assertStatus(200);
    }
}
