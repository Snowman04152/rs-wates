<nav id="sidebar">
    <div class="sidebar-header">
        <div class="row ">
            <div class="col-4"><img src="{{ Vite::asset('resources/images/logorswates.png') }}" class="img-fluid"
                    alt=""></div>
            <div class="col-8 fs-5 ">Rumah Sakit Wates Husada Gresik</div>
        </div>
    </div>
    <ul class="list-unstyled components fs-5">
        <li>
            <a href="{{ route('dashboardpegawai') }}"> <i class="bi bi-house "></i> Halaman Utama </a>
        </li>
        <li>
            <a href="{{route('data_periksa_pegawai')}}"> <i class="bi bi-file-earmark-text"></i> Jadwal Pemeliharaan </a>
        </li>

    </ul>
</nav>

{{-- 
<script type="module">

    document.addEventListener('DOMContentLoaded', function() {
        const dropdownToggle = document.getElementById('dropdown-toggle');
        const submenu = document.getElementById('submenu');
        dropdownToggle.addEventListener('click', function(event) {
            event.preventDefault(); // Mencegah tindakan default tautan

            // Buka halaman yang diinginkan
            window.location.href = '{{ route('data_alat_user') }}'; // Ganti dengan URL yang Anda inginkan
        });
        // URL halaman saat ini
        const currentUrl = "{{ route(Route::currentRouteName()) }}";

        // URL target di mana toggle harus terbuka
        const urldata = '{{ route('data_alat_user') }}'; // Ganti dengan URL halaman yang diinginkan
        const urljenis = '{{route('jenis_alat_user')}}';
        const urlmerk = '{{route('merk_alat_user')}}';
        const urlruang = '{{route('ruang_alat_user')}}';
        // Memeriksa apakah URL saat ini adalah URL target
        if (currentUrl === urldata || currentUrl === urljenis || currentUrl === urlmerk || currentUrl === urlruang) {
            submenu.classList.add('show');
            dropdownToggle.setAttribute('aria-expanded', 'true');
        }

        // Menangani klik pada dropdown toggle
        dropdownToggle.addEventListener('click', function(event) {
            event.preventDefault();
            submenu.classList.toggle('show');
            const isExpanded = submenu.classList.contains('show');
            dropdownToggle.setAttribute('aria-expanded', isExpanded.toString());
        });
    });
</script> --}}
