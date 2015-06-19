
<script type="text/javascript" src="asset/jquery-ui.js"></script>
<script type="text/javascript" src="asset/buku/js/bookblock.min.js"></script>
<script type="text/javascript" src="asset/buku/js/classie.js"></script>
<script type="text/javascript" src="asset/buku/js/bookshelf.js"></script>
<script>
    $('.searchbox .searchbox-icon,.searchbox .searchbox-inputtext').bind('click', function () {
        var $search_tbox = $('.searchbox .searchbox-inputtext');
        $search_tbox.css('width', '120px');
        $search_tbox.focus();
        $('.searchbox', this).addClass('searchbox-focus');
    });

    $('.searchbox-inputtext,body').bind('blur', function () {
        var $search_tbox = $('.searchbox .searchbox-inputtext');
        $search_tbox.css('width', '130px');
        $('.searchbox', this).removeClass('searchbox-focus');
    });
</script>
<script>
    $(function () {
        $("#tglkembali").datepicker({ minDate: 1, maxDate: "+6M +20D" });
        $("#tglkembali").datepicker( "option", "dateFormat", "yy-mm-dd");
    });</script>

