
var table = $('#example2').DataTable({
    lengthMenu: [[5, 10, 15, -1], [5, 10, 15, "All"]],
    autowidth: true,
    serverSide: true,
    processing: false,
    ajax: '/admin/member/dataMember',
    columns: [
        { data: 'DT_RowIndex', name: 'DT_RowIndex', searchable: false, orderable: false, sortable: false },
        { data: 'username', name: 'username' },
        { data: 'email', name: 'email' },
        { data: 'nohp', name: 'nohp' },
        { data: 'alamat', name: 'alamat' },
        { data: 'tglLahir', name: 'tglLahir' }
    ]

});