<script type="text/javascript">
    $(document).ready(function () {
        //select2 
        $('.wsearch').select2({
            theme: "classic", allowClear: true
        });
        $('#ctg').select2({
            theme: "classic", allowClear: true
        });
        $(".nsearch").select2({
            minimumResultsForSearch: Infinity, theme: "classic", allowClear: true
        });
        $('#tglreg').datepicker({
            format: "dd-mm-yyyy", weekStart: 1, language: "id", todayHighlight: true
        });
        $('#tgl_ijin').datepicker({
            format: "dd-mm-yyyy", weekStart: 1, language: "id", todayHighlight: true
        });
        $('#ak_tgl').datepicker({
            format: "dd-mm-yyyy", weekStart: 1, language: "id", todayHighlight: true
        });

        $('#kdps').on('change', function () {
            var id_ = $(this).val();
            var pisah = id_.split(";;");
            var kota = pisah[1];
            $('#kota').val(kota);
        });

        $('#tgl1').datepicker({
            format: "dd-mm-yyyy", weekStart: 1, language: "id", todayHighlight: true
        });
        $('#tgl2').datepicker({
            format: "dd-mm-yyyy", weekStart: 1, language: "id", todayHighlight: true
        });

        $('#dtn').datepicker({
            format: "yyyy-mm-dd", weekStart: 1, language: "id", todayHighlight: true
        });

        $('#visi').wysihtml5({
            toolbar: {
                "html": true, //Button which allows you to edit the generated HTML. Default false
                "image": false,
                "size": 'sm'
            }
        });
        $('#misi').wysihtml5({
            toolbar: {
                "html": true, //Button which allows you to edit the generated HTML. Default false
                "image": false,
                "size": 'sm'
            }
        });
        $('#sejarah').wysihtml5({
            toolbar: {
                "html": true, //Button which allows you to edit the generated HTML. Default false
                "image": false,
                "size": 'sm'
            }
        });
        $('#prestasi').wysihtml5({
            toolbar: {
                "html": true, //Button which allows you to edit the generated HTML. Default false
                "image": false,
                "size": 'sm'
            }
        });


        $('#ctn').wysihtml5({
            toolbar: {
                "html": true, //Button which allows you to edit the generated HTML. Default false
                "image": false,
                "size": 'sm'
            }
        });

        $('#dsc').wysihtml5({
            toolbar: {
                "html": true, //Button which allows you to edit the generated HTML. Default false
                "image": false,
                "size": 'sm'
            }
        });

    });
</script>