@extends( 'base' )

@section( 'content' )
    <div class="p-5 mb-5 text-center">
        <div class="container">
            <h1>Agence lorem ipsum</h1>
            <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Quibusdam labore officiis blanditiis totam dolores est laudantium corrupti, magnam facilis consequuntur optio ut hic voluptas beatae, possimus, perferendis earum molestias repudiandae.</p>
        </div>
    </div>
    <div class="container">
        <h2>Nos derniers biens</h2>
        <div class="row">
            @foreach ($properties as $property)
            <div class="col">
                @include('admin.properties.card')
            </div>
                
            @endforeach
        </div>
    </div>       
@endsection