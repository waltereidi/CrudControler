<?php
    namespace ConectorDatabase\CrudController ; 
    
    use ConectorDatabase\DatabaseConnect\DatabaseConnect; 
    require_once 'DatabaseConnect.php';

    use Entidade\EntidadeBase\EntidadeBase ;
    require_once '..\Entidade\EntidadeBase.php' ;  


    class CrudController {
        private $PDO ;


    function __construct(){
        $db = new DatabaseConnect();
        $this->PDO = $db->databaseConnection();
    }

    function getCamposEntidadeSelect(EntidadeBase $entidade ){
        
        $campos = implode( ',', array_keys(get_class_vars(get_class( $entidade ) )) );
        return $campos;
    }
    function getCamposEntidadeUpdate(EntidadeBase $entidade ){
        $campos =  array_keys(get_class_vars(get_class( $entidade ) ));
        $camposMerge=[];
        foreach($campos as $campo ){
            $camposMerge = $campo.'= :'.$campo ; 
        }
        return $camposMerge ; 
    }
    function getCamposEntidadeInsert(EntidadeBase $entidade ){
        $campos =  array_keys(get_class_vars(get_class( $entidade ) ));
        $camposInsert=[];
        foreach($campos as $campo ){
            if($campo != 'Id'){
                $camposInsert = ':'.$campo ; 
            }
        }
        return $camposInsert ; 
    }
    
    function getNomeTabela(EntidadeBase $entidade ){
        $nomeTabela = get_class( $entidade ) ; 
        return $nomeTabela; 
    }
    
    function retorna(EntidadeBase $entidade , int $id  ){
        $query = 'select :campos from :nomeTabela where id = :id '; 
        $statement = $PDO->prepare($query) ; 
        $params = [];
        $params['campos'] = getCamposEntidade($entidade);
        $params['nomeTabela'] =  getNomeTabela($entidade);
        $params['Id'] = $id ; 
        try{
            $statement->execute($params);
            return $statement->fetchAll();
        }
        catch(Exception $e ){
            throw $e ; 
            return null ; 
        }

    function update(EntidadeBase $entidade , int $id ){
        $query = 'update :nomeTabela SET '.getCamposEntidadeUpdate($entidade).' where id = :Id ' ;
        $statement = $PDO->prepare($query); 
        $entidade['nomeTabela'] = getNomeTabela($entidade);
        try{
            return $statement->execute($entidade); 
        }
        catch(Exception $e)
        {
            throw $e ; 
            return null ; 
        }

    }        
    function insert(EntidadeBase $entidade){
        $query ='insert into :nomeTabela(:campos)('.getCamposEntidadeInsert($entidade).')';
        $statement = $PDO->prepare($query);
        $entidade['nomeTabela'] = getNomeTabela($entidade);
        $entidade['campos'] = getCamposEntidadeSelect($entidade);
        try{
            return $statement->execute($entidade);
        }
        catch(Exception $e){
            throw $e ; 
            return null ; 
        }

    }

    function delete(EntidadeBase $entidade , int $id ){
        $query = 'delete from :nomeTabela where Id = :Id';
        $statement = $PDO->prepare($query);
        $statement->bindValue( );
        $params = [];
        $params['nomeTabela'] = getNomeTabela($entidade); 
        $params['Id'] = $id ; 

        try{
            return $statement->execute($params);
        }
        catch(Exception $e){
            throw $e ;
            return null ; 
        }


    }

    function executar($query , $params){
        $statement = $PDO->prepare($query);
        try{
            return $statement->execute($params);
        }
        catch(Exception $e){
            return null ; 
        }

    }
        
    }
    
}

?>
