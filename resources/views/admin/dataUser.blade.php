@extends('admin.layouts.app')
@section('content')
    <div class="w-100">
        <div class="row p-3 justify-content-between">
            <div class="col-9 fs-3 p-2"><b>Data User</b></div>
            <div class="col-3 fs-4 d-flex ">
                <div><a class="btn bg-greencustom  rounded-5 ms-1 fs-5" href=""><i class="bi bi-bell "></i></a><span
                        class="translate-middle badge rounded-pill bg-success">
                        9
                    </span>
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
                        placeholder="Mencari Data User" aria-label=".form-control-lg example">
                </div>
            </div>
            <div class="col-2 fs-3 p-2">
                <button type="button" data-bs-toggle='modal' data-bs-target='#modalTambah'
                    class="btn btn-outline-primary  rounded-2 fs-5  ">+ Tambah</button>
            </div>
        </div>
        <div class="container ">
            <table class="table border-dark text-center ">
                <thead>
                    <tr>
                        <th class="col-2">Id User</th>
                        <th class="col-2">Username</th>
                        <th class="col-2">Telepon</th>
                        <th class="col-2">Jabatan</th>
                        <th class="col-2">Aksi</th>
                        <th class="col-2">Reset Password</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($user as $users)
                        <tr>
                            <th scope="row">0{{ $loop->iteration }}</th>
                            <th scope="row">{{ $users->username }}</th>
                            <th scope="row">{{ $users->number }}</th>
                            @if ($users->level == 1)
                                <th scope="row">Admin</th>
                            @elseif($users->level == 2)
                                <th scope="row">Kepala BPS</th>
                            @elseif($users->level == 3)
                                <th scope="row">Pegawai</th>
                            @else
                                <th scope="row">Kepala Ruangan</th>
                            @endif
                            <td>
                                <div class="d-flex justify-content-center ">
                                    <button type="button" data-bs-toggle='modal' data-bs-target='#modalEdit'
                                        class="btn btn-outline-primary me-2 edit-user" data-users_id="{{ $users->id }}"
                                        data-username="{{ $users->username }}"
                                        data-number="{{ $users->number }}"
                                        data-level="{{ $users->level }}">Edit</button>
                                    <button type="button" class="btn btn-outline-danger">Hapus</button>
                                </div>
                            </td>
                            <td>
                                <div class="d-flex justify-content-center ">
                                    <button type="button" class="btn btn-outline-danger">Reset Password</button>
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
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Form Edit Data User</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="" id="edit-user-form"> 
                        @csrf
                        @method('put')
                        <div>
                            <input type="hidden" value="{{$users->id}}" name="id" id="edit_user_id">
                            <div>
                                <label for="username" class="form-label">Username :</label>
                                <input type="text" class="form-control" value="{{$users->username}}" name="username" id="edit_user_username" placeholder="Isi Username">
                            </div>
                            <div>
                                <label for="telepon" class="form-label">Telepon :</label>
                                <input type="number" value="{{$users->number}}" class="form-control" name="telepon" id="edit_user_telepon"
                                    placeholder="Isi Telepon">
                            </div>
                            <div>
                                <label for="ruanganAlat" class="form-label mt-1">Jabatan :</label>
                                <select class="form-select" value='{{$users->level}}' id="edit_user_level" name="jabatan"
                                    aria-label="Default select example">
                                    <option disabled selected>Pilih Jabatan</option>
                                    <option value="1" {{ $users->level == '1' ? 'selected' : '' }}>Admin</option>
                                    <option value="2" {{ $users->level == '2' ? 'selected' : '' }}>Kepala BPS</option>
                                    <option value="3" {{ $users->level == '3' ? 'selected' : '' }}>Pegawai</option>
                                    <option value="4" {{ $users->level == '4' ? 'selected' : '' }}>Kepala Ruangan</option>
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
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Form Tambah Data User</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="{{ route('user.add') }}">
                        @csrf
                        <div>
                            <div>
                                <label for="username" class="form-label">Username :</label>
                                <input name="username" value="{{ old('username') }}" type="text"
                                    class="form-control @error('username') is-invalid @enderror" id="username"
                                    placeholder="Isi Username">
                                @error('username')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div>
                                <label for="telepon" class="form-label">Telepon :</label>
                                <input name="telepon" value="{{ old('telepon') }}" type="number"
                                    class="form-control @error('telepon') is-invalid @enderror" id="telepon"
                                    placeholder="Isi Telepon">
                                @error('telepon')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div>
                                <label for="ruanganAlat" class="form-label mt-1">Jabatan :</label>
                                <select class="form-select @error('jabatan') is-invalid @enderror"
                                    value="{{ old('jabatan') }}" name="jabatan" id="ruanganAlat"
                                    aria-label="Default select example">
                                    <option disabled selected>Pilih Jabatan</option>
                                    <option value="1" {{ "1" === old('jabatan') ? 'selected' : '' }}>Admin</option>
                                    <option value="2" {{ "2" === old('jabatan') ? 'selected' : '' }}>Kepala BPS</option>
                                    <option value="3" {{ "3" === old('jabatan') ? 'selected' : '' }}>Pegawai</option>
                                    <option value="4" {{ "4" === old('jabatan') ? 'selected' : '' }}>Kepala Ruangan</option>
                                    
                                </select>
                                @error('jabatan')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div>
                                <label for="password" class="form-label">Password :</label>
                                <input type="password" name="password"
                                    class="form-control @error('password') is-invalid @enderror" id="password"
                                    placeholder="Isi Password">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div>
                                <label for="password" class="form-label">Konfirmasi Password :</label>
                                <input type="password" class="form-control" id="password" name="password_confirmation"
                                    placeholder="Konfirmasi Password">
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
        if (event.target.matches('.edit-user')) {
            var userId = event.target.dataset.users_id;
            var username = event.target.dataset.username;
            var number = event.target.dataset.number;
            var level = event.target.dataset.level;

            var editUserForm = document.getElementById('edit-user-form');
            var userIdInput = document.getElementById('edit_user_id');
            var usernameInput = document.getElementById('edit_user_username');
            var numberInput = document.getElementById('edit_user_telepon');
            var levelInput = document.getElementById('edit_user_level');
            
            
            userIdInput.value = userId;
            numberInput.value = number;
            usernameInput.value = username;
            levelInput.value = level;
            editUserForm.action = '/datauser/edit/' + userId;


            // var modal = document.getElementById('edit-user-modal');
            // var bootstrapModal = new bootstrap.Modal(modal);
            // bootstrapModal.show();
        }
    });
        @if (session('showModalTambah'))
            const modaledit = new bootstrap.Modal('#modalTambah', {
                keyboard: false
            })
            window.onload = modaledit.show();
        @endif
        @if (session('showModalEdit'))
            const modaledit = new bootstrap.Modal('#modalEdit', {
                keyboard: false
            })
            window.onload = modaledit.show();
        @endif
    </script>
@endsection
