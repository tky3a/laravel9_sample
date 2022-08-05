@auth
  <div>
    <p>投稿フォーム</p>
    <form action="{{ route('tweet.create') }}" method="post" enctype="multipart/form-data">
      @csrf
      <label for="tweet-content">つぶやき</label>
      <div class="mt-1">
        <textarea class="mt-1 block w-full rounded-md border border-gray-300 p-2 focus:border-blue-400 focus:ring-blue-400"
          name="tweet" id="tweet-content" type="text" placeholder="つぶやきを入力してください。"></textarea>
      </div>
      <p class="mt-2 text-sm text-gray-500">
        140文字まで
      </p>

      <x-tweet.form.images></x-tweet.form.images>

      @error('tweet')
        <x-alert.error>{{ $message }}</x-alert.error>
      @enderror

      @error('images.*')
        <x-alert.error>{{ $message }}</x-alert.error>
      @enderror

      <div class="flex flex-wrap justify-end">
        <x-element.button>つぶやく</x-element.button>
      </div>
    </form>
  </div>
@endauth
@guest
  <div class="flex flex-wrap justify-center">
    <div class="flex w-1/2 flex-wrap justify-evenly p-4">
      <x-element.linkButton :href="route('login')">ログイン</x-element.linkButton>
      <x-element.linkButton :href="route('register')" theme="secondary">会員登録</x-element.linkButton>
    </div>
  </div>
@endguest
