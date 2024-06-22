@extends('admin.layouts.app')
@section('content')
    <div class="w-100">
        <div class="row p-3 justify-content-between">
            <div class="col-9 fs-3 p-2"><b>Ruang Alat Medis</b></div>
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
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Notif</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div>
                                    <table class="table border-dark text-center fs-6">
                                        <thead>
                                            <tr>
                                                <th class="col-1">No</th>
                                                <th class="col-5">Alat Medis</th>
                                                <th class="col-5">Tanggal </th>
                                                <th class="col-5">Kondisi</th>
                                                <th class="col-5">Status</th>
                                                <th class="col-5">Pegawai</th>
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
                {{-- <div class="icon-input-container">
                    <i class="fas fa-search"></i>
                    <input class="form-control form-control-lg  rounded-5 border border-dark pops" type="text"
                        placeholder="Mencari Alat Medis" aria-label=".form-control-lg example">
                </div> --}}
            </div>
            <div class="col-2 fs-3 p-2">
                <button type="button" data-bs-toggle='modal' data-bs-target='#modalTambah'
                    class="btn btn-outline-primary rounded-3 fs-5  ">+ Tambah</button>
            </div>
        </div>
        <div class="container ">
            <table class="table table border-dark text-center ">
                <thead>
                    <tr>
                        <th class="col-1">Id Alat Medis</th>
                        <th class="col-2">Nama Ruang Alat Medis</th>
                        <th class="col-3">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($ruang as $ruangs)
                        <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td>{{ $ruangs->nama_ruang }}</td>
                            <td>
                                <div class="d-flex justify-content-center ">
                                    <button type="button" data-bs-toggle='modal' data-ruang_id='{{ $ruangs->id }}'
                                        data-nama_ruang='{{ $ruangs->nama_ruang }}' data-bs-target='#modalEdit'
                                        class="btn btn-outline-primary me-2 edit-ruang">Edit</button>
                                    <form action="{{ route('ruang.delete', ['id' => $ruangs->id]) }}"
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
    <div class="modal fade" id="modalTambah" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Form Edit Ruang Alat Medis</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="{{ route('ruang.add') }}">
                        @csrf
                        <div>
                            <div>
                                <label for="namaAlat" class="form-label">Nama Ruang Alat Medis :</label>
                                <input type="text" value="{{ old('namaRuang') }}"name='namaRuang'
                                    class="form-control @error('namaRuang') is-invalid @enderror" id="namaRuang"
                                    placeholder="Isi Nama Ruang">
                                @error('namaRuang')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
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
    <div class="modal fade" id="modalEdit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Form Edit Ruang Alat Medis</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="POST" id="edit-ruang" action="">
                        @csrf
                        @method('put')
                        <div>
                            <input type="hidden" value="{{ $ruangs->id }}" name="id" id="edit_ruang_id">
                            <div>
                                <label for="namaRuang" class="form-label">Nama Ruang Alat Medis :</label>
                                <input type="text" class="form-control" value="{{ old('nama_ruang') }}"
                                    name="nama_ruang" id="nama_ruang" placeholder="Isi Nama Ruang">
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
        document.addEventListener('DOMContentLoaded', function() {

            const dropdownToggle = document.getElementById('dropdown-toggle');

            dropdownToggle.addEventListener('click', function(event) {
                event.preventDefault(); // Mencegah tindakan default tautan

                // Buka halaman yang diinginkan
                window.location.href = '#'; // Ganti dengan URL yang Anda inginkan
            });
        });
        document.addEventListener('click', function(event) {
            if (event.target.matches('.edit-ruang')) {
                var ruangId = event.target.dataset.ruang_id;
                var namaRuang = event.target.dataset.nama_ruang;

                var editRuangForm = document.getElementById('edit-ruang');
                var ruangIdInput = document.getElementById('edit_ruang_id');
                var namaruangInput = document.getElementById('nama_ruang')
                ruangIdInput.value = ruangId;
                namaruangInput.value = namaRuang;
                editRuangForm.action = '/ruangalat/edit/' + ruangId;
            }
        });

        @if (session('showModalTambah'))
            const modaledit = new bootstrap.Modal('#modalTambah', {
                keyboard: false
            })
            window.onload = modaledit.show();
        @elseif (session('showModalEdit'))
            const modaledit = new bootstrap.Modal('#modalEdit', {
                keyboard: false
            })
            window.onload = modaledit.show();
        @endif
        // const modaledit = new bootstrap.Modal('#modalTambah', {
        //     keyboard: false
        // })
        // window.onload = modaledit.show();
    </script>
@endsection
