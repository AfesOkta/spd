@extends('layout')
@section('page-title', 'Personel')
@section('page-title-desc', 'Data personel')
@section('personel-menu', 'mm-active')
@section('content')
<div class="card col-12 mb-3">
	<div class="card-body">
		<div class="card-body">
			<h5 class="card-title">Tambah Personel</h5>
			<form class=""> 
				@csrf
				<div class="form-row">
					<div class="col-md-6">
						<label for="formNRP" class="">NRP</label>
						<div class="input-group mb-3">
							<input name="nrp" id="formNRP"  type="text" class="form-control" required autocomplete="off">
							<div class="input-group-append">
								<button class="btn btn-secondary"><i class="fa fa-search"></i></button>
							</div>
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-row">
							<div class="col-md-6">
								<label for="formPangkat" class="">Pangkat</label>
								<div class="input-group mb-3">
									<select name="pangkat" id="formPangkat" class="form-control">
										<option value="pangkat">Pilih Pangkat</option>
										@foreach ($pangkat as $row)
										<option value="{{$row->id_pangkat}}">{{$row->nama_pangkat}}</option>
										@endforeach
									</select>
								</div>
							</div>
							<div class="col-md-6">
								<label for="formGolongan" class="">Golongan</label>
								<div class="input-group mb-3">
									<select name="golongan" id="formGolongan" class="form-control">
										<option value="Golongan">Pilih Golongan</option>
										@foreach ($golongan as $row)
										<option value="{{$row->id_golongan}}">{{$row->nama_golongan}}</option>
										@endforeach
									</select>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="form-row">
					<div class="col-md-6">
						<label for="formNama" class="">Nama</label>
						<div class="input-group mb-3">
							<input type="text" name="nama" id="formNama" class="form-control">
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
							<select name="satker" id="formSatker" class="form-control">
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
							<select name="status" id="formStatus" class="form-control">
								<option disabled selected>Pilih Status</option>
								@foreach ($status as $row)
									<option value="{{$row->id_status}}">{{$row->nama_status}}</option>
								@endforeach
							</select>
						</div>
					</div>
				</div>
				<button class="mt-2 btn btn-primary">Tambah</button>
			</form>
		</div>
	</div>
</div>
<div class="card col-12">
	<div class="card-header">
		<h4>Data Personel</h4>
	</div>
	<div class="card-body">
		<table class="mb-0 table table-hover">
			<thead>
				<tr>
					<th>#</th>
					<th>NRP</th>
					<th>Nama</th>
					<th>Pangkat</th>
					<th>Jabatan</th>
					<th>Golongan</th>
					<th>Satker</th>
					<th>Status</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<th scope="row">1</th>
					<td>12345678</td>
					<td>Otto</td>
					<td>AKP</td>
					<td>KABID HUMAS POLDA BALI</td>
					<td>IV/c</td>
					<td>BIDHUMAS</td>
					<td>POLRI</td>
				</tr>
			</tbody>
		</table>
	</div>
</div>
@endsection