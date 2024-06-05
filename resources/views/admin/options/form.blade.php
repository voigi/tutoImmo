@extends('admin.admin')

@section('title',$option->exists ? "Editer une option " : "Créer une option")

@section('content')

<h1>@yield('title')</h1>

<div>

    <form class="vstack gap-2" action="{{route($option->exists ? "admin.option.update":"admin.option.store",$option)}}" method="POST">

        @csrf
        @method($option->exists ? "PUT" : "POST")

     

        @include('shared.input',[
        "label" => "Nom",
        "name" => "name",
        "value" => $option->name
        ])
       


        <div>
             <button class="btn btn-primary mt-3">
            @if ($option->exists)
            Modifier
            @else
            Créer

            @endif
        </button> 
        </div>
       
        

</div>


</form>

@endsection