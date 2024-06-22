@extends('pegawai.layouts.app')
@section('content')
    <div class="w-100">
        <div class="row p-3 justify-content-between">
            <div class="col-9 fs-3 p-2"><b>Jadwal Pemeliharaan</b></div>
            <div class="col-3 fs-4 d-flex ">

                
                <div class=" dropdown ms-1 mt-1 fs-5 ">
                    <button type="button" class="btn btn-outline-success dropdown-toggle" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        {{ $namaUser }}
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
        </div>
        <div class="container ">
            <table class="table  border-dark text-center ">
                <thead>
                    <tr>
                        <th class="col-1">Id Alat Medis </th>
                        <th class="col-1">Nama Alat Medis</th>
                        <th class="col-1">Nama Ruang</th>
                        <th class="col-2">Foto</th>
                        <th class="col-1">Tanggal Pemeriksaan</th>
                        <th class="col-1">Kondisi</th>
                        <th class="col-1">Keterangan</th>
                        <th class="col-1">Status</th>
                        <th class="col-1">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data_periksa as $datas)
                        <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td>{{ $datas->DataAlat->nama_alat }}</td>
                            <td>{{ $datas->DataAlat->ruangan }}</td>
                            <td><img src="{{ asset('storage/files/' . $datas->DataAlat->gambar_alat_hash) }}"
                                    class="img-fluid w-25 border border-dark" alt=""></td>
                            <td>{{ $datas->tanggal }}</td>
                            <td>{{ $datas->kondisi }}</td>
                            <td>{{ $datas->pesan }}</td>
                            @if ($datas->status == 1)
                                <td>Perlu Diproses</td>
                            @elseif($datas->status == 2)
                                <td>Dikerjakan</td>
                            @else
                                <td>Selesai</td>
                            @endif
                            <td>
                                @if ($datas->status == 1)
                                    <form id="nested-form" action="{{ route('pegawai.proses', ['id' => $datas->id]) }}" method="POST">
                                        @csrf
                                        <button type="submit" class="btn btn-primary me-2">Proses</button>
                                    </form>
                                @elseif($datas->status == 2)
                                    <form id="nested-form" action="{{ route('pegawai.proses', ['id' => $datas->id]) }}"
                                        method="POST">
                                        @csrf
                                        <button type="submit" class="btn btn-primary me-2">Selesai</button>
                                    </form>
                                @else
                                @endif
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
                    <form action="">
                        <div>
                            <div>
                                <label for="namaAlat" class="form-label">Nama Alat Medis :</label>
                                <input type="text" class="form-control" id="namaAlat" placeholder="Isi Nama Alat">
                            </div>
                            <div>
                                <label for="gambarAlat" class="form-label mt-1 ">Nama Ruang :</label>
                                <input type="text" class="form-control" id="gambarAlat" placeholder="Input Gambar Alat">
                            </div>
                            <div>
                                <label for="jenisAlat" class="form-label mt-1">Tanggal Pemeriksaan :</label>
                                <input type="date" class="form-control" id="jenisAlat" placeholder="Tanggal pemeriksaan">

                            </div>
                            <div>
                                <label for="merkAlat" class="form-label mt-1">Kondisi :</label>
                                <input type="text" class="form-control" id="merkAlat" placeholder="Kondisi">
                            </div>



                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
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
                    <form action="">
                        <div>
                            <div>
                                <label for="namaAlat" class="form-label">Nama Alat Medis :</label>
                                <input type="text" class="form-control" id="namaAlat" placeholder="Isi Nama Alat">
                            </div>
                            <div>
                                <label for="gambarAlat" class="form-label mt-1 ">Nama Ruang :</label>
                                <input type="text" class="form-control" id="gambarAlat"
                                    placeholder="Input Gambar Alat">
                            </div>
                            <div>
                                <label for="jenisAlat" class="form-label mt-1">Tanggal Pemeriksaan :</label>
                                <input type="date" class="form-control" id="jenisAlat"
                                    placeholder="Tanggal pemeriksaan">

                            </div>
                            <div>
                                <label for="merkAlat" class="form-label mt-1">Kondisi :</label>
                                <input type="text" class="form-control" id="merkAlat" placeholder="Kondisi">
                            </div>

                            <div>
                                <label for="ruanganAlat" class="form-label mt-1">Keterangan :</label>
                                <select class="form-select" id="ruanganAlat" aria-label="Default select example">
                                    <option selected>Pilih Ruangan</option>
                                    <option value="1">Proses</option>
                                    <option value="2">Dikerjakan</option>
                                    <option value="3">Selesai</option>
                                </select>
                            </div>


                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>
    {{-- <script type="module">
     
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

        // const modaledit = new bootstrap.Modal('#modalTambah', {
        //     keyboard: false
        // })
        // window.onload = modaledit.show();
    </script>
@endsection
