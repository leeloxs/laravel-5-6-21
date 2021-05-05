$.extend(true, $.fn.dataTable.defaults, {
    columnDefs: [{
        orderable: false,
        searchable: false,
        targets: -1
    }],
    order: [],  
    bPaginate: false,
    bLengthChange: false,
    bWidthChange: false,
    bFilter: true,
    bInfo: false,
    bAutoWidth: false, 
    language: { search: "" },
});