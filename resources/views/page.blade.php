<x-app-layout>

<div class="project-logo">
				<img class="logo-graphics" src="{{asset('tth-logo.png')}}" >
				<span class="project-title">{{ __('project.title') }}</span>
		</div>

<nav>
    <ul>
        <!-- <li><a href="/">Start</a></li> -->
        <li><a href="/alphabet">Filter Alphabet</a></li>
        <li><a href="/entities">Gesamtliste</a></li>
        <!-- <li><a href="#">Ansichten</a></li> -->
        <!-- <li><a href="#">Blog</a></li> -->
    </ul>
</nav>

Sie haben <span class="code">{{ $routeUrl }}</span> aufgerufen.

</x-app-layout>