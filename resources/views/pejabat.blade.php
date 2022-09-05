@extends('layout')
@section('page-title', 'Pejabat')
@section('page-title-desc', 'Data Pejabat')
@section('pejabat-menu', 'mm-active')
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
		<h4>Data Pejabat</h4>
		<button class="btn btn-sm btn-primary" data-toggle="modal" data-target="#modalAddPejabat">Tambah Pejabat</button>
	</div>
	<div class="card-body table-responsive">
		<table class="mb-0 table table-hover datatable">
			<thead>
				<tr>
					<th class="text-sm p-0 m-0">#</th>
					<th class="text-sm p-0 m-0">Nama</th>
					<th class="text-sm p-0 m-0">Pangkat</th>
					<th class="text-sm p-0 m-0">NRP</th>
					<th class="text-sm p-0 m-0">Jabatan Struktural</th>
					<th class="text-sm p-0 m-0">Jabatan Keuangan</th>
					<th class="text-sm p-0 m-0">Aksi</th>
				</tr>
			</thead>
			<tbody>
				@php
				$n=1;
				@endphp
				@foreach ($pejabat as $row)
				<tr>
					<th  class="text-lg p-0 m-0" scope="row">{{$n++}}</th>
					<td class="text-lg p-0 m-0" >{{$row->personel->nama_personel}}</td>
					<td class="text-lg p-0 m-0" >{{$row->personel->pangkat->nama_pangkat}}</td>
					<td class="text-lg p-0 m-0" >{{$row->personel->nrp}}</td>
					<td class="text-lg p-0 m-0" >{{$row->struktural}}</td>
					<td class="text-lg p-0 m-0" >{{$row->keuangan}}</td>
					<td class="text-lg p-0 m-0" >

						<button 
						onclick="fill_edit('{{$row->nrp}}', '{{$row->id_pejabat}}')"
						class="btn btn-sm btn-primary"  data-toggle="modal" data-target="#modalAddPejabat" ><i class="fa fa-edit"></i></button>
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
			$('#formStruktural').val(data.jabatan);
			$('#formKeuangan').val(data.keuangan);
		});
	});

	function fill_edit(nrp, id){
		$('#formNRP').val(nrp);
		$('#btn-search').click();
		$('#formNRP').focus()

		$('#deletePejabatBtn').attr('href', "{{url('/')}}"+"/delete_pejabat/"+id)
	}

	$('#modalAddPejabat').on('hide.bs.modal', function(){
		$('#formNRP').val('');
		$('#formPangkat').val('');
		$('#formNama').val('');
		$('#formStruktural').val('');
		$('#formKeuangan').val('');
	})
</script>
@endsection


@section('modal')
<!-- Modal -->
<form action="{{route('add-pejabat')}}" method="POST"> 
	@csrf
	<div class="modal fade" id="modalAddPejabat" tabindex="-1" aria-labelledby="modalAddPejabatLabel" aria-hidden="true">
		<div class="modal-dialog modal-xl">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="modalAddPejabatLabel">Tambah Pejabat</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
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
								<select name="keuangan" id="formKeuangan"  class="form-control" value="{{old('keuangan')}}" >
									<option {{old('keuangan')=='KUASA PENGGUNA ANGGARAN'?'selected':''}} value="KUASA PENGGUNA ANGGARAN">KUASA PENGGUNA ANGGARAN</option>
									<option {{old('keuangan')=='PEJABAT PEMBUAT KOMITMEN'?'selected':''}} value="PEJABAT PEMBUAT KOMITMEN">PEJABAT PEMBUAT KOMITMEN</option>
									<option {{old('keuangan')=='BENDAHARA PENGELUARAN SPRIPIM POLDA BALI'?'selected':''}} value="BENDAHARA PENGELUARAN SPRIPIM POLDA BALI">BENDAHARA PENGELUARAN SPRIPIM POLDA BALI</option>
								</select>
							</div>
						</div>
					</div>
					
				</div>
				<div class="modal-footer d-flex flex-row justify-content-between">

					<a 
					class="btn btn-sm text-danger"
					onclick="return confirm('Hapus Pejabat?')" 
					id="deletePejabatBtn" 
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