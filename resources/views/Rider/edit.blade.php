@extends('Musim.layout')

@section('content')

@if($errors->any())
    <div class="alert alert-danger">
        <ul>
        @foreach($errors->all() as $error)

            <li>{{ $error }}</li>

        @endforeach
        </ul>
    </div>
@endif

<div class="card mt-4">
	<div class="card-body">

        <h5 class="card-title fw-bolder mb-3">Ubah Data Rider</h5>

		<form method="post" action="{{ route('Rider.update', $data->ID_Rider) }}">
			@csrf
            <div class="mb-3">
                <label for="ID_Pabrikan" class="form-label">ID Rider</label>
                <input type="text" class="form-control" id="ID_Rider" name="ID_Rider" value="{{ $data->ID_Rider }}">
            </div>
			<div class="mb-3">
                <label for="Nama_Rider" class="form-label">Nama Rider</label>
                <input type="text" class="form-control" id="Nama_Rider" name="Nama_Rider" value="{{ $data->Nama_Rider }}">
            </div>
            <div class="mb-3">
                <label for="Asal_Rider" class="form-label">Asal Rider</label>
                <input type="Asal_Rider" class="form-control" id="Asal_Rider" name="Asal_Rider" value="{{ $data->Asal_Rider }}">
            </div>
            <div class="mb-3">
                <label for="Tahun_Lahir" class="form-label">Tahun Lahir</label>
                <input type="Tahun_Lahir" class="form-control" id="Tahun_Lahir" name="Tahun_Lahir" value="{{ $data->Tahun_Lahir }}">
            </div>
            <div class="mb-3">
                <label for="Jumlah_Kemenangan" class="form-label">Jumlah Kemenangan</label>
                <input type="Jumlah_Kemenangan" class="form-control" id="Jumlah_Kemenangan" name="Jumlah_Kemenangan" value="{{ $data->Jumlah_Kemenangan }}">
            </div>
            <div class="mb-3">
                <label for="ID_Pabrikan" class="form-label">ID Pabrikan</label>
                <input type="ID_Pabrikan" class="form-control" id="ID_Pabrikan" name="ID_Pabrikan" value="{{ $data->ID_Pabrikan }}">
            </div>
			<div class="text-center">
				<input type="submit" class="btn btn-primary" value="Ubah" />
			</div>
		</form>
	</div>
</div>

@stop
