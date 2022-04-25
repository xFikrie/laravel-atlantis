<div class="modal fade" id="modalData" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p class="text-danger text-center">--- PASTIKAN ROUTE/WEB SUDAH ADA ---</p>
                <div class="alert alert-warning d-none" id="errorMessage">
                </div>
                <form id="myForm">
                    @csrf
                    <input type="hidden" name="id" id="id">
                    <div class="form-row">
                        <div class="form-group col-md">
                            <label for="module">Module</label>
                            <input type="text" class="form-control" id="module" name="module"
                                placeholder="Masukkan Nama Module">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md">
                            <label for="icon">Icon</label>
                            <input type="text" class="form-control" id="icon" name="icon"
                                placeholder="Masukkan Nama Icon">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md">
                            <label for="url">URL</label>
                            <input type="text" class="form-control" id="url" name="url" placeholder="Masukkan URL">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md">
                            <label for="parent">Parent</label>
                            <select name="parent" id="parent" class="form-control">
                                <option value="0">-- Pilih Parent --</option>
                                @foreach ($parent as $item)
                                    <option value="{{ $item->id }}">{{ $item->module }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md">
                            <label for="urutan">Urutan</label>
                            <input type="number" class="form-control" id="urutan" name="urutan"
                                placeholder="Masukkan Urutan Menu">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md">
                            <label for="command">Command Artisan</label>
                            <input type="text" class="form-control" id="command" name="command"
                                placeholder="Masukkan Command Artisan">
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
