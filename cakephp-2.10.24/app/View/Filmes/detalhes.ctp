<?php //echo '<pre>';  var_dump($filmes['0']['filmes']['capa']); echo '</pre>'; exit;  ?>

<div class="card text-center mt-3">
    <div class="card-body">
        <img src="<?php echo "http://localhost/filmes/cakephp-2.10.24/img/" . $filmes['0']['filmes']['capa'] ?>" width="200" height="200" class="border border-4 ml-5">
        <h1 class="card-title"><?php echo $filmes['0']['filmes']['titulo'] ?></h1>
        <h4 class="card-title"><?php echo $filmes['0']['categorias']['nome'] ?></h4>
        <p class="card-text"><?php echo $filmes['0']['filmes']['sinopse']  ?></p>
    </div>
</div>