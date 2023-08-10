<?php 

$opcoes = [];
foreach($Categoria as $nome){  
    $opcoes[$nome['Categoria']['id']] = $nome['Categoria']['nome'];
}

echo $this->Form->create('Filme');
echo $this->Form->input('titulo', array('class'=> 'form-control'));
echo $this->Form->input('capa', array('class'=> 'form-control'));
echo $this->Form->input('categoria_id', array('type' => 'select', 'options' => $opcoes, 'label' => 'Categoria', 'class'=> 'form-control'));
echo $this->Form->input('sinopse', array('class'=> 'form-control '));
echo $this->Form->end('Salvar');
?>
