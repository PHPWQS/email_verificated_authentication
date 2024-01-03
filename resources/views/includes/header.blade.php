<header>
  <div class="mx-auto container pt-3"> 
    <nav class="flex justify-between items-center">
      <div class="logo"><a href="" class="text-xl font-bold">Jobby</a></div>
      <ul class="flex items-center">
        <li class="px-5 py-2 rounded-lg hover:bg-gray-300 duration-100 cursor-pointer"><a href="" class="text-lg">Jobs</a></li>
        <li class="px-5 py-2 rounded-lg hover:bg-gray-300 duration-100 cursor-pointer"><a href="" class="text-lg">Contact</a></li>
        <li class="px-5 py-2 rounded-lg hover:bg-gray-300 duration-100 cursor-pointer"><a href="" class="text-lg">About us</a></li>
        @auth
        <li class="px-5 py-2 rounded-lg hover:bg-gray-300 duration-100 cursor-pointer">
          <div class="flex items-center">
            <div class="photo mr-2">
            <img class="w-11" src="{{'http://localhost:8000/storage/profile/' . auth()->user()->profile->avatar }}" alt="">
            </div>
            <div class="name">{{ auth()->user()->profile->company_name }}</div>
          </div>
        </li>          
        <li class="ml-2">
          <a href="{{ route('user.logout') }}"><button class="px-5 py-2 bg-slate-900 rounded-lg text-white">Logout</button></a>
        </li>
        @else
          <li class="px-5">
            <a href="{{ route('auth.login') }}"><button class="px-5 py-2 bg-slate-900 rounded-lg text-white">Sign In</button></a>
          </li>
          <li>
            <a href="{{ route('auth.register') }}"><button class="px-5 py-2 bg-slate-900 rounded-lg text-white">Sign Up</button></a>
          </li>
        @endauth
      </ul>
    </nav>
  </div>
</header>