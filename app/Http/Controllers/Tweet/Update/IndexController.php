<?php

namespace App\Http\Controllers\Tweet\Update;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Tweet;
use App\Services\TweetService;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;

class IndexController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request, TweetService $tweetService)
    {
        $tweetId = (int) $request->route('tweetId');
        if (!$tweetService->isOwnTweet($request->user()->id, $tweetId)) {
            throw new AccessDeniedHttpException(); //403 閲覧禁止
        }
        // firstOrFailを使えば検索対象が存在しない場合は404エラーとなる（下のコメントアウトの処理が１行で可能）
        $tweet = Tweet::where('id', $tweetId)->firstOrFail();
        // $tweet = Tweet::where('id', $tweetId)->first();
        // if (is_null($tweet)) {
        //     // 404に飛ばす
        //     throw new NotFoundHttpException('存在しないつぶやきです');
        // }
        return view('tweet.update')->with('tweet', $tweet);
    }
}
