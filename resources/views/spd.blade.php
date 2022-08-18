@extends('layout')
@section('page-title', 'SPD')
@section('page-title-desc', 'Data SPD')
@section('spd-menu', 'mm-active')
@section('content')
<div class="card col-12 mb-3">
	<div class="card-body">
		<div class="card-body">
			<h5 class="card-title">Tambah Pagu</h5>
			@if ($errors->any())
				<div class="alert alert-danger">
					<ul>
						@foreach ($errors->all() as $error)
							<li>{{ $error }}</li>
						@endforeach
					</ul>
				</div>
			@endif
			<form action="{{route('add-pagu')}}" method="POST"> 
				@csrf
				<div class="form-row">
					<div class="col-md-4">
						<label for="formAkun" class="">Akun</label>
						<div class="input-group mb-3">
							<input name="akun" id="formAkun"  type="text" class="form-control" value="{{old('akun')}}" required autocomplete="off">
							<input name="id_pagu" id="formId" type="number"  value="{{old('id_akun')}}" hidden>
							<div class="input-group-append">
								<button id="btn-search" type="button" class="btn btn-secondary"><i class="fa fa-search"></i></button>
							</div>
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
	<div class="card-body">
		<table class="mb-0 table table-hover datatable" >
			<thead>
				<tr>
					<th>#</th>
					<th>Akun</th>
					<th>Pagu</th>
					<th>Realisasi</th>
					<th>Sisa</th>
					<th>Keterangan</th>
					<th>Aksi</th>
				</tr>
			</thead>
			<tbody>
				@php
					$n=1;
				@endphp
				@foreach ($pagu as $row)
					<tr>
						<th scope="row">{{$n++}}</th>
						<td>{{$row->akun}}</td>
						<td>Rp. {{number_format($row->pagu, 0,',','.')}},-</td>
						<td>Rp. {{number_format($row->realisasi, 0,',','.')}},-</td>
						<td>Rp. {{number_format($row->sisa, 0,',','.')}},-</td>
						<td>{{$row->ket}}</td>
						<td>
                            
							<button 
								onclick="fill_edit('{{$row->akun}}')"
                                class="btn btn-sm btn-warning" ><i class="fa fa-edit"></i></button>
							<a 
                                class="btn btn-sm btn-danger"
								onclick="return confirm('Hapus Pagu?')" 
								href="{{route('delete-pagu', ['id' => $row->id_pagu ])}}"><i class="fa fa-trash"></i></a>
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
		akun = $('#formAkun').val();
		// do ajax request
		$.get('{{route('get-pagu-data')}}', {akun:akun}, function(data){

			$('#formId').val(data.id_pagu);
			$('#formPagu').val(parseInt(data.pagu));
			$('#formRealisasi').val(parseInt(data.realisasi));
			$('#formSisa').val(parseInt(data.sisa));
			$('#formKet').val(data.ket);
            console.log(data)
		});
	});

    function fill_edit(akun){
		$('#formAkun').val(akun);
        $('#btn-search').click();
        $('#formAkun').focus()
    }
</script>
@endsection