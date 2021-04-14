 {{--
    ! warning: original name of this file: welcome.blade.php
    !!! check if is still used for login/demo code 
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

@if ($isStartPage)
		<div class="project-logo">
				<img class="logo-graphics" src="{{asset('tth-logo.png')}}" >
				<span class="project-title">{{ __('project.title') }}</span>
		</div>
@endif

    <div class="row">
        <div class="col">
        <!-- this could be component!! -->
            @foreach ($entities as $entity)
                {{-- {{ $entity->begriff }} , {{$entity->id}} -- --}}
                <!-- !!! better to read route base name? -->
                <!-- !!! still web routes are view related -->
                <a href="/entity/{{$entity->id}}">{{ $entity->begriff }}</a>
                @if (!$loop->last)
					,&nbsp;
				@endif
            @endforeach
        </div>
    </div>
</x-app-layout>