<?php

namespace App\Http\Controllers\Tweet;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Tweet;
use App\Services\TweetService;

class IndexController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     * TweetService $tweetServiceで受け取ることでnew TweetService()のインスタンスが$tweetServiceに代入されている
     */
    public function __invoke(Request $request, TweetService $tweetService)
    {
        $tweets = $tweetService->getTweets(); // つぶやきの一覧を取得
        return view('tweet.index')
            ->with('tweets', $tweets);
    }
}
