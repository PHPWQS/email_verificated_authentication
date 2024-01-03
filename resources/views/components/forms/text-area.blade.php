@props([
  'name', 'placeholder'
])

<div class="row mb-3">
  <textarea id="editor" class="py-2 pl-3 rounded-md w-full" placeholder="{{ $placeholder }}" name="{{ $name }}" 
  cols="30" rows="10"></textarea>
  @error($name)
    <div class="error pl-2 mt-2">
      <span class="text-red-700 text-sm">{{ $message }}</span>
    </div>
  @enderror
</div>