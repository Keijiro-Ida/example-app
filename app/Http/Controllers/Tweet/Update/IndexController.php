<?php

namespace App\Http\Controllers\Tweet\Update;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Tweet;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class IndexController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $tweedId = (int) $request->route('tweetId');
        $tweet = Tweet::where('id', $tweedId)->firstOrFail();
        return view('tweet.update')->with('tweet', $tweet);
    }
}
