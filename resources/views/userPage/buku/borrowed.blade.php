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
        opacity: 0.85;
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
        <a class="navbar-brand" href="#">Perpustaan Online</a>
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
                </li>
                <li class="nav-item">
                    
                </li>
                
            </ul>
            </div>
        </div>
    </nav>

    <!-- Banner Image  -->
    {{-- <div
        class="banner-image w-100 vh-100 d-flex justify-content-center align-items-center"
    >
        <div class="content text-center p-5 mb-3">
            <h1 class="text-light">Perpustakaan Online</h1>
            <p class="text-light">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Officia ipsa sed dolorem officiis placeat fuga quasi nesciunt minima. Consequatur enim quidem vero? Doloribus officia adipisci blanditiis vel, quis repellat distinctio!</p>
        </div>
    </div> --}}


    <div class="container-fluid">
        <div class="col-md-12 mt-5">
            <div style="display: flex; justify-content: space-between;">
                <h2>DAFTAR BUKU YANG TELAH DIPINJAM</h2>
            </div>
            <div class="content-buku">
                @foreach ($bukus as $key => $item)
                <div class="card @if (session('batas')) bg-danger @endif">
                    {{-- <p>{{$item->id_peminjaman}}</p> --}}
                    <img src="{{ Storage::url($item->cover) }}" alt="" class="imgcard">

                    <div class="cardValue">
                        <p class="judul_buku" style="font-size: 15px; margin: 5px;">{{$item->penulis}}</p>
                        <p style="font-size: 17px;">{{$item->judul_buku}}</p>

                        @foreach ($tgl_kembali as $id_buku => $tgl)
                        @if ($tgl)
                            <p>tanggal kembali : {{$tgl->tgl_pengembalian}}</p>
                            @if (session('batas'))
                            <p>{{session('batas')}}</p>
                            @endif
                        @else
                            <p>tanggal kembali untuk buku {{$id_buku}} belum tersedia.</p>
                        @endif
                        @endforeach
                    </div>

                    @auth
                        <form action="{{ route('pengembalian.store', ['idUser' => auth()->user()->id, 'id_buku'=>$item->id_buku, 'id_peminjaman'=>$item->id_peminjaman ]) }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-primary"> Kembalikan </button>
                        </form>
                    @endauth
                </div>
                @endforeach
            </div>
        </div>
    </div>
    {{-- offcanvas --}}
    @auth
    <div class="offcanvas offcanvas-start" data-bs-scroll="true" tabindex="-1" id="offcanvasWithBothOptions" aria-labelledby="offcanvasWithBothOptionsLabel">
        <div class="offcanvas-header">
            {{-- <img src="" alt=""> --}}
            <h5 class="offcanvas-title" id="offcanvasWithBothOptionsLabel">{{auth()->user()->name}}</h5> 
            <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
            <div class="list-group">
                <a href="/user" class="list-group-item list-group-item-action" aria-current="true">
                  Dashboard
                </a>
                <a href="{{route('peminjaman.index')}}" class="list-group-item list-group-item-action">Buku yang telah dipinjam</a>
                {{-- <span class="badge rounded-pill">14</span> --}}
                <a href="{{ route('pengembalian.index') }}" class="list-group-item list-group-item-action">Buku yang dikembalikan</a>
              </div>
        </div>
    </div>
    @endauth

    {{-- toast --}}
    @if (session('pesan'))    
    <div class="toast show position-absolute top-0 end-0" style="z-index: 11;">
        <div class="toast-header">
            <strong class="me-auto">Berhasil meminjam</strong>
            <button type="button" class="btn-close" data-bs-dismiss="toast"></button>
        </div>
        <div class="toast-body">
            <p>{{session('pesan')}}</p>
        </div>
    </div>
    @endif
    

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/js/bootstrap.bundle.min.js"></script>
    <script src="{{asset('assets/js/crousel.js')}}"></script>

</body>
</html>