<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/sass/app.scss')
    @vite('resources/js/app.js')
    @vite('resources/css/app.css')
    <title>Login</title>
</head>

<body>
    <div class="container-fluid p-0">
        <div class="row g-0">
            <div class="col-1 col-md-0 col-6 ">
                <img src="{{ Vite::asset('resources/images/rswates.jpg') }}" class="img-fluid" style=" height: 100vh;"
                    alt="">
            </div>
            <div class="col-1 col-md-0 col-6 bg-greencustom ">
                <div class="text-center p-3 mt-5">
                    <div class=" h1 text-dark fw-bold"> Welcome </div>
                    <div class="text-dark h2 fw-bold">Rumah Sakit Wates Husada Gresik</div>
                </div>
                <div class="mx-5 p-5 text-dark">
                    <form method="post" action="{{route('login')}}">
                        @csrf
                        <div class="my-4">
                            <input type="text" class="form-control rounded-5 @error('username') is-invalid @enderror" name="username" value="{{old ('username')}}" required autocomplete="username" autofocus id="exampleFormControlInput1"
                                placeholder="Username">
                                @error('username')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="">
                            <input type="password" name="password" class="form-control rounded-5 @error('password') is-invalid @enderror" id="exampleFormControlInput1"
                                placeholder="Password">
                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="d-grid ">
                            <button type="submit" class="btn btn-primary my-4 rounded-5 ">Login</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>



</body>

</html>
