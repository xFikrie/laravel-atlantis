<x-app-layout>
    <x-slot name="title">
        Module
    </x-slot>

    <div class="content">
        <div class="panel-header bg-primary-gradient">
            <div class="page-inner py-5">
                <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
                    <div>
                        <h2 class="text-white pb-2 fw-bold">Module</h2>
                        <h5 class="text-white op-7 mb-2">Daftar Module</h5>
                    </div>
                    <div class="ml-md-auto py-2 py-md-0">
                        <a href="#" class="btn btn-secondary btn-round" onclick="tambahHandle()">Add Module</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="page-inner mt--5">
            <div class="row row-card-no-pd">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="table-responsive">
                                        <table class="table table-striped table-hover" id="tableX" width="100%">
                                            <thead>
                                                <tr>
                                                    <th width="10%">#</th>
                                                    <th>Module</th>
                                                    <th>Icon</th>
                                                    <th>URL</th>
                                                    <th>Urutan</th>
                                                    <th width="10%">Aksi</th>
                                                </tr>
                                            </thead>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('setting.module.form')

    @section('js')
        <script>
            $(".loading").removeClass('d-none')
            $(document).ready(function() {
                var table = $('#tableX').DataTable({
                    processing: true,
                    serverSide: true,
                    responsive: true,
                    ajax: "/setting/moduleGet",
                    columns: [{
                        data: "id",
                        render: function(data, type, row, meta) {
                            return meta.row + meta.settings._iDisplayStart + 1;
                        }
                    }, {
                        data: "module",
                        name: "module",
                    }, {
                        data: "icon",
                        name: "icon",
                        render: function(data, type, row, meta) {
                            return `<i class="`+data+' fa-2x'+`"></i>`;
                        }
                    }, {
                        data: "url",
                        name: "url",
                    }, {
                        data: "urutan",
                        name: "urutan",
                    }, {
                        data: function(row, type, set, meta) {
                            return (
                                `<div class="btn-group"> <button type="button" class="btn btn-warning btn-sm" onClick="editHandle(` +
                                row.id +
                                `)">Edit</button> <button type="button" class="btn btn-danger btn-sm" onClick="deleteHandle(` +
                                row.id +
                                `)">Delete</button> </div>`
                            );
                        },
                        sortable: false,
                        searchable: false,
                    }, ],
                    lengthMenu: [10, 20, 50],
                    pageLength: 10,
                });

                table.on('order.dt search.dt', function() {
                    let i = 1;

                    table.cells(null, 0, {
                        search: 'applied',
                        order: 'applied'
                    }).every(function(cell) {
                        this.data(i++);
                    });
                }).draw();
                $(".loading").addClass('d-none')

            }); // END READY

            const tambahHandle = () => {
                clearForm();
                actionX = "Tambah";
                $("#id").attr("disabled", true);
                $(".modal-title").html("Tambah Data");
                $(".perhatianText").addClass("d-none");
                $("#email").attr('readonly', false);
                $("#modalData").modal("show");
            };

            const editHandle = (id) => {
                clearForm();
                actionX = "Edit";
                $("#id").removeAttr("disabled");
                $(".modal-title").html("Edit Data");
                $(".perhatianText").removeClass("d-none");

                $.get("/setting/moduleEdit/" + id, function(data) {
                    $("#id").val(id);
                    $("#module").val(data.module);
                    $("#icon").val(data.icon);
                    $("#url").val(data.url);
                    $("#urutan").val(data.urutan);
                    $("#modalData").modal("show");
                });
            };

            const prosesHandle = () => {
                event.preventDefault();
                var form_ = $("#myForm");
                var formData = new FormData(form_[0])
                $.ajax({
                    type: "post",
                    dataType: "json",
                    url: "/setting/moduleStore",
                    data: formData,
                    cache: false,
                    contentType: false,
                    processData: false,
                    beforeSend: function() {
                        $(".loading").removeClass("d-none");
                        $("#submit").addClass("d-none");
                    },
                    success: function(data, status, xhr) {
                        $("#modalData").modal("hide");
                        Swal.fire({
                            icon: "success",
                            title: actionX + " Berhasil!",
                            showConfirmButton: false,
                            timer: 1500,
                            width: "23em",
                        });
                        $("#tableX").DataTable().ajax.reload();
                        $(".loading").addClass("d-none");
                    },
                    error: function(jqXhr, textStatus, errorMessage) {
                        $(".loading").addClass("d-none");
                        var kuda = jqXhr.responseJSON.errors;
                        clearAlert();
                        $("#errorMessage").removeClass("d-none")
                        $("#errorMessage").append(
                            `<ul id="errorDelete className="text-white">`
                        );
                        $.each(kuda, function(key, value) {
                            $("#errorMessage").append(`<li class="liErrorMessage">` + value + `</li>`);
                        });
                        $("#errorMessage").append("<ul>");
                    },
                    statusCode: {
                        500: function() {
                            $(".loading").addClass("d-none");
                            $("#submit").removeClass("d-none");
                            $("#modalData").modal("hide");
                        },
                        404: function() {
                            $(".loading").addClass("d-none");
                            $("#submit").removeClass("d-none");
                            $("#modalData").modal("hide");
                        },
                        422: function() {
                            $(".loading").addClass("d-none");
                            $("#submit").removeClass("d-none");
                        },
                    },
                });
            };

            const deleteHandle = (id) => {
                Swal.fire({
                    title: "Yakin mau delete data ini?",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Ya, delete!",
                    cancelButtonText: "Batal",
                    width: "28em",
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            data: {
                                _token: "{{ csrf_token() }}",
                            },
                            type: "post",
                            dataType: "json",
                            url: "/setting/moduleDestroy/" + id,
                            success: function(data) {
                                Swal.fire({
                                    icon: "success",
                                    title: "Delete Berhasil!",
                                    showConfirmButton: false,
                                    timer: 1500,
                                    width: "23em",
                                });
                                $("#tableX").DataTable().ajax.reload();
                            },
                            error: function(jqXhr, textStatus, errorMessage) {
                                console.log(errorMessage);
                            },
                        });
                    }
                });
            };

            function showConfirmPassword(button) {
                var inputPassword = $(button).parent().find("input");
                if (inputPassword.attr("type") === "password") {
                    inputPassword.attr("type", "text");
                } else {
                    inputPassword.attr("type", "password");
                }
            }

            $(".show-confirmPassword").on("click", function() {
                showConfirmPassword(this);
            });
        </script>
    @endsection
</x-app-layout>
