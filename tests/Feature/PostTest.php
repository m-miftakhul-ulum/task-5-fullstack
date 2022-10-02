<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;

class PostTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */

    // public function test_auth()
    // {

    //     $user = User::create([
    //         'name' => 'test',
    //         'email' => rand(12345, 678910) . 'test@gmail.com',
    //         'password' => bcrypt('secret9874'),
    //     ]);

    //     if (!auth()->attempt(['email' => $user->email, 'password' => 'secret1234'])) {
    //         return response(['message' => 'Login credentials are invaild']);
    //     }

    //     $accessToken = auth()->user()->createToken('authToken')->accessToken;

    //     info($accessToken);
    // }

    // public function test_create_category()
    // {
    //     $token = $this->test_auth();

    //     $response = $this->withHeaders([
    //         'Authorization' => 'Bearer ' . $token,
    //     ])->json('POST', 'api/v1/endpointcategory', [
    //         'name' => 'Test',
    //         'user_id' => 1,
    //     ]);

    //     //Write the response in laravel.log
    //     info(1, [$response->getContent()]);

    //     $response->assertStatus(200);
    // }



    public function test_example()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }
}
