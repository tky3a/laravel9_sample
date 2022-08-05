<?php

namespace App\Services;

use App\Models\Tweet;
use Carbon\Carbon;
use App\Models\Image;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class TweetService
{
    public function getTweets()
    {
        // ソートして全件取得　（eloquent (クエリビルダ)を使うことでSQLでソートできていてるのでPHPでソートするより早い）
        return Tweet::with('images')->orderBy('created_at', 'DESC')->get();
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

    public function saveTweet(int $userId, string $content, array $images)
    {
        DB::transaction(function () use ($userId, $content, $images) {
            $tweet = new Tweet;
            $tweet->user_id = $userId;
            $tweet->content = $content;
            $tweet->save();

            foreach ($images as $image) {
                // strageのディレクトリに保存
                Storage::putFile('public/images', $image);
                // DBに保存
                $imageModel = new Image;
                $imageModel->name = $image->hashName();
                $imageModel->save();
                // 紐付け
                $tweet->images()->attach($imageModel->id);
            }
        });
    }
}
