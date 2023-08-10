<table class="table table-light m-0 p-0" id="data">
    <?php foreach ($filmes as $filme) { ?>
        <tr>
            <td class="p-5  ">
                <a style="text-decoration:none" href="<?php echo "http://localhost/filmes/cakephp-2.10.24/Filmes/detalhes/" . $filme['Filme']['id'] ?>" ?>
                    <img src="<?php echo "http://localhost/filmes/cakephp-2.10.24/img/" . $filme['Filme']['capa'] ?>" width="100" height="100" class="border border-4 ml-5">
                    <h3 class="mr-5 pr-2 pt-2"><b><?php echo $filme['Filme']['titulo'] ?></b></h3>
                    <div class="mr-5 pr-2"><?php echo $filme['Filme']['sinopse'] ?></div>
                </a>
            </td>
        </tr>
    <?php } ?>
</table>

<script>
    $(document).ready(function() {
        $('#data').after('<div id="nav" class="p-5"></div>');
        var rowsShown = 3;
        var rowsTotal = $('#data tbody tr').length;
        var numPages = rowsTotal / rowsShown;
        for (i = 0; i < numPages; i++) {
            var pageNum = i + 1;
            $('#nav').append('<a href="#" class="border border-5 rounded-circle" rel="' + i + '">' + pageNum + '</a> ');
        }
        $('#data tbody tr').hide();
        $('#data tbody tr').slice(0, rowsShown).show();
        $('#nav a:first').addClass('active');
        $('#nav a').bind('click', function() {
            $('#nav a').removeClass('active');
            $(this).addClass('active');
            var currPage = $(this).attr('rel');
            var startItem = currPage * rowsShown;
            var endItem = startItem + rowsShown;
            $('#data tbody tr').css('opacity', '0.0').hide().slice(startItem, endItem).
            css('display', 'table-row').animate({
                opacity: 1
            }, 300);
        });
    });
</script>