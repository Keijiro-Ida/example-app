<?php

namespace Tests\Unit\Services;

use PHPUnit\Framework\TestCase;
use App\Services\TweetService;

use Mockery;

class TweetServiceTest extends TestCase
{
    /**
     * A basic unit test example.
     */
    public function test_check_own_tweeet(): void
    {
        $tweetService = new TweetService();

        $mock = Mockery::mock('alias:App\Models\Tweet');

        $mock->shouldReceive('where->first')->andReturn((object)[
            'id' => 1,
            'user_id' => 1])->once();

        $result = $tweetService->checkOwnTweet(1,1);
        $this->assertTrue($result);

        $mock->shouldReceive('where->first')->andReturn(null)->once();

        $result = $tweetService->checkOwnTweet(1,2);
        $this->assertFalse($result);
    }
}
