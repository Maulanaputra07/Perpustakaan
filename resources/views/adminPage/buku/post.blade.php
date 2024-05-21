<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Title Page-->
    <title>Admin Perpustakaan</title>
{{-- 
    <!-- Icons font CSS-->
    <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <!-- Font special for pages-->
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Vendor CSS-->
    <link href="{{asset('asset/vendor/select2/select2.min.css')}}" rel="stylesheet" media="all">
    <link href="{{asset('asset/vendor/datepicker/daterangepicker.css')}}" rel="stylesheet" media="all"> --}}

    <!-- Main CSS-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{asset('assets/css/main.css')}}" rel="stylesheet" media="all">
</head>

<body>
    <div class="page-wrapper bg-gra-02 p-t-130 p-b-100 font-poppins" style="background-color: #DFD0B8; ">
        <div class="wrapper wrapper--w680">
            <div class="card card-4">
                <div class="card-body">
                    <h2 class="title">Insert buku</h2>
                    <form method="POST" action="{{route('buku.store')}}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-floating mb-3">
                            <input type="text" name="judul_buku" class="form-control" id="floatingInput" placeholder="name@example.com" required value="{{old('judul_buku')}}">
                            @error('judul_buku')
                                    <small>{{$message}}</small>
                            @enderror
                            <label for="floatingInput">Judul buku</label>
                        </div>
                        <div class="form-floating mb-4">
                            <textarea class="form-control" name="deskripsi"  placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px" required value="{{old('deskripsi')}}"></textarea>
                            @error('deskripsi')
                                    <small>{{$message}}</small>
                            @enderror
                            <label for="floatingTextarea2">Deskripsi</label>
                        </div>
                        <div class="form-floating mb-3">
                            <select class="form-select" name="id_genre" id="floatingSelect" aria-label="Floating label select example" required value="{{old('genre')}}">
                            {{-- @error('cover')
                                <small>{{$message}}</small>
                            @enderror --}}
                                @foreach ($genres as $genre)
                                <option value="{{$genre->id_genre}}">{{$genre->nama_genre}}</option>
                            @endforeach
                            </select>
                            <label for="floatingSelect">Genre</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" name="penulis" class="form-control" id="floatingInput" placeholder="name@example.com" required value="{{old('penulis')}}">
                            @error('penulis')
                                    <small>{{$message}}</small>
                            @enderror
                            <label for="floatingInput">Penulis</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" name="penerbit" class="form-control" id="floatingInput" placeholder="name@example.com" required value="{{old('penerbit')}}">
                            @error('penerbit')
                                    <small>{{$message}}</small>
                            @enderror
                            <label for="floatingInput">Penerbit</label>
                        </div>
                        <div class="form-floating mb-4">
                            <input type="date" name="tahun_terbit" class="form-control" id="floatingInput" placeholder="Tahun terbit" required value="{{old('tahun_terbit')}}">
                            @error('tahun_terbit')
                                    <small>{{$message}}</small>
                            @enderror
                            <label for="floatingInput">Tahun terbit</label>
                        </div>
                        <div class="form-floating mb-4">
                            <input type="number" name="stock" class="form-control" id="floatingInput" placeholder="Tahun terbit" required value="{{old('stock')}}">
                            @error('stock')
                                    <small>{{$message}}</small>
                            @enderror
                            <label for="floatingInput">Stock</label>
                        </div>
                        <div class="row g-3 align-items-center mb-4">
                            <div class="col-auto">
                                <label for="file" class="col-form-label">Cover</label>
                            </div>
                            <div class="col-auto">
                                <input type="file" name="cover" id="file" class="form-control" aria-describedby="passwordHelpInline" required value="{{old('cover')}}">
                                @error('cover')
                                    <small>{{$message}}</small>
                                @enderror
                            </div>
                            <div class="col-auto">
                                <span id="passwordHelpInline" class="form-text">
                                Sertakan cover buku.
                                </span>
                            </div>
                        </div>
                        <div class="row g-3 align-items-center mb-4">
                            <div class="col-auto">
                                <label for="file" class="col-form-label">File</label>
                            </div>
                            <div class="col-auto">
                                <input type="file" name="file_data" id="file" class="form-control" aria-describedby="passwordHelpInline" required value="{{old('file_buku')}}">
                                @error('file_data')
                                    <small>{{$message}}</small>
                                @enderror
                            </div>
                            <div class="col-auto">
                                <span id="passwordHelpInline" class="form-text">
                                Sertakan file.
                                </span>
                            </div>
                        </div>
                        <div class="p-t-15">
                            <button class="btn btn--radius-2 btn--blue" type="submit">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Jquery JS-->
    {{-- <script src="{{asset('assets/vendor/jquery/jquery.min.js')}}"></script>
    <!-- Vendor JS-->
    <script src="{{asset('assets/vendor/select2/select2.min.js')}}"></script>
    <script src="{{asset('assets/vendor/datepicker/moment.min.js')}}"></script>
    <script src="{{asset('assets/vendor/datepicker/daterangepicker.js')}}"></script> --}}

    <!-- Main JS-->
    {{-- <script src="{{asset('assets/js/global.js')}}"></script> --}}

</body><!-- This templates was made by Colorlib (https://colorlib.com) -->

</html>
<!-- end document-->