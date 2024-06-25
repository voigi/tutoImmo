<div class="card">
    <div class="card-body">
        <h5 class="card-title">
            @if(!$property->sold)
            <div class="mb-2">
                <a href=" {{ route('property.show', ['slug'=>$property->getSlug(),'property'=> $property]) }}">{{$property->title}}</a>
                <span class="badge bg-success float-end">Disponible</span>
            </div>
            @else
            <div class="mb-2">
                {{$property->title}}
                <span class="badge bg-danger float-end">Vendu</span>
            </div>
            @endif
            <p class="card-text">
                {{$property->surface}} m² - {{$property->city}} - {{$property->postal_code}}
            </p>
            <div class="text-primary" style="font-size: 1.4rem; font-weight: bold;">
                {{number_format($property->price,thousands_separator : " ")}} €

            </div>
        </h5>
    </div>
</div>