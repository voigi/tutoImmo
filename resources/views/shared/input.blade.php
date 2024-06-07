@php
$label ??= null;
$type ??= 'text';
$class ??= null;
$name ??= '';
$value ??= '';
$label ??= ucfirst($name);

//{{old($name, $value)}}

@endphp

<div @class([ 'form-group form-label', $class ])>
    <label for={{$name}} class="col-form-label">{{$label}}</label>
    @if ($type === 'textarea' ) 
        <textarea class='form-control @error($name) is-invalid @enderror' name={{$name}} id={{$name}} rows="3">{{old($name, $value)}}</textarea>
     @else
     <input class='form-control @error($name) is-invalid @enderror' type={{$type}} name={{$name}} id={{$name}} value="{{old($name, $value)}}">

    @endif
     
    @error($name)
    <div class="invalid-feedback">
        {{$message}}
    </div>
    @enderror
</div>