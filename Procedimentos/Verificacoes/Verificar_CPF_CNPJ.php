<?php
require_once "../../Classes/Conexao.php";
$c = new conectar();
$conexao = $c->conexao();

if(isset($_POST['CPF']) || isset($_POST['CNPJ'])){
    $cpfPostado = $_POST['CPF'];
    $cnpjPostado = $_POST['CNPJ'];

    // 0 SIGNIFICA NAO CADASTRADO
    // 1 SIGNIFICA CADASTRADO

    if(($cpfPostado == "000.000.000-00") || ($cnpjPostado == "00.000.000/0000-00")){
        echo json_encode(0);
    }else if($cpfPostado != ""){
        $sql = "SELECT * FROM clientes WHERE CPF = '{$cpfPostado}'";
        $result = mysqli_query($conexao, $sql) or print mysql_error();
        if(mysqli_num_rows($result) > 0){
            echo json_encode(1);
        }else{ 
            echo json_encode(0); 
        }
    }else if($cnpjPostado != ""){
        $sql = "SELECT * FROM clientes WHERE CNPJ = '{$cnpjPostado}'";
        $result = mysqli_query($conexao, $sql) or print mysql_error();
        if(mysqli_num_rows($result) > 0){
            echo json_encode(1);
        }else{ 
            echo json_encode(0); 
        }
    }
}
?>