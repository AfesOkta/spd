@extends('layout')
@section('page-title', 'SPD')
@section('page-title-desc', 'Data SPD')
@section('spd-menu', 'mm-active')
@section('content')
<div class="card col-12 mb-3">
	<div class="card-header">
		<button class="btn btn-primary btn-add" data-toggle="collapse" href="#form-section" role="button" aria-expanded="false" aria-controls="collapseExample" onclick="toggle_button_add('btn-batal-tambah-spd')" id="btn-tambah-spd">Tambah Spd</button>
		<button class="btn btn-danger btn-add" style="display: none;" data-toggle="collapse" href="#form-section" role="button" aria-expanded="false" aria-controls="collapseExample" onclick="toggle_button_add('btn-tambah-spd')" id="btn-batal-tambah-spd">Batal</button>
	</div>
	<div class="card-body collapse " id="form-section">
		<div class="card-body">
			<h5 class="card-title">Tambah SPD</h5>
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
						<div class="card-header bg-primary" id="headingOne">
							<h5 class="mb-0">
								<button class="btn btn-link text-white" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
									SPD
								</button>
							</h5>
						</div>

						<div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
							<div class="card-body">
								
								<div class="form-row">
									<div class="col-md-6">
										<label for="formSpd" class="">Nomor SPD</label>
										<div class="input-group mb-3">
											
											<div class="input-group-prepend">
												<button class="btn btn-default" disabled>SPD / </button>
											</div>
											<input name="nomor_spd" id="formSpd"  type="text" class="form-control" value="{{old('nomor_spd')}}" required autocomplete="off">
											<input name="id_spd" id="formId" type="number"  value="{{old('id_spd')}}" hidden>
											<div class="input-group-append btn-group">
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
											<select type="text" id="formJenisSpd" class="form-control" name="jenis_spd">
												<option value="">---</option>
											</select>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="card">
						<div class="card-header bg-primary" id="headingAnggota">
							<h5 class="mb-0">
								<button class="btn btn-link text-white" data-toggle="collapse" data-target="#collapseAnggota" aria-expanded="true" aria-controls="collapseAnggota">
									Anggota
								</button>
							</h5>
						</div>

						<div id="collapseAnggota" class="collapse" aria-labelledby="headingAnggota" data-parent="#accordion">
							<div class="card-body">
								<div class="form-row">
									<div class="col-6 form-group">
										<label for="formNrp">NRP</label>
										<div class="input-group">
											<input type="number" class="form-control">
											<div class="input-group-append">
												<button class="btn btn-secondary"><i class="fa fa-search"></i></button>
											</div>
										</div>
									</div>
									<div class="col-12">
										<table class="table">
											<tr>
												<th>Nama</th>
												<th>Pangkat</th>
												<th>Golongan</th>
												<th>Status</th>
												<th>Jabatan</th>
												<th>Satker</th>
											</tr>
											<tr>
												<td>Nama</td>
												<td>Pangkat</td>
												<td>Golongan</td>
												<td>Status</td>
												<td>Jabatan</td>
												<td>Satker</td>
											</tr>
										</table>
									</div>
								</div>
								<hr>
							</div>
						</div>
					</div>
					<div class="card">
						<div class="card-header bg-primary" id="headingKeterangan">
							<h5 class="mb-0">
								<button class="btn btn-link text-white" data-toggle="collapse" data-target="#collapseKeterangan" aria-expanded="true" aria-controls="collapseKeterangan">
									Keterangan
								</button>
							</h5>
						</div>

						<div id="collapseKeterangan" class="collapse" aria-labelledby="headingKeterangan" data-parent="#accordion">
							<div class="card-body">
								
								<div class="form-row">
									<div class="col-md-7">
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
						<div class="card-header bg-primary" id="headingWaktu">
							<h5 class="mb-0">
								<button class="btn btn-link text-white" data-toggle="collapse" data-target="#collapseWaktu" aria-expanded="true" aria-controls="collapseWaktu">
									Waktu
								</button>
							</h5>
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
						<div class="card-header bg-primary" id="headingSprin">
							<h5 class="mb-0">
								<button class="btn btn-link text-white" data-toggle="collapse" data-target="#collapseSprin" aria-expanded="true" aria-controls="collapseSprin">
									Sprin
								</button>
							</h5>
						</div>

						<div id="collapseSprin" class="collapse" aria-labelledby="headingSprin" data-parent="#accordion">
							<div class="card-body">
								
								<div class="form-row">
									<div class="col-md-6">
										<div class="form-group">
											<label for="formSprin">Nomor Sprin</label>
											@php
												$m = ['01'=>'I','02'=>'II', '03'=>'III', '04'=>'IV', '05'=>'V', '06'=>'VI', '07'=>'VII', '08'=>'VIII', '09'=>'IX', '10'=>'X', '11'=>'XI', '12'=>'XII',];
											@endphp
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
						<div class="card-header bg-primary" id="headingKeuangan">
							<h5 class="mb-0">
								<button class="btn btn-link text-white" data-toggle="collapse" data-target="#collapseKeuangan" aria-expanded="true" aria-controls="collapseKeuangan">
									Keuangan
								</button>
							</h5>
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
				@foreach ($spd as $row)
					<tr>
						<th scope="row">{{$n++}}</th>
						<td>
                            
							<button 
								onclick="fill_edit('{{$row->nrp}}')"
                                class="btn btn-sm btn-warning" ><i class="fa fa-edit"></i></button>
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
</script>
@endsection