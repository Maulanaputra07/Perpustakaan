<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Admin</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <link rel="stylesheet" href="{{ asset('assets/css/buku.css') }}">
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="{{ asset('assets/css/tes.css') }}" rel="stylesheet" />
    </head>
    <body>
        <div class="d-flex" id="wrapper">
            <!-- Sidebar-->
            @include('part.sidebar')
            <!-- Page content wrapper-->
            <div id="page-content-wrapper">
                
                <!-- Page content-->
                <div class="container-fluid">
                    <div class="col-md-12 mt-5">
                        <div style="display: flex; justify-content: space-between;">
                            <h2>DAFTAR BUKU</h2>
        
                            <a href="{{Route('buku.create')}}" class="btn btn-outline-success mb-3"><img width="24" height="24" src="https://img.icons8.com/color/48/add--v1.png" alt="add--v1" style="margin-right: 5px"/>ADD BUKU</a>

                        </div>
                        <div class="content-buku">
                            @foreach ($bukus as $item)
                            <div class="card">
                                <img src="{{ Storage::url($item->cover) }}" alt="" class="imgcard">

                                <div class="cardValue">
                                    <h3>{{$item->judul_buku}}</h3>
                                    <p></p>
                                </div>
                                <div class="action" style="display: flex">
                                    <a href="{{route('buku.edit', $item->id_buku)}}"class="btn btn-warning" style="margin: 5px;">Edit</a>
                                    <button type="submit" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                                        Delete
                                    </button>
                                    <!-- Modal -->
                                    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="staticBackdropLabel">Delete</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                            Apakah anda ingin menghapus buku ini?
                                            </div>
                                            <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                            <form action="{{route('buku.destroy', $item->id_buku)}}" method="post">
                                                @method('DELETE')
                                                @csrf
                                                {{-- <button type="submit" style="margin: 5px" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button> --}}
                                                <button type="submit" class="btn btn-danger">Understood</button>
                                            </form>
                                            </div>
                                        </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="{{asset('assets/js/tes.js')}}"></script>
    </body>
</html>