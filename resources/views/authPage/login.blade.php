<!doctype html>
<html lang="en">
  <head>
  	<title>Login 10</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	
	<link rel="stylesheet" href="{{ asset('assets/css/login.css') }}">

	</head>
	<body class="img js-fullheight" style="background-image: url('{{ asset('assets/image/buku.jpg') }}');">
	<section class="ftco-section">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-6 text-center mb-5">
					<h2 class="heading-section">Login</h2>
				</div>
			</div>
			<div class="row justify-content-center">
				<div class="col-md-6 col-lg-4">
					<div class="login-wrap p-0">
		      	<h3 class="mb-4 text-center">Have an account? </h3>
		      	<form action="/login" class="signin-form" method="POST">
                    @csrf
					@if (session()->has('success'))
					<div class="alert alert-success alert-dismissible fade show" role="alert">
					{{session('success')}}
					<button type="button" class="btn-close" data-bs-dismiss="alert" arial-label="close"></button>
					</div>
					@endif

					@if (session()->has('loginError'))
					<div class="alert alert-danger alert-dismissible fade show" role="alert">
					{{session('loginError')}}
					<button type="button" class="btn-close" data-bs-dismiss="alert" arial-label="close"></button>
					</div>
					@endif

		      		<div class="form-group">
		      			<input type="text" name="email" class="form-control" placeholder="Email" required>
		      		</div>
                    @error('email')
                        <small>{{ $message }}</small>
                    @enderror
	            <div class="form-group">
	              <input id="password-field" name="password" type="password" class="form-control" placeholder="Password" required>
	              {{-- <span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"></span> --}}
	            </div>
                @error('password')
                        <small>{{ $message }}</small> 
                @enderror
	            <div class="form-group">
	            	<button type="submit" class="form-control btn btn-primary submit px-3">Sign In</button>
	            </div>
	            <div class="form-group d-md-flex">
	            	<div class="w-50">
								</div>
								<div class="w-50 text-md-right">
									<a href="/register" style="color: #fff">Don't have account</a>
								</div>
	            </div>
	          </form>
	          {{-- <p class="w-100 text-center">&mdash; Or Sign In With &mdash;</p>
	          <div class="social d-flex text-center">
	          	<a href="#" class="px-2 py-2 mr-md-1 rounded"><span class="ion-logo-facebook mr-2"></span> Facebook</a>
	          	<a href="#" class="px-2 py-2 ml-md-1 rounded"><span class="ion-logo-twitter mr-2"></span> Twitter</a>
	          </div> --}}
		      </div>
				</div>
			</div>
		</div>
	</section>
{{-- 
	<script src="{{ asset('assets/js/jquery.min.js') }}"></script>
  <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
  <script src="{{ asset('assets/js/main.js') }}"></script>
  <script src="{{ asset('assets/js/main.js') }}"></script> --}}

	</body>
</html>

