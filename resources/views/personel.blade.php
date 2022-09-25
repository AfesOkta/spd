@extends('layout')
@section('page-title', 'Personel')
@section('page-title-desc', 'Data personel')
@section('personel-menu', 'mm-active')

@section('content')

<div class="card col-12">
	<div class="card-header d-flex flex-row justify-content-between">
		<h4 class="">Data Personel</h4>
		<div class="btn-group">
			<button type="button" class="btn btn-primary btn-sm float-right" data-toggle="modal" data-target="#modalAddPersonel">
				Tambah Personel
			</button>
			<a href="{{route('import-personel')}}" class="btn btn-success btn-sm float-right">
				<i class="fa fa-file-csv"></i>
			</a>
		</div>
	</div>
	<livewire:personel-index></livewire:personel-index>
</div>
@endsection

@section('extra-js')

<script>
	$('#btn-search').click(function(){
		nrp = $('#formNRP').val();
		console.log(nrp)
		// do ajax request
		$.get('{{route('get-personel-data')}}', {nrp:nrp}, function(data){
			data = JSON.parse(data);
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
		$('#formNRP').focus();

        $('#deletePersonelBtn').attr('href', "{{url('/')}}"+"/delete_personel/"+nrp)
	}
</script>
@endsection


@section('modal')
<!-- Modal -->
<form action="{{route('add-personel')}}" method="POST"> 
	<div class="modal fade" id="modalAddPersonel" tabindex="-1" aria-labelledby="modalAddPersonelLabel" aria-hidden="true">
		<div class="modal-dialog modal-xl">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="modalAddPersonelLabel">Tambah Personel</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">

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
				</div>
				<div class="modal-footer d-flex flex-row justify-content-between">

						<a 
						class="btn btn-sm text-danger"
						onclick="return confirm('Hapus Personel?')" 
						id="deletePersonelBtn" 
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