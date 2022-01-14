<div class="w3-bar w3-border w3-teal">
  @if (Route::has('login'))
                <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                    @auth
                        <a href="{{ url('/dashboard') }}" class="w3-bar-item w3-button ">Hi {{Auth::user()->name}}</a>
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                        <button type="submit" class="w3-bar-item w3-button w3-right">Logout</button>
                       </form>
                    @else
                    <a href="#" class="w3-bar-item w3-button">TODO List</a>
                        <a href="{{ route('login') }}" class="w3-bar-item w3-button w3-right w3-padding">Log In</a>
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="w3-bar-item w3-button w3-right w3-padding">Register</a>
                        @endif
                    @endauth
                </div>
            @endif
</div>