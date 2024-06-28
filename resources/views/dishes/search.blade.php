@extends('layouts.app')

@section('content')
<div class="container">
   
    <h2>Risultati della ricerca</h2>
    <div class="row">
        @if($dishes->isEmpty())
        <div class="alert alert-dark" role="alert">
            Attenzione! La ricerca non ha prodotto risultati!
          </div>
        
        @else
       @foreach($dishes as $dish)
       <div class="col-md-3">
            <div class="card">
                <div class="dish-poster overflow-hidden">
                    @if (filter_var($dish->poster, FILTER_VALIDATE_URL))
                        <img src="{{ $dish->poster }}" alt="Foto della ricetta" class="img-fluid">
                    @else
                        <img src="{{ asset('storage/' . $dish->poster) }}" alt="Foto della ricetta" class="img-fluid">
                    @endif
                </div>
                <div class="card-body">
                    <h5 class="card-title">{{ $dish->name}}</h5>
                    <p class="card-text"><strong>Località di origine:</strong> {{ $dish->region->name }}</p>
                    <p class="card-text"><strong>Ingredienti:</strong></p>
                    <ul class="list-unstyled">
                        @foreach ($dish->ingredients as $ingredient)
                        <li>{{ $ingredient->name }}</li>
                        @endforeach
                    </ul>
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#{{$dish ->id}}">
                        Mostra dettagli
                      </button> 
                </div>
            </div>
       </div>
       @endforeach
       @endif
    </div>
</div>
@foreach ($dishes as $dish)
<div class="modal fade modal-xl text-center" id="{{$dish->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body card">
          <h2 class="modal-title fs-5" id="exampleModalLabel">{{ $dish->name }} </h2>
          <div class="card-body">
          <h5>Località di origine: {{ $dish->region->name }} </h5>
        <h5>Difficoltà: {{ $dish->difficulty->name }} </h5>
        <h5>Costo: {{ $dish->price->name }} </h5>
        <h6>Descrizione: {{ $dish->description }}</h6>
        </div>
        <p class="card-text"><strong>Ingredienti:</strong></p>
                <ul class="list-unstyled">
                    @foreach ($dish->ingredients as $ingredient)
                    <li>{{ $ingredient->name }}</li>
                    @endforeach
                </ul>
    <p> Tempo di preparazione (minuti): {{ $dish->preparation_min }}</p>
    <p>Tempo di cottura (minuti): {{ $dish->cooking_min }}</p>
          
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>        
        </div>
      </div>
    </div>
   
  </div>
  @endforeach
@endsection