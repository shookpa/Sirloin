function formatearTabla(e) {
    e.dataTable({
        "iDisplayLength": 50,
        "language": {
            "decimal": ".",
            "emptyTable": "No hay datos para los criterios establecidos",
            "info": "Se muestra de: <b>_START_</b> a <b>_END_</b> Transacciones de <b>_TOTAL_ en Total</b>",
            "infoEmpty": "No hay páginas por mostrar",
            "infoFiltered": "(Filtrado de _MAX_ un total de páginas)",
            "infoPostFix": "",
            "thousands": ",",
            "lengthMenu": "Mostrar _MENU_ páginas",
            "loadingRecords": "Cargando...",
            "processing": "Procesando...",
            "search": "Buscar:",
            "zeroRecords": "No se encontraron transacciones",
            "infoEmpty": "No hay datos para los criterios establecidos",
            "sortAscending": " - click/Volver a order Ascendentemente",
            "sortDescending": " - click/Volver a order Descendentemente",
            "paginate": {
                "iDisplayLength": 25,
                "first": "Primera",
                "last": "Última",
                "previous": "Anterior",
                "next": "Siguiente"
            },
            "scrollY": true,
            "scrollX": 500
        }
    });
}