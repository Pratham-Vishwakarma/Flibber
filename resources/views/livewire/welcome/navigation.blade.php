<nav class="-mx-3 flex flex-1 justify-end">
    @auth
        <x-secondary-button
	    class="rounded-2xl p-2 px-3 py-2 transition ring-1"
            onclick="window.location.href='{{ url('/dashboard') }}'"
	>
		Dashboard
        </x-secondary-button>
    @else
        <x-secondary-button
            onclick="window.location.href='{{ url('/login') }}'"
            class="rounded-md p-2 px-3 py-2 ring-1 mr-2"
        >
            Log in
        </x-secondary-button>

        @if (Route::has('register'))
            <x-secondary-button
                onclick="window.location.href='{{ route('register') }}'"
                class="rounded-md px-3 py-2 ring-1"
            >
                Register
            </x-secondary-button>
        @endif
    @endauth
</nav>
