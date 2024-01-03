@props([
  'title', 'link'
])

<div class="max-w-3xl mx-auto bg-gray-300 rounded-lg mt-5 py-2">
  <div class="title text-center"><span class="text-xl">{{ $title }}</span></div>
  <div class="form-body">
    <form action="{{ $link }}" class="px-5 pt-3" enctype="multipart/form-data" method="POST">
      @csrf
      {{ $slot }}
      <button class="px-5 py-2 bg-slate-900 text-white rounded-md" type="submit">Submit</button>
    </form>
  </div>
</div>