<!-- Modal -->
<div class="modal fade" id="editTujuanModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
        <form action="{{route('edit-tujuan')}}" method="POST">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Tujuan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
            @csrf
            <div class="form-group">
                <label for="form-tujuan-nama">Nama tujuan</label>
                <input type="text" name="nama_tujuan" id="form-tujuan-nama" class="form-control">
                <input type="text" name="id_tujuan" id="form-tujuan-id" hidden>
            </div>
            <div class="form-group">
                <label for="form-tujuan-uang_harian">Uang Harian</label>
                <input type="text" name="uang_harian" id="form-tujuan-uang_harian" class="form-control">
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Save changes</button>
        </div>
    </form>
    </div>
  </div>
</div>