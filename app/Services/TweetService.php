<?php

namespace App\Services;

use App\Models\Tweet;
use Carbon\Carbon;

class TweetService
{
    public function getTweets()
    {
        // ソートして全件取得　（eloquent (クエリビルダ)を使うことでSQLでソートできていてるのでPHPでソートするより早い）
        return Tweet::orderBy('created_at', 'DESC')->get();
    }

    // 自分のツイートかどうかを判定するメソッド
    public function isOwnTweet(int $userId, int $tweetId): bool
    {
        $tweet = Tweet::where('id', $tweetId)->first();
        if (!$tweet) {
            return false;
        }
        return $tweet->user_id === $userId;
    }

    // 昨日〜今のつぶやきを返却するメソッド
    public function countYesterdayTweets(): int
    {
        // echo '???????????';
        return Tweet::whereDate('created_at', '>=', Carbon::yesterday()->toDateTimeString())
            ->whereDate('created_at', '<', Carbon::today()->toDateTimeString())
            ->count();
    }
}
