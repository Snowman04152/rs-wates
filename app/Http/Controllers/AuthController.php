<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\User;

class AuthController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    public function register(){
        return view ('auth/register');
    }
    /**
     * Show the form for creating a new resource.
     */
    public function createUser(Request $request)
    {
        $messages = [
            'required' => ':Attribute harus diisi.',
            'confirmed' => 'Password Tidak Sama'
        ];
        $validator = Validator::make($request->all(), [
            'username' => 'required',
            'telepon' => 'required',
            'password' => 'required|min:8|confirmed',
            'jabatan' => 'required'
            
        ], $messages);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput()->with('showModalTambah',true);
        }

        // ELOQUENT
        $user = new User;
        $user->username = $request->username;
        $user->number = $request->telepon;
        $user->level = $request->jabatan;
        $user->password = bcrypt($request->password);
        
        $user->save();
        return redirect()->route('data_user');
    }
    public function editUser(Request $request, string $id)
    {
        
        $messages = [
            'required' => ':Attribute harus diisi.',
            'confirmed' => 'Password Tidak Sama'
        ];
        $validator = Validator::make($request->all(), [
            'username' => 'required',
            'telepon' => 'required',
            'jabatan' => 'required'
            
        ], $messages);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput()->with('showModalEdit',true);
        }
        $user = User::find($id);
        $user->username = $request->username;
        $user->number = $request->telepon;
        $user->level = $request->jabatan;
        $user->save();
        return redirect()->route('data_user');
    }

    public function resetPassword(Request $request , string $id){

        $messages = [
            'required' => ':Attribute harus diisi.',
            'confirmed' => 'Password Tidak Sama'
        ];
        $validator = Validator::make($request->all(), [
            'password' => 'required|confirmed'
            
        ], $messages);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput()->with('showModalReset',true);
        }

        $user = User::find($id);
        $user->password = $request->password;
        $user->save();
        
        return redirect()->route('data_user');
    }
    public function deleteUser(Request $request, string $id){
        
        $deletedUser = User::find($id);
        if ($deletedUser) {
            $deletedUser->delete();
        }

        return redirect()->route('data_user');

    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // $messages = [
        //     'required' => ':Attribute harus diisi.',
        //     'confirmed' => ':Password Tidak Sama'
        // ];
        // $validator = Validator::make($request->all(), [
        //     'username' => 'required',
        //     'email' => 'required|email|regex:/@gmail\.com$/i',
        //     'password' => 'required|confirmed',
        //     'telp' => 'required'
            
        // ], $messages);
        
        // if ($validator->fails()) {
        //     return redirect()->back()->withErrors($validator)->withInput();
            
        // }
        
        // $user = new User;
        // $user->username = $request->username;
        // $user->email = $request->email;
        // $user->level = 2 ;
        // $user->number = $request->telp;
        // $user->password = bcrypt($request->password);
        
        // $user->save();
        
        // return redirect()->route('login');
    }

//     public function store(Request $request)
// {
//     $messages = [
//         'required' => ':Attribute harus diisi.',
//         'email' => 'Format :Attribute tidak valid.',
//         'email.regex' => 'Alamat email harus menggunakan domain @gmail.com.',
//         'confirmed' => 'Konfirmasi :attribute tidak cocok dengan password.'
//     ];

//     $validator = Validator::make($request->all(), [
//         'username' => 'required',
//         'email' => 'required|email|regex:/@gmail\.com$/i',
//         'password' => 'required|confirmed',
//         'telp' => 'required' // Mengubah 'number' menjadi 'telp'
//     ], $messages);

//     if ($validator->fails()) {
//         return redirect()->back()->withErrors($validator)->withInput();
//     }

//     $user = new User;
//     $user->username = $request->username;
//     $user->email = $request->email;
//     $user->level = 2; // Jika 'level' defaultnya adalah 2, Anda bisa langsung mengosongkan atribut ini.
//     $user->number = $request->telp; // Mengubah 'number' menjadi 'telp'
//     $user->password = bcrypt($request->password);

//     $user->save();

//     return redirect()->route('login');
// }

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
