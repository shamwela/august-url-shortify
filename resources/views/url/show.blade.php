<x-layout>
  <h1>URL details</h1>
  <a href="{{ $url->original_url }}" target='_blank'>
    {{ $url->original_url }}
  </a>
  <p>Short code: {{ $url->short_code }}</p>
  <p>Access count: {{ $url->access_count }}</p>
</x-layout>