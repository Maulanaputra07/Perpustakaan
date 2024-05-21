<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Perpustakaan Online</title>
    {{-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css"> --}}
    {{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script> --}}
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    {{-- <link href="{{ asset('assets/css/buku.css') }}" rel="stylesheet" /> --}}

    
    <style>
        .content {
        background-image: url("{{ asset('assets/image/buku.jpg') }}");
        background-size: cover;
        opacity: 0.95;
        }

        .btn-profile{
            width: 8%;
            margin: 5px;
        }

        .profile {
            width: 100%;
            border-radius: 50%;
        }

        .list-group a{
            margin: 10px;
        }

        .badge{
            background-color: red;
        }
    </style>
    {{-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css"> --}}
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light p-md-3">
        <div class="container">
        <button class="btn btn-profile position-relative" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasWithBothOptions" aria-controls="offcanvasWithBothOptions">
            <img src="{{ asset('assets/image/kucing.jpg') }}" alt="" class="profile">
            {{-- <span class="position-absolute start-75 translate-middle p-2 bg-danger border border-light rounded-circle">
                <span class="visually-hidden">New alerts</span>
            </span> --}}
        </button>
        {{-- <a class="btn-profile" href="#">
                <img src="{{ asset('assets/image/kucing.jpg') }}" alt="" class="profile">
        </a> --}}
        <a class="navbar-brand" href="#" >Perpustakaan Online</a>
        <button
            class="navbar-toggler"
            type="button"
            data-bs-toggle="collapse"
            data-bs-target="#navbarNav"
            aria-controls="navbarNav"
            aria-expanded="false"
            aria-label="Toggle navigation"
        >
            <span class="navbar-toggler-icon"></span>
        </button>

        

        <div class="collapse navbar-collapse" id="navbarNav">
            <div class="mx-auto"></div>
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link text-dark" href="#"></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-dark" href="#"></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-dark" href="#"></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-dark" href="#"></a>
                </li>
                <li class="nav-item">
                    {{-- <form action="/login" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-primary mt-4 mr-5">Login</button>
                    </form> --}}
                    <a href="/login" class="btn btn-primary">Login</a>
                </li>
                <li class="nav-item">
                    
                </li>
                
            </ul>
            </div>
        </div>
    </nav>

    <!-- Banner Image  -->
    <div
        class="banner-image w-100 vh-100 d-flex justify-content-center align-items-center"
    >
        <div class="content text-center p-5 mb-3">
            <h1 class="text-light" style="font-weight: 800">Perpustakaan Online</h1>
            <p class="text-light">Selamat datang di Perpustakaan Online Kami! Temukan dunia pengetahuan tanpa batas dengan koleksi buku digital kami yang kaya dan beragam. Mari jelajahi dan nikmati pengalaman membaca yang memikat di setiap halaman.</p>
        </div>
    </div>


    <div class="container-fluid">
        <div class="col-md-12 mt-5">
            <div style="display: flex; justify-content: space-between;">
                <h2>DAFTAR BUKU</h2>

                <h5>Lihat semua</h5>
                {{-- <a href="{{Route('buku.create')}}" class="btn btn-outline-success mb-3"><img width="24" height="24" src="https://img.icons8.com/color/48/add--v1.png" alt="add--v1" style="margin-right: 5px"/>ADD BUKU</a> --}}

            </div>
            <div class="content-buku">
                @foreach ($bukus as $item)
                <div class="card" style="filter:brightness(85%)">
                    <img src="{{ Storage::url($item->cover) }}" alt="" class="imgcard">

                    <div class="cardValue">
                        <p class="judul_buku" style="font-size: 15px; margin: 5px;">{{$item->penulis}}</p>
                        <p style="font-size: 17px;">{{$item->judul_buku}}</p>
                    </div>

                    <div class="action" style="display: flex">
                        <a href="{{route('buku.show', $item->id_buku)}}" class="btn btn-primary">Pinjam buku</a>
                        {{-- <a href="{{route('buku.edit', $item->id_buku)}}"class="btn btn-warning" style="margin: 5px">Edit</a> --}}
                        {{-- <form action="{{route('buku.destroy', $item->id_buku)}}" method="post">
                            @method('DELETE')
                            @csrf
                            <button type="submit" style="margin: 5px" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                        </form> --}}
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>


    {{-- <div class="list-book">
        <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
              <div class="carousel-item active">
                <div class="card">
                    <img src="{{ asset('assets/image/kucing.jpg') }}" class="d-block w-30" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Card title 2</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
                            card's content.</p>
                        <a href="#" class="btn btn-primary">Go somewhere</a>
                    </div>
                </div>
              </div>
              <div class="carousel-item">
                <div class="card">
                    <img src="{{ asset('assets/image/download.jpeg') }}" class="d-block w-100" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Card title 2</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
                            card's content.</p>
                        <a href="#" class="btn btn-primary">Go somewhere</a>
                    </div>
                </div>
              </div>
              <div class="carousel-item">
                <div class="card">
                    <img src="{{ asset('assets/image/buku.jpg') }}" class="d-block w-100" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Card title 2</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
                            card's content.</p>
                        <a href="#" class="btn btn-primary">Go somewhere</a>
                    </div>
                </div>
              </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Next</span>
            </button>
          </div>        
    </div> --}}


    {{-- offcanvas --}}
    {{--  --}}

    {{-- toast --}}
    
    

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/js/bootstrap.bundle.min.js"></script>
    <script src="{{asset('assets/js/crousel.js')}}"></script>

</body>
</html>