<?php

namespace App\Http\Controllers\Tweet\Update;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Tweet;
use App\Services\TweetService;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;

class IndexController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request, TweetService $tweetService)
    {
        $tweedId = (int) $request->route('tweetId');
        if(!$tweetService->checkOwnTweet($request->user()->id, $tweedId)) {
            throw new AccessDeniedHttpException();
        }
        $tweet = Tweet::where('id', $tweedId)->firstOrFail();
        return view('tweet.update')->with('tweet', $tweet);
    }
}
