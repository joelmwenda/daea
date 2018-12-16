<!-- DataTables JavaScript -->
<script src="{{ asset('js/plugins/dataTables/datatables.min.js') }}"></script>
<script src="{{ asset('js/plugins/dataTables/colvis.min.js') }}"></script>
    

{{ $js_scripts ?? '' }}

<!-- Page-Level Scripts -->
<script>
    $(document).ready(function(){
        $('.data-table').DataTable({
            pageLength: 10,
            responsive: true,
            dom: '<"html5buttons"B>lTfgitp',
            buttons: [
                // { 
                //     extend: 'colvis',
                //     title: 'Download',
                // },
                { 
                    extend: 'copy',
                    title: 'Download',
                    exportOptions:{
                        columns: ':not(.not-export-column)'
                    }
                },
                {
                    extend: 'csv', 
                    title: 'Download',
                    exportOptions:{
                        columns: ':not(.not-export-column)'
                    }
                },
                {
                    extend: 'excel', 
                    title: 'Download',
                    exportOptions:{
                        columns: ':not(.not-export-column)'
                    }
                },
                {
                    extend: 'pdf', 
                    title: 'Download',
                    exportOptions:{
                        columns: ':not(.not-export-column)'
                    }
                },

                {
                    extend: 'print',
                    customize: function (win){
                        $(win.document.body).addClass('white-bg');
                        $(win.document.body).css('font-size', '10px');

                        $(win.document.body).find('table')
                                .addClass('compact')
                                .css('font-size', 'inherit');
                    },
                    exportOptions:{
                        columns: ':visible(:not(.not-export-column))'
                    }
                }
            ]

        });

        $('.norm-table').DataTable({
            pageLength: 10,
            responsive: true

        });

    });

</script>