<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class RiderController extends Controller
{
    public function index() {
        $datas = DB::select('SELECT rider.ID_Rider, rider.Nama_Rider, rider.Asal_Rider, rider.Tahun_Lahir, rider.Jumlah_Kemenangan, pabrikan.Nama_Pabrikan FROM `rider` left join pabrikan on rider.ID_Rider = pabrikan.ID_Pabrikan where Rider.Sampah=0');

        return view('Rider.index')
            ->with('datas', $datas);
    }

    public function create() {
        return view('Rider.add');
    }

    public function store(Request $request) {
        $request->validate([
            'ID_Rider' => 'required',
            'Nama_Rider' => 'required',
            'Asal_Rider' => 'required',
            'Tahun_Lahir' => 'required',
            'Jumlah_Kemenangan' => 'required',
            'ID_Pabrikan' => 'required',
        ]);

        DB::insert('INSERT INTO Rider(ID_Rider, Nama_Rider, Asal_Rider, Tahun_Lahir, Jumlah_Kemenangan, ID_Pabrikan) VALUES (:ID_Rider, :Nama_Rider, :Asal_Rider, :Tahun_Lahir, :Jumlah_Kemenangan, :ID_Pabrikan)',
        [
            'ID_Rider' => $request->ID_Rider,
            'Nama_Rider' => $request->Nama_Rider,
            'Asal_Rider' => $request->Asal_Rider,
            'Tahun_Lahir' =>$request->Tahun_Lahir,
            'Jumlah_Kemenangan' =>$request->Jumlah_Kemenangan,
            'ID_Pabrikan' =>$request->ID_Pabrikan,
        ]
        );

       
        return redirect()->route('Rider.index')->with('success', 'Data Rider berhasil disimpan');
    }

    public function edit($ID) {
        $data = DB::table('Rider')->where('ID_Rider', $ID)->first();

        return view('Rider.edit')->with('data', $data);
    }

    public function update($ID, Request $request) {
        $request->validate([
            'ID_Rider' => 'required',
            'Nama_Rider' => 'required',
            'Asal_Rider' => 'required',
            'Tahun_Lahir' => 'required',
            'Jumlah_Kemenangan' => 'required',
            'ID_Pabrikan' => 'required',
        ]);

        DB::update('UPDATE Rider SET Nama_Rider = :Nama_Rider,  Asal_Rider = :Asal_Rider, Tahun_Lahir = :Tahun_Lahir, Jumlah_Kemenangan = :Jumlah_Kemenangan, ID_Pabrikan = :ID_Pabrikan WHERE ID_Rider = :ID_Rider',
        [
            'ID_Rider' => $request->ID_Rider,
            'Nama_Rider' => $request->Nama_Rider,
            'Asal_Rider' => $request->Asal_Rider,
            'Tahun_Lahir' =>$request->Tahun_Lahir,
            'Jumlah_Kemenangan' =>$request->Jumlah_Kemenangan,
            'ID_Pabrikan' =>$request->ID_Pabrikan,
        ]
        );


        return redirect()->route('Rider.index')->with('success', 'Data Rider berhasil diubah');
    }

    public function delete($ID) {
        
        DB::delete('DELETE FROM Rider WHERE ID_Rider = :ID_Rider', ['ID_Rider' => $ID]);

        return redirect()->route('Rider.index')->with('success', 'Data Rider berhasil dihapus');
    }
    public function softdelete($ID) {
        
        DB::update('update Rider set Sampah=1 WHERE ID_Rider = :ID_Rider', ['ID_Rider' => $ID]);

        return redirect()->route('Rider.index')->with('success', 'Data Rider berhasil dihapus');
    }
}
