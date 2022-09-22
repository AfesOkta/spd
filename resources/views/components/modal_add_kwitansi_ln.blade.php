<form action="{{route('add-kwitansi_ln')}}" method="POST" class="table-responsive"> 


<!-- Modal -->
<div class="modal fade" id="modalAddKwitansiLn" tabindex="-1" aria-labelledby="modalAddKwitansiLnLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
            <h5 class="modal-title" id="modalAddKwitansiLnLabel">Tambah Kwitansi Luar Negeri</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
          </button>
      </div>
        <div class="modal-body">
                    @csrf
                    <div class="form-row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="noSpd">Nomor Spd</label>
                                <input type="text" name="no_spd" id="noSpdLn" class="form-control"  readonly>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="noSpd">Pelaksana</label>
                                <input type="text" id="namaPelaksanaLn" class="form-control" readonly>
                            </div>
                        </div>
                        
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="noSpd">Pangkat/Nrp</label>
                                <input type="text"  id="pangkatNrpLn" class="form-control" readonly>
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
                                <th colspan="7">Transportasi</th>
                            </tr>
                            <tr class="text-center p-0">
                                <td class="p-1 my-3">2</td>
                                <td class="p-1 my-3">
                                    <input type="text" id="asalTujuan" class="form-control mb-0 rincianTransportasi1" name="rincian[]" value="Transportasi Denpasar - Jakarta">
                                </td>
                                <td class="p-1 my-3">
                                    <input type="number" class="form-control mb-0 giatTransportasi1" onkeyup="kalkulasi_biaya(this)" onchange="kalkulasi_biaya(this)" name="giat[]" value="0">
                                </td>
                                <td class="p-1 my-3">x</td>
                                <td class="p-1 my-3">
                                    <input type="number" class="form-control mb-0 biayaTransportasi1" onkeyup="kalkulasi_biaya(this)" onchange="kalkulasi_biaya(this)" name="biaya[]" value="0">
                                </td>
                                <td class="p-1 my-3">
                                    <input type="number" class="form-control mb-0 jumlahTransportasi1" name="jumlah[]" value="0">
                                </td>
                                <td class="p-1 my-3">
                                    <input type="text" class="form-control mb-0 keteranganTransportasi1" name="keterangan[]" value=" ">
                                </td>
                            </tr>
                            <tr class="bg-secondary text-white">
                                <th colspan="7">Uang Harian</th>
                            </tr>
                            <tr class="text-center p-0">
                                <td class="p-1">3</td>
                                <td class="p-1">
                                    <input type="text" class="form-control mb-0 rincianUangHarian" name="rincian[]" value="Uang Harian Selama di">
                                </td>
                                <td class="p-1">
                                    <input type="number" id="giatUangHarian" class="form-control mb-0 giatUangHarian" onkeyup="kalkulasi_biaya(this)" onchange="kalkulasi_biaya(this)" name="giat[]" value="0">
                                </td>
                                <td class="p-1">x</td>
                                <td class="p-1">
                                    <input type="number" id="biayaUangHarian" class="form-control mb-0 biayaUangHarian" onkeyup="kalkulasi_biaya(this)" onchange="kalkulasi_biaya(this)" name="biaya[]" value="0">
                                </td>
                                <td class="p-1">
                                    <input type="number" id="jumlahUangHarian" class="form-control mb-0 jumlahUangHarian" name="jumlah[]" value="0">
                                </td>
                                <td class="p-1">
                                    <input type="text" class="form-control mb-0 keteranganUangHarian" name="keterangan[]" value=" ">
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
<div class="modal-footer d-flex flex-row justify-content-between">
    <div class="p-2">
        <a class="btn btn-sm btn-danger mx-auto" id="deleteKwitansiBtn">
            <i class="fa fa-trash"></i> Hapus
        </a>
    </div>
    <div class="p-2">
        <a href="#" id="btnPengeluaranRill" data-dismiss="modal" data-backdrop="false" onclick="fill_edit_rill()">Pengeluaran Rill</a>
      <button type="submit" class="btn btn-success">Simpan</button>
      <button type="button" class="btn btn-secondary closeModal"  data-dismiss="modal" >Close</button>
  </div>
</div>
        </div>
    </div>
</div>
</form>