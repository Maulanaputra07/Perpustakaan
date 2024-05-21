<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Create genres</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body style="background: lightgray">
    <div class="container mt-5 mb-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card-body">
                    <form action="{{route('genre.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group mb-5">
                            <label class="font-weight-bold">Nama genre</label>
                            <input type="text" class="form-control @error('nama') is-invalid @enderror" name="nama_genre" value="{{old('nama_genre')}}" placeholder="masukan nama genre">
                        </div>

                        <button type="submit" class="btn btn-md btn-primary me-3">Input</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.ckeditor.com/4.13.1/standard/ckeditor.js"></script>
</body>
</html>