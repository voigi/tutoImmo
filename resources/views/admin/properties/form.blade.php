@extends('admin.admin')

@section('title', isset($property) ? "Editer un Bien" : "Créer un Bien")

@section('content')

<h1>@yield('title')</h1>

<div>

    <form class="vstack gap-2" action="{{route(isset($property) ? "admin.property.update":"admin.property.store",$property)}}" method="post">

        @csrf
        @method($property->exists ? "PUT" : "POST")

        <div class="row">
            @include('shared.input',[
            "class" => "col",
            "label" => "Titre",
            "name" => "title",
            "value" =>$property->title            
            ])
            <div class="col row">
                @include('shared.input',[

                "class" => "col",
                "name" => "surface",
                "value" => $property->surface
                ])
                @include('shared.input',[

                "class" => "col",
                "label" => "Prix",
                "name" => "price",
                "value" => $property->price
                ])
            </div>

        </div>


        @include('shared.input',[


        "type" => "textarea",
        "label" => "Description",
        "name" => "description",
        "value" => $property->description
        ])



        <div class="row">
            @include('shared.input',[
            "class" => "col",
            "label" => "Pièces",
            "name" => "rooms",
            "value" => $property->rooms
            ])
            @include('shared.input',[
            "class" => "col",
            "label" => "Chambres",
            "name" => "bedrooms",
            "value" => $property->bedrooms
            ])
            @include('shared.input',[
            "class" => "col",
            "label" => "Nombre d'étages",
            "name" => "floor",
            "value" => $property->floor
            ])
        </div>
        <div class="row">
            @include('shared.input',[
            "class" => "col",
            "label" => "Adresse",
            "name" => "address",
            "value" => $property->address
            ])
            @include('shared.input',[
            "class" => "col",
            "label" => "Ville",
            "name" => "city",
            "value" => $property->city
            ])
            @include('shared.input',[
            "class" => "col",
            "label" => "Code Postal",
            "name" => "postal_code",
            "value" => $property->postal_code
            ])
        </div>
        @include('shared.select',[
        "label" => "Options",
        "name" => "options",
        "value" => $property->options()->pluck('id'),
        "multiple"=> true
        ])
     
        <div class="row">
            @include('shared.checkbox',[
            "label" => "Vendu",
            "name" => "sold",
            "value" => $property->sold,
            "options" => $options
            ])
            <div>
                <button class="btn btn-primary mt-3">
                    @if ($property->exists)
                    Modifier
                    @else
                    Créer

                    @endif
                </button>
            </div>

        </div>


    </form>

    @endsection