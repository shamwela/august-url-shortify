<x-layout>
  <h1>URLs</h1>
  @foreach ($urls as $url)
  <div>
    <a href='/url/{{ $url->id }}'>
      Short code: {{ $url->short_code }}
    </a>
    <a <a href='/url/{{ $url->id }}/stats'>
      Stat route
    </a>
    <a href='/url/{{ $url->id }}/edit'>
      <button>Edit</button>
    </a>
    <form method='POST' action='/url/{{ $url->id }}'>
      @method('DELETE')
      @csrf
      <button type='submit'>Delete</button>
    </form>
  </div>
  @endforeach
</x-layout>