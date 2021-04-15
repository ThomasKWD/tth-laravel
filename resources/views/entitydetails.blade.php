<x-app-layout>
@if ($entity === NULL) 
    <div class="warning">
        No entity found for this ID.
    </div>
@else

    {{-- my 3x3 grid  --}}    
    <div class="row">
        <div class="col-sm">
        Deskriptor:
        </div>
        <div class="col-sm-6">
        Oberbegriffe:
        </div>
        <div class="col-sm">
        </div>
    </div>
    <div class="row">
        <div class="col-sm">
        Äquivalenzklasse
        </div>
        <div class="col-sm-6">
            <div class="entity-center">

                <h2>{{ $entity['begriff'] }}</h2>
                (ID: {{ $entity['id']}})<br>
                
                <p>{!! $entity['definition'] !!}</p>
                <hr>
                {{-- both allowed: $entity->language->sprache, $entity['language']['sprache'] --}}
                <p>Sprache: {{ $entity->language->sprache }}, Sprachstil: , Sprachregion: </p>
            </div>
        
        </div>
        <div class="col-sm">
            Verwandte
        </div>
    </div>
    <div class="row">
        <div class="col-sm"></div>
        <div class="col-sm-6">
            Unterbegriffe:
        </div>
        <div class="col-sm">
            Schlagwörter:
        </div>
    </div>
    @endif
</x-app-layout>