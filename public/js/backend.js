$(document).ready(function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $('.summernote').summernote({
        height: 150,
        focus: true
    });
    //-----------------------------------------------------------------------------------------------------------------//

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
                sortable: !0,
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

    function notifikasiToastr() {
        toastr.options = {
            "closeButton": true,
            "debug": false,
            "newestOnTop": true,
            "progressBar": true,
            "positionClass": "toast-top-right",
            "preventDuplicates": true,
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
    //-----------------------------------------------------------------------------------------------------------------//
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
        const method = "PUT";

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
                $('#isi').val(data.artikel_form[0].isi);
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
        const isi = $('#isi').val();
        const status_artikel = $('#status_artikel').val();
        $.ajax({
            type: method,
            url: ((judul == '') && (method == 'PUT')) ? 'gantiStatusArtikel/' + param : 'artikel/' + param,
            data: {
                kategori_id: kategori_id,
                judul: judul,
                isi: isi,
                status_artikel: status_artikel,
                '_token': $('input[name=_token]').val(),
            },
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
    //-----------------------------------------------------------------------------------------------------------------//
    $('.m-menu__item').on('click', function () {
        $('.m-menu__item').removeClass('m-menu__item--active');
        $(this).addClass('m-menu__item--active');
    })
    // $('.row').on('click', '.lihatDetail', function () {
    //     $('.row').html('');
    //     const getId = $(this).data('id');
    //     $.ajax({
    //         type: 'GET',
    //         url: 'lihatDetailPost/' + getId,
    //         success: function (data) {                
    //             let getDetail = `
    //             <div class="m-portlet m-portlet--bordered-semi m-portlet--full-height  m-portlet--rounded-force">
    //             <div class="m-portlet__head m-portlet__head--fit">
    //                 <div class="m-portlet__head-caption">
    //                     <div class="m-portlet__head-action">
    //                         <button type="button" class="btn btn-sm m-btn--pill  btn-brand">${data.data[0].nama}</button>
    //                     </div>
    //                 </div>
    //             </div>
    //             <div class="m-portlet__body">
    //                 <div class="m-widget19">
    //                     <div class="m-widget19__pic m-portlet-fit--top m-portlet-fit--sides" style="min-height-: 286px">
    //                         <img src="assets/app/media/img//blog/blog1.jpg" alt="">
    //                         <h3 class="m-widget19__title m--font-light">
    //                         ${data.data[0].judul}
    //                         </h3>
    //                     <div class="m-widget19__shadow"></div>
    //                 </div>
    //             <div class="m-widget19__content">
    //                 <div class="m-widget19__header">
    //                     <div class="m-widget19__user-img">
    //                         <img class="m-widget19__img" src="assets/app/media/img//users/user1.jpg" alt="">
    //                     </div>
    //                     <div class="m-widget19__info">
    //                         <span class="m-widget19__username">
    //                         ${data.data[0].name}
    //                         </span>
    //                         <br>
    //                         <span class="m-widget19__time">
    //                         ${data.data[0].email}
    //                         </span>
    //                     </div>
    //                 </div>
    //                 <div class="m-widget19__body">
    //                     ${data.data[0].isi}
    //                 </div>
    //             </div>
    //                     <div class="m-widget19__action">
    //                         <button type="button" class="btn m-btn--pill btn-secondary m-btn m-btn--hover-brand m-btn--custom allPosts">Kembali</button>
    //                     </div>
    //                 </div>
    //             </div>        
    //         </div>
    //     </div>`;
    //             $('.row').html(getDetail);
    //         }
    //     })
    // });
    // $('.row').on('click', '.allPosts', function () {
    //     $.ajax({
    //         type: 'GET',
    //         url: '/getAllPosts',
    //         dataType: 'json',
    //         success: function (data) {
    //             let getAllPosts = '';
    //             $('.row').html('');
    //             $.each(data.data, function (key, value) {
    //                 getAllPosts = `
    //                 <div class="row">
    //                 <div class="col-xl-12 col-sm-12 col-md-12">
    //                     <div class="m-portlet m-portlet--mobile ">
    //                         <div class="m-portlet__head">
    //                             <div class="m-portlet__head-caption">
    //                                 <div class="m-portlet__head-title">
    //                                     <h3 class="m-portlet__head-text">
    //                                         Posts
    //                                     </h3>
    //                                 </div>
    //                             </div>									
    //                         </div>
    //                 <div class="m-portlet m-portlet--bordered-semi m-portlet--full-height  m-portlet--rounded-force">
    //                 <div class="m-portlet__head m-portlet__head--fit">
    //                     <div class="m-portlet__head-caption">
    //                         <div class="m-portlet__head-action">
    //                             <button type="button" class="btn btn-sm m-btn--pill  btn-brand">${data.data[0].nama}</button>
    //                         </div>
    //                     </div>
    //                 </div>
    //                 <div class="m-portlet__body">
    //                     <div class="m-widget19">
    //                         <div class="m-widget19__pic m-portlet-fit--top m-portlet-fit--sides" style="min-height-: 286px">
    //                             <img src="assets/app/media/img//blog/blog1.jpg" alt="">
    //                             <h3 class="m-widget19__title m--font-light">
    //                             ${data.data[0].judul}
    //                             </h3>
    //                         <div class="m-widget19__shadow"></div>
    //                     </div>
    //                 <div class="m-widget19__content">
    //                     <div class="m-widget19__header">
    //                         <div class="m-widget19__user-img">
    //                             <img class="m-widget19__img" src="assets/app/media/img//users/user1.jpg" alt="">
    //                         </div>
    //                         <div class="m-widget19__info">
    //                             <span class="m-widget19__username">
    //                             ${data.data[0].name}
    //                             </span>
    //                             <br>
    //                             <span class="m-widget19__time">
    //                             ${data.data[0].email}
    //                             </span>
    //                         </div>
    //                     </div>
    //                     <div class="m-widget19__body">
    //                         ${data.data[0].isi}
    //                     </div>
    //                 </div>
    //                         <div class="m-widget19__action">
    //                             <button type="button" class="btn m-btn--pill btn-secondary m-btn m-btn--hover-brand m-btn--custom allPosts">Kembali</button>
    //                         </div>
    //                     </div>
    //                 </div>
    //             </div>
    //             </div>`;
    
    //             })
    //             $('.row').html(getAllPosts);
    //         }
    //     })
    // })    
})