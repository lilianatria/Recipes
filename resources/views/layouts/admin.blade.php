<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="{{ asset('css/admin.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
      
        <nav class="navbar navbar-expand-md navbar-dark bg-secondary">
            <div class="container">
                <a class="navbar-brand" href="{{ route('admin.dashboard') }}">
                    Dashboard
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('dishes.index') }}">Ricette</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('ingredients.index') }}">Ingredienti</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('regions.index') }}">Località di origine</a>
                        </li>
                        
                    </ul>
                </div>

               
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/') }}">Home</a>
                    </li>
                </ul>
            </div>
        </nav>

       
        <main class="py-4">
            <div class="container">
                @yield('content')
            </div>
        </main>

       
        <footer class="footer bg-secondary">
            <div class="container">
                <span class=" text-white">© {{ date('Y') }} Dashboard. All rights reserved.</span>
            </div>
        </footer>
    </div>
   
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>