<?php

namespace App\Http\Services;

use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserService
{
  public static function create(array $user_data, array $profile_data)
  {
    $password = Hash::make($user_data['password']);
    $user = User::query()->create([...$user_data, 'password' => $password])
    ->profile()->create([...$profile_data])->user;
    
    return $user;
  }
}