<?php

class Database
{
    function connect($query)
    {
        $_host = 'xibo.almg.uucp';
        $_user = 'xiboleitura';
        $_password = 'ajk3sdf7s4';
        $_database = 'xibo';

        $conn = mysqli_connect($_host,$_user,$_password) or die("Erro: <b>Conexão</b> não pode ser realizada: $_host - $_user - $_password - $_database");
        $banco = mysqli_select_db($conn,$_database) or die("Erro: Banco de Dados não encontrado: $_database");
        mysqli_set_charset($conn,'utf8');
        $result = mysqli_query($conn,$query) or die("Erro: Query: $query");
        return($result);
        exit;
    }
}//end class




class HostsXibo{

    function get_hosts(){
        $obj_db= new Database;
        $resultado_get = $obj_db->connect("select display,ClientAddress,MacAddress from display WHERE display not LIKE '%Inativo%'");
        return $resultado_get;
    }
}

?>