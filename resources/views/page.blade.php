{{-- The "page" is the main content area shown to every user, it has a navigation and a slot for several routes (work like this?) --}}

<nav>
    <ul>
        <li><a href="/">Start</a></li>
        <li><a href="#">Filter</a></li>
        <li><a href="#">Ansichten</a></li>
    </ul>
</nav>

{{-- need logic for making the output
    e.g. as route /entities/a is entities/{id} 
--}}

@php
    // get code from tth-rex for letters
    // make assoc array in Controller or component
	// make a component
@endphp

<div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">
    <x-tth.alphabetical/>
	<!-- add letter loop here -->
</div>