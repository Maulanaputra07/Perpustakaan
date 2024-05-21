<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <style>
        .img-container {
            display: flex;
            align-items: center;
            height: 100vh;
    }
        .img-container img {
            max-width: 200px;
            margin-right: 20px;
        }

        .detail-buku{
            padding: 5%;
        }
    </style>
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>
    <div class="container-book">
        <div class="w-100 vh-100 d-flex m-5 justify-content-left" >
            <img src="{{ Storage::url($item->cover) }}" class="img-fluid" style="width: 25%; height: 400px;" alt="Placeholder Image">
            <div class="containt-text m-4">
                <div class="headerText text-left">
                    <h4>{{$item->penulis}}</h4>
                    <h1 class="judul">{{$item->judul_buku}}</h1>
                </div>
                <div class="deskripsi mt-4">
                    <h3 style="font-weight: 600">Deskripsi buku</h3>
                    <h5 style="width: 800px; text-align: justify;">{{$item->deskripsi}}</h5>
                </div>

                <div class="detail d-flex flex-wrap" style="width: 250px">
                    <div class="detail-buku">
                        <h5>Genre</h5>
                        <p>{{$genre->nama_genre}}</p>
                    </div>
                    <div class="detail-buku">
                        <h5>Penerbit</h5>
                        <p>{{$item->penerbit}}</p>
                    </div>
                    <div class="detail-buku">
                        <h5>Tahun terbit</h5>
                        <p>{{$item->tahun_terbit}}</p>
                    </div>
                    <div class="detail-buku">
                        <h5>Stock</h5>
                        <p>{{$item->stock}}</p>
                    </div>
                </div>
                <div class="buttons d-flex">
                    <a href="{{route('viewPdf', $item->file_data)}}" class="btn btn-primary mt-3">PDF</a>
                    <button type="submit" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                        Pinjam
                    </button>
                    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                            <h1 class="modal-title fs-5" id="staticBackdropLabel">Peminjaman</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                            Anda akan meminjam buku {{$item->judul_buku}} selama 7 hari
                            </div>
                            <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            @auth
                            <form action="{{ route('peminjaman.store', ['idUser' => auth()->user()->id, 'id_buku' => $item->id_buku]) }}" method="post">
                                @csrf
                                <button type="submit" class="btn btn-primary">Pinjam</button>
                            </form>
                            @endauth
                            </div>
                        </div>
                        </div>
                    </div>
                    {{-- <a href="" class="btn btn-primary mt-3">Pinjam</a> --}}
                </div>
            </div>
        </div>
    </div>
</body>
</html>