<?php
    if (isset($_POST["tabela"]) && isset($_POST["cpf"])) {
        require_once("setup.php");
        $db = new mysqli(DB_HOST, DB_LOGIN, DB_PASSWD, DB_NAME);
        if ($_POST["tabela"] == "motorista") {
            $tabela = "tb_motorista";
        } else if ($_POST["tabela"] == "passageiro") {
            $tabela = "tb_passageiro";
        }
        $statement = $db->prepare("SELECT cpf FROM $tabela WHERE cpf = ?");
        if ($statement->bind_param("s", $_POST["cpf"])) {
            if ($statement->execute()) {
                $statement->store_result();
                echo $statement->num_rows;
                exit();
            }
        }
        echo "-1";
    }
    exit();
?>