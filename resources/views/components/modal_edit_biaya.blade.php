<!-- Modal -->
<div class="modal fade" id="editBiayaModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
        <form action="{{route('edit-biaya-kegiatan')}}" method="POST">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Biaya</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
            @csrf
            <div class="form-group">
                <label for="pembayaran">Nama Kegiatan</label>
                <input type="text" name="nama_kegiatan" id="form-nama-kegiatan" class="form-control">
            </div>
            <div class="form-group">
                <label for="pembayaran">Biaya</label>
                <input type="number" name="biaya" id="form-biaya-kegiatan" class="form-control">
            </div>
        </div>
        <div class="modal-footer">
            <input type="hidden" name="id_biaya" id="form-biaya-id" class="form-control">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Save changes</button>
        </div>
    </form>
    </div>
  </div>
</div>
