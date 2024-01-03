@props([
  'type' => 'text', 'name', 'placeholder'
])

<div class="row mb-3">
  <input type="{{ $type }}" name="{{ $name }}" placeholder="{{ $placeholder }}" 
  class="py-2 pl-3 rounded-md w-full">
  @error($name)
    <div class="error pl-2 mt-2">
      <span class="text-red-700 text-sm">{{ $message }}</span>
    </div>
  @enderror
</div>