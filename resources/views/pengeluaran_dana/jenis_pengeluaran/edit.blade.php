<!-- Modal Edit -->
<div class="modal fade" id="ModalEdit{{ $index }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Jenis Pengeluaran</h5>
                <button type="button" class="close" data-dismiss="modal" arialabel="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        <div class="modal-body">
            <form class="form-group" action="/edit_jp/{{ $jp->id }}" method="POST">
            @csrf
            @method('PUT')
                <div class="mb-4 row">
                    <label for="name_of_type_expenditure" class="col-form-label text-gray-900"><strong> Jenis Pengeluaran <span class="required" id="name_awarde_required">*</span></strong></label>
                    <div class="col-md-12">
                        <input type="text" class="form-control text-gray-900" name="name_of_type_expenditure" value="{{ $jp->name_of_type_expenditure }}" required>
                    </div>
                </div>
                <div class="row">
                    <label for="description_of_type_expenditure" class="col-form-label text-gray-900"><strong> Deskripsi Jenis Pengeluaran </strong></label>
                    <div class="col-md-12">
                        <input type="hidden" class="form-control text-gray-900" name="description_of_type_expenditure" id="x{{ $index }}" value="{{ $jp->description_of_type_expenditure }}">
                        <trix-editor input="x{{ $index }}" class="text-gray-900"></trix-editor>
                    </div>
                </div>
            </div>
            <!-- footer modal -->
            <div class="modal-footer">
                <a href='/pengeluaran' type="button" class="btn btn-warning" data-dismiss="modal"> Back </a>
                <button type="submit" class="btn btn-success"> Update </button>
            </div>
            </form>
        </div>
    </div>
</div>