@extends('layout')
@section('page-title', 'Pejabat')
@section('page-title-desc', 'Data Pejabat')
@section('pejabat-menu', 'mm-active')
@section('content')
<div class="card col-12 mb-3">
	<div class="card-body">
		<div class="card-body">
			<h5 class="card-title">Tambah Pejabat</h5>
			@if ($errors->any())
				<div class="alert alert-danger">
					<ul>
						@foreach ($errors->all() as $error)
							<li>{{ $error }}</li>
						@endforeach
					</ul>
				</div>
			@endif
			<form action="{{route('add-pejabat')}}" method="POST"> 
				@csrf
				<div class="form-row">
					<div class="col-md-4">
						<label for="formNRP" class="">NRP</label>
						<div class="input-group mb-3">
							<input name="nrp" id="formNRP"  type="number" class="form-control" value="{{old('nrp')}}" required autocomplete="off">
							<div class="input-group-append">
								<button id="btn-search" type="button" class="btn btn-secondary"><i class="fa fa-search"></i></button>
							</div>
						</div>
					</div>
					<div class="col-md-4">
						<label for="formNama" class="">Nama</label>
						<div class="input-group mb-3">
							<input type="text" name="nama_personel" value="{{old('nama_personel')}}" id="formNama" class="form-control" readonly required>
						</div>
					</div>
					<div class="col-md-4">
                        <label for="formPangkat" class="">Pangkat</label>
                        <div class="input-group mb-3">
                            <select name="id_pangkat" id="formPangkat" class="form-control" disabled require>
                                <option value="pangkat">---</option>
                                @foreach ($pangkat as $row)
                                <option value="{{$row->id_pangkat}}">{{$row->nama_pangkat}}</option>
                                @endforeach
                            </select>
                        </div>
					</div>
				</div>
				<div class="form-row">
                    <div class="col-md-4">
						<label for="formStruktural" class="">Jabatan Struktural</label>
						<div class="input-group mb-3">
							<input name="struktural" id="formStruktural"  type="text" class="form-control" value="{{old('struktural')}}" autocomplete="off">
						</div>
					</div>
                    <div class="col-md-4">
						<label for="formKeuangan" class="">Jabatan Keuangan</label>
						<div class="input-group mb-3">
							<input name="keuangan" id="formKeuangan"  type="text" class="form-control" value="{{old('keuangan')}}" autocomplete="off">
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
		<h4>Data Pejabat</h4>
	</div>
	<div class="card-body table-responsive">
		<table class="mb-0 table table-hover datatable">
			<thead>
				<tr>
					<th>#</th>
					<th>Nama</th>
					<th>Pangkat</th>
					<th>NRP</th>
					<th>Jabatan Struktural</th>
					<th>Jabatan Keuangan</th>
					<th>Aksi</th>
				</tr>
			</thead>
			<tbody>
				@php
					$n=1;
				@endphp
				@foreach ($pejabat as $row)
					<tr>
						<th scope="row">{{$n++}}</th>
						<td>{{$row->personel->nama_personel}}</td>
						<td>{{$row->personel->pangkat->nama_pangkat}}</td>
						<td>{{$row->personel->nrp}}</td>
						<td>{{$row->struktural}}</td>
						<td>{{$row->keuangan}}</td>
						<td>
                            
							<button 
								onclick="fill_edit('{{$row->nrp}}')"
                                class="btn btn-sm btn-warning" ><i class="fa fa-edit"></i></button>
							<a 
                                class="btn btn-sm btn-danger"
								onclick="return confirm('Hapus Pejabat?')" 
								href="{{route('delete-pejabat', ['id' => $row->id_pejabat ])}}"><i class="fa fa-trash"></i></a>
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
		$.get('{{route('get-pejabat-data')}}', {nrp:nrp}, function(data){
			$('#formPangkat').val(data.id_pangkat);
			$('#formNama').val(data.nama_personel);
			$('#formStruktural').val(data.struktural);
			$('#formKeuangan').val(data.keuangan);
		});
	});

    function fill_edit(nrp){
		$('#formNRP').val(nrp);
        $('#btn-search').click();
        $('#formNRP').focus()
    }
</script>
@endsection