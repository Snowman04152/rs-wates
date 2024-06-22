@extends('admin.layouts.app')
@section('content')
    <div class="w-100">
        <div class="row p-3 justify-content-between">
            <div class="col-9 fs-3 p-2"><b>Merk Alat Medis</b></div>
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
                    class="btn btn-outline-primary  rounded-3 fs-5  fw-bold">+ Tambah</button>
            </div>
        </div>
        <div class="container ">
            <table class="table table border-dark text-center ">
                <thead>
                    <tr>
                        <th class="col-1">Id Alat Medis</th>
                        <th class="col-2">Nama Merk Alat Medis</th>
                        <th class="col-3">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($merk as $merks)
                        <tr>
                            <th scope="row">{{$loop->iteration}}</th>
                            <td>{{$merks->merk}}</td>
                            <td>
                                <div class="d-flex justify-content-center ">
                                    <button type="button" data-bs-toggle='modal' data-id_merk={{$merks->id}} data-merk={{$merks->merk}} data-bs-target='#modalEdit'
                                        class="btn btn-outline-primary me-2 edit-merk">Edit</button>
                                        <form action="{{ route('merk.delete', ['id' => $merks->id]) }}"
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
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Form Add Merk Alat Medis</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="{{ route('merk.add') }}">
                        @csrf
                        <div>
                            <div>
                                <label for="namaAlat" class="form-label">Nama Merk Alat Medis :</label>
                                <input type="text" value="{{ old('nama_merk') }}" name='nama_merk'
                                    class="form-control @error('nama_merk') is-invalid @enderror" id="nama_merk"
                                    placeholder="Isi Nama Merk">
                                @error('nama_merk')
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
                    <form method="POST" id="edit-merk" action="">
                        @csrf
                        @method('put')
                        <div>
                            <input type="hidden" value="{{ $merks->id }}" name="id" id="edit_merk_id">
                            <div>
                                <label for="namaRuang" class="form-label">Nama Ruang Alat Medis :</label>
                                <input type="text" class="form-control" value="{{$merks->merk}}" name="merk"
                                    id="merk" placeholder="Isi Nama Merk">
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
            if (event.target.matches('.edit-merk')) {
                var merkId = event.target.dataset.id_merk;
                var namaMerk = event.target.dataset.merk;

                var editMerkForm = document.getElementById('edit-merk');
                var merkIdInput = document.getElementById('edit_merk_id');
                var namaMerkInput = document.getElementById('merk')
                merkIdInput.value = merkId;
                namaMerkInput.value = namaMerk;
                editMerkForm.action = '/merkalat/edit/' + merkId;
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
