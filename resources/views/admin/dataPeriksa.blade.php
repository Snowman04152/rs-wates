@extends('admin.layouts.app')
@section('content')
    <div class="w-100">
        <div class="row p-3 justify-content-between">
            <div class="col-9 fs-3 p-2"><b>Data Pemeliharaan</b></div>
            <div class="col-3 fs-4 d-flex ">
                <div><button class="btn bg-greencustom  rounded-5 ms-1 fs-5"data-bs-toggle='modal'
                        data-bs-target="#modalNotif"><i class="bi bi-bell "></i></button><span
                        class="translate-middle badge rounded-pill bg-success">
                        {{ $data_kirim->count() }}
                    </span>
                </div>
                <div class="modal fade" id="modalNotif" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="container">
                                    <table class="table table-xs border-dark text-center ">
                                        <thead>
                                            <tr>
                                                <th class="col">Id Alat Medis</th>
                                                <th class="col">Nama Alat Medis</th>
                                                <th class="col">Tanggal Pemeriksaan</th>
                                                <th class="col">Kondisi</th>
                                                <th class="col">Status</th>
                                                <th class="col">Pegawai</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                @foreach ($pemeliharaan as $datas)
                                                    <th scope="row">{{ $loop->iteration }}</th>
                                                    <td>{{ $datas->DataAlat->nama_alat }}</td>
                                                    <td>{{ $datas->tanggal }}</td>
                                                    <td>{{ $datas->kondisi }}</td>
                                                    @if ($datas->status == 1)
                                                        <td>Dikirim</td>
                                                    @elseif($datas->status == 2)
                                                        <td>Dikerjakan</td>
                                                    @else
                                                        <td>Selesai</td>
                                                    @endif
                                                    <td>{{ $datas->User->username }}</td>
    
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
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
                        <li><a class="dropdown-item" href="{{ route('logout') }}">Logout</a></li>
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
                    class="btn btn-outline-primary  rounded-3 fs-5 ">+ Tambah</button>
            </div>
        </div>
        <div class="container ">
            <table class="table  border-dark text-center ">
                <thead>
                    <tr>
                        <th class="col">Id Alat Medis</th>
                        <th class="col">Nama Alat Medis</th>
                        <th class="col-1">Gambar</th>
                        <th class="col">Jenis</th>
                        <th class="col">Nama Ruang</th>
                        <th class="col">Tanggal Pemeriksaan</th>
                        <th class="col">Kondisi</th>
                        <th class="col">Pesan</th>
                        <th class="col">Status</th>
                        <th class="col">Pegawai</th>
                        <th class="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        @foreach ($pemeliharaan as $datas)
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td>{{ $datas->DataAlat->nama_alat }}</td>
                            <td><img src="{{ asset('storage/files/' . $datas->DataAlat->gambar_alat_hash) }}"
                                    class="img-fluid border border-dark w-50" alt=""></td>
                            <td>{{ $datas->DataAlat->jenis_alat }}</td>
                            <td>{{ $datas->DataAlat->ruangan }}</td>
                            <td>{{ $datas->tanggal }}</td>
                            <td>{{ $datas->kondisi }}</td>
                            <td>{{ $datas->pesan }}</td>
                            @if ($datas->status == 1)
                                <td>Dikirim</td>
                            @elseif($datas->status == 2)
                                <td>Dikerjakan</td>
                            @else
                                <td>Selesai</td>
                            @endif
                            <td>{{ $datas->User->username }}</td>
                            <td>
                                <div class="d-flex justify-content-center ">
                                    <button type="button" data-bs-toggle='modal' data-bs-target='#modalEdit'
                                        class="btn btn-sm btn-outline-primary me-2 edit-periksa"
                                        data-tanggal="{{ $datas->tanggal }}" data-pesan="{{ $datas->pesan }}"
                                        data-status="{{ $datas->status }}" data-kondisi="{{ $datas->kondisi }}"
                                        data-pegawai_id="{{ $datas->pegawai_id }}"
                                        data-data_alat_id="{{ $datas->data_alat_id }}"
                                        data-id_periksa="{{ $datas->id }}">Edit</button>
                                    <form id="nested-form"
                                        action="{{ route('pemeliharaan.delete', ['id' => $datas->id]) }}" method="POST">
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
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Form Edit Data Pemeriksaan</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="edit-periksa-form" method="POST" action="">
                        @csrf
                        @method('put')
                        <div>
                            <div>
                                <input type="hidden" id="edit_periksa_id" value="{{ $datas->id }}" name=""
                                    id="">
                                <label for="namaAlat" class="form-label">Pilih Alat Medis :</label>
                                <select class="form-select @error('nama_alat') is-invalid @enderror"
                                    value="{{ old('nama_alat') }}" name="edit_nama_alat" id="edit_nama_alat"
                                    aria-label="Default select example">
                                    <option disabled selected>Pilih Alat Medis</option>
                                    @foreach ($data as $data_alat)
                                        <option
                                            value="{{ $data_alat->id }}"{{ $data_alat->id == $datas->data_alat_id ? 'selected' : '' }}>
                                            Nama : {{ $data_alat->nama_alat }} , Jenis :
                                            {{ $data_alat->jenis_alat }} , Merk : {{ $data_alat->merk }} , Ruangan :
                                            {{ $data_alat->ruangan }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div>
                                <label for="tanggal" class="form-label mt-1">Tanggal Pemeliharaan :</label>
                                <input type="date" class="form-control" value="{{ $datas->tanggal }}"
                                    name="edit_tanggal" id="edit_tanggal" placeholder="Tanggal Pemeliharaan">

                            </div>

                            <div>
                                <label for="kondisi" class="form-label mt-1">Kondisi :</label>
                                <input type="text" class="form-control" value="{{ $datas->kondisi }}"
                                    name="edit_kondisi" id="edit_kondisi" placeholder="Kondisi">
                            </div>
                            <div>
                                <label for="pesan" class="form-label mt-1">Pesan :</label>
                                <input type="text" class="form-control" value="{{ $datas->pesan }}"
                                    name="edit_pesan" id="edit_pesan" placeholder="Isi Pesan">
                            </div>
                            <div>
                                <label for="pegawai" class="form-label mt-1 ">Pegawai yang Mengurus :</label>
                                <select class="form-select @error('pegawai') is-invalid @enderror"
                                    value="{{ old('pegawai') }}" name="edit_pegawai" id="edit_pegawai_id"
                                    aria-label="Default select example">
                                    <option disabled selected>Pilih Pegawai</option>
                                    @foreach ($user as $users)
                                        @if ($users->level == 3)
                                            <option
                                                value="{{ $users->id }}"{{ $users->id == $datas->pegawai_id ? 'selected' : '' }}>
                                                {{ $users->username }}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                            <div>
                                <label for="ruanganAlat" class="form-label mt-1">Status :</label>
                                <select class="form-select" id="edit_status" name="edit_status"
                                    aria-label="Default select example">
                                    <option disabled>Pilih Status</option>
                                    <option value="1" {{ $datas->status == '1' ? 'selected' : '' }}>Dikirim</option>
                                    <option value="2" {{ $datas->status == '2' ? 'selected' : '' }}>Dikerjakan
                                    </option>
                                    <option value="3" {{ $datas->status == '3' ? 'selected' : '' }}>Selesai</option>
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
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Form Tambah Data Pemeliharaan Alat Medis</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="{{ route('pemeliharaan.add') }}">
                        @csrf
                        <div>
                            <div>
                                <label for="namaAlat" class="form-label">Pilih Alat Medis :</label>
                                <select class="form-select @error('nama_alat') is-invalid @enderror"
                                    value="{{ old('nama_alat') }}" name="nama_alat" id="nama_alat"
                                    aria-label="Default select example">
                                    <option disabled selected>Pilih Alat Medis</option>
                                    @foreach ($data as $data_alat)
                                        <option value="{{ $data_alat->id }}">Nama : {{ $data_alat->nama_alat }} , Jenis :
                                            {{ $data_alat->jenis_alat }} , Merk : {{ $data_alat->merk }} , Ruangan :
                                            {{ $data_alat->ruangan }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div>
                                <label for="tanggal" class="form-label mt-1">Tanggal Pemeliharaan :</label>
                                <input type="date" class="form-control" name="tanggal" id="tanggal"
                                    placeholder="Tanggal Pemeliharaan">

                            </div>

                            <div>
                                <label for="kondisi" class="form-label mt-1">Kondisi :</label>
                                <input type="text" class="form-control" name="kondisi" id="kondisi"
                                    placeholder="Kondisi">
                            </div>
                            <div>
                                <label for="pesan" class="form-label mt-1">Pesan :</label>
                                <input type="text" class="form-control" name="pesan" id="pesan"
                                    placeholder="Isi Pesan">
                            </div>
                            <div>
                                <label for="pegawai" class="form-label mt-1 ">Pegawai yang Mengurus :</label>
                                <select class="form-select @error('pegawai') is-invalid @enderror"
                                    value="{{ old('pegawai') }}" name="pegawai" id="pegawai"
                                    aria-label="Default select example">
                                    <option disabled selected>Pilih Pegawai</option>
                                    @foreach ($user as $users)
                                        @if ($users->level == 3)
                                            <option value="{{ $users->id }}">{{ $users->username }}</option>
                                        @endif
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
     
    </script> --}}
    <script type="module">
        document.addEventListener('click', function(event) {
            if (event.target.matches('.edit-periksa')) {
                var periksaId = event.target.dataset.id_periksa;
                var tanggalPeriksa = event.target.dataset.tanggal;
                var pesanPeriksa = event.target.dataset.pesan;
                var statusPeriksa = event.target.dataset.status;
                var kondisiPeriksa = event.target.dataset.kondisi;
                var pegawaiPeriksa = event.target.dataset.pegawai_id;
                var alatPeriksa = event.target.dataset.data_alat_id;


                var editPeriksaForm = document.getElementById('edit-periksa-form');
                var alatPeriksaInput = document.getElementById('edit_nama_alat');
                var pegawaiPeriksaInput = document.getElementById('edit_pegawai_id');
                var kondisiPeriksaInput = document.getElementById('edit_kondisi');
                var statusPeriksaInput = document.getElementById('edit_status');
                var pesanPeriksaInput = document.getElementById('edit_pesan');
                var tanggalPeriksaInput = document.getElementById('edit_tanggal');
                var periksaIdInput = document.getElementById('edit_periksa_id');


                alatPeriksaInput.value = alatPeriksa;
                pegawaiPeriksaInput.value = pegawaiPeriksa;

                kondisiPeriksaInput.value = kondisiPeriksa;
                statusPeriksaInput.value = statusPeriksa;
                pesanPeriksaInput.value = pesanPeriksa;
                tanggalPeriksaInput.value = tanggalPeriksa;
                periksaIdInput.value = periksaId;
                editPeriksaForm.action = '/dataperiksa/edit/' + periksaId;

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
