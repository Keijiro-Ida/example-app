<?php

namespace Tests\Feature\Tweet;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;
use App\Models\Tweet;
use App\Services\TweetService;

class DeleteTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     */
    public function test_example(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function test_delete_successed()
    {

        $user = User::factory()->create();
        $tweet = Tweet::factory()->for($user)->create(); // for() メソッドでユーザーを関連付け
        $this->actingAs($user);
        $response = $this->delete('/tweet/delete/' . $tweet->id);
        $response->assertRedirect('/tweet');
        $this->assertDatabaseMissing('tweets', [
            'id' => $tweet->id
        ]);
    }
}
