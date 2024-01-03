@extends('layouts.basic')

@section('content')
  
<x-forms.form-content link="{{ route('auth.login_user') }}" title="Sign In Our Platoform">
  <x-forms.field type="email" name="email" placeholder="Enter your email" />
  <x-forms.field type="password" name="password" placeholder="Enter your password" />
</x-forms.form-content>

@endsection 