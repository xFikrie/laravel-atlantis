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
                <div class="alert alert-warning d-none" id="errorMessage">
                </div>
                <form id="myForm">
                    @csrf
                    <input type="hidden" name="id" id="id">
                    <div class="form-row">
                        <div class="form-group col-md">
                            <label for="nama">Nama</label>
                            <input type="text" class="form-control" id="nama" name="nama"
                                placeholder="Masukkan Nama Role">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class=" form-group col-md">
                            <label for="permissions">Permissions</label>
                            <select class="select2" multiple="multiple" data-placeholder="--Pilih Permissions--"
                                style="width: 100%;" id="permissions" name="permissions[]">
                                @foreach ($permission as $item)
                                    <option value={{ $item->id }}>{{ $item->title }}</option>
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
