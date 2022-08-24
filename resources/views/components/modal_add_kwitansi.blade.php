<form action="{{route('add-kwitansi')}}" method="POST" class="table-responsive"> 






<!-- ============= -->
<!-- Button trigger modal -->


<!-- Modal -->
<div class="modal fade" id="modalAddKwitansi" tabindex="-1" aria-labelledby="modalAddKwitansiLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalAddKwitansiLabel">Tambah Kwitansi</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <div class="card col-12 mb-3">
	<div class="card-body">
		<div class="card-body p-0">
			<h5 class="card-title">Tambah Kwitansi</h5>
			@if ($errors->any())
				<div class="alert alert-danger">
					<ul>
						@foreach ($errors->all() as $error)
							<li>{{ $error }}</li>
						@endforeach
					</ul>
				</div>
			@endif
				@csrf
                <div class="form-row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="noSpd">Nomor Spd</label>
                            <input type="text" name="no_spd" id="noSpd" class="form-control" readonly>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="noSpd">Pelaksana</label>
                            <input type="text" id="namaPelaksana" class="form-control" readonly>
                        </div>
                    </div>
                    
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="noSpd">Pangkat/Nrp</label>
                            <input type="text"  id="pangkatNrp" class="form-control" readonly>
                        </div>
                    </div>
                </div>
				<table class="table table-sm table-active">
                    <thead>
                        <tr class="text-center bg-secondary text-white">
                            <th style="width: 5%">No</th>
                            <th style="width: 40%">Rincian</th>
                            <th style="width: 10%">Giat</th>
                            <th>x</th>
                            <th>Biaya</th>
                            <th>Jumlah</th>
                            <th>Keterangan</th>
                        </tr>
                        <tr class="bg-secondary text-white">
                            <th colspan="7">Penginapan</th>
                        </tr>
                        <tr class="text-center p-0">
                            <td class="p-1">1</td>
                            <td class="p-1">
                                <input type="text" class="form-control" name="rincian[]" value="Biaya Penginapan">
                            </td>
                            <td class="p-1">
                                <input type="number" class="form-control" onkeyup="kalkulasi_biaya(this)" onchange="kalkulasi_biaya(this)" name="giat[]" value="1">
                            </td>
                            <td class="p-1">x</td>
                            <td class="p-1">
                                <input type="number" class="form-control" onkeyup="kalkulasi_biaya(this)" onchange="kalkulasi_biaya(this)" name="biaya[]" value="0">
                            </td>
                            <td class="p-1">
                                <input type="number" class="form-control" onkeyup="kalkulasi_biaya(this)" onchange="kalkulasi_biaya(this)" name="jumlah[]" value="0">
                            </td>
                            <td class="p-1">
                                <input type="text" class="form-control" name="keterangan[]" value=" ">
                            </td>
                        </tr>
                        <tr class="bg-secondary text-white">
                            <th colspan="7">Transportasi</th>
                        </tr>
                        <tr class="text-center p-0">
                            <td class="p-1 my-3">2</td>
                            <td class="p-1 my-3">
                                <input type="text" id="asalTujuan" class="form-control mb-0" name="rincian[]" value="">
                            </td>
                            <td class="p-1 my-3">
                                <input type="number" class="form-control mb-0" onkeyup="kalkulasi_biaya(this)" onchange="kalkulasi_biaya(this)" name="giat[]" value="1">
                            </td>
                            <td class="p-1 my-3">x</td>
                            <td class="p-1 my-3">
                                <input type="number" class="form-control mb-0" onkeyup="kalkulasi_biaya(this)" onchange="kalkulasi_biaya(this)" name="biaya[]" value="0">
                            </td>
                            <td class="p-1 my-3">
                                <input type="number" class="form-control mb-0" name="jumlah[]" value="0">
                            </td>
                            <td class="p-1 my-3">
                                <input type="text" class="form-control mb-0" name="keterangan[]" value=" ">
                            </td>
                        </tr>
                        <tr class="text-center p-0">
                            <td class="p-1">3</td>
                            <td class="p-1">
                                <input type="text" id="tujuanAsal" class="form-control mb-0" name="rincian[]" value="">
                            </td>
                            <td class="p-1">
                                <input type="number" class="form-control mb-0" onkeyup="kalkulasi_biaya(this)" onchange="kalkulasi_biaya(this)" name="giat[]" value="1">
                            </td>
                            <td class="p-1">x</td>
                            <td class="p-1">
                                <input type="number" class="form-control mb-0" onkeyup="kalkulasi_biaya(this)" onchange="kalkulasi_biaya(this)" name="biaya[]" value="0">
                            </td>
                            <td class="p-1">
                                <input type="number" class="form-control mb-0" name="jumlah[]" value="0">
                            </td>
                            <td class="p-1">
                                <input type="text" class="form-control mb-0" name="keterangan[]" value=" ">
                            </td>
                        </tr>
                        <tr class="bg-secondary text-white">
                            <th colspan="7">Uang Harian & Saku</th>
                        </tr>
                        <tr class="text-center p-0">
                            <td class="p-1">4</td>
                            <td class="p-1">
                                <input type="text" class="form-control mb-0" name="rincian[]" value="Uang Harian">
                            </td>
                            <td class="p-1">
                                <input type="number" id="giatUangHarian" class="form-control mb-0" onkeyup="kalkulasi_biaya(this)" onchange="kalkulasi_biaya(this)" name="giat[]" value="1">
                            </td>
                            <td class="p-1">x</td>
                            <td class="p-1">
                                <input type="number" id="biayaUangHarian" class="form-control mb-0" onkeyup="kalkulasi_biaya(this)" onchange="kalkulasi_biaya(this)" name="biaya[]" value="0">
                            </td>
                            <td class="p-1">
                                <input type="number" id="jumlahUangHarian" class="form-control mb-0" name="jumlah[]" value="0">
                            </td>
                            <td class="p-1">
                                <input type="text" class="form-control mb-0" name="keterangan[]" value=" ">
                            </td>
                        </tr>
                        <tr class="text-center p-0">
                            <td class="p-1">5</td>
                            <td class="p-1">
                                <input type="text" class="form-control mb-0" name="rincian[]" value="Uang Saku">
                            </td>
                            <td class="p-1">
                                <input type="number"  class="form-control mb-0" onkeyup="kalkulasi_biaya(this)" onchange="kalkulasi_biaya(this)" name="giat[]" value="1">
                            </td>
                            <td class="p-1">x</td>
                            <td class="p-1">
                                <input type="number"  class="form-control mb-0" onkeyup="kalkulasi_biaya(this)" onchange="kalkulasi_biaya(this)" name="biaya[]" value="0">
                            </td>
                            <td class="p-1">
                                <input type="number"  class="form-control mb-0" name="jumlah[]" value="0">
                            </td>
                            <td class="p-1">
                                <input type="text" class="form-control mb-0" name="keterangan[]" value=" ">
                            </td>
                        </tr>
                        <tr class="bg-secondary text-white">
                            <th colspan="7">Lain-lain</th>
                        </tr>
                    </thead>
                    <tbody id="form-lain-lain">
                    </tbody>
                    <tfoot>
                        <tr >
                            <td colspan="4" class="pt-4"><a href="#" id="add_new_form">Tambah+</a></td>
                        </tr>
                        <tr>
                            <th>Pembayaran</th>
                            <td>
                                <select name="pembayaran" id="metodePembayaran" class="form-control">
                                    @foreach ($pembayaran as $row)
                                        <option value="{{$row->id_pembayaran}}">{{$row->pembayaran}}</option>
                                    @endforeach
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <th>Jumlah</th>
                            <td id="jumlahTotal">0,0</td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
</div>
      </div>
      <div class="modal-footer">
		    <button type="submit" class="mt-2 btn btn-success">Simpan</button>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
</div>
</div>
</form>