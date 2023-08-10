<div class="container-fluid">
    <a href="http://localhost/filmes/cakephp-2.10.24/Formularios/cadastro/"><button class="btn btn-primary mb-1">Cadastrar</button></a>
    <table id="data" class="table table-striped table-hover">
        <thead class="table-dark">
            <tr>
                <th scope="col">Titulo</th>
                <th scope="col">Categoria</th>
                <th scope="col">Editar</th>
                <th scope="col">Excluir</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($filmes as $filme) { ?>
                <tr>
                    <td><?php echo $filme['filmes']['titulo'] ?></td>
                    <td><?php echo $filme['categorias']['nome'] ?></td>
                    <td><a href="<?php echo "http://localhost/filmes/cakephp-2.10.24/Formularios/Formulario/" . $filme['filmes']['id'] ?>"><button class="btn btn-primary"><i class="fa fa-pencil" aria-hidden="true"></i></button></a></td>
                    <td><a href="<?php echo "http://localhost/filmes/cakephp-2.10.24/Formularios/excluir/" . $filme['filmes']['id'] ?>"><button class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i></button></a></td>
                </tr>
            <?php } ?>

        </tbody>
    </table>
</div>

<script>
    $(document).ready(function() {
        $('#data').after('<div id="nav" class="p-5"></div>');
        var rowsShown = 8;
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