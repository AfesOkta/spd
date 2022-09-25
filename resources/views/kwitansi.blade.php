@extends('layout')
@section('page-title', 'Kwitansi')
@section('page-title-desc', 'Data Kwitansi')
@section('kwitansi-menu', 'mm-active')
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
	<div class="card-header">
		<h4>Data Kwitansi</h4>
	</div>
	<div class="card-body table-responsive">
		<table class="mb-0 table-bordered table table-hover table-striped datatable">
			<thead>
				<tr>
					<th>#</th>
					<th>SPD</th>
					<th>Anggota</th>
					<th>Keterangan</th>
					<th>Waktu</th>
					<th>Pengikut</th>
					<th>Kwitansi</th>
				</tr>

			</thead>
			<tbody>
				@php
				$n=1;
				@endphp
				@foreach ($spd as $row )
				<tr>
					<td>
						{{$n++}}
					</td>
					<td>
						<b>{{$row->no_spd}}</b><br>
						Tanggal: {{$row->tanggal_spd}} <br>
						Jenis: {{$row->jenis_spd}}
					</td>
					<td>
						<b>{{$row->personel->nama_personel}}</b><br>
						NRP: {{$row->nrp}} <br>
						Pangkat/Golongan: {{$row->personel->pangkat->nama_pangkat}} / {{$row->personel->pangkat->golongan}}
					</td>
					<td>
						{{$row->jenis_pengeluaran}} /
						{{$row->keperluan}} Ke : {{$row->tujuan->nama_tujuan}}
					</td>
					<td>
						@php
						$earlier = new DateTime($row->tanggal_berangkat);
						$later = new DateTime($row->tanggal_kembali);

						$abs_diff = $later->diff($earlier)->format("%a"); //3
						@endphp
						{{$row->tanggal_berangkat}} - {{$row->tanggal_kembali}} / <br>
						{{$abs_diff+1}} Hari
					</td>
					<td class="text-center">
						<button class="btn btn-sm ">
							{{$row->pengikut->count()>0?$row->pengikut->count():0}}
						</button>
					</td>
					<td class="text-center">
						@if($row->jenis_spd == "Rutin")
							@if($row->kwitansi->count() > 0)
							<button class="btn btn-sm btn-warning text-white mx-auto" onclick="fill_edit_kwitansi('{{$row->no_spd}}')" data-toggle="modal" data-target="#modalAddKwitansi" title="Add Kwitansi">
								<i class="fa fa-file"></i>
							</button>
							@else
							<button class="btn btn-sm btn-primary mx-auto" onclick="fill_add_kwitansi('{{$row->no_spd}}')" data-toggle="modal" data-target="#modalAddKwitansi" title="Add Kwitansi">
								<i class="fa fa-plus"></i>
							</button>
							@endif
						@elseif($row->jenis_spd == "Luar Negeri")
							@if($row->kwitansi->count() > 0)
								<button class="btn btn-sm btn-danger text-white mx-auto" onclick="fill_edit_kwitansi_ln('{{$row->no_spd}}')" data-toggle="modal" data-target="#modalAddKwitansiLn" title="Add Kwitansi LN">
									<i class="fa fa-file"></i>
								</button>
							@else
								<button class="btn btn-sm btn-success mx-auto" onclick="fill_add_kwitansi_ln('{{$row->no_spd}}')" data-toggle="modal" data-target="#modalAddKwitansiLn" title="Add Kwitansi LN">
									<i class="fa fa-plus"></i>
								</button>
							@endif
						@else
							@if($row->kwitansi->count() > 0)
								<button class="btn btn-sm btn-success text-white mx-auto" onclick="fill_edit_nominatif('{{$row->no_spd}}')" data-toggle="modal" data-target="#modalAddNominatif" title="Add Nominatif">
									<i class="fa fa-file"></i>
								</button>
							@else
								<button class="btn btn-sm btn-outline-primary mx-auto" onclick="fill_add_nominatif('{{$row->no_spd}}')" data-toggle="modal" data-target="#modalAddNominatif" title="Add Nominatif">
									<i class="fa fa-plus"></i>
								</button>
							@endif
						@endif
					</td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>
</div>
@endsection

@section('extra-js')
@include('components.modal_pengeluaran_rill')
@include('components.modal_add_kwitansi')
@include('components.modal_add_kwitansi_ln')
@include('components.modal_add_nominatif')

<script>
	function calculate_day(start, end) {
		let start_date = new Date(start);
		// console.log(start_date)
		let end_date = new Date(end);
		let diff = end_date - start_date;
		let days = diff / (1000 * 60 * 60 * 24);
		return days + 1;
	}

	function fill_add_kwitansi(no_spd) {

		// do ajax request
		$.get('{{route("get-kwitansi-data")}}', {
				no_spd: no_spd
			},
			function(data) {
				$('#noSpd').val(no_spd)
				$('#namaPelaksana').val(data.personel.nama_personel)
				$('#pangkatNrp').val(data.pangkat.nama_pangkat + '/' + data.personel.nrp)

				// transportasi asal - tujuan
				$('#asalTujuan').val(data.spd.asal_spd + ' -> ' + data.tujuan.nama_tujuan)
				$('#tujuanAsal').val(data.tujuan.nama_tujuan + ' -> ' + data.spd.asal_spd)

				// uang Harian
				lama_giat = calculate_day(data.tanggal_berangkat, data.tanggal_kembali)
				$('#giatUangHarian').val('0')
				$('#biayaUangHarian').val('0')
				$('#jumlahUangHarian').val('0')
			});
	}

	function fill_add_kwitansi_ln(no_spd) {
		// do ajax request
		$.get('{{route("get-kwitansi-data")}}', {
				no_spd: no_spd
			},
			function(data) {
				$('#noSpdLn').val(no_spd)
				$('#namaPelaksanaLn').val(data.personel.nama_personel)
				$('#pangkatNrpLn').val(data.pangkat.nama_pangkat + '/' + data.personel.nrp)

				// uang Harian
				lama_giat = calculate_day(data.tanggal_berangkat, data.tanggal_kembali)
				$('#giatUangHarian').val('0')
				$('#biayaUangHarian').val('0')
				$('#jumlahUangHarian').val('0')
			});
	}

	function fill_add_nominatif(no_spd) {
		// do ajax request
		$.get('{{route("get-kwitansi-data")}}', {
				no_spd: no_spd
			},
			function(data) {
				$('#noSpdNm').val(no_spd)
				$('#namaPelaksanaNm').val(data.personel.nama_personel)
				$('#pangkatNrpNm').val(data.pangkat.nama_pangkat + '/' + data.personel.nrp)

				$('#jnsSpd').val(data.spd.jenis_spd)
				$('#tujuanSPD').val(data.tujuan.nama_tujuan)
				$('#nominalSpd').val(data.pangkat.nama_pangkat + '/' + data.personel.nrp)

				// uang Harian
				lama_giat = calculate_day(data.spd.tanggal_berangkat, data.spd.tanggal_kembali)
				$('#giatUangHarian').val('0')
				$('#biayaUangHarian').val('0')
				$('#jumlahUangHarian').val('0')
                $('#optPengikut').trigger('change').val(data.count_pengikut);

                dataAnggota = "<tr><td>" + data.spd.nrp + "</td><td>" + lama_giat + "</td><td>" + data.pangkat.nama_pangkat + "</td><td>" + data.personel.nama_personel +
                    "</td><td><input type='number' name='transport' id='transport'></input></td><td><input type='number' name='u_harian' id='u_harian'></input></td>" +
                    "<td><input type='number' name='penginapan' id='penginapan'></input></td><td><input type='number' name='total' id='total'></input></td></tr>";
                $('#dataAnggota').html(dataAnggota)
                addPengikut(data.spd.id_spd);
                $('#optPengikut').val()
			});
	}
	var total_biaya = 0;

	function fill_edit_kwitansi(no_spd) {
		total_biaya = 0;
		$('#form-lain-lain').html('')
		// do ajax request
		$.get('{{route("get-kwitansi-data")}}', {
				no_spd: no_spd
			},
			function(data) {
				$('#noSpd').val(no_spd)
				$('#namaPelaksana').val(data.spd.personel.nama_personel)
				$('#pangkatNrp').val(data.pangkat.nama_pangkat + '/' + data.personel.nrp)

				// penginapan
				var penginapan = data.kwitansi[0];
				$('#rincianPenginapan').val(penginapan.rincian)
				$('#giatPenginapan').val(penginapan.giat)
				$('#biayaPenginapan').val(penginapan.biaya)
				$('#jumlahPenginapan').val(penginapan.giat * penginapan.biaya)
				$('#keteranganPenginapan').val(penginapan.keterangan)
				total_biaya += penginapan.giat * penginapan.biaya

				// transportasi asal - tujuan
				$('.rincianTransportasi1').val(data.kwitansi[1].rincian)
				$('.giatTransportasi1').val(data.kwitansi[1].giat)
				$('.biayaTransportasi1').val(data.kwitansi[1].biaya)
				$('.jumlahTransportasi1').val(data.kwitansi[1].giat * data.kwitansi[1].biaya)
				$('.keteranganTransportasi1').val(data.kwitansi[1].keterangan)
				total_biaya += data.kwitansi[1].giat * data.kwitansi[1].biaya

				// transportasi tujuan - asal
				$('.rincianTransportasi2').val(data.kwitansi[2].rincian)
				$('.giatTransportasi2').val(data.kwitansi[2].giat)
				$('.biayaTransportasi2').val(data.kwitansi[2].biaya)
				$('.jumlahTransportasi2').val(data.kwitansi[2].giat * data.kwitansi[2].biaya)
				$('.keteranganTransportasi2').val(data.kwitansi[2].keterangan)
				total_biaya += data.kwitansi[2].giat * data.kwitansi[2].biaya

				// transportasi taxi spd asal - bandara PP
				$('.rincianTransportasi3').val(data.kwitansi[3].rincian)
				$('.giatTransportasi3').val(data.kwitansi[3].giat)
				$('.biayaTransportasi3').val(data.kwitansi[3].biaya)
				$('.jumlahTransportasi3').val(data.kwitansi[3].giat * data.kwitansi[3].biaya)
				$('.keteranganTransportasi3').val(data.kwitansi[3].keterangan)
				total_biaya += data.kwitansi[3].giat * data.kwitansi[3].biaya

				// transportasi taxi kota tujuan - bandara PP
				$('.rincianTransportasi4').val(data.kwitansi[4].rincian)
				$('.giatTransportasi4').val(data.kwitansi[4].giat)
				$('.biayaTransportasi4').val(data.kwitansi[4].biaya)
				$('.jumlahTransportasi4').val(data.kwitansi[4].giat * data.kwitansi[4].biaya)
				$('.keteranganTransportasi4').val(data.kwitansi[4].keterangan)
				total_biaya += data.kwitansi[4].giat * data.kwitansi[4].biaya

				// Uang Harian
				$('.rincianUangHarian').val(data.kwitansi[5].rincian)
				$('.giatUangHarian').val(data.kwitansi[5].giat)
				$('.biayaUangHarian').val(data.kwitansi[5].biaya)
				$('.jumlahUangHarian').val(data.kwitansi[5].giat * data.kwitansi[5].biaya)
				$('.keteranganUangHarian').val(data.kwitansi[5].keterangan)
				total_biaya += data.kwitansi[5].giat * data.kwitansi[5].biaya

				// Uang Harian
				$('.rincianUangSaku').val(data.kwitansi[6].rincian)
				$('.giatUangSaku').val(data.kwitansi[6].giat)
				$('.biayaUangSaku').val(data.kwitansi[6].biaya)
				$('.jumlahUangSaku').val(data.kwitansi[6].giat * data.kwitansi[6].biaya)
				$('.keteranganUangSaku').val(data.kwitansi[6].keterangan)
				total_biaya += data.kwitansi[6].giat * data.kwitansi[6].biaya

				$('#metodePembayaran').val(data.kwitansi[0].id_pembayaran)
				var filtered = data.kwitansi.filter(function(value, index, arr) {
					return index > 6;
				});

				filtered.forEach(add_other_input)

				var amount = total_biaya;
				var locale = 'id';
				var options = {
					style: 'currency',
					currency: 'idr',
					minimumFractionDigits: 0,
					maximumFractionDigits: 0
				};
				var formatter = new Intl.NumberFormat(locale, options);
				$('#jumlahTotal').html(formatter.format(amount))
				noSpd = no_spd.replaceAll('/', '-')
				$('#deleteKwitansiBtn').attr('href', "{{url('/')}}" + "/delete_kwitansi/id=" + noSpd)
			});
	}

	function fill_edit_rill() {
		total_biaya = 0;
		$('#form-lain-lain-rill').html('')
		// do ajax request
		let no_spd = $('#noSpd').val();
		$.get('{{route("get-kwitansi-data")}}', {
				no_spd: no_spd
			},
			function(data) {

				$('#no_spd_rill').val(data.kwitansi[0].no_spd);
				$('#id_pembayaran_rill').val(data.kwitansi[0].id_pembayaran);
				data.kwitansi.forEach(add_rill_input)

				var amount = total_biaya;
				var locale = 'id';
				var options = {
					style: 'currency',
					currency: 'idr',
					minimumFractionDigits: 0,
					maximumFractionDigits: 0
				};
				var formatter = new Intl.NumberFormat(locale, options);
				$('#jumlahTotalRill').html(formatter.format(amount))
				// noSpd = no_spd.replaceAll('/','-')
				// $('.deleteKwitansiBtn').attr('href', "{{url('/')}}"+"/delete_rill/id="+noSpd)

			});

	}

	function add_rill_input(value, index, arr) {
		console.log(value)
		if (value.keterangan == null) {
			keterangan = ' '
		} else {
			keterangan = value.keterangan
		}

		total_biaya += value.biaya * value.giat
		if (value.rill != 0) {
			checked = "checked"
			val_rill = '1'
		} else {
			checked = ''
			val_rill = '0'
		}
		console.log(value.rill)
		new_form = "<tr class='text-center p-0'>" +
			"<td class='p-1'><div class='form-check'><input  type='hidden' value='0' name='rill[" + index + "]' " + checked + "><input class='form-check-input' type='checkbox' value='1' name='rill[" + index + "]' " + checked + "></div></td>" +
			"<td class='p-1'>" +
			"<input type='text' class='form-control' name='rincian[]' value='" + value.rincian + "' autocomplete='off'>" +
			"</td>" +
			"<td class='p-1'>" +
			"<input type='number' class='form-control' onkeyup='kalkulasi_biaya(this)' onchange='kalkulasi_biaya(this)' name='giat[]' value='" + value.giat + "'>" +
			"</td>" +
			"<td class='p-1'>x</td>" +
			"<td class='p-1'>" +
			"<input type='number' class='form-control' onkeyup='kalkulasi_biaya(this)' onchange='kalkulasi_biaya(this)' name='biaya[]' value='" + value.biaya + "'>" +
			"</td>" +
			"<td class='p-1'>" +
			"<input type='number' class='form-control'  name='jumlah[]' value='" + value.giat * value.biaya + "'>" +
			"</td>" +
			"<td class='p-1'>" +
			"<input type='text' class='form-control' name='keterangan[]' value='" + keterangan + "'>" +
			"</td>" +
			" </tr>"
		$('#form-lain-lain-rill').append(new_form)
	}

	function add_other_input(value, index, arr) {
		if (value.keterangan == null) {
			keterangan = ' '
		} else {
			keterangan = value.keterangan
		}
		total_biaya += value.biaya * value.giat
		new_form = "<tr class='text-center p-0'>" +
			"<td class='p-1'><button type='button' class='btn text-danger' onclick='del_form(this); kalkulasi_biaya(this)' >x</button></td>" +
			"<td class='p-1'>" +
			"<input type='text' class='form-control' name='rincian[]' value='" + value.rincian + "' autocomplete='off'>" +
			"</td>" +
			"<td class='p-1'>" +
			"<input type='number' class='form-control' onkeyup='kalkulasi_biaya(this)' onchange='kalkulasi_biaya(this)' name='giat[]' value='" + value.giat + "'>" +
			"</td>" +
			"<td class='p-1'>x</td>" +
			"<td class='p-1'>" +
			"<input type='number' class='form-control' onkeyup='kalkulasi_biaya(this)' onchange='kalkulasi_biaya(this)' name='biaya[]' value='" + value.biaya + "'>" +
			"</td>" +
			"<td class='p-1'>" +
			"<input type='number' class='form-control'  name='jumlah[]' value='" + value.giat * value.biaya + "'>" +
			"</td>" +
			"<td class='p-1'>" +
			"<input type='text' class='form-control' name='keterangan[]' value='" + keterangan + "'>" +
			"</td>" +
			" </tr>"
		$('#form-lain-lain').append(new_form)
	}

	var jumlah_uang = 0

	function kalkulasi_jumlah_total() {
		jumlah_uang = 0
		$("[name='jumlah[]']").each(function() {
			jumlah_uang += parseInt($(this).val())
		})

		return jumlah_uang;
	}

	function kalkulasi_jumlah_total_rill() {
		jumlah_uang = 0
		$('#table-input-rill').find("[name='jumlah[]']").each(function() {
			jumlah_uang += parseInt($(this).val())
		})

		return jumlah_uang;
	}

	function del_form(elm) {
		$(elm).parent().parent().remove();
	}

	$('#add_new_form').on('click', function(event) {
		event.preventDefault();
		new_form = "<tr class='text-center p-0'>" +
			"<td class='p-1'><button type='button' class='btn text-danger' onclick='del_form(this); kalkulasi_biaya(this)' >x</button></td>" +
			"<td class='p-1'>" +
			"<input type='text' class='form-control' name='rincian[]' value='' autocomplete='off'>" +
			"</td>" +
			"<td class='p-1'>" +
			"<input type='number' class='form-control' onkeyup='kalkulasi_biaya(this)' onchange='kalkulasi_biaya(this)' name='giat[]' value='0'>" +
			"</td>" +
			"<td class='p-1'>x</td>" +
			"<td class='p-1'>" +
			"<input type='number' class='form-control' onkeyup='kalkulasi_biaya(this)' onchange='kalkulasi_biaya(this)' name='biaya[]' value='0'>" +
			"</td>" +
			"<td class='p-1'>" +
			"<input type='number' class='form-control'  name='jumlah[]' value='0'>" +
			"</td>" +
			"<td class='p-1'>" +
			"<input type='text' class='form-control' name='keterangan[]' value=' '>" +
			"</td>" +
			" </tr>"
		$('#form-lain-lain').append(new_form)
	})

	function kalkulasi_biaya(elm) {
		giat = biaya = jumlah = 0
		giat = parseInt($(elm).parent().parent().find("[name='giat[]']").val());
		biaya = parseInt($(elm).parent().parent().find("[name='biaya[]']").val());
		jumlah = giat * biaya
		console.log(jumlah)
		formJumlah = $(elm).parent().parent().find("[name='jumlah[]']").val(jumlah)
		total = kalkulasi_jumlah_total()
		var amount = total;
		var locale = 'id';
		var options = {
			style: 'currency',
			currency: 'idr',
			minimumFractionDigits: 0,
			maximumFractionDigits: 0
		};
		var formatter = new Intl.NumberFormat(locale, options);
		$('#jumlahTotal').html(formatter.format(amount))

		amountRill = kalkulasi_jumlah_total_rill()
		$('#jumlahTotalRill').html(formatter.format(amountRill))
	}

	$('input').on('keypress', function(event) {
		if (event.key == 'Enter') {
			event.preventDefault();
		}
	})

	$('#btnPengeluaranRill').on('click', function() {
		$('#modalAddKwitansi').modal('hide');
		$('#modalRill').modal('show', function() {
			$('body').addClass('modal-open')
		})
	})

	$('#modalRill').on('shown.bs.modal', function() {
		$('body').addClass('modal-open')
	}).on('hidden.bs.modal', function() {
		$('body').removeClass('modal-open')
	})

    function addPengikut(nrp) {
        $('#daftarPengikut').html("");
        $.get("{{ route('get-pengikut-data') }}", {
            id_spd: nrp
        }, function(data) {
            data = JSON.parse(data)
            console.log(data);
            let dataPengikut = "";
            for(let i=0; i < data.length; i++){
                dataPengikut += "<tr><td>" + data[i].nrp + "</td><td>" + lama_giat + "</td><td>" + data[i].personel.jabatan + "</td><td>" + data[i].personel.nama_personel +
                    "</td><td><input type='number' name='transport' id='transport'></input></td><td><input type='number' name='u_harian' id='u_harian'></input></td>" +
                    "<td><input type='number' name='penginapan' id='penginapan'></input></td><td><input type='number' name='total' id='total'></input></td></tr>";
            }
            $('#daftarPengikut').append(dataPengikut)
            return true;

        });
    }

</script>
@endsection
