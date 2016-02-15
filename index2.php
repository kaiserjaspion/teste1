<?php
	//conecta no banco
	$BD['server'] = "localhost";
	$BD['usuario'] = "root";
	$BD['senha'] = "";
	$BD['bdname'] = "test";

	//conectar ao banco
	//mysqli_connect($BD['server'], $BD['usuario'], $BD['senha'],$BD['bdname']);

	$con = new PDO('mysql:host='.$BD['server'].'; dbname='.$BD['bdname'], $BD['usuario'], $BD['senha']);

	if(!empty($_POST)){
		switch($_POST['funcao']){
			case 'inserirProduto':
				inserirProduto($_POST['Pnome'],$_POST['Pdescricao'],$_POST['Ppreco']);
				break;

			case 'InserirCliente':
				inserirCliente($_POST['Cnome'],$_POST['Cemail'],$_POST['Ctelefone']);
				break;

			case'InserirPedido':
				inserirPedido($_POST['Id_Produto'],$_POST['Id_Cliente']);
				break;

			case'ConsultarProduto':
				consultarProduto($_POST['Pid'],$_POST['Pnome']);
				break;

			case'ConsultarCliente':
				consultarCliente($_POST['Cid'],$_POST['Cnome']);
				break;
			case'ConsultarPedido':
				consultarPedido($_POST['Id_Produto'],$_POST['Id_Cliente']);
				break;

			case'AlterarProduto':
				alterarProduto($_POST['Pnome'],$_POST['Pdescricao'],$_POST['Ppreco']);
				break;

			case'AlterarCliente':
				alterarCliente($_POST['Cnome'],$_POST['Cemail'],$_POST['Ctelefone']);
				break;

			case'AlterarPedido':
				alterarPedido($_POST['Id_Produto'],$_POST['Id_Cliente']);
				break;

			case'DeletarProduto':
				deletarProduto($_POST['Pid'],$_POST['Pnome']);
				break;

			case'DeletarProduto':
				deletarProduto($_POST['Cid'],$_POST['Cnome']);
				break;

			case'DeletarProduto':
				deletarProduto($_POST['Id_Produto'],$_POST['Id_Cliente']);
				break;

			default:
				break;
		}
	}

#Funções para os Formularios

function inserirProduto($Pnome,$Pdescricao,$Ppreco){
	$BD['server'] = "localhost";
	$BD['usuario'] = "root";
	$BD['senha'] = "";
	$BD['bdname'] = "test";
	$CON = mysqli_connect($BD['server'], $BD['usuario'], $BD['senha'], $BD['bdname']);
	$SQLINSERTPRODUTO = "INSERT INTO produto (nome,descricao,preco) VALUES ('{$Pnome}','{$Pdescricao}', '{$Ppreco}')";

	if (!mysqli_query($CON, $SQLINSERTPRODUTO)) {
        printf("Error: %s\n", $CON->error);
    }
		mysqli_close($CON);
		echo 'sucesso';
}

function inserirCliente($Cnome,$Cemail,$Ctelefone){
	$BD['server'] = "localhost";
	$BD['usuario'] = "root";
	$BD['senha'] = "";
	$BD['bdname'] = "test";
	$CON = mysqli_connect($BD['server'], $BD['usuario'], $BD['senha'], $BD['bdname']);
	$SQLINSERTCLIENTE = "INSERT INTO Cliente(Id,nome,email,telefone)VALUES($CId,$Cnome,$Cemail,$Ctelefone)";
	if(!mysqli_query($CON,$SQLINSERTCLIENTE)) {
	    $Flag = 1;
	} else {
	    $Flag = 2;
	}
	header("location: index.php?FORM=$FORM&switchform=$switchform&Acao=$Acao&Item=$Item&Flag=$Flag");
}

function inserirPedido($Id_Produto,$Id_Cliente){
	$BD['server'] = "localhost";
	$BD['usuario'] = "root";
	$BD['senha'] = "";
	$BD['bdname'] = "test";
	$CON = mysqli_connect($BD['server'], $BD['usuario'], $BD['senha'], $BD['bdname']);
	#adicionar Pedido
	$SQLINSERTPEDIDO = "INSERT INTO Pedido(Id_Produto,Id_Cliente)VALUES($Id_Produto,$Id_Cliente)";
	if (!mysqli_query($CON,$SQLINSERTPEDIDO)) {
	    $Flag = 1;
	} else {
	    $Flag = 2;
	}
}	

function consultarProduto($Pid,$Pnome){
	$BD['server'] = "localhost";
	$BD['usuario'] = "root";
	$BD['senha'] = "";
	$BD['bdname'] = "test";
	$CON = mysqli_connect($BD['server'], $BD['usuario'], $BD['senha'], $BD['bdname']);
	$SQLCONSULTAPRODUTO = "SELECT * FROM Produto where Id = $PId or nome = $Pnome";
	$queryOS = (!mysqli_query($CON,$SQLCONSULTAPRODUTO);
	while($SQLCONSULTAPRODUTO = mysql_fetch_array($queryOS)){
		echo '	'.$SQLCONSULTAPRODUTO["id"].' - '.$SQLCONSULTAPRODUTO["nome"].' - '.$SQLCONSULTAPRODUTO["descrição"].' - '.$SQLCONSULTAPRODUTO["preço"].'.</p>';
	}
}

function consultarCliente($Cid,$Cnome){
	$BD['server'] = "localhost";
	$BD['usuario'] = "root";
	$BD['senha'] = "";
	$BD['bdname'] = "test";
	$CON = mysqli_connect($BD['server'], $BD['usuario'], $BD['senha'], $BD['bdname']);
	$SQLCONSULTACLIENTE = "SELECT * FROM Cliente where Id = $CId or nome = $Cnome";
	$queryOS = (!mysqli_query($CON,$SQLCONSULTACLIENTE);
	while($SQLCONSULTACLIENTE = mysql_fetch_array($queryOS)){
		echo '	'.$SQLCONSULTACLIENTE["id"].' - '.$SQLCONSULTACLIENTE["nome"].' - '.$SQLCONSULTACLIENTE["email"].' - '.$SQLCONSULTACLIENTE["telefone"].'.</p>';
	}
}

function consultarPedido($Id_Produto,$Id_Cliente){
	$BD['server'] = "localhost";
	$BD['usuario'] = "root";
	$BD['senha'] = "";
	$BD['bdname'] = "test";
	$CON = mysqli_connect($BD['server'], $BD['usuario'], $BD['senha'], $BD['bdname']);
	#Consultar Pedido
	$SQLCONSULTAPEDIDO = "SELECT * FROM Pedido where id_produto = $Id_Produto or id_cliente = $Id_Cliente";
	$queryOS = (!mysqli_query($CON,$SQLCONSULTAPEDIDO);
	while($SQLCONSULTAPEDIDO = mysql_fetch_array($queryOS)){
		echo '	'.$SQLCONSULTAPEDIDO["id_cliente"].'.</p>';
		#$SQLCONSULTACLIENTE = "SELECT * FROM cliente where id = $SQLCONSULTAPEDIDO['id_cliente']";
		$queryOS = (!mysqli_query($CON,$SQLCONSULTACLIENTE);
		while($SQLCONSULTACLIENTE = mysql_fetch_array($queryOS)){
			echo '	'.$SQLCONSULTACLIENTE["nome"].' - '.$SQLCONSULTACLIENTE["email"].' - '.$SQLCONSULTACLIENTE["telefone"].'.</p>';
		}
		echo '	'.$SQLCONSULTAPEDIDO["id_produto"].'.</p>';
		#$SQLCONSULTAPRODUTO = "SELECT * FROM Produto where id = $SQLCONSULTAPEDIDO['id_produto']";
		$queryOS = (!mysqli_query($CON,$SQLCONSULTAPRODUTO);
		while($SQLCONSULTAPRODUTO = mysql_fetch_array($queryOS)){
			echo '	'.$SQLCONSULTAPRODUTO["nome"].' - '.$SQLCONSULTAPRODUTO["descrição"].' - '.$SQLCONSULTAPRODUTO["preço"].'.</p>';
		}
	}
}

function alterarProduto($Pid,$Pnome,$Pdescricao,$Ppreco){
	$BD['server'] = "localhost";
	$BD['usuario'] = "root";
	$BD['senha'] = "";
	$BD['bdname'] = "test";
	$CON = mysqli_connect($BD['server'], $BD['usuario'], $BD['senha'], $BD['bdname']);
	$SQLALTERPRODUTO = "UPDATE Produto SET nome = $Pnome , descrição = $Pdescricao , preço = $Ppreco where id = $Pid";
	if(!mysqli_query($CON,$SQLALTERPRODUTO){
		$Flag = 1;
	}
	} else {
	    $Flag = 2;
	}
}

function alterarCliente($Cid,$Cnome,$Cemail,$Ctelefone){
	$BD['server'] = "localhost";
	$BD['usuario'] = "root";
	$BD['senha'] = "";
	$BD['bdname'] = "test";
	$CON = mysqli_connect($BD['server'], $BD['usuario'], $BD['senha'], $BD['bdname']);
	$SQLALTERCLIENTE = "UPDATE Produto SET nome = $Cnome , email = $Cemail , telefone = $Ctelefone where id = $Cid";
	if (!mysqli_query($CON,$SQLALTERPRODUTO){
	    $Flag = 1;
	} else {
	    $Flag = 2;
	}
}

function alterarPedido($Id_Produto,$Id_ProdutoN,$Id_Cliente,$Id_ClienteN){
	$BD['server'] = "localhost";
	$BD['usuario'] = "root";
	$BD['senha'] = "";
	$BD['bdname'] = "test";
	$CON = mysqli_connect($BD['server'], $BD['usuario'], $BD['senha'], $BD['bdname']);
	$SQLALTERPEDIDO = "UPDATE Pedido SET id_produto = $Id_ProdutoN , id_cliente = $Id_ClienteN where id_cliente = $Id_Cliente and id_produto = $Id_Produto";
	if(!mysqli_query($CON,$SQLALTERPRODUTO){
		    $Flag = 1;
	} else {
	    $Flag = 2;
	}
}

function deletarProduto($Pid){
	$BD['server'] = "localhost";
	$BD['usuario'] = "root";
	$BD['senha'] = "";
	$BD['bdname'] = "test";
	$CON = mysqli_connect($BD['server'], $BD['usuario'], $BD['senha'], $BD['bdname']);
	$SQLDELETARPRODUTO = "DELETE * FROM Produto where Id = $Pid";
	if(!mysqli_query($CON,$SQLDELETARPRODUTO){
		$Flag = 1;
	} else {
	    $Flag = 2;
	}
}

function deletarCliente($Cid){
	$BD['server'] = "localhost";
	$BD['usuario'] = "root";
	$BD['senha'] = "";
	$BD['bdname'] = "test";
	$CON = mysqli_connect($BD['server'], $BD['usuario'], $BD['senha'], $BD['bdname']);
	$SQLDELETARCLIENTE = "DELETE * FROM Cliente where Id = $Cid";
	if(!mysqli_query($CON,$SQLDELETARCLIENTE){
	    $Flag = 1;
	} else {
	    $Flag = 2;
	}
}

function deletarPedido($Id_Produto,$Id_Cliente){
	$BD['server'] = "localhost";
	$BD['usuario'] = "root";
	$BD['senha'] = "";
	$BD['bdname'] = "test";
	$CON = mysqli_connect($BD['server'], $BD['usuario'], $BD['senha'], $BD['bdname']);
	$SQLDELETARPEDIDO = "DELETE * FROM Pedido where Id_Produto = $Id_Produto and Id_Cliente = $Id_Cliente ";
	if(!mysqli_query($CON,$SQLDELETARPEDIDO){
	    $Flag = 1;
	} else {
	    $Flag = 2;
	}
}

?>			

