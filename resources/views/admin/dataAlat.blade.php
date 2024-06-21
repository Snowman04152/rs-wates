@extends('admin.layouts.app')
@section('content')
    <div class="w-100">
        <div class="row p-3 justify-content-between">
            <div class="col-9 fs-3 p-2"><b>Data Alat Medis</b></div>
            <div class="col-3 fs-4 d-flex ">
                <div><button class="btn bg-greencustom  rounded-5 ms-1 fs-5"data-bs-toggle='modal' data-bs-target="modalNotif" ><i class="bi bi-bell "></i></button><span
                        class="translate-middle badge rounded-pill bg-success">
                        9
                    </span>
                </div>
                <div class="modal fade" id="modalNotif" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                          ...
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                          <button type="button" class="btn btn-primary">Save changes</button>
                        </div>
                      </div>
                    </div>
                  </div>
                <div class=" dropdown ms-1 mt-1 fs-5 ">
                    <button type="button" class="btn btn-outline-success dropdown-toggle" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        Admin
                    </button>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">Logout</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="row p-3 justify-content-between">
            <div class="col-3 fs-3 p-2">
                <div class="icon-input-container">
                    <i class="fas fa-search"></i>
                    <input class="form-control form-control-lg  rounded-5 border border-dark pops" type="text"
                        placeholder="Mencari Alat Medis" aria-label=".form-control-lg example">
                </div>
            </div>
            <div class="col-2 fs-3 p-2">
                <button type="button" data-bs-toggle='modal' data-bs-target='#modalTambah'
                    class="btn btn-outline-primary rounded-3">+ Tambah</button>
            </div>
        </div>
        <div class="container ">
            <table class="table table border-dark text-center ">
                <thead>
                    <tr>
                        <th class="col">Id Alat Medis</th>
                        <th class="col">Nama Alat Medis</th>
                        <th class="col-2">Gambar Alat Medis</th>
                        <th class="col">Jenis</th>
                        <th class="col">Merk</th>
                        <th class="col">Ruangan</th>
                        <th class="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data_alat as $data)
                        <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td>{{ $data->nama_alat }}</td>
                            <td><img src="{{ asset('storage/files/' . $data->gambar_alat_hash) }}" class="img-fluid w-50"
                                    alt=""></td>
                            <td>{{ $data->jenis_alat }}</td>
                            <td>{{ $data->merk }}</td>
                            <td>{{ $data->ruangan }}</td>
                            <td>
                                <div class="d-flex justify-content-center ">
                                    <button type="button" data-bs-toggle='modal' data-id_alat="{{ $data->id }}"
                                        data-nama_alat="{{ $data->nama_alat }}" data-gambar_alat="{{ $data->gambar_alat }}"
                                        data-ruangan_alat="{{ $data->ruangan }}" data-merk_alat="{{ $data->merk }}"
                                        data-jenis_alat="{{ $data->jenis_alat }}"
                                        data-gambar_hash="{{ $data->gambar_alat_hash }}" data-bs-target='#modalEdit'
                                        class="btn btn-outline-primary me-2 edit-alat-medis">Edit</button>
                                        <form id="nested-form" action="{{ route('data.delete', ['id' => $data->id]) }}"
                                            method="POST">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="btn btn-outline-danger me-2">Hapus</button>
    
                                        </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
   
  
  
  
    <div class="modal fade" id="modalEdit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Form Edit Data Alat Medis</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="POST" id="edit-alat-form" enctype="multipart/form-data" action="">
                        @csrf
                        @method('put')
                        <div>
                            <div>
                                <input type="hidden" id="edit_alat_id" value="{{ $data->id }}">
                                <label for="namaAlat" class="form-label">Nama Alat Medis :</label>
                                <input type="text" name="nama_alat_medis" value="{{ $data->nama_alat }}"
                                    class="form-control" id="edit_alat_medis" placeholder="Isi Nama Alat">
                            </div>
                            <div>
                                <label for="gambarAlat" class="form-label mt-1 ">Gambar Alat Medis :</label>
                                <div class="mb-3">
                                    <img id="imagesrc" src="{{ asset('storage/files/' . $data->gambar_alat_hash) }}"
                                        class="img-fluid border border-dark w-25" alt="">
                                </div>
                                <input type="file" class="form-control" name="gambar_alat_medis" id="edit_gambar_alat"
                                    value="{{ $data->gambar_alat }}" placeholder="Input Gambar Alat">
                            </div>
                            <div>
                                <label for="jenisAlat" class="form-label mt-1">Jenis :</label>
                                <select class="form-select" id="edit_jenis_alat" name="jenis_alat_medis" aria-label="Default select example">
                                    <option selected>Pilih Jenis :</option>
                                    @foreach ($jenis as $nama_jenis)
                                        <option value="{{ $nama_jenis->jenis_alat }}"
                                            {{ $data->jenis_alat == $nama_jenis->jenis_alat ? 'selected' : '' }}>
                                            {{ $nama_jenis->jenis_alat }}</option>
                                    @endforeach
                                </select>

                            </div>
                            <div>
                                <label for="merkAlat" class="form-label mt-1">Merk :</label>
                                <select class="form-select" name="merk_alat_medis" id="edit_merk_alat" aria-label="Default select example">
                                    <option selected>Pilih Merk</option>
                                    @foreach ($merk as $merks)
                                        <option value="{{ $merks->merk }}"
                                            {{ $data->merk == $merks->merk ? 'selected' : '' }}>
                                            {{ $merks->merk }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div>
                                <label for="ruanganAlat" class="form-label mt-1">Ruangan :</label>
                                <select class="form-select" id="edit_ruangan_alat" name="ruang_alat_medis" aria-label="Default select example">
                                    <option selected>Pilih Ruangan</option>
                                    @foreach ($ruang as $ruangs)
                                        <option value="{{ $ruangs->nama_ruang }}"
                                            {{ $data->ruangan == $ruangs->nama_ruang ? 'selected' : '' }}>
                                            {{ $ruangs->nama_ruang }}</option>
                                    @endforeach
                                </select>
                            </div>

                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="modalTambah" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Form Tambah Data Alat Medis</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="{{ route('data.add') }}" enctype="multipart/form-data">
                        @csrf
                        <div>
                            <div>
                                <label for="namaAlat" class="form-label">Nama Alat Medis :</label>
                                <input type="text" class="form-control" id="namaAlat" name="nama_alat"
                                    placeholder="Isi Nama Alat">
                            </div>
                            <div>
                                <label for="gambarAlat" class="form-label mt-1 ">Gambar Alat Medis :</label>
                                <input type="file" class="form-control" id="gambarAlat" name="gambar_alat"
                                    placeholder="Input Gambar Alat">

                            </div>
                            <div>
                                <label for="jenisAlat" class="form-label mt-1">Jenis :</label>
                                <select class="form-select" id="ruanganAlat" name="jenis_alat"
                                    aria-label="Default select example">
                                    <option selected>Pilih Jenis </option>
                                    @foreach ($jenis as $nama_jenis)
                                        <option value="{{ $nama_jenis->jenis_alat }}">{{ $nama_jenis->jenis_alat }}

                                        </option>
                                    @endforeach
                                </select>

                            </div>
                            <div>
                                <label for="merkAlat" class="form-label mt-1">Merk :</label>
                                <select class="form-select" id="ruanganAlat" name="merk_alat"
                                    aria-label="Default select example">
                                    <option selected>Pilih Merk</option>
                                    @foreach ($merk as $merks)
                                        <option value="{{ $merks->merk }}">{{ $merks->merk }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div>
                                <label for="ruanganAlat" class="form-label mt-1">Ruangan :</label>
                                <select class="form-select" name="ruang_alat" id="ruanganAlat"
                                    aria-label="Default select example">
                                    <option selected>Pilih Ruangan</option>
                                    @foreach ($ruang as $ruangs)
                                        <option value="{{ $ruangs->nama_ruang }}">{{ $ruangs->nama_ruang }}</option>
                                    @endforeach
                                </select>
                            </div>

                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    {{-- <script type="module">
        const modaledit = new bootstrap.Modal('#modal-add-alamat', {
            keyboard: false
        })
        window.onload = modaledit.show();
    </script> --}}
    <script type="module">
        document.addEventListener('click', function(event) {
            if (event.target.matches('.edit-alat-medis')) {
                var alatId = event.target.dataset.id_alat;
                var namaAlat = event.target.dataset.nama_alat;
                var jenisAlat = event.target.dataset.jenis_alat;
                var gambarAlat = event.target.dataset.gambar_alat;
                var gambarAlathash = event.target.dataset.gambar_hash;
                var ruangAlat = event.target.dataset.ruangan_alat;
                var merkAlat = event.target.dataset.merk_alat;


                var editAlatForm = document.getElementById('edit-alat-form');
                var alatIdInput = document.getElementById('edit_alat_id');
                var namaAlatInput = document.getElementById('edit_alat_medis');
                var gambarAlatInput = document.getElementById('imagesrc');
                var jenisInput = document.getElementById('edit_jenis_alat');
                var merkInput = document.getElementById('edit_merk_alat');
                var ruanganInput = document.getElementById('edit_ruangan_alat');
                var newSrc = '{{ asset('storage/files') }}/' + gambarAlathash;

                alatIdInput.value = alatId;
                namaAlatInput.value = namaAlat;
                gambarAlatInput.src = newSrc;
                jenisInput.value = jenisAlat;
                merkInput.value = merkAlat;

                ruanganInput.value = ruangAlat;
                editAlatForm.action = '/dataalat/edit/' + alatId;

                // var modal = document.getElementById('edit-user-modal');
                // var bootstrapModal = new bootstrap.Modal(modal);
                // bootstrapModal.show();
            }
        });
        document.addEventListener('DOMContentLoaded', function() {
            const dropdownToggle = document.getElementById('dropdown-toggle');

            dropdownToggle.addEventListener('click', function(event) {
                event.preventDefault(); // Mencegah tindakan default tautan

                // Buka halaman yang diinginkan
                window.location.href = '#'; // Ganti dengan URL yang Anda inginkan
            });
        });
        // const modaledit = new bootstrap.Modal('#modalTambah', {
        //     keyboard: false
        // })
        // window.onload = modaledit.show();
    </script>
@endsection
