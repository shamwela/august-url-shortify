<x-layout>
  <form method='POST' action='{{ route('login') }}'>
    @csrf
    <input name='email' type='email' placeholder='Email' autocomplete='off' value='{{ old('email') }}' required>
    @error('email')
    <p>{{ $message }}</p>
    @enderror
    <input name='password' type='password' placeholder='Password' value='{{ old('password') }}' required>
    @error('password')
    <p>{{ $message }}</p>
    @enderror
    <button type='submit'>Login</button>
  </form>
</x-layout>