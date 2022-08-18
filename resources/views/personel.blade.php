@extends('layout')
@section('page-title', 'Personel')
@section('page-title-desc', 'Data personel')
@section('personel-menu', 'mm-active')
@section('content')
<div class="card col-12 mb-3">
	<div class="card-body">
		<div class="card-body">
			<h5 class="card-title">Tambah Personel</h5>
			@if ($errors->any())
				<div class="alert alert-danger">
					<ul>
						@foreach ($errors->all() as $error)
							<li>{{ $error }}</li>
						@endforeach
					</ul>
				</div>
			@endif
			<form action="{{route('add-personel')}}" method="POST"> 
				@csrf
				<div class="form-row">
					<div class="col-md-6">
						<label for="formNRP" class="">NRP</label>
						<div class="input-group mb-3">
							<input name="nrp" id="formNRP"  type="number" class="form-control" value="{{old('nrp')}}" required autocomplete="off">
							<div class="input-group-append">
								<button id="btn-search" type="button" class="btn btn-secondary"><i class="fa fa-search"></i></button>
							</div>
						</div>
					</div>
					<div class="col-md-6">
						<label for="formPangkat" class="">Pangkat | Golongan</label>
						<div class="input-group mb-3">
							<select name="id_pangkat" id="formPangkat" class="form-control">
								<option value="pangkat">Pilih Pangkat</option>
								@foreach ($pangkat as $row)
								<option value="{{$row->id_pangkat}}">{{$row->nama_pangkat}} | {{$row->golongan}}</option>
								@endforeach
							</select>
						</div>
					</div>
				</div>
				<div class="form-row">
					<div class="col-md-6">
						<label for="formNama" class="">Nama</label>
						<div class="input-group mb-3">
							<input type="text" name="nama_personel" value="{{old('nama_personel')}}" id="formNama" class="form-control">
						</div>
					</div>
					<div class="col-md-6">
						<label for="formJabatan" class="">Jabatan</label>
						<div class="input-group mb-3">
							<input type="text" name="jabatan" id="formJabatan" class="form-control">
						</div>
					</div>
				</div>
				<div class="form-row">
					<div class="col-md-6">
						<label for="formSatker" class="">Satker</label>
						<div class="input-group mb-3">
							<select name="id_satker" id="formSatker" class="form-control">
								<option  disabled selected>Pilih Satker</option>
								@foreach ($satker as $row)
									<option value="{{$row->id_satker}}">{{$row->nama_satker}}</option>
								@endforeach
							</select>
						</div>
					</div>
					<div class="col-md-6">
						<label for="formStatus" class="">Status</label>
						<div class="input-group mb-3">
							<select name="id_status" id="formStatus" class="form-control">
								<option disabled selected>Pilih Status</option>
								@foreach ($status as $row)
									<option value="{{$row->id_status}}">{{$row->nama_status}}</option>
								@endforeach
							</select>
						</div>
					</div>
				</div>
				<button type="submit" class="mt-2 btn btn-success">Simpan</button>
			</form>
		</div>
	</div>
</div>
<div class="card col-12">
	<div class="card-header">
		<h4>Data Personel</h4>
	</div>
	<div class="card-body">
		<table class="mb-0 table table-hover table-responsive datatable">
			<thead>
				<tr>
					<th>#</th>
					<th>NRP</th>
					<th>Nama</th>
					<th>Pangkat</th>
					<th>Golongan</th>
					<th>Jabatan</th>
					<th>Satker</th>
					<th>Status</th>
					<th>Aksi</th>
				</tr>
			</thead>
			<tbody>
				@php
					$n=1;
				@endphp
				@foreach ($personel as $row)
					<tr>
						<th scope="row">{{$n++}}</th>
						<td>{{$row->nrp}}</td>
						<td>{{$row->nama_personel}}</td>
						<td>{{$row->pangkat?$row->pangkat->nama_pangkat:''}}</td>
						<td>{{$row->pangkat?$row->pangkat->golongan:''}}</td>
						<td>{{$row->jabatan}}</td>
						<td>{{$row->satker?$row->satker->nama_satker:''}}</td>
						<td>{{$row->status?$row->status->nama_status:''}}</td>
						<td nowrap>
							<button class="btn btn-warning btn-sm" onclick="fill_edit('{{$row->nrp}}')">
								<i class="fa fa-edit"></i>
							</button>
							<a 
								class="btn btn-danger btn-sm"
								onclick="return confirm('Hapus Personel?')" 
								href="{{route('delete-personel', ['nrp' => $row->nrp ])}}"><i class="fa fa-trash"></i></a>
						</td>
					</tr>
				@endforeach
			</tbody>
		</table>
	</div>
</div>
@endsection

@section('extra-js')

<script>
	$('#btn-search').click(function(){
		nrp = $('#formNRP').val();
		console.log(nrp)
		// do ajax request
		$.get('{{route('get-personel-data')}}', {nrp:nrp}, function(data){
			$('#formPangkat').val(data.id_pangkat);
			$('#formGolongan').val(data.id_golongan);
			$('#formNama').val(data.nama_personel);
			$('#formJabatan').val(data.jabatan);
			$('#formSatker').val(data.id_satker);
			$('#formStatus').val(data.id_status);
		});
	});

	
    function fill_edit(nrp){
		$('#formNRP').val(nrp);
        $('#btn-search').click();
        $('#formNRP').focus()
    }
</script>
@endsection