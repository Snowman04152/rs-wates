<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/sass/app.scss')
    @vite('resources/js/app.js')
    @vite('resources/css/app.css')
    <title>Register</title>
</head>

<body>
    <div class="container-fluid p-0">
        <div class="row g-0">
            <div class="col-1 col-md-0 col-6 ">
                <img src="{{ Vite::asset('resources/images/rswates.jpg') }}" class="img-fluid" style=" height: 100vh;"
                    alt="">
            </div>
            <div class="col-1 col-md-0 col-6 bg-greencustom ">
                <div class="text-center p-3 mt-2">
                    <div class=" h1 text-dark fw-bold"> Welcome </div>
                    <div class="text-dark h2 fw-bold">Rumah Sakit Wates Husada Gresik</div>
                </div>
                <div class="mx-5 p-5 text-dark">
                    <div class="my-2">
                        <form method="POST" action="{{ route('register') }}">
                            @csrf
                        <input type="email" class="form-control rounded-5 @error('email') is-invalid @enderror"
                            name="email" id="exampleFormControlInput1" placeholder="Email">
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="my-2">
                        <input type="text" class="form-control rounded-5 @error('username') is-invalid @enderror"
                            name="username" id="exampleFormControlInput1" placeholder="Username">
                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="my-2">
                        <input type="number" class="form-control rounded-5 @error('telp') is-invalid @enderror"
                            name="telp" id="exampleFormControlInput1" placeholder="No Telepon Aktif">
                        @error('telp')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="my-2">
                        <input type="password" class="form-control rounded-5 @error('password') is-invalid @enderror"
                            name="password" id="exampleFormControlInput1" placeholder="Password">
                    </div>
                    @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                    <div class="">
                        <input type="password" name="password_confirm" class="form-control rounded-5"
                            id="exampleFormControlInput1" required autocomplete="new-password"
                            placeholder="Konfirmasi Password">
                    </div>
                    <div class="d-grid ">
                        <button type="submit" class="btn btn-primary my-4 rounded-5 ">Register</button>
                        <div class="d-flex justify-content-start">
                        </form>
                            <span class=" ms-2">Have an Account?</span>
                            <a href="{{ route('login') }}" class="ms-2">Login</a>
                        </div>
                    </div>
                    <div>

                    </div>
                </div>
            </div>
        </div>
    </div>



</body>

</html>
