 {{--
	original login routes
	 <a href="{{ url('/dashboard') }}" class="text-sm text-gray-700 dark:text-white">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}" class="text-sm text-gray-700  dark:text-white">Log in</a>

                        @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 dark:text-white dark:line-through">Register</a>
                        <!-- <span class="ml-4 text-sm text-gray-700 line-through dark:text-white">Register</span> -->
                        @endif
--}}

{{-- entityStrings passing not working, it seems that *always* sanitize (like htmlantities) performed --}}
<x-app-layout :entityStrings="$entityStrings">
	@foreach ($entities as $entity)
		{{-- {{ $entity->begriff }} , {{$entity->id}} -- --}}
		{{ $entity->begriff }},
	@endforeach
</x-app-layout>