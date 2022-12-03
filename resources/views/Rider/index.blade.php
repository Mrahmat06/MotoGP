@extends('Musim.layout')

@section('content')

<h4 class="mt-5">Data Rider</h4>

<a href="{{ route('Rider.create') }}" type="button" class="btn btn-success rounded-3">Tambah Data</a>

@if($message = Session::get('success'))
    <div class="alert alert-success mt-3" role="alert">
        {{ $message }}
    </div>
@endif

<table class="table table-hover mt-2">
    <thead>
      <tr>
        <th>ID Rider.</th>
        <th>Nama Rider</th>
        <th>Asal Rider</th>
        <th>Tahun Lahir</th>
        <th>Jumlah Kemenangan</th>
        <th>Tim Pabrikan</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($datas as $data)
            <tr>
                <td>{{ $data->ID_Rider }}</td>
                <td>{{ $data->Nama_Rider }}</td>
                <td>{{ $data->Asal_Rider }}</td>
                <td>{{ $data->Tahun_Lahir }}</td>
                <td>{{ $data->Jumlah_Kemenangan }}</td>
                <td>{{ $data->Nama_Pabrikan }}</td>
                <td>
                    <a href="{{ route('Rider.edit', $data->ID_Rider) }}" type="button" class="btn btn-warning rounded-3">Ubah</a>

                  
                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#hapusModal{{ $data->ID_Rider }}">
                        Hapus
                    </button>

                  
                    <div class="modal fade" id="hapusModal{{ $data->ID_Rider }}" tabindex="-1" aria-labelledby="hapusModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="hapusModalLabel">Konfirmasi</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <form method="POST" action="{{ route('Rider.delete', $data->ID_Rider) }}">
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
                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#softdelete{{ $data->ID_Rider }}">
                        softdelete
                    </button>

              
                    <div class="modal fade" id="softdelete{{ $data->ID_Rider }}" tabindex="-1" aria-labelledby="softdeleteLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="softdeleteLabel">Konfirmasi</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <form method="POST" action="{{ route('Rider.softdelete', $data->ID_Rider) }}">
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
        
    </tbody>
</table>
@stop
