@extends('layout')
@section('page-title', 'SPD')
@section('page-title-desc', 'Data SPD')
@section('spd-menu', 'mm-active')
@php
	$m = ['01'=>'I','02'=>'II', '03'=>'III', '04'=>'IV', '05'=>'V', '06'=>'VI', '07'=>'VII', '08'=>'VIII', '09'=>'IX', '10'=>'X', '11'=>'XI', '12'=>'XII',];
@endphp

@include('components.spd_modal')
@section('content')
		@if ($errors->any())
<div class="card">
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
		<h4>Data SPD</h4>
		<button class="btn btn-sm btn-primary" data-toggle="modal" data-target="#modalAddSPD">Tambah SPD</button>
	</div>
	<div class="card-body">
		<div class="table-responsive">
			<table class="mb-0 table table-sm table-striped table-bordered datatable " >
				<thead>
					<tr>
						<th class="text-sm p-2 text-center m-0">#</th>
						<th class="text-sm p-2 text-center m-0">SPD</th>
						<th class="text-sm p-2 text-center m-0">Anggota</th>
						<th class="text-sm p-2 text-center m-0">Keterangan</th>
						<th class="text-sm p-2 text-center m-0">Waktu</th>
						<th class="text-sm p-2 text-center m-0">Pengikut</th>
						<th class="text-sm p-2 text-center m-0">Aksi</th>
					</tr>
				</thead>
				<tbody>
					@php
						$n=1;
					@endphp
					@foreach ($spd as $row )
						<tr>
							<td class="text-xxs p-2 m-0">
								{{$n++}}
							</td>
							<td class="text-xxs p-2 m-0">
								<b>{{$row->no_spd}}</b><br>
								Tanggal: {{$row->tanggal_spd}} <br>
								Jenis: {{$row->jenis_spd}}
							</td>
							<td class="text-xxs p-2 m-0">
								<b>{{$row->personel->nama_personel}}</b><br>
								NRP: {{$row->nrp}} <br>
								Pangkat/Golongan: {{$row->personel->pangkat->nama_pangkat}} / {{$row->personel->pangkat->golongan}}
							</td>
							<td class="text-xxs p-2 m-0">
								{{$row->jenis_pengeluaran}} / 
								{{$row->keperluan}}
							</td>
							<td class="text-xxs p-2 m-0">
								@php
								$earlier = new DateTime($row->tanggal_berangkat);
								$later = new DateTime($row->tanggal_kembali);

								$abs_diff = $later->diff($earlier)->format("%a"); //3
								@endphp
								{{$row->tanggal_berangkat}} - {{$row->tanggal_kembali}} / <br>
								{{$abs_diff+1}} Hari
							</td>
							<td class="text-center text-xxs p-2 m-0">
								<button class="btn btn-sm btn-primary mx-auto">
									<i class="fa fa-users"></i> {{$row->pengikut->count()>0?$row->pengikut->count():0}}
								</button>
							</td>
							<td class="text-xxs p-2 m-0" nowrap>
								<button class="btn btn-sm btn-primary m-1">
									<i class="fa fa-eye"></i>
								</button>
								<button class="btn btn-sm btn-primary m-1" data-toggle="modal" data-target="#modalAddSPD" onClick="edit('{{$row->id_spd}}')">
									<i class="fa fa-edit"></i>
								</button>
								<a class="btn btn-sm btn-primary m-1" href="{{route('delete-spd', ['id'=>$row->id_spd])}}" onclick="return confirm('Hapus SPD?')">
									<i class="fa fa-trash"></i>
								</a>
							</td>
						</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
</div>

@endsection
@section('extra-modal')
<!-- Modal -->
<div class="modal fade" id="modal-search-anggota" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-xl">
	  <div class="modal-content">
			<div class="modal-header">
			  <h5 class="modal-title" id="exampleModalLabel">Tambah Anggota</h5>
			  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
			  </button>
			</div>
<livewire:modal-add-anggota></livewire:modal-add-anggota>
<div class="modal-footer">
	<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
	<button type="submit" class="btn btn-primary">Save changes</button>
</div>
</div>
</div>
</div>
<!-- Modal Pengikut -->
<div class="modal fade" id="modal-search-pengikut" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg">
	  <div class="modal-content">
			<div class="modal-header">
			  <h5 class="modal-title" id="exampleModalLabel">Tambah Pengikut</h5>
			  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
			  </button>
			</div>
<livewire:modal-add-pengikut></livewire:modal-add-pengikut>

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
	function fill_edit(){
		let no_spd = $('#nmrSpd').val()
		no_spd += $('#formSpd').val()
		no_spd += $('#spdComp').val()

		$.get("{{route('get-spd-data')}}", {no_spd:no_spd}, function(data){
			console.log(data);
			$('#formTanggalSpd').val(data.tanggal_spd)
			$('#formJenisSpd').val(data.jenis_spd)
			$('#formNRP').val(data.nrp)

			searchAnggota()

		})
	}

	function edit(id){
		$('formId').val(id);
		$.get('{{route('get-spd-by-id')}}', {id_spd:id}, function(data){
			no_spd = data.no_spd.split('/')
			$('#nmrSpd').val(no_spd[0]+'/')
			$('#formSpd').val(no_spd[1])
			$('#spdComp').val('/'+no_spd[2]+'/'+no_spd[3]+'/'+no_spd[4])
		}).then(function(){
			fill_edit();
		})
	}

	function searchAnggota(){
		nrp = $('#formNRP').val();
		// do ajax request
		$.get("{{route('get-personel-data')}}", {nrp:nrp}, function(data){
			data = JSON.parse(data)
			console.log(data);
			dataAnggota = "<tr><td>"+data.nama_personel+"</td><td>"+data.pangkat.nama_pangkat+"/"+data.nrp+"</td><td>"+data.pangkat.golongan+"</td><td>"+data.status.nama_status+"</td><td>"+data.jabatan+"</td><td>"+data.satker.nama_satker+"</td></tr>";
			$('#dataAnggota').html(dataAnggota)
		});
	}

	function addPengikut(nrp)
	{
		$.get("{{route('get-personel-data')}}", {nrp:nrp}, function(data){
			data = JSON.parse(data)
			console.log(data);
			dataPengikut = "<tr>"+
							"<td>"+data.nama_personel+"</td>"+
							"<td>"+data.nrp+"</td>"+
							"<td>"+data.pangkat.nama_pangkat+" / "+data.pangkat.golongan+"</td>"+
							"<td>"+data.jabatan+"</td>"+
							"<td><div class='input-group'><input type='number' name='lama[]' value='0' class='form-control' required><div class='input-group-append' ><button class='btn btn-secondary' disabled>Hari</butoon></div></div>"+
							"<input type='text' name='nrp_pengikut[]' value='"+nrp+"' hidden required>"+
							"</td>"+
							"<td><button type='button' class='btn btn-sm btn-danger' onclick='deletePengikut(this)'>x</button></td>"+
							"</tr>";
			$('#daftarPengikut').append(dataPengikut)
		});
	}
	function deletePengikut(elm){
		$(elm).parent().parent().remove();
	}
	// function toggle_button_add(btn){
	// 	$('.btn-add').hide();
	// 	console.log(btn)
	// 	$('#'+btn).show();
	// }
  //   function fill_edit(akun){
		// $('#formAkun').val(akun);
  //       $('#btn-search').click();
  //       $('#formAkun').focus()
  //   }

	function addAnggota(nrp){
		var inputNrp = $('#formNRP').val(nrp);
		console.log(nrp);
		searchAnggota();
	}
	function toggle_pengikut(){
		let selected_val = $('#formJenisSpd').val();
		if(selected_val == 'Luar Negeri'){
			$('#nmrSpd').val('SPDLN/')
		}else{
			$('#nmrSpd').val('SPD/')
		}
		if(selected_val == 'Rutin' || selected_val == 'Luar Negeri'){
			$('#formPengikut').hide();
			$('#daftarPengikut').html('')

		}else{
			$('#formPengikut').show();
		}
	}
	toggle_pengikut();

	function calculate_day(){
		let start = $('#formBerangkat').val();
		let end = $('#formKembali').val();
		let start_date = new Date(start);
		// console.log(start_date)
		let end_date = new Date(end);
		let diff = end_date - start_date;
		let days = diff / (1000 * 60 * 60 * 24);
		$('#formLamaHari').val(days+1);
	}

	function replace_ket_mata_anggaran(){
		var id_pagu = $('#formMataAnggaran').val();
		$.get("{{route('get-pagu-data-by-id')}}", {id_pagu:id_pagu}, function(data){
			jenises = data.ket.split(' ')
			jenis = jenises[0]+' '+jenises[1]
			$('#formJenisPengeluaran').val(jenis)
			$('#formKetMataAnggaran').val(data.ket);
		});
	}

	$('#modal-search-pengikut').on('hidden.bs.modal', function(){
		$('body').addClass('modal-open')
	})
	$('#modal-search-anggota').on('hidden.bs.modal', function(){
		$('body').addClass('modal-open')
	})

	calculate_day();
	replace_ket_mata_anggaran();
</script>
@endsection