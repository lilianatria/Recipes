@extends('layouts.app')



@section('content')
<div class="container">
  
    <div class="row pt-4">
        @foreach ($dishes as $dish)
        <div class="col-md-3 mb-4 " >
            <div class="card h-100">
                <div class="dish-poster overflow-hidden">
                    @if (filter_var($dish->poster, FILTER_VALIDATE_URL))
                        <img src="{{ $dish->poster }}" alt="Foto della ricetta" class="img-fluid">
                    @else
                        <img src="{{ asset('storage/' . $dish->poster) }}" alt="Foto della ricetta" class="img-fluid">
                    @endif
                </div>
                <div class="card-body">
                    <h5 class="card-title">{{ $dish->name }}</h5>
                    <p class="card-text"><strong>Località di origine:</strong> {{ $dish->region->name }}</p>
                    <p class="card-text"><strong>Difficoltà:</strong> {{ $dish->difficulty->name }}</p>
                    
                    </ul>
                    {{-- <a href="{{ route('show', $dish->id)}}" class="card-link">Mostra dettagli</a> --}}
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#{{$dish ->id}}">
                        Mostra dettagli
                      </button> 
                </div>
            </div>
        </div>
        @endforeach
    </div>
    
    <div class="pagination-container">
        <nav aria-label="Page navigation">
            <ul class="pagination justify-content-center">
                
                @if ($dishes->onFirstPage())
                    <li class="page-item disabled">
                        <span class="page-link">&laquo;</span>
                    </li>
                @else
                    <li class="page-item">
                        <a class="page-link" href="{{ $dishes->previousPageUrl() }}" aria-label="Previous">
                            <span aria-hidden="true">&laquo;</span>
                            <span class="sr-only">Previous</span>
                        </a>
                    </li>
                @endif
                
                
                @foreach ($dishes->getUrlRange(1, $dishes->lastPage()) as $page => $url)
                    <li class="page-item {{ $page == $dishes->currentPage() ? 'active' : '' }}">
                        <a class="page-link" href="{{ $url }}">{{ $page }}</a>
                    </li>
                @endforeach
                
                
                @if ($dishes->hasMorePages())
                    <li class="page-item">
                        <a class="page-link" href="{{ $dishes->nextPageUrl() }}" aria-label="Next">
                            <span aria-hidden="true">&raquo;</span>
                            <span class="sr-only">Next</span>
                        </a>
                    </li>
                @else
                    <li class="page-item disabled">
                        <span class="page-link">&raquo;</span>
                    </li>
                @endif
            </ul>
        </nav>
    </div>
    
    
    <div class="text-center">
        <p>
            {{ __('pagination.showing_results', [
                'first' => $dishes->firstItem(),
                'last' => $dishes->lastItem(),
                'total' => $dishes->total(),
            ]) }}
        </p>
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