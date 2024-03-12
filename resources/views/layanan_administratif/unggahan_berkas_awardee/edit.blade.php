<!-- Modal Edit -->
<div class="modal fade" id="ModalEdit{{ $index }}">
    <div class="modal-dialog" role="dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Unggahan Berkas Awardee </h5>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
        <div class="modal-body">
            <form role="form" action="/daftar_file_beasiswa/{{ $fb->id }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
                <div class="mb-4 row">
                    <label for="status" class="col-form-label text-gray-900">Status<span class="required" id="name_awarde_required">*</span></label>
                    <div class="col-md-12">
                        <select class="form-control text-gray-900" name="status" required>
                            @foreach(['Diterima', 'Ditolak', 'Menunggu'] as $option)
                            <option {{ $fb->status == $option ? 'selected' : '' }}>{{ $option }}</option>
                            @endforeach
                        </select>
                    </div>
                    <label for="status" class="col-form-label text-gray-900">Catatan</label>
                    <div class="col-md-12">
                        <input type="hidden" class="form-control text-gray-900" name="deskripsi" id="deskripsi_hidden_{{ $index }}" value="{{ $fb->deskripsi }}">
                        <trix-editor input="deskripsi_hidden_{{ $index }}" class="text-gray-900"></trix-editor>
                    </div>                    
                </div>
            </div>
            <!-- footer modal -->
            <div class="modal-footer">
                <button type="button" class="btn btn-warning" data-dismiss="modal">Back</button>
                <button type="submit" class="btn btn-success"> Update </button>
            </div>
            </form>
        </div>
    </div>
</div>