@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="col-md-12">
        <h2>Tutte le ricette</h2>
        <div class="text-right mb-3">
            <a href="{{ route('dishes.create') }}" class="btn btn-success">Aggiungi ricetta</a>
        </div>
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Nome
                            <a href="{{route('dishes.index',['sort' => $sort === 'name_asc' ? 'name_desc' : 'name_asc' ] ) }}">
                                <i class="fa-solid fa-arrow-{{$sort === 'name_asc' ? 'down' : 'up'}}"></i>
                            </a>
                        </th>
                        <th>Immagine</th>
                        <th>Località di origine
                            {{-- <a href="{{ route('dishes.index', ['sort' => $sort === 'region_asc' ? 'region_desc' : 'region_asc']) }}">
                                <i class="fa-solid fa-arrow-{{ $sort === 'region_asc' ? 'down' : 'up' }}"></i>
                            </a> --}}
                        </th>
                        <th>Ingredienti</th>
                        <th>Costo</th>
                        <th>Difficoltà</th>
                        <th>Tempo di preparazione - in minuti
                            <a href="{{route('dishes.index',['sort' => $sort === 'preparation_asc' ? 'preparation_desc' : 'preparation_asc' ] ) }}">
                                <i class="fa-solid fa-arrow-{{$sort === 'preparation_asc' ? 'down' : 'up'}}"></i>
                            </a>
                        </th>
                        <th>Tempo di cottura - in minuti</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($dishes as $dish)
                    <tr>
                        <td>{{ $dish->name }}</td>
                        <td>
                            @if (filter_var($dish->poster, FILTER_VALIDATE_URL))
                            <img src="{{ $dish->poster }}" alt="{{ $dish->name }}" class="img-thumbnail"
                                style="max-width: 150px;">
                            @elseif($dish->poster === null)
                            <img src="{{asset('storage/default.jpg')}}" class="img-thumbnail"
                            style="max-width: 150px;">
                            @else
                            <img src="{{ asset('storage/' . $dish->poster) }}" alt="{{ $dish->name }}"
                                class="img-thumbnail" style="max-width: 150px;">
                            @endif
                        </td>
                        
                        <td>{{ $dish->region->name }}</td>
                        <td>@foreach($dish->ingredients as $ingredient)
                            {{ $ingredient->name }}
                            @endforeach</td>
                        
                        <td>{{ $dish->price->name }}</td>
                        <td>{{ $dish->difficulty->name }}</td>
                        <td>{{ $dish->preparation_min }}</td>
                        <td>{{ $dish->cooking_min }}</td>
                        <td>
                            <a href="{{ route('dishes.edit', $dish->id) }}" class="btn btn-primary btn-sm">Modifica</a>
                            <form action="{{ route('dishes.destroy', $dish->id) }}" method="POST"
                                style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm"
                                    onclick="return confirm('Sei sicuro di voler eliminare questa ricetta?')">Elimina</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
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
</div>
@endsection