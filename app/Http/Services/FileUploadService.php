<?php

namespace App\Http\Services;

use Illuminate\Http\UploadedFile;

class FileUploadService
{
  public static function singleUpload(UploadedFile $file): string
  {
    $name = time() . $file->getClientOriginalName();
    $file->storeAs('public/profile', $name);

    return $name;
  }
}