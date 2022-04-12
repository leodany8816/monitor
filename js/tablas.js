var tablacfdis = $("#dt_cfdis").DataTable({
    scrollX: true,
    responsive: false,
    searching: false,
    order: [[0, 'desc']],
    buttons: [
        {
            extend: 'excelHtml5',
            text: 'Exportar a Excel',
            titleAttr: 'Generate Excel',
            className: 'btn-outline-success btn-sm mr-1',
            // exportOptions: {
            //   columns: 'th:not(:last-child)'
            // }
        }
    ],
    "language": {
        "sProcessing": "Procesando...",
        "sLengthMenu": "Mostrar _MENU_ registros",
        "sZeroRecords": "No se encontraron resultados",
        "sEmptyTable": "Ningún dato disponible en esta tabla",
        "sInfo": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
        "sInfoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
        "sInfoFiltered": "(filtrado de un total de _MAX_ registros)",
        "sInfoPostFix": "",
        "sSearch": '<div class="input-group-text d-inline-flex width-3 align-items-center justify-content-center border-bottom-right-radius-0 border-top-right-radius-0 border-right-0"><i class="fal fa-search"></i></div>',
        "sUrl": "",
        "sInfoThousands": ",",
        "sLoadingRecords": "Cargando...",
        "oPaginate": {
            "sFirst": "Primero",
            "sLast": "Último",
            "sNext": "Siguiente",
            "sPrevious": "Anterior"
        },
        "oAria": {
            "sSortAscending": ": Activar para ordenar la columna de manera ascendente",
            "sSortDescending": ": Activar para ordenar la columna de manera descendente"
        }
    },
<<<<<<< HEAD
=======
    columnDefs: [
        {
            //  quitar todas la flechas de ordenar ascendente y descendente
            sortable: false
        }
    ],
>>>>>>> 73f48fb (Archivo Prueba)
    dom:
        "<'row mb-3'<'col-sm-12 col-md-6 d-flex align-items-center justify-content-start'f><'col-sm-12 col-md-6 d-flex align-items-center justify-content-end'lB>>" +
        "<'row'<'col-sm-12'tr>>" +
        "<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>>",
    'serverMethod': 'post',
    'ajax': {
        'url': 'acciones/dataCfdi.php',
        'type': 'post'
    },
    'columns': [
        { data: 'id_cfdi' },
        { data: 'emisor' },
        { data: 'rfcEmisor' },
        { data: 'serie' },
        { data: 'folio' },
        { data: 'receptor' },
        { data: 'rfcReceptor' },
        { data: 'tipo_comprobante' },
        { data: 'subTotal' },
        { data: 'total' },
        { data: 'ver' },
        { data: 'descargar' }
    ],
    "initComplete": function (settings, json) {
<<<<<<< HEAD
        //$('#dt_basica_reporteTest_filter input').attr('placeholder', 'Buscar...');
=======
        $('#dt_basica_reporteTest_filter input').attr('placeholder', 'Buscar...');
>>>>>>> 73f48fb (Archivo Prueba)
    }
});