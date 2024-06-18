@extends('base')

@section('title', 'Tous les biens')

@section('content')

<div class="p-5 mb-5 text-center">
    <form action="" method="get" class="container d-flex gap-2">
        <input type="number" placeholder="Surface" name="surface" class="form-control" value="{{$input['surface'] ?? ''}}">
        <input type="number" placeholder="Nombre de piéces minimumn" name="rooms" class="form-control" value="{{$input['rooms'] ?? ''}}">
        <input type="number" placeholder="Budget Max" name="price" class="form-control" value="{{$input['price'] ?? ''}}">
        <input  placeholder="Mot clef" name="title" class="form-control" value="{{$input['title'] ?? ''}}">
        <button class="btn btn-primary btn-sm flex-grow-0">Rechercher</button>
    </form>
</div>
    <div class="container">
        <div class="row">
        @forelse ($properties as $property)
            <div class="col-3 mb-4">
                @include('admin.properties.card')
            </div>
            @empty
            <div class="col text-center">
               Aucun bien ne correspond à votre recherche
            </div>
            
                
            @endforelse
        </div>
        <div class="my-4">
            {{ $properties->links() }}
        </div>
    </div>
@endsection