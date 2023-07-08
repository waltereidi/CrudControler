<?php 
    namespace index ; 
    use ConectorDatabase\DatabaseConnect\DatabaseConnect; 
    require_once 'DatabaseConnect.php';

    $con = new DatabaseConnect();
    $pdo = $con->databaseConnection();
    $statement = $pdo->prepare('update public.testesqlserver set id = :id where id = :ids ');
    $params= ["id" => 12 ,"ids" => 1];
    $id  =1 ;
    $sid = 12 ; 
    $statement->bindValue( "id" ,$id);
    $statement->bindValue( 'ids',$sid);
    $statement->execute();
    
    $rows = $statement->fetchAll();
    foreach($rows as $row ){
        var_dump($row) ; 
    }
    $array =[] ;
    $array[]= 'a';
    $array[] ='b';
    var_dump($array) ;

?>