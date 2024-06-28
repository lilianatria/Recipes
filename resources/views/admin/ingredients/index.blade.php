@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="col-md-12">
        <h2>Tutti gli ingredienti</h2>
        <div class="text-right mb-3">
            <a href="{{ route('ingredients.create') }}" class="btn btn-success">Aggiungi ingrediente</a>
        </div>
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Nome</th>
                        
                    </tr>
                </thead>
                <tbody>
                    @foreach($ingredients as $ingredient)
                    <tr>
                        <td>{{ $ingredient->name }}</td>
                        
                        
            
                        <td>
                            <a href="{{ route('ingredients.edit', $ingredient->id) }}" class="btn btn-primary btn-sm">Modifica</a>
                            <form action="{{ route('ingredients.destroy', $ingredient->id) }}" method="POST"
                                style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm"
                                    onclick="return confirm('Sei sicuro di voler eliminare questo ingrediente?')">Elimina</button>
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
                
                @if ($ingredients->onFirstPage())
                    <li class="page-item disabled">
                        <span class="page-link">&laquo;</span>
                    </li>
                @else
                    <li class="page-item">
                        <a class="page-link" href="{{ $ingredients->previousPageUrl() }}" aria-label="Previous">
                            <span aria-hidden="true">&laquo;</span>
                            <span class="sr-only">Previous</span>
                        </a>
                    </li>
                @endif
                
                
                @foreach ($ingredients->getUrlRange(1, $ingredients->lastPage()) as $page => $url)
                    <li class="page-item {{ $page == $ingredients->currentPage() ? 'active' : '' }}">
                        <a class="page-link" href="{{ $url }}">{{ $page }}</a>
                    </li>
                @endforeach
                
                
                @if ($ingredients->hasMorePages())
                    <li class="page-item">
                        <a class="page-link" href="{{ $ingredients->nextPageUrl() }}" aria-label="Next">
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