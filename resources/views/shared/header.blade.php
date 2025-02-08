  <div class="mx-auto max-w-screen-xl px-6 lg:px-8 relative">
      <div class="relative flex h-16 space-x-10 w-full">
          <div class="flex justify-start"><a class="flex flex-shrink-0 items-center" href="/">
                  <img class="block h-8 w-auto" height="32" src="logo.png" alt="Your Company">
              </a>
          </div>
          @if (Auth::check())
          <div class="flex-shrink-0 flex px-2 py-3 items-center space-x-8 flex-1 justify-end justify-self-end "><a <a
                  class="text-gray-700 hover:text-blue-700 text-sm font-medium" href="/profile">Profile</a>
              <form action="{{ route('logout') }}" method="POST">
                  @csrf
                  <button
                      class="text-white bg-blue-800 hover:bg-blue-900 inline-flex items-center justify-center px-3 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm ">logout</button>
              </form>
          </div>

          @else
          <div class="flex-shrink-0 flex px-2 py-3 items-center space-x-8 flex-1 justify-end justify-self-end "><a
                  class="text-gray-700 hover:text-blue-700 text-sm font-medium" href="/login">Login</a>
              <a class="text-white bg-blue-800 hover:bg-blue-900 inline-flex items-center justify-center px-3 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm "
                  href="/signup">Sign up</a>
          </div>
          @endif

      </div>
  </div>