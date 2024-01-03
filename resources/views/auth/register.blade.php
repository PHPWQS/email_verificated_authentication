@extends('layouts.basic')

@section('content')
  <x-forms.form-content link="{{ route('auth.create') }}" title="Sign up In Our Platoform">
    <x-forms.field type="email" name="email" placeholder="Enter email" />
    <x-forms.field type="password" name="password" placeholder="Enter password" />
    <x-forms.field type="password" name="password_confirmation" placeholder="Confirm your password" />
    <x-forms.field name="company_name" placeholder="Write your company name" />
    <x-forms.text-area name="description" placeholder="Small Description about your company" />
    <x-forms.field type="file" name="avatar" placeholder="a" />
  </x-forms.form-content>
@endsection