@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="p-5 bg-light rounded">
                <h2 class="mb-4">Inserisci una nuova ricetta</h2>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form method="POST" action="{{ route('dishes.store') }}" enctype="multipart/form-data">
                    @csrf

                    
                    <div class="form-group mb-3">
                        <label for="name" class="text-primary">Nome</label>
                        <input type="text" name="name" id="name" class="form-control" required>
                    </div>

                    
                    <div class="form-group mb-3">
                        <label for="ingredients" class="text-warning">Ingredienti</label>
                        <select name="ingredients[]" id="ingredients" class="form-control" multiple required>
                            @foreach($ingredients as $ingredient)
                                <option value="{{ $ingredient->id }}">{{ $ingredient->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    
                    <div class="form-group mb-3">
                        <label for="region" class="text-success">Località di origine</label>
                        <select name="region_id" id="region" class="form-control" required>
                            @foreach($regions as $region)
                                <option value="{{ $region->id }}">{{ $region->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group mb-3">
                        <label for="difficulty" class="text-success">Grado di difficoltà</label>
                        <select name="difficulty_id" id="difficulty" class="form-control" required>
                            @foreach($difficulties as $difficulty)
                                <option value="{{ $difficulty->id }}">{{ $difficulty->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group mb-3">
                        <label for="price" class="text-success">Costo</label>
                        <select name="price_id" id="price" class="form-control" required>
                            @foreach($prices as $price)
                                <option value="{{ $price->id }}">{{ $price->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    
                    <div class="form-group mb-3">
                        <label for="description" class="text-muted">Descrizione</label>
                        <textarea name="description" id="description" class="form-control" required></textarea>
                    </div>
                    <div class="form-group mb-3">
                        <label for="preparation_min" class="text-danger">Tempo di preparazione</label>
                        <input type="number" name="preparation_min" id="preparation_min" class="form-control" required>
                    </div>
                    <div class="form-group mb-3">
                        <label for="cooking_min" class="text-danger">Tempo di cottura</label>
                        <input type="number" name="cooking_min" id="cooking_min" class="form-control" required>
                    </div>
                    
                    <div class="form-group mb-4">
                        <label for="poster" class="text-primary">Immagine della ricetta</label>
                        <input type="file" name="poster" id="poster" class="form-control-file">
                    </div>

                    <button type="submit" class="btn btn-primary">Salva</button>
                </form>
            </div>
        </div>
    </div>
@endsection