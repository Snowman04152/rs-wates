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
            <a href="{{ route('dashboarduser') }}"> <i class="bi bi-house "></i> Halaman Utama </a>
        </li>
        <li>
            <a href="#submenu" data-bs-toggle="navigate" aria-expanded="false" id="dropdown-toggle">
                <div class="row justify-content-between">
                    <div class="col"><i class="bi bi-file-earmark-text"></i> Data Alat Medis</div>
                    <div class="col-2"> <i class="bi bi-caret-down-fill "></i></div>

                </div>
            </a>
            <ul class="collapse list-unstyled" id="submenu">
                <li>
                    <a href="{{ route('jenis_alat') }}">Jenis Alat Medis</a>
                </li>
                <li>
                    <a href="{{ route('merk_alat') }}">Merk Alat Medis</a>
                </li>
                <li>
                    <a href="{{ route('ruang_alat') }}">Ruang Alat Medis</a>
                </li>
            </ul>
        </li>
        <li>
            <a href="{{route('data_periksa')}}"> <i class="bi bi-file-earmark-text"></i> Data Pemeriksaan </a>
        </li>

    </ul>
</nav>

<script type="module">

    document.addEventListener('DOMContentLoaded', function() {
        const dropdownToggle = document.getElementById('dropdown-toggle');
        const submenu = document.getElementById('submenu');
        dropdownToggle.addEventListener('click', function(event) {
            event.preventDefault(); // Mencegah tindakan default tautan

            // Buka halaman yang diinginkan
            window.location.href = '{{ route('data_alat') }}'; // Ganti dengan URL yang Anda inginkan
        });
        // URL halaman saat ini
        const currentUrl = "{{ route(Route::currentRouteName()) }}";

        // URL target di mana toggle harus terbuka
        const urldata = '{{ route('data_alat') }}'; // Ganti dengan URL halaman yang diinginkan
        const urljenis = '{{route('jenis_alat')}}';
        const urlmerk = '{{route('merk_alat')}}';
        const urlruang = '{{route('ruang_alat')}}';
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
</script>
