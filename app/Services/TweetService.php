<?php

namespace App\Services;

use App\Models\Tweet;

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
}
