<!-- Modal -->
<div class="modal fade" id="editPangkatModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
        <form action="{{route('edit-pangkat')}}" method="POST">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Pangkat</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
            @csrf
            <div class="form-group">
                <label for="nama-pangkat">Nama Pangkat</label>
                <input type="text" name="nama_pangkat" id="form-pangkat-nama" class="form-control">
                <input type="text" name="id_pangkat" id="form-pangkat-id" hidden>
            </div>
            <div class="form-group">
                <label for="golongan-pangkat">Golongan</label>
                <input type="text" name="golongan" id="form-pangkat-golongan" class="form-control">
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