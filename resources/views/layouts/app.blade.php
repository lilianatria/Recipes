<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ricette per tutti</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>


    <nav class="navbar navbar-expand-lg navbar-dark bg-secondary">
        <div class="container">
            <a class="navbar-brand" href="#">Ricette per tutti</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse text-uppercase" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link {{Request::routeIs('home') ? 'active' : ''}}" href="{{ route('home') }}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{Request::routeIs('admin.dashboard') ? 'active' : ''}}" href="{{ route('admin.dashboard') }}">Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{Request::routeIs('email') ? 'active' : ''}}" href="{{ route('email') }}">Contatti</a>
                    </li>
                    <li>
                        <form id="searchForm" class="d-flex" action="{{ route('dishes.search') }}" method="GET">
                            <input id="searchInput" class="form-control me-2" type="search" placeholder="Cerca una ricetta" aria-label="Search" name="search" required>
                            <button class="btn btn-outline-dark" type="submit">Cerca</button>
                        </form>                     
                        
                    </li>
                    
                    
                </ul>
            </div>
        </div>
    </nav>
<section class="hero-section  ">
    <div class="container text-center ">
           
            <h1>Benvenuti a Ricette per tutti</h1>
            <p >Tante fantastiche ricette da consultare</p>
            
           
            <div id="carouselExample" class="carousel slide  ">
                
                <div class="carousel-inner">
                  <div class="carousel-item active">
                    <img src="https://media.istockphoto.com/id/1278273059/it/foto/mangiare-di-formaggio-fresco-fatto-a-mano-morbido-italiano-pugliese-palline-bianche-di-burrata.jpg?s=1024x1024&w=is&k=20&c=02xBORxIrQrrscSmGD7NqtAxJEVZPL1krONyHNybSHQ=" class="d-block w-100" alt="caprese">
                  </div>
                  <div class="carousel-item">
                    <img src="https://media.istockphoto.com/id/1311507085/it/foto/toast-allavocado-con-uova-e-pomodori-arrostiti.jpg?s=1024x1024&w=is&k=20&c=gFaGlKcSgE_z6K3ubL-yxp08r3x2zXw1uc_V7lx6IyQ=" alt="bruschetta">
                  </div>
                  <div class="carousel-item">
                    <img src="https://media.istockphoto.com/id/1278007471/it/foto/tortellini-cucina-italiana-fatti-in-casa.jpg?s=1024x1024&w=is&k=20&c=lBJNnJVEj_QJtoyXxWvvM75vLqmNG8_PI68fpxZ8nn8=" class="d-block w-100" alt="tortellini">
                  </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
                  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                  <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
                  <span class="carousel-control-next-icon" aria-hidden="true"></span>
                  <span class="visually-hidden">Next</span>
                </button>
              </div>
            </div>
        
    </div>
</section>

    <section class="content-section py-5">
        <div class="container">
            @yield('content')
        </div>
    </section>
    
    
    <footer class="footer-section bg-secondary text-white">
        <div class="container text-center">
            <p>&copy; 2024 Ricette per tutti. All Rights Reserved.</p>
        </div>
    </footer>

</body>
</html>