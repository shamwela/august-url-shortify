<x-layout>
  <form method='POST' action='{{ route('register') }}'>
    @csrf
    <input name='name' type='text' placeholder='Name' autocomplete='off' value='{{ old('name') }}' required>
    @error('name')
    <p>{{ $message }}</p>
    @enderror
    <input name='email' type='email' placeholder='Email' autocomplete='off' value='{{ old('email') }}' required>
    @error('email')
    <p>{{ $message }}</p>
    @enderror
    <input name='password' type='password' placeholder='Password' value='{{ old('password') }}' required>
    @error('password')
    <p>{{ $message }}</p>
    @enderror
    <input name='password_confirmation' type='password' placeholder='Password Confirmation' value='{{ old('password_confirmation') }}' required>
    @error('password_confirmation')
    <p>{{ $message }}</p>
    @enderror
    <button type='submit'>Register</button>
  </form>
</x-layout>

