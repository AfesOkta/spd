<form action="{{route('add-kwitansi_ln')}}" method="POST" class="table-responsive"> 
 @csrf
<input type="text" name="no_spd" id="no_spd_rill" hidden>
<input type="text" name="pembayaran" id="id_pembayaran_rill" hidden>
<!-- Modal -->
<div class="modal fade" id="modalRill" tabindex="-1" aria-labelledby="modalRillLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalRillLabel">Daftar Pengeluaran Rill</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

        <table class="table table-sm table-active" id="table-input-rill">
          <thead>
            <tr class="text-center bg-secondary text-white">
              <th style="width: 5%">Act</th>
              <th style="width: 40%">Rincian</th>
              <th style="width: 10%">Giat</th>
              <th>x</th>
              <th>Biaya</th>
              <th>Jumlah</th>
              <th>Keterangan</th>
            </tr>
          </thead>
          <tbody id="form-lain-lain-rill">
            
          </tbody>
          <tfoot>
              <tr>
                  <th>Jumlah</th>
                  <td id="jumlahTotalRill">0,0</td>
              </tr>
              <tr><td colspan="7" class="text-danger">Hapus/Ubah Pengeluaran yang tidak diperlukan</td></tr>
          </tfoot>
        </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
</form>