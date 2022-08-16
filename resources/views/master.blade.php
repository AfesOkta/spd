@extends('layout')
@section('page-title', 'Personel')
@section('page-title-desc', 'Data personel')
@section('personel-menu', 'mm-active')
@section('content')
<div class="card col-12">
	<div class="card-header p-2">
        <ul class="nav nav-tabs mt-1">
            <li class="nav-item">
                <a class="nav-link active" href="#" id="tab_pangkat" onclick="switch_tab('tab_pangkat')">Pangkat</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#" id="tab_golongan" onclick="switch_tab('tab_golongan')">Golongan</a>
            </li>
            <li class="nav-item ">
                <a class="nav-link" href="#" id="tab_satker" onclick="switch_tab('tab_satker')">Satker</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#" id="tab_status" onclick="switch_tab('tab_status')">Status</a>
            </li>
        </ul>
	</div>
	<div class="card-body">
		<div class="content" id="content-tab_pangkat">
            <h3>Pangkat</h3>
            <button class="btn btn-sm btn-primary float-right mb-2" data-target="#addPangkatModal" data-toggle="modal">Tambah data</button>
            <table class="table">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Pangkat</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $n=1;
                    @endphp
                    @foreach ($pangkat as $row)
                        <tr>
                            <td>{{$n++}}</td>
                            <td>{{$row->nama_pangkat}}</td>
                            <td>
                                <button 
                                    class="btn btn-warning btn-sm" 
                                    onclick="fill_edit_pangkat('{{$row->id_pangkat}}','{{$row->nama_pangkat}}')"
                                    data-toggle="modal" data-target="#editPangkatModal" >
                                    <i class="fa fa-edit"></i>
                                </button>
                                <a class="btn btn-danger btn-sm" onclick="return confirm('Hapus Pangkat?')" href="{{route('delete-pangkat',['id_pangkat'=>$row->id_pangkat])}}">
                                    <i class="fa fa-trash"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- ======================== Golongan ============================= -->
		<div class="content" id="content-tab_golongan" style="display: none;">
            <h3>Golongan</h3>
            <button class="btn btn-sm btn-primary float-right mb-2" data-target="#addGolonganModal" data-toggle="modal">Tambah data</button>
            <table class="table">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Golongan</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $n=1;
                    @endphp
                    @foreach ($golongan as $row)
                        <tr>
                            <td>{{$n++}}</td>
                            <td>{{$row->nama_golongan}}</td>
                            <td>
                                <button 
                                    class="btn btn-warning btn-sm" 
                                    onclick="fill_edit_golongan('{{$row->id_golongan}}','{{$row->nama_golongan}}')"
                                    data-toggle="modal" data-target="#editGolonganModal" >
                                    <i class="fa fa-edit"></i>
                                </button>
                                <a class="btn btn-danger btn-sm" onclick="return confirm('Hapus Golongan?')" href="{{route('delete-golongan',['id_golongan'=>$row->id_golongan])}}">
                                    <i class="fa fa-trash"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
		<div class="content" id="content-tab_satker" style="display: none;">
            <h3>Satker</h3>
        </div>
		<div class="content" id="content-tab_status" style="display: none;">
            <h3>Status</h3>
        </div>
	</div>
</div>
@endsection
<x-modal_edit_pangkat />
<x-modal_add_pangkat />
<x-modal_edit_golongan />
<x-modal_add_golongan />

@section('extra-js')
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

<script>
function switch_tab(tabId){
    console.log(tabId)
    $('.nav-link').removeClass('active')
    $('#'+tabId).addClass("active")
    $('.content').hide();
    $('#content-'+tabId).show();
}

function fill_edit_pangkat(id, nama)
{
    console.log({id:id, nama:nama})
    $('#form-pangkat-id').val(id);
    $('#form-pangkat-nama').val(nama);
}

function fill_edit_golongan(id, nama)
{
    console.log({id:id, nama:nama})
    $('#form-golongan-id').val(id);
    $('#form-golongan-nama').val(nama);
}
</script>

@if(session('tab'))
<script>
$('#tab_{{session('tab')}}').click();
</script>
@endif
@endsection