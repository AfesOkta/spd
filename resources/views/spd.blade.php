@extends('layout')
@section('page-title', 'SPD')
@section('page-title-desc', 'Data SPD')
@section('spd-menu', 'mm-active')
@php
	$m = ['01'=>'I','02'=>'II', '03'=>'III', '04'=>'IV', '05'=>'V', '06'=>'VI', '07'=>'VII', '08'=>'VIII', '09'=>'IX', '10'=>'X', '11'=>'XI', '12'=>'XII',];
@endphp
@section('content')
<div class="card col-12 mb-3">
	<div class="card-header">
		<button class="btn btn-primary btn-add" data-toggle="collapse" href="#form-section" role="button" aria-expanded="false" aria-controls="collapseExample" onclick="toggle_button_add('btn-batal-tambah-spd')" id="btn-tambah-spd">Tambah Spd</button>
		<button class="btn btn-danger btn-add" style="display: none;" data-toggle="collapse" href="#form-section" role="button" aria-expanded="false" aria-controls="collapseExample" onclick="toggle_button_add('btn-tambah-spd')" id="btn-batal-tambah-spd">Batal</button>
	</div>
	<div class="card-body collapse " id="form-section">
		<div class="card-body">
			<h6 class="card-title">Tambah SPD</h6>
			@if ($errors->any())
				<div class="alert alert-danger">
					<ul>
						@foreach ($errors->all() as $error)
							<li>{{ $error }}</li>
						@endforeach
					</ul>
				</div>
			@endif
			<form action="{{route('add-spd')}}" method="POST"> 
				@csrf
				<div id="accordion">
					<div class="card">
						<div class="card-header bg-secondary p-0" id="headingOne" style="height: 35px;" >
							<h6 class="mb-0">
								<button type="button" class="btn btn-sm btn-link text-white" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
									SPD
								</button>
							</h6>
						</div>

						<div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
							<div class="card-body">
								
								<div class="form-row">
									<div class="col-md-6">
										<label for="formSpd" class="">Nomor SPD</label>
										<div class="input-group mb-3">
											
											<div class="input-group-prepend">
												<button type="button" class="btn btn-default" disabled> <span id="nmrSpd">SPD /</span> </button>
											</div>
											<input name="nomor_spd" id="formSpd"  type="text" class="form-control col-2" value="{{old('nomor_spd')}}" required autocomplete="off">
											<input name="id_spd" id="formId" type="number"  value="{{old('id_spd')}}" hidden>
											<div class="input-group-append btn-group">
												<button type="button" class="btn btn-default" disabled>/{{$m[date('m')]}}/TUK.2.1/{{date('Y')}}</button>
												<button id="btn-search" type="button" class="btn btn-secondary"><i class="fa fa-search"></i></button>
												<button id="btn-print" type="button" class="btn btn-info"><i class="fa fa-print"></i></button>
											</div>
										</div>
									</div>
								</div>
								
								<div class="form-row">
									<div class="col-md-6">
										<div class="form-group">
											<label for="formTanggalSpd">Tanggal</label>
											<input type="text" id="formTanggalSpd" class="form-control datepicker" name="tanggal_spd">
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label for="formJenisSpd">Jenis SPD</label>
											<select type="text" id="formJenisSpd" class="form-control" name="jenis_spd" onchange="toggle_pengikut()">
												<option value="Rutin">Rutin</option>  <!-- tanpa pengikut -->
												<option value="Dalam Kota">Dalam Kota</option>
												<option value="PNBP">PNBP</option>
												<option value="Dukops">Dukops</option>
												<option value="Dikbangpes">Dikbangpes</option>
												<option value="Luar Negeri">Luar Negeri</option> <!-- tanpa pengikut -->
											</select>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="card">
						<div class="card-header bg-secondary p-0" id="headingAnggota" style="height: 35px;">
							<h6 class="mb-0">
								<button type="button" class="btn btn-sm btn-link text-white" data-toggle="collapse" data-target="#collapseAnggota" aria-expanded="true" aria-controls="collapseAnggota">
									Anggota
								</button>
							</h6>
						</div>

						<div id="collapseAnggota" class="collapse" aria-labelledby="headingAnggota" data-parent="#accordion">
							<div class="card-body">
								<div class="form-row">
									<div class="col-6 form-group">
										<label for="formNrp">NRP</label>
										<div class="input-group">
											<input type="number" class="form-control" id="formNRP">
											<div class="input-group-append" >
												<button type="button" 
												id="btn-search-anggota"
												class="btn btn-secondary" onclick="searchAnggota()"><i class="fa fa-search" ></i></button>
												<button
												type="button" 
												class="btn btn-secondary" data-target="#modal-search-anggota" data-toggle="modal">
													<i class="fa fa-book"></i>
												</button>
											</div>
										</div>
									</div>
									<div class="col-12">
										<div class="table-responsive">
										<table class="table" style="width: 100%;">
											<thead>
												<tr>
													<th>Nama</th>
													<th>Pangkat</th>
													<th>Golongan</th>
													<th>Status</th>
													<th>Jabatan</th>
													<th>Satker</th>
												</tr>
											</thead>
											<tbody id="dataAnggota">

											</tbody>
										</table>
										</div>
									</div>
								</div>
								<hr>
							</div>
						</div>
					</div>
					<div class="card">
						<div class="card-header bg-secondary p-0" id="headingKeterangan" style="height: 35px;">
							<h6 class="mb-0">
								<button type="button" class="btn btn-sm btn-link text-white" data-toggle="collapse" data-target="#collapseKeterangan" aria-expanded="true" aria-controls="collapseKeterangan">
									Keterangan
								</button>
							</h6>
						</div>

						<div id="collapseKeterangan" class="collapse" aria-labelledby="headingKeterangan" data-parent="#accordion">
							<div class="card-body">
								
								<div class="form-row">
									<div class="col-md-12 mb-2">
										<label for="formKeperluan">Keperluan</label>
										<textarea name="keperluan" id="formKeperluan" class="form-control"></textarea>
									</div>
								</div>
								<div class="form-row">
									<div class="col-md-6">
										<div class="form-group">
											<label for="formAsal">Asal SPD</label>
											<input type="text" name="asal_spd" class="form-control" value="Denpasar - Bali" required>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label for="formTujuan">Tujuan SPD</label>
											<select name="tujuan_spd" id="formTujuan" class="form-control">
												<option value="">---</option>
											</select>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="card">
						<div class="card-header bg-secondary p-0" id="headingWaktu" style="height: 35px;">
							<h6 class="mb-0">
								<button type="button" class="btn btn-sm btn-link text-white" data-toggle="collapse" data-target="#collapseWaktu" aria-expanded="true" aria-controls="collapseWaktu">
									Waktu
								</button>
							</h6>
						</div>

						<div id="collapseWaktu" class="collapse" aria-labelledby="headingWaktu" data-parent="#accordion">
							<div class="card-body">
								
								<div class="form-row">
									<div class="col-md-2">
										<div class="form-group">
											<label for="formLamaHari">Lama (Hari)</label>
											<input type="text" id="formLamaHari" name="tanggal_berangkat" class="form-control" value="" required readonly>
										</div>
									</div>
									<div class="col-md-5">
										<div class="form-group">
											<label for="formBerangkat">Berangkat</label>
											<input type="text" id="formBerangkat" name="tanggal_berangkat" class="form-control" value="" required>
										</div>
									</div>
									<div class="col-md-5">
										<div class="form-group">
											<label for="formKembali">Kembali</label>
											<input type="text" id="formKembali" name="tanggal_kembali" class="form-control" value="" required>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="card">
						<div class="card-header bg-secondary p-0" id="headingSprin" style="height: 35px;">
							<h6 class="mb-0">
								<button type="button" class="btn btn-sm btn-link text-white" data-toggle="collapse" data-target="#collapseSprin" aria-expanded="true" aria-controls="collapseSprin">
									Sprin
								</button>
							</h6>
						</div>

						<div id="collapseSprin" class="collapse" aria-labelledby="headingSprin" data-parent="#accordion">
							<div class="card-body">
								
								<div class="form-row">
									<div class="col-md-6">
										<div class="form-group">
											<label for="formSprin">Nomor Sprin</label>
											
											<input type="text" id="formSprin" name="no_sprin" class="form-control" value="Sprin/    /{{$m[date('m')]}}/DIK.2.3./{{date('Y')}}" required>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label for="formTglSprin">Tanggal Sprin</label>
											<input type="text" id="formTglSprin" name="tanggal_sprin" class="form-control" value="" required>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="card">
						<div class="card-header bg-secondary p-0" id="headingKeuangan" style="height: 35px;">
							<h6 class="mb-0">
								<button type="button" class="btn btn-sm btn-link text-white" data-toggle="collapse" data-target="#collapseKeuangan" aria-expanded="true" aria-controls="collapseKeuangan">
									Keuangan
								</button>
							</h6>
						</div>

						<div id="collapseKeuangan" class="collapse" aria-labelledby="headingKeuangan" data-parent="#accordion">
							<div class="card-body">
								
								<div class="form-row">
									<div class="col-md-6">
										<div class="form-group">
											<label for="formMataAnggaran">Mata Anggaran</label>
											<div class="input-group">
												<select name="mata_anggaran" id="formMataAnggarab" class="form-control">
													<option value=""> -------- ---</option>
												</select>
												<div class="input-group-append">
													<input type="text" id="formket" class="form-control" value="" readonly>
												</div>
											</div>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label for="formJenisPengeluaran">Jenis Pengeluaran</label>
											<input type="text" id="formJenisPengeluaran" class="form-control" value="" required>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="card" id="formPengikut" style="display: none;">
						<div class="card-header bg-secondary p-0" id="headingPengikut" style="height: 35px;">
							<h6 class="mb-0">
								<button type="button" class="btn btn-sm btn-link text-white" data-toggle="collapse" data-target="#collapsePengikut" aria-expanded="true" aria-controls="collapsePengikut">
									Pengikut
								</button>
							</h6>
						</div>

						<div id="collapsePengikut" class="collapse" aria-labelledby="headingPengikut" data-parent="#accordion">
							<div class="card-body">
								<button class="btn btn-info btn-sm mb-2 float-right">Tambah</button>
								<table class="table table-hover" style="width: 100%;">
									<thead>
										<tr>
											<th>No</th>
											<th>Nama</th>
											<th>NRP</th>
											<th>Pangkat/Golongan</th>
											<th>Lama</th>
										</tr>
									</thead>
								</table>
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
		<h4>Data SPD</h4>
	</div>
	<div class="card-body">
		<div class="table-responsive">
			<table class="mb-0 table table-hover datatable " >
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
			</table>
		</div>
	</div>
</div>


@endsection
@section('extra-modal')
<!-- Modal -->
<div class="modal fade" id="modal-search-anggota" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      	<div class="modal-header">
        	<h5 class="modal-title" id="exampleModalLabel">Tambah Satker</h5>
        	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
          		<span aria-hidden="true">&times;</span>
        	</button>
      	</div>
      	<div class="modal-body">
				<div class="table-responsive">
				<table class="table table-bordered table-hover datatable-search-anggota">
					<thead>
						<tr>
							<th>#</th>
							<th>Nama</th>
							<th>NRP/Pangkat</th>
							<th>Satker</th>
							<th>Add</th>
						</tr>
					</thead>
					<tbody>
						@php
						$n=1;
						@endphp
						@foreach ($personel as $anggota)
						<tr>
							<td>{{$n++}}</td>
							<td>{{$anggota->nama_personel}}</td>
							<td>{{$anggota->nrp}}/{{$anggota->pangkat->nama_pangkat}}</td>
							<td>{{$anggota->satker->nama_satker}}</td>
							<td>
								<button class="btn btn-primary btn-xs" data-dismiss="modal" onclick="addAnggota('{{$anggota->nrp}}')"><i class="fa fa-user-plus"></i></button>
							</td>
						</tr>
						@endforeach
					</tbody>
				</table>
				</div>
    	</div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Save changes</button>
        </div>
    </div>
  </div>
</div>
@endsection
@section('extra-js')

<script>
	function searchAnggota(){
		nrp = $('#formNRP').val();
		// do ajax request
		$.get("{{route('get-personel-data')}}", {nrp:nrp}, function(data){
			data = JSON.parse(data)
			console.log(data.pangkat);
			dataAnggota = "<tr><td>"+data.nama_personel+"</td><td>"+data.nrp+"/"+data.pangkat.nama_pangkat+"</td><td>"+data.status.nama_status+"</td><td>"+data.pangkat.golongan+"</td><td>"+data.jabatan+"</td><td>"+data.satker.nama_satker+"</td></tr>";
			$('#dataAnggota').html(dataAnggota)
		});
	}
	function toggle_button_add(btn){
		$('.btn-add').hide();
		console.log(btn)
		$('#'+btn).show();
	}
    function fill_edit(akun){
		$('#formAkun').val(akun);
        $('#btn-search').click();
        $('#formAkun').focus()
    }

	function addAnggota(nrp){
		var inputNrp = $('#formNRP').val(nrp);
		console.log(nrp);
		searchAnggota();
	}
	function toggle_pengikut(){
		let selected_val = $('#formJenisSpd').val();
		if(selected_val == 'Luar Negeri'){
			$('#nmrSpd').html('SPDLN / ')
		}else{
			$('#nmrSpd').html('SPD / ')
		}
		if(selected_val == 'Rutin' || selected_val == 'Luar Negeri'){
			$('#formPengikut').hide();
		}else{
			$('#formPengikut').show();
		}
	}


</script>
@endsection