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
                                placeholder="Masukkan Nama User">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" id="email" name="email"
                                placeholder="Masukkan Email User">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md">
                            <label for="password">Password</label>
                            <div class="input-group">
                                <input type="password" class="form-control" id="password" name="password"
                                    placeholder="Masukkan Password">
                                <button type="button" class="input-group-text show-password">&#128065;</button>
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md">
                            <label for="password_confirmation">Confirm Password</label>
                            <div class="input-group">
                                <input type="password" class="form-control" id="password_confirmation"
                                    name="password_confirmation" placeholder="Masukkan Confirm Password">
                                <button type="button" class="input-group-text show-confirmPassword">&#128065;</button>
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md">
                            <label for="role_id">Role</label>
                            <select name="role_id" id="role_id" class="form-control">
                                <option value="">-- Pilih Role --</option>
                                @foreach ($role as $item)
                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
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
