<x-layout>
  <h1>Edit URL</h1>
  <form action="/url/{{ $url->id }}" method="POST">
    @method('PUT')
    @csrf
    <input type="text" name="url" placeholder='Your URL' value='{{ $url->original_url }}' required minlength='3'
      autocomplete='off'>
    @error('url')
      <p>{{ $message }}</p>
    @enderror
    <button type="submit">Update</button>
  </form>
</x-layout>