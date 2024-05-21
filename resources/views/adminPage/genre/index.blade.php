<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Simple Sidebar - Start Bootstrap Template</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
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
                            <h2>DAFTAR GENRE</h2>
        
                            <a href="{{Route('genre.create')}}" class="btn btn-md btn-success mb-3">ADD GENRE</a>
                        </div>
                        <div class="card border-0 shadow-sm rounded">
                            <div class="card-body">
                                {{-- <a href="{{route('genres.create')}}" class="btn btn-md btn-success mb-3">ADD GENRE</a> --}}
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th scope="col" class="text-center">no</th>
                                            <th scope="col" class="text-center">nama</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($genres as $genre)
                                            <tr>
                                                <td class="text-center">
                                                    {{$genre->id_genre}}
                                                </td>
                                                <td class="text-center">{{$genre->nama_genre}}</td>
                                            </tr>
                                        @empty
                                            <div class="alert alert-danger">
                                                Data genre belum tersedia
                                            </div>
                                        @endforelse
                                    </tbody>
                                </table>
                                {{-- {{$genres->links()}} --}}
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