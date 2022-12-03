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

        <h5 class="card-title fw-bolder mb-3">Ubah Data Musim</h5>

		<form method="post" action="{{ route('Musim.update', $data->ID_Musim) }}">
			@csrf
            <div class="mb-3">
                <label for="ID_Musim" class="form-label">ID Musim</label>
                <input type="text" class="form-control" id="ID_Musim" name="ID_Musim" value="{{ $data->ID_Musim }}">
            </div>
			<div class="mb-3">
                <label for="Nama_Musim" class="form-label">Nama Musim</label>
                <input type="text" class="form-control" id="Nama_Musim" name="Nama_Musim" value="{{ $data->Nama_Musim }}">
            </div>
            <div class="mb-3">
                <label for="ID_Rider" class="form-label">ID_Rider</label>
                <input type="ID_Rider" class="form-control" id="ID_Rider" name="ID_Rider">
            </div>
			<div class="text-center">
				<input type="submit" class="btn btn-primary" value="Ubah" />
			</div>
		</form>
	</div>
</div>

@stop
