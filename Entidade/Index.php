<?php

use Entidade\TabelaTeste\TabelaTeste ;
require_once 'TabelaTeste.php' ;    
use Entidade\EntidadeBase\EntidadeBase ;
require_once 'EntidadeBase.php' ;  

function teste( EntidadeBase $tabela ){
        $p= implode( ',', array_keys(get_class_vars(get_class( $tabela) )) );
        var_dump(get_class( $tabela));
        var_dump($p);
        var_dump($tabela);
}

$tabela = new TabelaTeste() ; 
teste($tabela);

?> 