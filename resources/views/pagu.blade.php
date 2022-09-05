@extends('layout')
@section('page-title', 'Pagu')
@section('page-title-desc', 'Data Pagu')
@section('pagu-menu', 'mm-active')
@section('content')
			@if ($errors->any())
<div class="card col-12 mb-3">
	<div class="card-body">
				<div class="alert alert-danger">
					<ul>
						@foreach ($errors->all() as $error)
							<li>{{ $error }}</li>
						@endforeach
					</ul>
				</div>
	</div>
</div>
			@endif
<div class="card col-12">
	<div class="card-header d-flex flex-row justify-content-between">
		<h4>Data Pagu</h4>
		<button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modalAddPagu">Tambah Pagu</button>
	</div>
	<div class="card-body">
		<table class="mb-0 table table-hover datatable" >
			<thead>
				<tr>
					<th class="text-sm p-2 m-0">#</th>
					<th class="text-sm p-2 m-0">Akun</th>
					<th class="text-sm p-2 m-0">Pagu</th>
					<th class="text-sm p-2 m-0">Realisasi</th>
					<th class="text-sm p-2 m-0">Sisa</th>
					<th class="text-sm p-2 m-0">Keterangan</th>
					<th class="text-sm p-2 m-0">Aksi</th>
				</tr>
			</thead>
			<tbody>
				@php
					$n=1;
				@endphp
				@foreach ($pagu as $row)
					<tr>
						<td class="text-sm p-0 m-0" scope="row">{{$n++}}</td>
						<td class="text-sm p-0 m-0">{{$row->akun}}</td>
						<td class="text-sm p-0 m-0">Rp. {{number_format($row->pagu, 0,',','.')}},-</td>
						<td class="text-sm p-0 m-0">Rp. {{number_format($row->realisasi, 0,',','.')}},-</td>
						<td class="text-sm p-0 m-0">Rp. {{number_format($row->sisa, 0,',','.')}},-</td>
						<td class="text-sm p-0 m-0">{{$row->ket}}</td>
						<td class="text-sm p-0 m-0">
                            
							<button 
								onclick="fill_edit('{{$row->akun}}', '{{$row->id_pagu}}')"
                                class="btn btn-sm btn-primary" data-toggle="modal" data-target="#modalAddPagu"><i class="fa fa-edit"></i></button>
						</td>
					</tr>
				@endforeach
			</tbody>
		</table>
	</div>
</div>
@endsection

@section('modal')
<!-- Modal -->
<form action="{{route('add-pagu')}}" method="POST"> 
	@csrf
	<div class="modal fade" id="modalAddPagu" tabindex="-1" aria-labelledby="modalAddPaguLabel" aria-hidden="true">
		<div class="modal-dialog modal-xl">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="modalAddPaguLabel">Tambah Pagu</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					
				<div class="form-row">
					<div class="col-md-4">
						<label for="formAkun" class="">Akun</label>
						<div class="input-group mb-3">
							<input name="akun" id="formAkun"  type="text" class="form-control" value="{{old('akun')}}" required autocomplete="off">
							<input name="id_pagu" id="formId" type="number"  value="{{old('id_pagu')}}" hidden>
							<div class="input-group-append">
								<button id="btn-search" type="button" class="btn btn-secondary"><i class="fa fa-search"></i></button>
							</div>
						</div>
					</div>
				</div>
				<div class="form-row">
					<div class="col-md-4">
						<label for="formPagu" class="">Pagu</label>
						<div class="input-group mb-3">
							<input type="number" name="pagu" value="{{old('pagu')?old('pagu'):'0'}}" id="formPagu" class="form-control" required>
						</div>
					</div>
                    <div class="col-md-4">
						<label for="formRealisasi" class="">Realisasi</label>
						<div class="input-group mb-3">
							<input name="realisasi" id="formRealisasi"  type="number" class="form-control" value="{{old('realisasi')?old('realisasi'):'0'}}" autocomplete="off">
						</div>
					</div>
                    <div class="col-md-4">
						<label for="formSisa" class="">Sisa</label>
						<div class="input-group mb-3">
							<input name="sisa" id="formSisa"  type="number" class="form-control" value="{{old('sisa')?old('sisa'):'0'}}" autocomplete="off" readonly>
						</div>
					</div>
                </div>
                <div class="from-row">
                    <div class="col-md-8 p-0">
						<label for="formKet" class="">Keterangan</label>
						<div class="input-group mb-3">
							<textarea name="ket" id="formKet" class="form-control" value="{{old('ket')}}"></textarea>
						</div>
					</div>
				</div>
				</div>
				<div class="modal-footer d-flex flex-row justify-content-between">

					<a 
					class="btn btn-sm text-danger"
					onclick="return confirm('Hapus Pagu?')" 
					id="deletePaguBtn" 
					href="">Hapus</a>
					<div class="btn-group">
						<button type="submit" class=" btn btn-success">Simpan</button>
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					</div>
				</div>
			</div>
		</div>
	</div>
</form>

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
	$('#modalAddPagu').on('hide.bs.modal', function(){
		$('#formId').val('');
			$('#formPagu').val('');
			$('#formRealisasi').val('');
			$('#formSisa').val('');
			$('#formKet').val('');
	});
    function fill_edit(akun, id){
		$('#formAkun').val(akun);
        $('#btn-search').click();
        $('#formAkun').focus()

		$('#deletePaguBtn').attr('href', "{{url('/')}}"+"/delete_pagu/"+id)

    }
</script>
@endsection