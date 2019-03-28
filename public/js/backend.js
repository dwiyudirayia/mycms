$(document).ready(function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $('.summernote').summernote({
        height: 200,
        focus: true,
        callbacks: {
            onMediaDelete: function (target) {
                deleteImageIsi(target[0].src);
            }
        }
    });
    function deleteImageIsi(src) {
        $.ajax({
            url: '/deleteImageIsi',
            type: 'POST',
            data: {
                src: src
            },
            success: function (res) {                
            },
            error: function (res) {
            }
        })
    }
    function notifikasiToastr() {
        toastr.options = {
            "closeButton": true,
            "debug": false,
            "newestOnTop": true,
            "progressBar": true,
            "positionClass": "toast-top-right",
            "preventDuplicates": false,
            "onclick": null,
            "showDuration": "300",
            "hideDuration": "1000",
            "timeOut": "3000",
            "extendedTimeOut": "1000",
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut"
        }
    }
    //----------------------------------------------------------------------------------------------------------------//

    //Backend JS Kategori
    const kategoriTable = $("#kategori-table").mDatatable({
        data: {
            type: "remote",
            source: {
                read: {
                    url: '/getKategori',
                    method: 'GET',
                }
            },
            pageSize: 10,
            saveState: {
                cookie: !1,
                webstorage: !0
            },
            serverPaging: !0,
            serverFiltering: !0,
            serverSorting: !0,
        },
        layout: {
            theme: "default",
            class: "table table-bordered",
            scroll: 10,
            height: 300,
            width: 100,
            footer: 11,
        },
        sortable: !0,
        filterable: !0,
        pagination: !0,
        columns: [{
            field: "id",
            title: "#",
            sortable: !1,
            width: 0,
            selector: {
                class: "m-checkbox--solid m-checkbox--brand"
            },
            textAlign: "center"
        },
        {
            field: "nama",
            title: "Nama",
            sortable: !0,
            width: 180,
            textAlign: "center",
        },
        {
            field: "action",
            title: "Action",
            sortable: !1,
            width: 180,
            textAlign: "center",
        }
        ]
    });
    $('#kategori-table').on('click', '#deleteKategoriModal', function () {
        const param = $(this).data('id');
        const label = $(this).data('label');
        const method = "DELETE";

        $('#modalKategori').modal({
            show: true
        });

        $('#buttonSubmit').removeClass('btn-primary');
        $('#buttonSubmit').addClass('btn-danger');
        $('#buttonSubmit').text('Delete');
        $('#modalKategoriLabel').html('Delete Kategori');
        $('p').show();
        $('p').html('Data Yang di Hapus Dengan Nama <strong>' + label + '</strong>');
        $('#formInfo').hide();
        $('#idParam').val(param);
        $('#method').val(method);
    })
    $('#kategori-table').on('click', '#editKategoriModal', function () {
        const param = $(this).data('id');
        const method = "PUT";

        $('#modalKategori').modal({
            show: true
        });

        $('#buttonSubmit').addClass('btn-primary');
        $('#buttonSubmit').removeClass('btn-danger');
        $('#buttonSubmit').text('Submit');

        $('p').hide();
        $('#modalKategoriLabel').html('Edit Kategori');
        $('#formInfo').show();
        $('#idParam').val(param);
        $('#method').val(method);

        $.ajax({
            url: 'kategori/' + param + '/edit',
            type: 'GET',
            dataType: 'JSON',
            success: function (data) {
                $('#nama').val(data.nama);
            }
        })
    })

    $('#kategori-table').on('click', '#gantiStatus', function () {
        const param = $(this).data('id');
        const label = $(this).data('label');
        const method = "PUT";
        $('#modalKategori').modal({
            show: true
        });

        $('#modalKategoriLabel').html('Ganti Status Kategori');
        $('p').show();
        $('p').html('Ganti Status di Nama Kategori <strong>' + label + '</strong>');
        $('#formInfo').hide();
        $('#idParam').val(param);
        $('#method').val(method);
    })
    $('#modalKategori').on('click', '#buttonSubmit', function () {
        const param = $('#idParam').val();
        const method = $('#method').val();
        const nama = $('#nama').val();

        $.ajax({
            type: method,
            url: ((nama == '') && (method == 'PUT')) ? 'gantiStatusKategori/' + param : 'kategori/' + param,
            data: {
                nama: nama,
                '_token': $('input[name=_token]').val(),
            },
            success: function () {
                $('#triggerReset').trigger('reset');
                notifikasiToastr();
                toastr.success("Anda Berhasil Memproses Data", "Notifikasi");
                $('#nama').val('');
                $('#modalKategori').modal('hide');
                kategoriTable.reload();
            },
            error: function () {
                notifikasiToastr();
                toastr.error("Anda Gagal Memproses Data", "Notifikasi");
            }
        });
    });
    //----------------------------------------------------------------------------------------------------------------//

    //Backend JS Artikel
    const artikelTable = $("#artikel-table").mDatatable({
        data: {
            type: "remote",
            source: {
                read: {
                    url: '/getArtikel',
                    method: 'GET',
                }
            },
            pageSize: 10,
            saveState: {
                cookie: !1,
                webstorage: !0
            },
            serverPaging: !0,
            serverFiltering: !0,
            serverSorting: !0,
        },
        layout: {
            theme: "default",
            class: "table table-bordered",
            scroll: 10,
            height: 300,
            width: 100,
            footer: 11,
        },
        sortable: !0,
        filterable: !0,
        pagination: !0,
        columns: [{
            field: "id",
            title: "#",
            sortable: !1,
            width: 0,
            selector: {
                class: "m-checkbox--solid m-checkbox--brand"
            },
            textAlign: "center"
        },
        {
            field: "judul",
            title: "Judul",
            sortable: !0,
            width: 180,
            textAlign: "center",
        },
        {
            field: "action",
            title: "Action",
            sortable: !0,
            width: 180,
            textAlign: "center",
        }
        ]
    });
    $('#artikel-table').on('click', '#editArtikelModal', function () {
        const param = $(this).data('id');
        const method = "POST";

        $('#modalArtikel').modal({
            show: true
        });

        $('p').hide();
        $('#modalArtikelLabel').html('Edit Artikel');
        $('#buttonSubmit').text('Update');
        $('#buttonSubmit').addClass('btn-primary');
        $('#buttonSubmit').removeClass('btn-danger');
        $('#formInfo').show();
        $('#idParam').val(param);
        $('#method').val(method);

        $.ajax({
            url: 'artikel/' + param + '/edit',
            type: 'GET',
            dataType: 'JSON',
            success: function (data) {
                $('#judul').val(data.artikel_form[0].judul);
                $('#isi').summernote('code', data.artikel_form[0].isi);
                $('#status_artikel').val(data.artikel_form[0].status_artikel);
                let option;
                $.map(data.kategori, function (value) {
                    option += '<option value="' + value.id + '">' + value.nama + '</option>';
                })
                $('#kategori_id').html(option);
                $('#kategori_id').val(data.artikel_form[0].kategori_id);
            }
        })
    })
    $('#artikel-table').on('click', '#gantiStatus', function () {
        const param = $(this).data('id');
        const label = $(this).data('label');
        const method = "PUT";

        $('#modalArtikel').modal({
            show: true
        });

        $('#modalArtikelLabel').html('Ganti Status Artikel');
        $('#buttonSubmit').text('Update');
        $('#buttonSubmit').addClass('btn-primary');
        $('#buttonSubmit').removeClass('btn-danger');
        $('p').show();
        $('p').html('Ganti Status di Judul <strong>' + label + '</strong>');
        $('#formInfo').hide();
        $('#idParam').val(param);
        $('#method').val(method);
    })
    $('#artikel-table').on('click', '#deleteArtikelModal', function () {

        const param = $(this).data('id');
        const label = $(this).data('label');
        const method = "DELETE";

        $('#modalArtikel').modal({
            show: true
        });

        $('#modalArtikelLabel').html('Delete Artikel');
        $('#buttonSubmit').text('Delete');
        $('#buttonSubmit').removeClass('btn-primary');
        $('#buttonSubmit').addClass('btn-danger');
        $('p').show();
        $('p').html('Data Yang di Hapus Dengan Nama <strong>' + label + '</strong>');
        $('#formInfo').hide();
        $('#idParam').val(param);
        $('#method').val(method);
    })

    $('#modalArtikel').on('click', '#buttonSubmit', function () {
        const param = $('#idParam').val();
        const method = $('#method').val();

        const kategori_id = $('#kategori_id').val();
        const judul = $('#judul').val();
        const headerImage = $('#headerImage')[0].files[0];
        const isi = $('#isi').val();
        const status_artikel = $('#status_artikel').val();
        const token = $('input[name=_token]').val();

        const formData = new FormData();
        formData.append('kategori_id', kategori_id);
        formData.append('judul', judul);
        formData.append('headerImage', headerImage);
        formData.append('isi', isi);
        formData.append('status_artikel', status_artikel);
        formData.append('_token', token);
        formData.append('_method', 'PUT');

        $.ajax({
            type: method,
            url: ((judul == '') && (method == 'PUT')) ? 'gantiStatusArtikel/' + param : 'artikel/' + param,
            data: formData,
            cache: false,
            contentType: false,
            processData: false,
            success: function (data) {
                notifikasiToastr();
                toastr.success("Anda Berhasil Memproses Data", "Notifikasi");
                $('#triggerReset').trigger('reset');
                $('#modalArtikel').modal('hide');
                artikelTable.reload();
            },
            error: function () {
                notifikasiToastr();
                toastr.error("Anda Gagal Memproses Data", "Notifikasi");
            }
        });
    });
    //----------------------------------------------------------------------------------------------------------------//
    // Backend JS User

    const usersIndexTable = $("#usersIndex-table").mDatatable({
        data: {
            type: "remote",
            source: {
                read: {
                    url: '/getUsers',
                    method: 'GET',
                }
            },
            pageSize: 10,
            saveState: {
                cookie: !1,
                webstorage: !0
            },
            serverPaging: !0,
            serverFiltering: !0,
            serverSorting: !0,
        },
        layout: {
            theme: "default",
            class: "table table-bordered",
            scroll: 10,
            height: 300,
            width: 100,
            footer: 11,
        },
        sortable: !0,
        filterable: !0,
        pagination: !0,
        columns: [{
            field: "id",
            title: "#",
            sortable: !1,
            width: 0,
            selector: {
                class: "m-checkbox--solid m-checkbox--brand"
            },
            textAlign: "center"
        },
        {
            field: "name",
            title: "Nama",
            sortable: !0,
            width: 180,
            textAlign: "center",
        },
        {
            field: "action",
            title: "Action",
            sortable: !1,
            width: 180,
            textAlign: "center",
        }
        ]
    })
    $('#usersIndex-table').on('click', '#deleteManagementUser', function () {
        const param = $(this).data('id');
        const label = $(this).data('label');
        const method = "DELETE";

        $('#modalManagementUser').modal({
            show: true
        });

        $('#buttonSubmit').removeClass('btn-primary');
        $('#buttonSubmit').addClass('btn-danger');
        $('#buttonSubmit').text('Delete');
        $('#modalManagementUserLabel').html('Delete User');
        $('p').show();
        $('p').html('Data Yang di Hapus Dengan Nama <strong>' + label + '</strong>');
        $('#formInfo').hide();
        $('#idParam').val(param);
        $('#method').val(method);
    })
    $('#usersIndex-table').on('click', '#editManagementUser', function () {
        const param = $(this).data('id');
        const method = "PUT";

        $('#modalManagementUser').modal({
            show: true
        });

        $('#buttonSubmit').addClass('btn-primary');
        $('#buttonSubmit').removeClass('btn-danger');
        $('#buttonSubmit').text('Submit');

        $('p').hide();
        $('#modalManagementUserLabel').html('Edit User');
        $('#formInfo').show();
        $('#idParam').val(param);
        $('#method').val(method);

        $.ajax({
            url: 'oprationUsers/' + param + '/edit',
            type: 'GET',
            dataType: 'JSON',
            success: function (data) {
                $('#name').val(data.user.name);
                $('#email').val(data.user.email);
                console.log(data);
                let roles = '';                
                $.map(data.role, function (value, index) {
                    
                    roles += `<label class="m-checkbox m-checkbox--solid m-checkbox--primary">
                                <input type="checkbox" name="role[]" value="${value.id}" ${(value.name === data.getRoleNames[index] ? "checked" : "")}> ${value.name}
                                <span></span>
                            </label>`                    
                })

                $('#updateRoles').html(roles)

            }
        })
    })

    $('#usersIndex-table').on('click', '#gantiStatus', function () {
        const param = $(this).data('id');
        const label = $(this).data('label');
        const method = "PUT";
        $('#deleteManagementUser').modal({
            show: true
        });

        $('#modalManagementUserLabel').html('Ganti Status User');
        $('p').show();
        $('p').html('Ganti Status di Nama User <strong>' + label + '</strong>');
        $('#formInfo').hide();
        $('#idParam').val(param);
        $('#method').val(method);
    })
    $('#modalManagementUser').on('click', '#buttonSubmit', function () {
        const param = $('#idParam').val();
        const method = $('#method').val();
        const name = $('#name').val();
        const email = $('#email').val();
        const role = $('input[name="role[]"]:checked').map(function () {
            return this.value; // $(this).val()
        }).get();
        
        $.ajax({
            type: method,
            url: ((name == '') && (method == 'PUT')) ? 'gantiStatusKategori/' + param : 'oprationUsers/' + param,
            data: {
                name: name,
                email: email,
                role: role,
                '_token': $('input[name=_token]').val(),
            },
            success: function (data) {                
                $('#triggerReset').trigger('reset');
                notifikasiToastr();
                $('#modalManagementUser').modal('hide');
                usersIndexTable.reload();
            },
            error: function () {
                notifikasiToastr();
                toastr.error("Anda Gagal Memproses Data", "Notifikasi");
            }
        });
    });
    //----------------------------------------------------------------------------------------------------------------//

    // Backend JS Menu
    const menuGroupingTable = $("#menuGrouping-table").mDatatable({
        data: {
            type: "remote",
            source: {
                read: {
                    url: '/getMenu',
                    method: 'GET',
                }
            },
            pageSize: 10,
            saveState: {
                cookie: !1,
                webstorage: !0
            },
            serverPaging: !0,
            serverFiltering: !0,
            serverSorting: !0,
        },
        layout: {
            theme: "default",
            class: "table table-bordered",
            scroll: 10,
            height: 300,
            width: 100,
            footer: 11,
        },
        sortable: !0,
        filterable: !0,
        pagination: !0,
        columns: [{
            field: "id",
            title: "#",
            sortable: !1,
            width: 0,
            selector: {
                class: "m-checkbox--solid m-checkbox--brand"
            },
            textAlign: "center"
        },
        {
            field: "nama",
            title: "Nama",
            sortable: !0,
            width: 180,
            textAlign: "center",
        },
        {
            field: "action",
            title: "Action",
            sortable: !1,
            width: 180,
            textAlign: "center",
        }
        ]
    });
    $('#menuGrouping-table').on('click', '#deleteMenuGroupingModal', function () {
        const param = $(this).data('id');
        const label = $(this).data('label');
        const method = "DELETE";

        $('#modalMenuGrouping').modal({
            show: true
        });

        $('#buttonSubmit').removeClass('btn-primary');
        $('#buttonSubmit').addClass('btn-danger');
        $('#buttonSubmit').text('Delete');
        $('#modalMenuGroupingLabel').html('Delete Menu');
        $('p').show();
        $('p').html('Data Yang di Hapus Dengan Nama <strong>' + label + '</strong>');
        $('#formInfo').hide();
        $('#idParam').val(param);
        $('#method').val(method);
    })
    $('#menuGrouping-table').on('click', '#editMenuGroupingModal', function () {
        const param = $(this).data('id');
        const method = "PUT";

        $('#modalMenuGrouping').modal({
            show: true
        });

        $('#buttonSubmit').addClass('btn-primary');
        $('#buttonSubmit').removeClass('btn-danger');
        $('#buttonSubmit').text('Submit');

        $('p').hide();
        $('#modalMenuGroupingLabel').html('Edit Menu');
        $('#formInfo').show();
        $('#idParam').val(param);
        $('#method').val(method);

        $.ajax({
            url: 'menuGrouping/' + param + '/edit',
            type: 'GET',
            dataType: 'JSON',
            success: function (data) {
                $('#nama').val(data.nama);
            }
        })
    })
    $('#modalMenuGrouping').on('click', '#buttonSubmit', function () {
        const param = $('#idParam').val();
        const method = $('#method').val();
        const nama = $('#nama').val();
        $.ajax({
            type: method,
            url: 'menuGrouping/' + param,
            data: {
                nama: nama,
                '_token': $('input[name=_token]').val(),
            },
            success: function () {
                $('#triggerReset').trigger('reset');
                notifikasiToastr();
                toastr.success("Anda Berhasil Memproses Data", "Notifikasi");
                $('#nama').val('');
                $('#modalMenuGrouping').modal('hide');
                menuGroupingTable.reload();
            },
            error: function () {
                notifikasiToastr();
                toastr.error("Anda Gagal Memproses Data", "Notifikasi");
            }
        });
    });
});