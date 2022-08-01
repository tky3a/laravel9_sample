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
}
