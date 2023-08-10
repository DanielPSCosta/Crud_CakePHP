<?php


class FilmesController extends AppController
{

    public $helpers = array('Html', 'Form');

    ////////////////////////////////////////////////////
    ////////// Buscando dados tabela filmes ////////////
    ////////// 07/08/2023                   ////////////
    ////////////////////////////////////////////////////
    public function index()
    {
        $this->set('filmes', $this->Filme->find('all'));
    }

    ///////////////////////////////////////////////////////////////
    ////////// Buscando dados tabela filmes/categorias ////////////
    ////////// 08/08/2023                              ////////////
    //////////////////////////////////////////////////////////////
    public function detalhes($dados)
    {
        $query = $this->Filme->query("SELECT * FROM filmes, categorias WHERE categorias.id = filmes.categoria_id AND filmes.id = $dados");
        $this->set('filmes', $query);
    }
}
