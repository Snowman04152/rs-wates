<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Ruang;
use App\Models\Jenis;
use App\Models\Merk;
use App\Models\DataAlat;
use App\Models\DataPeriksa;
class AlatMedisController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }
    //Function to admin//
    public function data_alat()
    {
        $jenis = Jenis::get();
        $merk = Merk::get();
        $ruang = Ruang::get();
        $data_alat = DataAlat::get();
        $pemeliharaan = DataPeriksa::with('DataAlat','User')->get();
        $data_kirim = DataPeriksa::where('status',1)->get();
        return view('admin.dataAlat', compact('data_alat', 'jenis', 'merk', 'ruang','data_kirim','pemeliharaan'));
    }
    public function editDataalat(Request $request, string $id)
    {
        $messages = [
            'required' => ':Attribute harus diisi.'
        ];
        $validator = Validator::make($request->all(), [
            'jenis_alat_medis' => 'required',
            'nama_alat_medis' => 'required',
            'merk_alat_medis' => 'required',
            'ruang_alat_medis' => 'required'

        ], $messages);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput()->with('showModalEdit', true);
        }
        $file = $request->file('gambar_alat_medis');

        if ($file != null) {
            $originalFilename = $file->getClientOriginalName();
            $encryptedFilename = $file->hashName();
            $file->store('public/files');
        }

        $data =  DataAlat::find($id);
        $data->nama_alat = $request->nama_alat_medis;
        $data->jenis_alat = $request->jenis_alat_medis;
        $data->merk = $request->merk_alat_medis;
        $data->ruangan = $request->ruang_alat_medis;
        
        if ($file != null) {
            $data->gambar_alat = $originalFilename;
            $data->gambar_alat_hash = $encryptedFilename;
        }
        $data->save();
        return redirect()->route('data_alat');

    }

    public function deleteDataalat(Request $request , string $id){

        $deleteddata = DataAlat::find($id);
        if ($deleteddata) {
            $deleteddata->delete();
        }

        return redirect()->route('data_alat');
    }
    public function createDataalat(Request $request)
    {
        $messages = [
            'required' => ':Attribute harus diisi.'
        ];
        $validator = Validator::make($request->all(), [
            'jenis_alat' => 'required',
            'nama_alat' => 'required',
            'gambar_alat' => 'required',
            'merk_alat' => 'required',
            'ruang_alat' => 'required'

        ], $messages);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput()->with('showModalTambah', true);
        }
        $file = $request->file('gambar_alat');

        if ($file != null) {
            $originalFilename = $file->getClientOriginalName();
            $encryptedFilename = $file->hashName();
            $file->store('public/files');
        }

        $data = new DataAlat;
        $data->nama_alat = $request->nama_alat;
        $data->jenis_alat = $request->jenis_alat;
        $data->merk = $request->merk_alat;
        $data->ruangan = $request->ruang_alat;
        if ($file != null) {
            $data->gambar_alat = $originalFilename;
            $data->gambar_alat_hash = $encryptedFilename;
        }
        $data->save();
        return redirect()->route('data_alat');

    }
    public function jenis_alat()
    {
        $jenis = Jenis::get();
        $data_kirim = DataPeriksa::where('status',1)->get();
        $pemeliharaan = DataPeriksa::with('DataAlat','User')->get();
        return view('admin.jenisAlat', compact('jenis','data_kirim','pemeliharaan'));
    }
    public function createJenis(Request $request)
    {
        $messages = [
            'required' => ':Attribute harus diisi.'
        ];
        $validator = Validator::make($request->all(), [
            'jenis_alat' => 'required'

        ], $messages);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput()->with('showModalTambah', true);
        }


        $jenis = new Jenis;
        $jenis->jenis_alat = $request->jenis_alat;

        $jenis->save();
        return redirect()->route('jenis_alat');
    }
    public function deleteJenis(Request $request, string $id)
    {

        $deletedjenis = Jenis::find($id);
        if ($deletedjenis) {
            $deletedjenis->delete();
        }

        return redirect()->route('jenis_alat');

    }
    public function editJenis(Request $request, string $id)
    {
        $messages = [
            'required' => ':Attribute harus diisi.'
        ];
        $validator = Validator::make($request->all(), [
            'jenis_alat' => 'required'

        ], $messages);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput()->with('showModalEdit', true);
        }

        $jenis = Jenis::find($id);
        $jenis->jenis_alat = $request->jenis_alat;
        $jenis->save();
        return redirect()->route('jenis_alat');
    }
    public function merk_alat()
    {
        $pemeliharaan = DataPeriksa::with('DataAlat','User')->get();
        $merk = Merk::get();
        $data_kirim = DataPeriksa::where('status',1)->get();
        return view('admin.merkAlat', compact('merk','data_kirim','pemeliharaan'));
    }
    public function createMerk(Request $request)
    {
        $messages = [
            'required' => ':Attribute harus diisi.'
        ];
        $validator = Validator::make($request->all(), [
            'nama_merk' => 'required'

        ], $messages);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput()->with('showModalTambah', true);
        }

        // ELOQUENT
        $merk = new Merk;
        $merk->merk = $request->nama_merk;

        $merk->save();
        return redirect()->route('merk_alat');
    }
    public function deleteMerk(Request $request, string $id)
    {

        $deletedmerk = Merk::find($id);
        if ($deletedmerk) {
            $deletedmerk->delete();
        }

        return redirect()->route('merk_alat');

    }
    public function editMerk(Request $request, string $id)
    {
        $messages = [
            'required' => ':Attribute harus diisi.'
        ];
        $validator = Validator::make($request->all(), [
            'merk' => 'required'

        ], $messages);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput()->with('showModalEdit', true);
        }

        $merk = Merk::find($id);
        $merk->merk = $request->merk;
        $merk->save();
        return redirect()->route('merk_alat');
    }
    public function ruang_alat()
    {
        $pemeliharaan = DataPeriksa::with('DataAlat','User')->get();
        $data_kirim = DataPeriksa::where('status',1)->get();
        $ruang = Ruang::get();
        return view('admin.ruangAlat', compact('ruang','data_kirim','pemeliharaan'));
    }

    
    
    public function data_user()
    {
        $user = User::get();
        $pemeliharaan = DataPeriksa::with('DataAlat','User')->get();
        $data_kirim = DataPeriksa::where('status',1)->get();
        return view('admin.dataUser', compact('user','data_kirim','pemeliharaan'));
    }
    public function createRuangan(Request $request)
    {
        $messages = [
            'required' => ':Attribute harus diisi.'
        ];
        $validator = Validator::make($request->all(), [
            'namaRuang' => 'required'
            
        ], $messages);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput()->with('showModalTambah', true);
        }
        
        // ELOQUENT
        $ruang = new Ruang;
        $ruang->nama_ruang = $request->namaRuang;
        
        $ruang->save();
        return redirect()->route('ruang_alat');
    }
    public function deleteRuang(Request $request, string $id)
    {
        
        $deletedruang = Ruang::find($id);
        if ($deletedruang) {
            $deletedruang->delete();
        }
        
        return redirect()->route('ruang_alat');
        
    }
    public function editRuangan(Request $request, string $id)
    {
        $messages = [
            'required' => ':Attribute harus diisi.'
        ];
        $validator = Validator::make($request->all(), [
            'nama_ruang' => 'required'
            
        ], $messages);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput()->with('showModalEdit', true);
        }
        
        $ruang = Ruang::find($id);
        $ruang->nama_ruang = $request->nama_ruang;
        $ruang->save();
        return redirect()->route('ruang_alat');
    }
    public function data_periksa()
    {
        $pemeliharaan = DataPeriksa::with('DataAlat','User')->get();
        $data_kirim = DataPeriksa::where('status',1)->get();
        $data = DataAlat::get();
        $user = User::where('level',3)->get();
        // $data_pegawai = $user->where('id',$pemeliharaan->pegawai_id)->get();
        return view('admin.dataPeriksa', compact('data','user','pemeliharaan','data_kirim'));
    }
    
    public function CreatePemeliharaan(Request $request){
        $messages = [
            'required' => ':Attribute harus diisi.'
        ];
        $validator = Validator::make($request->all(), [
            'nama_alat' => 'required',
            'tanggal' => 'required',
            'kondisi' => 'required',
            'pesan' => 'required',
            'pegawai'=> 'required'
        ], $messages);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput()->with('showModalEdit', true);
        }
        $dataPeriksa = new DataPeriksa;
        $dataPeriksa->data_alat_id = $request->nama_alat;
        $dataPeriksa->pegawai_id = $request->pegawai;
        $dataPeriksa->kondisi = $request->kondisi;
        $dataPeriksa->status = 1 ;
        $dataPeriksa->pesan = $request->pesan;
        $dataPeriksa->tanggal = $request->tanggal;

        $dataPeriksa->save();
        return redirect()->route('data_periksa');
    }

    public function DeletePemeliharaan(Request $request , string $id){
        $deletedruang = DataPeriksa::find($id);
        if ($deletedruang) {
            $deletedruang->delete();
        }
        
        return redirect()->route('data_periksa');
    }

    public function EditPemeliharaan(Request $request , string $id) {
        $messages = [
            'required' => ':Attribute harus diisi.'
        ];
        $validator = Validator::make($request->all(), [
            'edit_nama_alat' => 'required',
            'edit_tanggal' => 'required',
            'edit_kondisi' => 'required',
            'edit_pesan' => 'required',
            'edit_pegawai'=> 'required',
            'edit_status' => 'required'
        ], $messages);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput()->with('showModalEdit', true);
        }
        $dataPeriksa = DataPeriksa::find($id);
        $dataPeriksa->data_alat_id = $request->edit_nama_alat;
        $dataPeriksa->pegawai_id = $request->edit_pegawai;
        $dataPeriksa->kondisi = $request->edit_kondisi;
        $dataPeriksa->status = $request->edit_status ;
        $dataPeriksa->pesan = $request->edit_pesan;
        $dataPeriksa->tanggal = $request->edit_tanggal;

        $dataPeriksa->save();
        return redirect()->route('data_periksa');
    }
    //---------------------------------------------------------------------- Function to Kepala BPS ----------------------------------------------------------------------------------------------//
    public function data_alat_user()
    {
        return view('user.dataAlatuser');
    }
    
    public function jenis_alat_user()
    {
        return view('user.jenisAlatuser');
    }
    public function merk_alat_user()
    {
        return view('user.merkAlatuser');
    }
    public function ruang_alat_user()
    {
        return view('user.ruangAlatuser');
    }

    public function data_periksa_user()
    {
        return view('user.dataPeriksauser');
    }

    //---------------------------------------------------------------------- Function to Pegawai ----------------------------------------------------------------------------------------------//

    public function data_periksa_pegawai()
    {
        return view('pegawai.dataPeriksapegawai');
    }

    //---------------------------------------------------------------------- Function to Kepala Ruangan ----------------------------------------------------------------------------------------------//

    public function data_periksa_kepalaruang()
    {
        return view('kepalaruang.dataPeriksakepalaruang');
    }

    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
