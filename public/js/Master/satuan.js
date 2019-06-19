
var table = $('#example2').DataTable({
    lengthMenu: [[5, 10, 15, -1], [5, 10, 15, "All"]],
    autowidth: true,
    serverSide: true,
    processing: false,
    ajax: '/admin/satuan/dataSatuan',
    columns: [
        { data: 'DT_RowIndex', name: 'DT_RowIndex', searchable: false, orderable: false, sortable: false },
        { data: 'kdSatuan', name: 'kdSatuan' },
        { data: 'namaSatuan', name: 'namaSatuan' },
        { data: 'action', name: 'action', searchable: false, orderable: false }
    ]

});