
				<div class="modal-body">
					
					  <div class="table-responsive">
					  <table class="table table-bordered table-hover">
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
							  $n=$page*10-9;
							  @endphp
							  @foreach ($personels as $anggota)
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
