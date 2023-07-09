<?php 
    namespace index ; 
    use ConectorDatabase\CrudController\CrudController as CrudController;
    require_once __DIR__.'\ConectorDatabase\CrudController.php';

    use Entidade\TabelaTeste\TabelaTeste;
    require_once __DIR__.'\Entidade\TabelaTeste.php';
    $con = new CrudController();
    $entidade = new TabelaTeste();


    $entidade->Descricao= 'Teste'; 
    $entidade->Quantidade= 22;
    //Inserir os mesmos valores da entidade , exceto o ID.
    $con->insert($entidade);

    //Selecionar um unico valor , a entidade precisa do ID setado.
    $entidade->Id = 78 ;
    $rows = $con->retorna($entidade);
    
    //Modificar um unico valor, Deve-se setar o ID da entidade e os campos e todos os campos
    //deve-se utilizaro  select para retornar a entidade e depois modificar os valores dela para evitar
    //apagar os dados indevidamente.    
    $rows->Descricao = null;
    $retorno = $con->update($rows);
    var_dump($retorno ); 

    //Deletar entidade utiliza o ID da entidade como validação.
    $deleteEntidade = new TabelaTeste();
    $deleteEntidade->Id = 90;
    $retorno = $con->delete($deleteEntidade );
    var_dump($retorno);

    //Executar uma query aleatória , o params deve conter todas as
    //variáveis que serão substituída na execução ;
    $query = 'select * from public.tabelateste where id = :Id'; 
    $params = array('Id' => 88 );
    var_dump($params);
    $rows = $con->executar( $query , $params);
    var_dump($rows);


 


?>