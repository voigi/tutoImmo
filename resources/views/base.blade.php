<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href={{asset('css/dark.css')}}>

    <title>@yield('title')|Mon Agence</title>
</head>

<body>   

<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Agence</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    @php
        $route = request()->route()->getName();
    @endphp
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a  aria-current="page" href= " {{route('property.index')}}" @class([
            'nav-link','active' => str_contains($route,'.property.')
          ]) >Biens</a>
        </li>

      </ul>
    </div>
  </div>
</nav>
@include( 'shared.switch')
  

 
        @yield('content')

 
   

 <script src={{asset('js/dark.js')}}></script>
</body>

</html>