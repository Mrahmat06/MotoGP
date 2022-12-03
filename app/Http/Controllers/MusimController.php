<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class MusimController extends Controller
{ public function index(Request $request) {
    if($request->has('search')) {
        $datas = DB::select('SELECT musim.ID_Musim, musim.Nama_Musim, rider.Nama_Rider, rider.Asal_Rider, rider.Jumlah_Kemenangan, pabrikan.Nama_Pabrikan FROM `musim` left join rider on rider.ID_Rider = musim.ID_Rider left join pabrikan on pabrikan.ID_Pabrikan = rider.ID_Pabrikan where Musim.Nama_Musim like :search',[
            'search'=>'%'.$request->search.'%',
        ]);

        return view('Musim.index')
            ->with('datas', $datas);
    } else {
        $datas = DB::select('SELECT musim.ID_Musim, musim.Nama_Musim, rider.Nama_Rider, rider.Asal_Rider, rider.Jumlah_Kemenangan, pabrikan.Nama_Pabrikan FROM `musim` left join rider on rider.ID_Rider = musim.ID_Rider left join pabrikan on pabrikan.ID_Pabrikan = rider.ID_Pabrikan');

        return view('Musim.index')
            ->with('datas', $datas);
    }
}

public function create() {
    return view('Musim.add');
}

public function store(Request $request) {
    $request->validate([
        'ID_Musim' => 'required',
        'Nama_Musim' => 'required',
        'ID_Rider' => 'required',
    ]);

    
    DB::insert('INSERT INTO Musim(ID_Musim, Nama_Musim, ID_Rider) VALUES (:ID_Musim, :Nama_Musim, :ID_Rider)',
    [
        'ID_Musim' => $request->ID_Musim,
        'Nama_Musim' => $request->Nama_Musim,
        'ID_Rider' => $request->ID_Rider,
    ]
    );

   

    return redirect()->route('Musim.index')->with('success', 'Data Musim berhasil disimpan');
}

public function edit($ID) {
    $data = DB::table('Musim')->where('ID_Musim', $ID)->first();

    return view('Musim.edit')->with('data', $data);
}

public function update($ID, Request $request) {
    $request->validate([
        'ID_Musim' => 'required',
        'Nama_Musim' => 'required',
        'ID_Rider' => 'required',
    ]);

   
    DB::update('UPDATE Musim SET ID_Musim = :ID_Musim, Nama_Musim = :Nama_Musim, =, ID_Rider = :ID_Rider WHERE ID_Musim = :ID',
    [
        'ID' => $ID,
        'ID_Musim' => $request->ID_Musim,
        'Nama_Musim' => $request->Nama_Musim,
        'ID_Rider' => $request->ID_Rider,
    ]
    );

  

    return redirect()->route('Musim.index')->with('success', 'Data Musim berhasil diubah');
}

public function delete($ID) {
   
    DB::delete('DELETE FROM Musim WHERE ID_Musim = :ID_Musim', ['ID_Musim' => $ID]);

 

    return redirect()->route('Musim.index')->with('success', 'Data Musim berhasil dihapus');
}
}
