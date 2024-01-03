@extends('layouts.basic')

@section('content')
  <x-forms.form-content link="{{ route('auth.confirm_user') }}" title="Confirm Your Account">
    <x-forms.field type="text" name="code" placeholder="Enter code from your email" />
    <input type="hidden" name="id" value="{{ $id }}">
  </x-forms.form-content>
@endsection