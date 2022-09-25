@section('modal')
@section('styles')
<style>
    .card-header {
        height: 2.5rem;
    }
    .card-body {    
        padding: 0.3rem;
    }
    .modal-body {        
        padding: 0.25rem;
    }
</style>
@endsection
<!-- Modal -->
<form action="{{route('add-spd')}}" method="POST"> 
	<div class="modal fade" id="modalAddSPD" tabindex="-1" aria-labelledby="modalAddSPDLabel" aria-hidden="true">
		<div class="modal-dialog modal-xl">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="modalAddSPDLabel">Tambah Personel</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">

					@csrf

					<div class="card mb-1">
						<div class="card-header">
							<h4>SPD</h4>
						</div>
						<div class="card-body">
							<div class="form-row">
								<div class="col-md-8 col-lg-6">
									<label for="formSpd" class="">Nomor SPD</label>
									<div class="input-group mb-3">

										<div class="input-group-prepend">
											<input type="text" 
											class="form-control input-sm" 
											value="SPD/"
											id="nmrSpd"
											size="5" />
										</div>
										<input name="no_spd" id="formSpd"  type="text" class="form-control col-2" value="{{old('no_spd')?old('no_spd'):$next_no_spd}}" required autocomplete="off">
										<input name="id_spd" id="formId" type="number"  value="{{old('id_spd')}}" hidden>
										<div class="input-group-append">
											<input class="form-control" value="/{{$m[date('m')]}}/TUK.2.1/{{date('Y')}}" id="spdComp" />
											<div class="btn-group">
												<button id="btn-search" type="button" class="btn btn-secondary" onClick="fill_edit()"><i class="fa fa-search" ></i></button>
												<button id="btn-print" type="button" class="btn btn-primary"><i class="fa fa-print"></i></button>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="form-row">
								<div class="col-md-6">
									<div class="form-group">
										<label for="formTanggalSpd">Tanggal</label>
										<input type="text" id="formTanggalSpd" value="{{old('tanggal_spd')}}" class="form-control datepicker" name="tanggal_spd" required>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label for="formJenisSpd">Jenis SPD</label>
										<select type="text" id="formJenisSpd" class="form-control" name="jenis_spd" onchange="toggle_pengikut()">
											<option {{old('tanggal_spd')=='Rutin'?'selected':''}} value="Rutin">Rutin</option>  <!-- tanpa pengikut -->
											<option {{old('tanggal_spd')=='Dalam Kota'?'selected':''}} value="Dalam Kota">Dalam Kota</option>
											<option {{old('tanggal_spd')=='PNBP'?'selected':''}} value="PNBP">PNBP</option>
											<option {{old('tanggal_spd')=='Dukops'?'selected':''}} value="Dukops">Dukops</option>
											<option {{old('tanggal_spd')=='Dikbangpes'?'selected':''}} value="Dikbangpes">Dikbangpes</option>
											<option {{old('tanggal_spd')=='Luar Negeri'?'selected':''}} value="Luar Negeri">Luar Negeri</option> <!-- tanpa pengikut -->
										</select>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="card mb-1">
						<div class="card-header">
							<h4>Anggota</h4>
						</div>
						<div class="card-body">
							<div class="form-row">
								<div class="col-6 form-group">
									<label for="formNRP">NRP</label>
									<div class="input-group">
										<input type="number" name="nrp" class="form-control" id="formNRP"  required>
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
												<th>Pangkat/NRP</th>
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
					</div>
				</div>


				<div class="card mb-1">
					<div class="card-header">
						<h4>Keterangan</h4>
					</div>
					<div class="card-body">
						<div class="form-row">
							<div class="col-md-12 mb-1">
								<label for="formKeperluan">Keperluan</label>
								<textarea name="keperluan" id="formKeperluan" class="form-control" required>{{old('keperluan')}}</textarea>
							</div>
						</div>
						<div class="form-row">
							<div class="col-md-6">
								<div class="form-group">
									<label for="formAsal">Asal SPD</label>
									<input 
									type="text" 
									name="asal_spd"
									class="form-control" 
									value="@if(old('asal_spd')) {{old('asal_spd')}} @else  Denpasar - Bali @endif" 
									required>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label for="formTujuan">Tujuan SPD</label>
									<select name="tujuan_spd" id="formTujuan" class="form-control" required>
										<option value="" selected disabled>--Pilih Tujuan--</option>
										@foreach ($tujuan as $row)
										<option @if(old('tujuan_spd') == $row->id_tujuan) selected @endif  value="{{$row->id_tujuan}}">{{$row->nama_tujuan}}</option>											
										@endforeach
									</select>
								</div>
							</div>
						</div>
					</div>
				</div>


				<div class="card mb-1">
					<div class="card-header">
						<h4>Waktu</h4>
					</div>
					<div class="card-body">
						<div class="form-row">
							<div class="col-md-2">
								<div class="form-group">
									<label for="formLamaHari">Lama (Hari)</label>
									<input type="text" id="formLamaHari" class="form-control"  readonly>
								</div>
							</div>
							<div class="col-md-5">
								<div class="form-group">
									<label for="formBerangkat">Berangkat</label>
									<input type="text" onchange="calculate_day()" id="formBerangkat" name="tanggal_berangkat" value="{{old('tanggal_berangkat')}}" class="form-control datepicker-int"  required>
								</div>
							</div>
							<div class="col-md-5">
								<div class="form-group">
									<label for="formKembali">Kembali</label>
									<input type="text" onchange="calculate_day()" id="formKembali" name="tanggal_kembali" value="{{old('tanggal_kembali')}}" class="form-control datepicker-int"  required>
								</div>
							</div>
						</div>
					</div>
				</div>

				<div class="card mb-1">
					<div class="card-header">
						<h4>Sprin</h4>
					</div>
					<div class="card-body">
						<div class="form-row">
							<div class="col-md-6">
								<div class="form-group">
									<label for="formSprin">Nomor Sprin</label>

									<input type="text" id="formSprin" name="no_sprin" class="form-control" 
									value="@if(old('no_sprin')) {{old('no_sprin')}} @else Sprin/    /    /    /{{date('Y')}}@endif" required>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label for="formTglSprin">Tanggal Sprin</label>
									<input type="text" id="formTglSprin" name="tanggal_sprin" class="form-control datepicker" value="@if(old('tanggal_sprin')) {{old('tanggal_sprin')}} @endif" required>
								</div>
							</div>
						</div>
					</div>
				</div>


				<div class="card mb-1">
					<div class="card-header">
						<h4>Keuangan</h4>
					</div>
					<div class="card-body">
						<div class="form-row">
							<div class="col-md-8">
								<div class="form-group">
									<label for="formMataAnggaran">Mata Anggaran</label>
									<div class="input-group">
										<select name="mata_anggaran" id="formMataAnggaran" class="form-control" onchange="replace_ket_mata_anggaran()" required>
											<option selected disabled>--Pilih Mata Anggaran --</option>
											@foreach ($pagu as $row)
											<option @if(old('mata_anggaran')== $row->id_pagu) selected @endif() value="{{$row->id_pagu}}">{{$row->akun}}</option>
											@endforeach
										</select>
										<div class="input-group-append">
											<input type="text" id="formKetMataAnggaran" class="form-control" value="" readonly>
										</div>
									</div>
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<label for="formJenisPengeluaran">Jenis Pengeluaran</label>
									<input type="text" name="jenis_pengeluaran" id="formJenisPengeluaran" class="form-control" value="" required>
								</div>
							</div>
						</div>
					</div>
				</div>

				<div class="card mb-1 hidden" id="formPengikut">
					<div class="card-header d-flex flex-row justify-content-between">
						<h4>Pengikut</h4>
						<button data-target="#modal-search-pengikut" type="button" data-toggle="modal" class="btn btn-primary btn-sm mb-1 float-right">Tambah</button>
					</div>
					<div class="card-body">
						<table class="table table-hover" style="width: 100%;">
						<thead>
							<tr>
								<th>Nama</th>
								<th>NRP</th>
								<th>Pangkat/Golongan</th>
								<th>Jabatan</th>
								<th>Lama</th>
								<th>Aksi</th>
							</tr>
						</thead>
						<tbody id="daftarPengikut">

						</tbody>
					</table>
					</div>
				</div>

			</div>
			<div class="modal-footer d-flex flex-row justify-content-between">

				<a 
				class="btn btn-sm text-danger"
				onclick="return confirm('Hapus Spd?')" 
				id="deleteSpdBtn" 
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