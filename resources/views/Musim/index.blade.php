@extends('Musim.layout')

@section('content')

<h4 class="mt-5">Data Musim</h4>

<a href="{{ route('Musim.create') }}" type="button" class="btn btn-success rounded-3 mb-5">Tambah Data</a>

@if($message = Session::get('success'))
    <div class="alert alert-success mt-3" role="alert">
        {{ $message }}
    </div>
@endif
<form action="">
<div class="input-group mb-3">
  <input name="search" type="text" class="form-control" placeholder="Search" aria-label="Recipient's username" aria-describedby="button-addon2">
  <button class="btn btn-outline-secondary" type="Submit" id="button-addon2">Search</button>
</div>
</form>

<table class="table table-hover mt-2">
    <thead>
      <tr>
        <th>No.</th>
        <th>Tahun</th>
        <th>Pemenang</th>
        <th>Negara Asal</th>
        <th>Jumlah Kemenangan</th>
        <th>Asal Pabrikan</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($datas as $data)
            <tr>
                <td>{{ $data->ID_Musim }}</td>
                <td>{{ $data->Nama_Musim }}</td>
                <td>{{ $data->Nama_Rider }}</td>
                <td>{{ $data->Asal_Rider }}</td>
                <td>{{ $data->Jumlah_Kemenangan }}</td>
                <td>{{ $data->Nama_Pabrikan }}</td>
                <td>
                    <a href="{{ route('Musim.edit', $data->ID_Musim) }}" type="button" class="btn btn-warning rounded-3">Ubah</a>

                    
                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#hapusModal{{ $data->ID_Musim }}">
                        Hapus
                    </button>

                  
                    <div class="modal fade" id="hapusModal{{ $data->ID_Musim }}" tabindex="-1" aria-labelledby="hapusModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="hapusModalLabel">Konfirmasi</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <form method="POST" ID_Rider="{{ route('Musim.delete', $data->ID_Musim) }}">
                                    @csrf
                                    <div class="modal-body">
                                        Apakah anda yakin ingin menghapus data ini?
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                                        <button type="submit" class="btn btn-primary">Ya</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </td>
            </tr>
        @endforeach
        {{-- <tr>
            <td>1</td>
            <td>Mark</td>
            <td>Otto</td>
            <td>test</td>
            <td>
                <a href="#" type="button" class="btn btn-warning rounded-3">Ubah</a>

             
                <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#hapusModal">
                    Hapus
                </button>

             
                <div class="modal fade" id="hapusModal" tabindex="-1" aria-labelledby="hapusModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="hapusModalLabel">Konfirmasi</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                Apakah anda yakin ingin menghapus data ini?
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                                <button type="button" class="btn btn-primary">Ya</button>
                            </div>
                        </div>
                    </div>
                </div>
            </td>
        </tr> --}}
    </tbody>
</table>
@stop
