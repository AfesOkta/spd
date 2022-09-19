	
    <div class="card-body table-responsive">
        <div class="col-md-3 float-right">
            <div class="form-group">
                <input type="search" class="form-control" wire:model="search" placeholder="Cari">
            </div>
        </div>
		@if ($errors->any())
		<div class="alert alert-danger">
			<ul>
				@foreach ($errors->all() as $error)
				<li>{{ $error }}</li>
				@endforeach
			</ul>
		</div>
		@endif
		<table class="mb-0 table table-hover table-sm ">
			<thead>
				<tr>
					<th class="text-lg p-1 m-0">#</th>
					<th class="text-lg p-1 m-0">NRP</th>
					<th class="text-lg p-1 m-0">Nama</th>
					<th class="text-lg p-1 m-0">Pangkat</th>
					<th class="text-lg p-1 m-0">Golongan</th>
					<th class="text-lg p-1 m-0">Jabatan</th>
					<th class="text-lg p-1 m-0">Satker</th>
					<th class="text-lg p-1 m-0">Status</th>
					<th class="text-lg p-1 m-0">Aksi</th>
				</tr>
			</thead>
			<tbody>
				@php
				$n=$page*10-9;
				@endphp
				@foreach ($personels as $row)
				<tr>
					<td class="text-lg p-0 m-0" scope="row">{{$n++}}</td>
					<td class="text-lg p-0 m-1">{{$row->nrp}}</td>
					<td class="text-lg p-0 m-0">{{$row->nama_personel}}</td>
					<td class="text-lg p-0 m-0">{{$row->pangkat?$row->pangkat->nama_pangkat:''}}</td>
					<td class="text-lg p-0 m-0">{{$row->pangkat?$row->pangkat->golongan:''}}</td>
					<td class="text-lg p-0 m-0">{{$row->jabatan}}</td>
					<td class="text-lg p-0 m-0">{{$row->satker?$row->satker->nama_satker:''}}</td>
					<td>{{$row->status?$row->status->nama_status:''}}</td>

					<!-- DISINI -->
					<td class="text-lg p-0 m-0" nowrap>
						<button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modalAddPersonel" onclick="fill_edit('{{$row->nrp}}')">
							<i class="fa fa-edit fa-xs"></i>
						</button>
					</td>
					<!-- Sampe sini -->
				</tr>
				@endforeach
			</tbody>
		</table>
        <hr>
        <div class="float-right">
            {{ $personels->links() }}
        </div>
	</div>
    <div class="card-footer">
        
    </div>