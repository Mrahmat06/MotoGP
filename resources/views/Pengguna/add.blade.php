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

        <h5 class="card-title fw-bolder mb-3">Tambah Pengguna</h5>

		<form method="post" action="{{ route('Pengguna.store') }}">
			@csrf
            <div class="mb-3">
                <label for="ID_Pengguna" class="form-label">ID Pengguna</label>
                <input type="text" class="form-control" ID="ID_Pengguna" name="ID_Pengguna">
            </div>
			<div class="mb-3">
                <label for="Nama_Pengguna" class="form-label">Nama Pengguna</label>
                <input type="text" class="form-control" ID="Nama_Pengguna" name="Nama_Pengguna">
            </div>
            <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input type="text" class="form-control" ID="Username" name="Username">
            </div>
            <div class="mb-3">
                <label for="Password" class="form-label">Password</label>
                <input type="Password" class="form-control" ID="Password" name="Password">
            </div>
			<div class="text-center">
				<input type="submit" class="btn btn-primary" value="Tambah" />
			</div>
		</form>
	</div>
</div>

@stop
