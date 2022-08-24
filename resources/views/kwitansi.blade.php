@extends('layout')
@section('page-title', 'Kwitansi')
@section('page-title-desc', 'Data Kwitansi')
@section('kwitansi-menu', 'mm-active')
@include('components.modal_add_kwitansi')
@section('content')
<div class="card col-12">
	<div class="card-header">
		<h4>Data Kwitansi</h4>
	</div>
	<div class="card-body table-responsive">
		<table class="mb-0 table table-hover  datatable">
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
								<button class="btn btn-sm btn-info mx-auto">
									<i class="fa fa-users"></i> {{$row->pengikut->count()>0?$row->pengikut->count():0}}
								</button>
							</td>
							<td class="text-center">
                                @if($row->kwitansi->count() > 0)
								<button class="btn btn-sm btn-warning text-white mx-auto">
									<i class="fa fa-file"></i>
								</button>
								<button class="btn btn-sm btn-danger mx-auto">
									<i class="fa fa-trash"></i>
								</button>
                                @else
								<button class="btn btn-sm btn-primary mx-auto" onclick="fill_add_kwitansi('{{$row->no_spd}}')" data-toggle="modal" data-target="#modalAddKwitansi">
									<i class="fa fa-plus"></i>
								</button>
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

<script>
    
	function calculate_day(start, end){
		let start_date = new Date(start);
		// console.log(start_date)
		let end_date = new Date(end);
		let diff = end_date - start_date;
		let days = diff / (1000 * 60 * 60 * 24);
		return days+1;
	}
	function fill_add_kwitansi(no_spd){
		
		// do ajax request
		$.get('{{route('get-spd-data')}}', {no_spd:no_spd}, function(data){
			$('#noSpd').val(no_spd)
			$('#namaPelaksana').val(data.personel.nama_personel)
			$('#pangkatNrp').val(data.pangkat.nama_pangkat+'/'+data.personel.nrp)
			
            // transportasi asal - tujuan
            $('#asalTujuan').val(data.asal_spd+' -> '+data.tujuan.nama_tujuan)
            $('#tujuanAsal').val(data.tujuan.nama_tujuan+' -> '+data.asal_spd)

            // uang Harian
            lama_giat = calculate_day(data.tanggal_berangkat, data.tanggal_kembali)
            $('#giatUangHarian').val(parseInt(lama_giat))
            $('#biayaUangHarian').val(parseInt(data.tujuan.uang_harian))
            $('#jumlahUangHarian').val(parseInt(lama_giat) * parseInt(data.tujuan.uang_harian))
		});
	}
    var jumlah_uang = 0
    function kalkulasi_jumlah_total(){
        jumlah_uang = 0
        $("[name='jumlah[]']").each(function(){
            jumlah_uang += parseInt($(this).val()) 
        })

        return jumlah_uang;
    }
    function del_form(elm){
        $(elm).parent().parent().remove();
    }

	$('#add_new_form').on('click', function(event){
        event.preventDefault();
        new_form = "<tr class='text-center p-0'>"+
                            "<td class='p-1'><button type='button' class='btn text-danger' onclick='del_form(this)' >x</button></td>"+
                            "<td class='p-1'>"+
                                "<input type='text' class='form-control' name='rincian[]' value='' autocomplete='off'>"+
                           "</td>"+
                            "<td class='p-1'>"+
                                "<input type='number' class='form-control' onkeyup='kalkulasi_biaya(this)' onchange='kalkulasi_biaya(this)' name='giat[]' value='1'>"+
                           "</td>"+
                            "<td class='p-1'>x</td>"+
                            "<td class='p-1'>"+
                                "<input type='number' class='form-control' onkeyup='kalkulasi_biaya(this)' onchange='kalkulasi_biaya(this)' name='biaya[]' value='0'>"+
                           "</td>"+
                            "<td class='p-1'>"+
                                "<input type='number' class='form-control'  name='jumlah[]' value='0'>"+
                           "</td>"+
                            "<td class='p-1'>"+
                                "<input type='text' class='form-control' id='keterangan[]' value=' '>"+
                           "</td>"+
                       " </tr>"
        $('#form-lain-lain').append(new_form)
    })

    function kalkulasi_biaya(elm){
        giat = biaya = jumlah = 0
        giat = parseInt($(elm).parent().parent().find("[name='giat[]']").val());
        biaya = parseInt($(elm).parent().parent().find("[name='biaya[]']").val());
        jumlah = giat*biaya
        console.log(jumlah)
        formJumlah = $(elm).parent().parent().find("[name='jumlah[]']").val(jumlah)
        total = kalkulasi_jumlah_total()
        var amount = total;
        var locale = 'id';
        var options = {style: 'currency', currency: 'idr', minimumFractionDigits: 2, maximumFractionDigits: 2};
        var formatter = new Intl.NumberFormat(locale, options);
        $('#jumlahTotal').html(formatter.format(amount))
    }

    $('input').on('keypress', function(event){
        if(event.key == 'Enter'){
            event.preventDefault();
        }
    })
</script>
@endsection