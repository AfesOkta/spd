@extends('layout')
@section('page-title', 'Personel')
@section('page-title-desc', 'Data personel')
@section('personel-menu', 'mm-active')

@section('content')

<div class="card col-12">
	<div class="card-header d-flex flex-row justify-content-between">
		<h4 class="">Import Personel</h4>
	</div>
	<div class="card-body" style="min-height: 400px;">
        <form action="{{route('do-import-personel')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="">Upload File</label>
                <div class="input-group">
                    <input type="file" name="personel" class="form-control">
                    <div class="input-group-append">
                        <input type="submit" class="btn btn-primary" value="Upload">
                    </div>
                </div>
            </div>
        </form>
        <p>Silahkan download format csv  <a href="/format-personel.csv">disini</a> </p>
	</div>
</div>
@endsection




