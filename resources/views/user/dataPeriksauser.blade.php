@extends('admin.layouts.app')
@section('content')

    <div class="w-100">
        <div class="row p-3 justify-content-between">
            <div class="col-9 fs-3 p-2"><b>Data Pemeriksaan</b></div>
            <div class="col-3 fs-4 d-flex ">
                <div><a class="btn bg-greencustom rounded-5 fs-5" href=""><i class="bi bi-envelope "></i></a></div>
                <div><a class="btn bg-greencustom  rounded-5 ms-1 fs-5" href=""><i class="bi bi-bell "></i></a></div>
                <div class="fw-bold mt-1"><i class="bi bi-person border border-dark p-2 rounded-5 ms-1 "></i> Admin</div>
            </div>
        </div>
        <div class="row p-3 justify-content-between">
            <div class="col-3 fs-3 p-2">
                <div class="icon-input-container">
                    <i class="fas fa-search"></i>
                    <input class="form-control form-control-lg  rounded-5 border border-dark pops"
                           type="text"  placeholder="Mencari Alat Medis" aria-label=".form-control-lg example">
                </div>
            </div>
            <div class="col-2 fs-3 p-2">
                <button type="button" data-bs-toggle='modal' data-bs-target='#modalTambah'
                    class="btn btn-primary border border-dark rounded-0 fs-5  fw-bold">+ Tambah</button>
            </div>
        </div>
        <div class="container ">
            <table class="table  border-dark text-center ">
                <thead>
                    <tr>
                        <th class="col">Id Alat Medis</th>
                        <th class="col">Nama Alat Medis</th>
                        <th class="col">Nama Ruang</th>
                        <th class="col">Tanggal Pemeriksaan</th>
                        <th class="col">Kondisi</th>
                        <th class="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row">01</th>
                        <td>Suction Pump</td>
                        <td>7E-A</td>
                        <td>19/03/2024</td>
                        <td>ICU</td>
                        <td>
                            <div class="d-flex justify-content-center ">
                                <button type="button" data-bs-toggle='modal' data-bs-target='#modalEdit'
                                    class="btn btn-success me-2">Edit</button>
                                <button type="button" class="btn btn-danger">Hapus</button>
                            </div>
                        </td>
                    </tr>

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
                    <form action="" >
                        <div>
                            <div>
                                <label for="namaAlat" class="form-label">Nama Alat Medis :</label>
                                <input type="text" class="form-control" id="namaAlat" placeholder="Isi Nama Alat">
                            </div>
                            <div >
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
                    <form action="" >
                        <div>
                            <div>
                                <label for="namaAlat" class="form-label">Nama Alat Medis :</label>
                                <input type="text" class="form-control" id="namaAlat" placeholder="Isi Nama Alat">
                            </div>
                            <div >
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
