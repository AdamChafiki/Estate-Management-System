  <div class="mx-auto max-w-screen-xl px-6 lg:px-8 relative">
      <div class="relative flex h-16 space-x-10 w-full">
          <div class="flex justify-start"><a class="flex flex-shrink-0 items-center" href="/">
                  <img class="block h-8 w-auto" height="32" src="/logo.png" alt="Estate">
              </a>
          </div>
          <div class="flex-shrink-0 flex px-2 py-3 items-center space-x-8 flex-1 justify-end justify-self-end ">
              <a href="/browze" class="text-gray-700 flex items-center hover:text-blue-700 text-sm font-medium">
                  <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-4 h-4 mr-1">
                      <path
                          d="M13 19H19V9.97815L12 4.53371L5 9.97815V19H11V13H13V19ZM21 20C21 20.5523 20.5523 21 20 21H4C3.44772 21 3 20.5523 3 20V9.48907C3 9.18048 3.14247 8.88917 3.38606 8.69972L11.3861 2.47749C11.7472 2.19663 12.2528 2.19663 12.6139 2.47749L20.6139 8.69972C20.8575 8.88917 21 9.18048 21 9.48907V20Z">
                      </path>
                  </svg>
                  Browze
              </a>
              @if (Auth::check())

              @if (Auth::user()->role == 'agent')
              <a class="text-gray-700 flex items-center hover:text-blue-700 text-sm font-medium"
                  href="{{route('estate.create')}}">
                  <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-4 h-4 mr-1">
                      <path d="M11 11V5H13V11H19V13H13V19H11V13H5V11H11Z"></path>
                  </svg>
                  Add estate
              </a>
              @endif
              <a class="text-gray-700 flex items-center hover:text-blue-700 text-sm font-medium" href="/account">
                  <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-4 h-4 mr-1">
                      <path
                          d="M4 22C4 17.5817 7.58172 14 12 14C16.4183 14 20 17.5817 20 22H18C18 18.6863 15.3137 16 12 16C8.68629 16 6 18.6863 6 22H4ZM12 13C8.685 13 6 10.315 6 7C6 3.685 8.685 1 12 1C15.315 1 18 3.685 18 7C18 10.315 15.315 13 12 13ZM12 11C14.21 11 16 9.21 16 7C16 4.79 14.21 3 12 3C9.79 3 8 4.79 8 7C8 9.21 9.79 11 12 11Z">
                      </path>
                  </svg>
                  Account
              </a>

              <form action="{{ route('logout') }}" method="POST">
                  @csrf
                  <button
                      class="text-white bg-blue-800 hover:bg-blue-900 inline-flex items-center justify-center px-3 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm ">Logout</button>
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