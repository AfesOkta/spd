<form action="{{route('add-nominatif')}}" method="POST" class="table-responsive">


<!-- Modal -->
<div class="modal fade" id="modalAddNominatif" tabindex="-1" aria-labelledby="modalAddNominatifLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
            <h5 class="modal-title" id="modalAddNominatifLabel">Daftar Nominatif</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
          </button>
      </div>
        <div class="modal-body">
            <div class="card col-12 mb-3">
            <div class="card-body">
                <div class="card-body p-0">
                    @csrf
                    <div class="form-row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="noSpd">Nomor Spd</label>
                                <input type="text" name="no_spd" id="noSpdNm" class="form-control" readonly>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="noSpd">Pelaksana</label>
                                <input type="text" id="namaPelaksanaNm" class="form-control" readonly>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="noSpd">Pangkat/Nrp</label>
                                <input type="text"  id="pangkatNrpNm" class="form-control" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="noSpd">Jenis Spd</label>
                                <input type="text" name="jns_spd" id="jnsSpd" class="form-control" readonly>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="noSpd">Tujuan</label>
                                <input type="text" id="tujuanSPD" class="form-control" readonly>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="noSpd">Nominal</label>
                                <input type="text"  id="nominalSpd" class="form-control" readonly>
                            </div>
                        </div>
                        <div class="col-md-8">&nbsp;</div>
                        <div class="col-md-4 float-right">
                            <div class="form-group">
                                <label for="noSpd">Jumlah Pengikut</label>
                                <select id="optPengikut" nama="optPengikut">
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                    <option value="6">6</option>
                                    <option value="7">7</option>
                                    <option value="8">8</option>
                                    <option value="9">9</option>
                                    <option value="10">10</option>
                                    <option value="11">11</option>
                                    <option value="12">12</option>
                                    <option value="13">13</option>
                                    <option value="14">14</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="table-responsive">
                                <table class="table" style="width: 100%;">
                                    <thead>
                                        <tr>
                                            <th>NRP</th>
                                            <th>Hari</th>
                                            <th>Pangkat/Golongan</th>
                                            <th>Nama</th>
                                            <th>Transport</th>
                                            <th>U. Harian</th>
                                            <th>Penginapan</th>
                                            <th>Jumlah</th>
                                        </tr>
                                    </thead>
                                    <tbody id="dataAnggota">

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="card mb-1" id="formPengikut">
                        <div class="card-header d-flex flex-row justify-content-between">
                            <h4>Pengikut</h4>
                        </div>
                        <div class="card-body">
                            <table class="table table-hover" style="width: 100%;">
                            <thead>
                                <tr>
                                    <th>NRP</th>
                                    <th>Hari</th>
                                    <th>Pangkat</th>
                                    <th>Nama</th>
                                    <th>Transport</th>
                                    <th>U. Harian</th>
                                    <th>Penginapan</th>
                                    <th>Jumlah</th>
                                </tr>
                            </thead>
                            <tbody id="daftarPengikut">

                            </tbody>
                        </table>
                        </div>
                    </div>
                </div>
            </div>
            </div>
        </div>
<div class="modal-footer d-flex flex-row justify-content-between">
    <div class="p-2">
        <a class="btn btn-sm btn-danger mx-auto" id="deleteKwitansiBtn">
            <i class="fa fa-trash"></i> Hapus
        </a>
    </div>
    <div class="p-2">
      <button type="submit" class="btn btn-success">Simpan</button>
      <button type="button" class="btn btn-secondary closeModal"  data-dismiss="modal" >Close</button>
  </div>
</div>
        </div>
    </div>
</div>
</form>
