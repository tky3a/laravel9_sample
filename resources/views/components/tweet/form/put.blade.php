@props(['tweet'])

<div class="p-4">
  <form action="{{ route('tweet.update.put', ['tweetId' => $tweet->id]) }}" method="post">
    @method('PUT')
    @csrf
    @if (session('feedback.success'))
      <x-alert.success>{{ session('feedback.success') }}</x-alert.success>
    @endif
    <div class="mt-1">
      <textarea name="tweet" cols="30" rows="4"
        class="mt-1 block w-full rounded-md border border-gray-300 p-2 focus:border-blue-400 focus:ring-blue-400 sm:text-sm"
        placeholder="つぶやきを入力">{{ $tweet->content }}</textarea>
    </div>
    <p class="mt-2 text-sm text-gray-500">140文字まで</p>

    @error('tweet')
      <x-alert.error>{{ $message }}</x-alert.error>
    @enderror

    <div class="flex flex-wrap justify-end">
      <x-element.button>
        編集
      </x-element.button>
    </div>
  </form>
</div>
