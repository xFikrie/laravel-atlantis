<div class="modal fade" id="modalData" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="alert alert-warning d-none" id="errorMessage">
                </div>
                <form id="myForm">
                    @csrf
                    <input type="hidden" name="id" id="id">
                    <input type="hidden" name="coverH" id="coverH">
                    <input type="hidden" name="pdfH" id="pdfH">
                    <div class="form-row">
                        <div class=" form-group col-md">
                            <label for="judul">Judul</label>
                            <input type="text" class="form-control" id="judul" name="judul"
                                placeholder="Masukkan Judul Berita">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class=" form-group col-md">
                            <div class="pdfEdit"></div>
                            <label for="pdf">PDF</label>
                            <input type="file" name="pdf" id="pdf" class="form-control">
                            <p class="text-danger"><small>*Kosongkan jika pdf tidak ingin diubah</small></p>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class=" form-group col-md">
                            <div class="coverEdit"></div>
                            <label for="cover">Cover Berita</label>
                            <input type="file" name="cover" id="cover" class="form-control">
                            <p class="text-danger"><small>*Kosongkan jika cover tidak ingin diubah</small></p>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class=" form-group col-md">
                            <label for="kategori_id">Kategori</label>
                            <select class="form-control" name="kategori_id" id="kategori_id">
                                <option value="">-- Pilih Kategori Berita --</option>
                                @foreach ($kategori as $item)
                                    <option value={{ $item->id }}>{{ $item->nama }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="submit" name="submit" class="btn btn-primary" id="submit"
                    onclick="prosesHandle(event)">Submit</button>
                <button type="button" name="loading" class="btn btn-success disabled d-none" id="loading">
                    <div class="d-flex align-items-center">
                        <div class="spinner-border spinner-border-sm mr-1" role="status">
                            <span class="sr-only">Loading...</span>
                        </div>
                        Loading...
                    </div>
                </button>
                </form>
            </div>
        </div>
    </div>
</div>
