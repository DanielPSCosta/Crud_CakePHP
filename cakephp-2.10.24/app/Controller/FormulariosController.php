<?php

class FormulariosController extends AppController
{
    public $uses = array('Filme', 'Categoria');
    public $helpers = array('Html', 'Form');



    ////////////////////////////////////////////////////////
    ////////// Retorno da tabela filmes/categorias /////////
    ////////// 08/08/2023                          /////////
    ////////////////////////////////////////////////////////
    public function index()
    {
        $query = $this->Filme->query("SELECT * FROM filmes, categorias WHERE categorias.id = filmes.categoria_id");
        $this->set('filmes', $query);
    }

    ////////////////////////////////////////////////////////
    ////////// Alteração do formulario          ////////////
    ////////// 08/08/2023                       ////////////
    ////////////////////////////////////////////////////////
    public function formulario($dados)
    {
        $qr = $this->Filme->findById($dados);

        $query = $this->Categoria->find("all");
        $this->set('Categoria', $query);

        $query1 = $this->Filme->query("SELECT * FROM filmes, categorias WHERE categorias.id = filmes.categoria_id AND filmes.id = $dados");
        $this->set('filmes', $query1);

        if (!$this->request->data) {
            $this->request->data = $qr;
        }

        if ($this->request->is(array('post', 'put'))) {
            $this->Filme->id = $dados;
            if ($this->Filme->save($this->request->data)) {
                $this->Flash->success(('O registro foi alterado com sucesso.'));
                return $this->redirect(array('action' => 'index'));
            }
            $this->Flash->error(('Não foi possível alterar o registro.'));
        }
    }

    //////////////////////////////////////////
    ////////// Cadastro de dados  ////////////
    ////////// 09/08/2023        /////////////
    //////////////////////////////////////////
    public function cadastro()
    {

        // Buscando dados da tabela categoria
        $query = $this->Categoria->find("all");
        $this->set('Categoria', $query);

        if ($this->request->is('Post')) {
            $this->Filme->create();
            if ($this->Filme->save($this->request->data)) {

                $this->Flash->success(('O registro foi salvo sucesso.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Flash->error(('Não foi possível salvar o registro.'));
            }
        }
    }

    ///////////////////////////////////////
    ////////// Excluir dados  /////////////
    ////////// 09/08/2023     /////////////
    ///////////////////////////////////////
    public function excluir($dados)
    {
        $query = $this->Filme->delete($dados);
        if ($query) {
            $this->Flash->success(__('Deletado com sucesso.')); // to display success
        } else {
            $this->Flash->error('Não foi possivel salvar. Por favor, tente novamente.'); // To display error
        }
        return $this->redirect(array('action' => 'index'));
    }
}
