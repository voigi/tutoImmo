@extends('admin.admin')

@section( 'title', 'Tous les biens' )

@section('content')
   <div class="d-flex justify-content-between align-items-center">
        <h1>@yield( 'title' )</h1>
        <a href= "{{route('admin.property.create')}}" class="btn btn-primary">Ajouter un bien</a>
   </div> 
    <table class="table table-striped">

        <thead>
            <tr>
                <th>Titre</th>
                <th>Surface</th>
                <th>Prix</th>
                <th>Ville</th>
                <th>Options</th>
                <th>Vendu ?</th>
                <th class="text-end">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ( $properties as $property )
                <tr>
                    <td>{{ $property->title }}</td>
                    <td>{{ $property->surface }}m²</td>
                    <td>{{number_format($property->price,thousands_separator:' ')}}</td>
                    <td>{{ $property->city }}</td>
                    <td> @foreach($property->options as $option) <span class="badge bg-secondary"> {{ $option->name }} </span> @if(!$loop->last)@endif @endforeach </td>
                     
                       
                        
                 
                    <td>
                        @if ($property->sold)
                            <span class="badge bg-success">Vendu</span>
                        @else
                            <span class="badge bg-danger">En cours de vente</span>
                        @endif
                    </td>
                    <td>

                        <div class="d-flex gap-2 justify-content-end">
                            <a href=" {{ route('admin.property.edit', $property) }}" class="btn btn-primary">Editer</a>


                            <form action="{{ route('admin.property.destroy', $property) }}" method= "post">
                                @csrf
                                @method('delete')
                                <button  class="btn btn-danger ">Supprimer</button>
                            </form>
                        </div>
                    </td>
                
            @endforeach
        </tbody>
    </table>
   
        {{ $properties->links() }}
   
@endsection
