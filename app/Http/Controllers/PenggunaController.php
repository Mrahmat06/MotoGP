<?php

namespace App\Http\Controllers;

use App\Models\Pengguna;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class PenggunaController extends Controller
{
    public function index() {
        $datas = DB::select('select * from Pengguna');

        return view('Pengguna.index')
            ->with('datas', $datas);
    }

    public function create() {
        return view('Pengguna.add');
    }

    public function store(Request $request) {
        $request->validate([
            'ID_Pengguna' => 'required',
            'Nama_Pengguna' => 'required',
            'Username' => 'required',
            'Password' => 'required',
        ]);

       
        DB::insert('INSERT INTO pengguna(ID_Pengguna, Nama_Pengguna, Username, Password) VALUES (:ID_Pengguna, :Nama_Pengguna, :Username, :Password)',
        [
            'ID_Pengguna' => $request->ID_Pengguna,
            'Nama_Pengguna' => $request->Nama_Pengguna,
            'Username' => $request->Username,
            'Password' => Hash::make($request->Password),
        ]
        );



        return redirect()->route('Pengguna.index')->with('success', 'Data Pengguna berhasil disimpan');
    }

    public function edit($ID) {
        $data = DB::table('Pengguna')->where('ID_Pengguna', $ID)->first();

        return view('Pengguna.edit')->with('data', $data);
    }

    public function update($ID, Request $request) {
        $request->validate([
            'ID_Pengguna' => 'required',
            'Nama_Pengguna' => 'required',
            'Username' => 'required',
            'Password' => 'required',
        ]);

 
        DB::update('UPDATE Pengguna SET ID_Pengguna = :ID_Pengguna, Nama_Pengguna = :Nama_Pengguna,  Username = :Username, Password = :Password WHERE ID_Pengguna = :ID',
        [
            'ID' => $ID,
            'ID_Pengguna' => $request->ID_Pengguna,
            'Nama_Pengguna' => $request->Nama_Pengguna,
            'Username' => $request->Username,
            'Password' => Hash::make($request->Password),
        ]
        );

        
        return redirect()->route('Pengguna.index')->with('success', 'Data Pengguna berhasil diubah');
    }

    public function delete($ID) {
        
        DB::delete('DELETE FROM pengguna WHERE ID_Pengguna = :ID_Pengguna', ['ID_Pengguna' => $ID]);

        

        return redirect()->route('Pengguna.index')->with('success', 'Data Pengguna berhasil dihapus');
    }

}