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
        <link href="{{ asset('assets/css/tes.css') }}" rel="stylesheet" />
    </head>
    <body>
        <div class="d-flex" id="wrapper">
            @include('part.sidebar')
            <div id="page-content-wrapper">
                @auth
                <div class="container-fluid">
                    <div style="display: flex; justify-content: space-between;">
                        <h1 class="mt-4 mb-5">Admin Page</h1>
                        <form action="/logout" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-danger mt-4 mr-5">Logout</button>
                        </form>
                    </div>
                    <h1>Selamat datang : {{auth()->user()->name}}</h1>
                </div>
                @endauth
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <script src="{{asset('assets/js/tes.js')}}"></script>
    </body>
</html>