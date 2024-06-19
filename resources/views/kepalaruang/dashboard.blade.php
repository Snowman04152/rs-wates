@extends('kepalaruang.layouts.app')
@section('content')
    <div class="row d-grid g-0 ">
        <div class="col ">
            <div class="row p-3 justify-content-between">
                <div class="col-9 fs-3 p-2"><b>Pemeliharaan Alat Medis</b></div>
                <div class="col-3 fs-4 d-flex ">
                    <div><a class="btn bg-greencustom rounded-5 fs-5" href=""><i class="bi bi-whatsapp "></i></a></div>
                    <div class=" dropdown ms-1 mt-1 fs-5 " >
                        <button type="button" class="btn btn-outline-success dropdown-toggle" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            {{session('namaUser')}}
                        </button>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="{{ route('logout') }}">Logout</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-1"></div>
            </div>
        </div>
    

        <div>
      
        </div>
        <div class="col mt-5"><img src="{{ Vite::asset('resources/images/rswates.jpg') }}" class="img-fluid" alt="">
        </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const dropdownToggle = document.getElementById('dropdown-toggle');

            dropdownToggle.addEventListener('click', function(event) {
                event.preventDefault(); // Mencegah tindakan default tautan

                // Buka halaman yang diinginkan
                window.location.href = '#'; // Ganti dengan URL yang Anda inginkan
            });
        });
    </script>
@endsection
{{-- <script type="module">
    document.addEventListener("DOMContentLoaded", function(){
  document.querySelectorAll('.sidebar .nav-link').forEach(function(element){
    
    element.addEventListener('click', function (e) {

      let nextEl = element.nextElementSibling;
      let parentEl  = element.parentElement;	

        if(nextEl) {
            e.preventDefault();	
            let mycollapse = new bootstrap.Collapse(nextEl);
            
            if(nextEl.classList.contains('show')){
              mycollapse.hide();
            } else {
                mycollapse.show();
                // find other submenus with class=show
                var opened_submenu = parentEl.parentElement.querySelector('.submenu.show');
                // if it exists, then close all of them
                if(opened_submenu){
                  new bootstrap.Collapse(opened_submenu);
                }
            }
        }
    }); // addEventListener
  }) // forEach
}); 
</script> --}}


{{-- 
<div class="side-menu-container">
    <ul class="nav navbar-nav ">
        <li><a class="btn btn-outline-success rounded-0 pe-5" href="#"><i class="fa fa-dashboard"></i> Halaman Utama</a></li>
        <li><a class="btn btn-outline-success rounded-0" data-bs-toggle="collapse" data-bs-target="#menu_item1" href="#"> <i class="fa"></i>Data Alat Medis <i class="bi small bi-caret-down-fill"></i></a></li>
        <ul id="menu_item1" style="list-style-type: none" class="submenu collapse" data-bs-parent="#nav_accordion">
            <li><a class="btn btn-outline-success rounded-0" class="nav-link p-0" href="#">Jenis Alat Medis</a></li>
            <li><a class="btn btn-outline-success rounded-0" class="nav-link p-0" href="#">Merk Alat Medis </a></li>
            <li><a class="btn btn-outline-success rounded-0" class="nav-link p-0" href="#">Ruang Alat Medis </a> </li>
        </ul>
        <li><a class="btn btn-outline-success rounded-0" href="#"><i class="fa fa-dashboard"></i> Data Pemeriksaan </a></li>
    </ul>
    
</div> --}}
