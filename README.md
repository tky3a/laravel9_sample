# laravel9 サンプルアプリ

# 起動
```
docker-compose up
./vendor/bin/sail yarn dev
```

# コマンドmemo

## シーダー作成

```
./vendor/bin/sail artisan make:seeder TweetsSeeder
```

## モデル作成

````
./vendor/bin/sail artisan make:model Tweet; 
````

マイグレーションを同時に作成

```
./vendor/bin/sail artisan make:model Tweet -m; 
```

## コントローラー作成
```
// Dir => ディレクトリ名
// ControllerName => コントローラー名
// --invokable => コントローラーに１メソッドしか存在しない場合
./vendor/bin/sail artisan make:controller Dir/ControllerName --invokable
```

## FormRequest作成
画面からのリクエストに対してのバリデーションに使う
以下でHttp\Requests\ディレクトリが作成される
```
./vendor/bin/sail artisan make:request Model名/Class名
// 例：./vendor/bin/sail artisan make:request Tweet/CreateRequest
```

## Factory作成
```
./vendor/bin/sail artisan make:factory TweetFactory --model=Tweet
```

## breeze
導入

```
// インストール
./vendor/bin/sail composer require laravel/breeze --dev

// 動作に必要なコードを生成
./vendor/bin/sail artisan breeze:install

フロントにコード反映
// yarn
./vendor/bin/sail yarn install
./vendor/bin/sail yarn dev

or

// npm
./vendor/bin/sail npm install
./vendor/bin/sail npm run dev
```

## クラスベースコンポーネント作成
```
./vendor/bin/sail artisan make:component Tweet/Options
```

## middleware作成
```
./vendor/bin/sail artisan make:middleware SampleMiddleware
```

## マイグレーションとシーディングをやり直す
```
./vendor/bin/sail artisan migrate:fresh --seed
```

## Mailableクラス作成　
```
./vendor/bin/sail artisan make:mail NewUserIntroduction
```

## mailのスタイルを変更したい場合に実行するコマンド
```
./vendor/bin/sail artisan vendor:publish --tag=laravel-mail
```

## job作成コマンド
```
./vendor/bin/sail artisan make:job SampleJob
```

## Queue (Jobsテーブル作成)
```
// jobsテーブル作成
./vendor/bin/sail artisan queue:table
// マイグレート
./vendor/bin/sail artisan migrate
```

## jobを保存と実行
### jobの保存

```
// サーバに接続
./vendor/bin/sail artisan tinker

// jobsテーブルにdispatchしたjobを保存（確認用）
\Bus::dispatch(new App\Jobs\SampleJob());

```

### jobの実行

```
// これが実行されたらjobsテーブルのjobが消えるはず　
./vendor/bin/sail artisan queue:work
```

## Laravelのコマンドを作成（コマンドを作成して実行する機能のファイルを作成するコマンド）
```
// SampleCommandファイルを作成
./vendor/bin/sail artisan make:command SampleCommand
```

コマンド一覧を表示
```
// これで作成したコマンド＋利用できるコマンドが確認できる
./vendor/bin/sail artisan list
```

## スケジューラーの一覧を確認
```
./vendor/bin/sail artisan schedule:list
```

## 中間テーブル向けのモデル作成
```
// --pivotをつけて実行すると中間テーブル向けのモデルを作成できる
./vendor/bin/sail artisan make:model TweetImage --pivot
```

# laravel9_sample
