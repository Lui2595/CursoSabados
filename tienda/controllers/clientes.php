<?php
    require_once "connection.php";

    if(!isset($_POST["action"])){
        http_response_code(400);
        die("No Action");
    }

switch ($_POST["action"]) {
    case 'create':
        $r=$_POST;
        if(isset($r["nombre"],$r["direccion"],$r["rfc"],$r["telefono"],$r["email"],$r["celular"])){
            $a=$r["nombre"];
            $b=$r["rfc"];
            $c=$r["telefono"];
            $d=$r["email"];
            $e=$r["celular"];
            $f=$r["direccion"];
            $query="INSERT INTO clientes VALUES (null,'$a','$f','$b','$c','$d','$e')";
            $resutl=$db->query($query);
            if($resutl){
                echo "Agregado con Exito";
            }else{
               echo $db->error." number:". $db->errno;
            }

        }else{
            http_response_code(400);
            echo "Bad Request";
            // header("Location: ../clientes.php");
        }
        break;
    case 'read':
        
            $query="SELECT * FROM clientes";
            $resutl=$db->query($query);
            if($resutl){
                $rows = array();
                while($row = $resutl->fetch_assoc())
                {
                    $rows[] = $row;
                }
                echo json_encode($rows);
                //var_dump( $rows);
            }else{
               echo $db->error." number:". $db->errno;
            }

        
        break;
    case 'update':
        # code...
        break;
    case 'delete':
        # code...
        break;
}

?>