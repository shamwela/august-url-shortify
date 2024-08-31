<x-layout>
  <h1>URLs</h1>
  @foreach ($urls as $url)
    <div>
    <a href='/url/{{ $url->id }}'>
      Short code: {{ $url->short_code }}
    </a>

    @can('viewStats', $url)
      <a <a href='/url/{{ $url->id }}/stats'>
        Stat route
      </a>
    @endcan
    
    <a href='/url/{{ $url->id }}/edit'>
      <button>Edit</button>
    </a>

    @can('delete', $url)
      <form method='POST' action='/url/{{ $url->id }}'>
        @method('DELETE')
        @csrf
        <button type='submit'>Delete</button>
      </form>   
    @endcan

    </div>
  @endforeach
</x-layout>