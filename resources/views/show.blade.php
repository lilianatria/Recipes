@extends('layouts.app') 



@section('content')
    
    <h1> {{ $dish->name }} </h1>
    
    <div class="row">
       
            <div class="col-md-6">
            
                <h2>Località di origine: {{ $dish->region->name }} </h2>
                <h3>Difficoltà: {{ $dish->difficulty->name }} </h3>
                <p>Costo: {{ $dish->price->name }} </p>
                <p>Descrizione: {{ $dish->description }}</p>
                <p class="card-text"><strong>Ingredienti:</strong></p>
                    <ul class="list-unstyled">
                        @foreach ($dish->ingredients as $ingredient)
                        <li>{{ $ingredient->name }}</li>
                        @endforeach
                    </ul>
            <p> Tempo di preparazione (minuti): {{ $dish->preparation_min }}</p>
            <p>Tempo di cottura (minuti): {{ $dish->cooking_min }}</p>
            </div>
       
    </div>
   

    
@endsection