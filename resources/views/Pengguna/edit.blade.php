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

        <h5 class="card-title fw-bolder mb-3">Ubah Data Pengguna</h5>

		<form method="post" action="{{ route('Pengguna.update', $data->ID_Pengguna) }}">
			@csrf
            <div class="mb-3">
                <label for="ID_Pengguna" class="form-label">ID Pengguna</label>
                <input type="text" class="form-control" id="ID_Pengguna" name="ID_Pengguna" value="{{ $data->ID_Pengguna }}">
            </div>
			<div class="mb-3">
                <label for="Nama_Pengguna" class="form-label">Nama Pengguna</label>
                <input type="text" class="form-control" id="Nama_Pengguna" name="Nama_Pengguna" value="{{ $data->Nama_Pengguna }}">
            </div>
            <div class="mb-3">
                <label for="Username" class="form-label">Username</label>
                <input type="text" class="form-control" id="Username" name="Username" value="{{ $data->Username }}">
            </div>
            <div class="mb-3">
                <label for="Password" class="form-label">Password</label>
                <input type="Password" class="form-control" id="Password" name="Password">
            </div>
			<div class="text-center">
				<input type="submit" class="btn btn-primary" value="Ubah" />
			</div>
		</form>
	</div>
</div>

@stop
