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
                        <input type="email" class="form-control rounded-5" id="exampleFormControlInput1"
                            placeholder="Email">
                    </div>
                    <div class="my-2">
                        <input type="text" class="form-control rounded-5" id="exampleFormControlInput1"
                            placeholder="Username">
                    </div>
                    <div class="my-2">
                        <input type="number" class="form-control rounded-5" id="exampleFormControlInput1"
                            placeholder="No Telepon Aktif">
                    </div>
                    <div class="my-2">
                        <input type="password" class="form-control rounded-5" id="exampleFormControlInput1"
                            placeholder="Password">
                    </div>
                    <div class="">
                        <input type="password" class="form-control rounded-5" id="exampleFormControlInput1"
                            placeholder="Konfirmasi Password">
                    </div>
                    <div class="d-grid ">
                        <button type="button" class="btn btn-primary my-4 rounded-5 ">Register</button>
                        <div class="d-flex justify-content-start">
                            <span class=" ms-2">Have an Account?</span>
                            <a href="{{route('login')}}" class="ms-2">Login</a>
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
