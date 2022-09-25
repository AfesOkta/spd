
			<div class="modal-body">
				<div class="col-md-3 float-right">
					<div class="form-group">
						<input type="search" class="form-control" wire:model="search" placeholder="Cari">
					</div>
				</div>
				  <div class="table-responsive">
				  <table class="table table-bordered table-hover">
					  <thead>
						  <tr>
							  <th>#</th>
							  <th>Nama</th>
							  <th>NRP/Pangkat</th>
							  <th>Jabatan</th>
							  <th>Satker</th>
							  <th>Add</th>
						  </tr>
					  </thead>
					  <tbody>
						  @php
						  $n=1;
						  @endphp
						  @foreach ($personels as $anggota)
						  <tr>
							  <td>{{$n++}}</td>
							  <td>{{$anggota->nama_personel}}</td>
							  <td>{!!$anggota->nrp!!}/{{$anggota->pangkat->nama_pangkat}}</td>
							  <td>{{$anggota->jabatan}}</td>
							  <td>{{$anggota->satker->nama_satker}}</td>
							  <td>
								  <button class="btn btn-primary btn-xs" data-dismiss="modal" onclick="addPengikut('{{$anggota->nrp}}')"><i class="fa fa-user-plus"></i></button>
							  </td>
						  </tr>
						  @endforeach
					  </tbody>
				  </table>
				  
				  <hr>
				  <div class="float-right overflow-auto">
				  {{ $personels->links() }}
				</div>
				  </div>
		  </div>