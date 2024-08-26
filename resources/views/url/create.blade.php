<x-layout>
  <h1>Create a short url</h1>
  <form action="/url" method="POST">
    @csrf
    <input type="text" name="url" placeholder='Your URL' value='{{ old('url') }}' required minlength='3'
      autocomplete='off'>
    @error('url')
      <p>{{ $message }}</p>
    @enderror
    <button type="submit">Create</button>
  </form>
</x-layout>