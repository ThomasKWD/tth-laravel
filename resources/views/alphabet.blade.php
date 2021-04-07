<x-app-layout>
	<div class="letters-wrapper">
		{{-- ! don't use $letter --}}
		@foreach ($listOfLetters as $l)
			{{-- !!! get route from framework! --}}
			<a class="btn btn-primary" href="/alphabet/{{$l}}">
				{{$l}}
			</a>
		@endforeach
	</div>

	<div class="results-wrapper">
		@forelse ($entitiesForLetter as $entity)
			{{ $entity->begriff }}
			@if (!$loop->last)
				,
			@endif
		@empty
			Keine Suchergebnisse für den Buchstaben "<strong>{{$letter}}</strong>".
		@endforelse
	</div>

</x-app-layout>