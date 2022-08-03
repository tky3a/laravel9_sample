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

# laravel9_sample
