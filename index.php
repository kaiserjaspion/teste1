<?php
	//conecta no banco
	$BD['server'] = "localhost";
	$BD['usuario'] = "root";
	$BD['senha'] = "";
	$BD['bdname'] = "test";
	//conectar ao banco
	mysqli_connect($BD['server'], $BD['usuario'], $BD['senha'],$BD['bdname']);
	 
  	$SQLPRODUTO = "SELECT * FROM Produto";
	$SQLCLIENTE = "SELECT * FROM Cliente";
	$SQLPEDIDO = "SELECT * FROM Pedido";
$flag = 0;
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Teste 1</title>
	<link rel="stylesheet" href="../css/bootstrap.min.css"/>
	<script src="../js/bootstrap.min.js"></script>
</head>
<body>
	<section id="intro"> 
	    <div class="container">
	        <div class="col-md-12">
	            <div id="os" class="intro-text text-center">
					<form method="POST">
						<select name="acao">
							<option value=''>Escolha uma Ação</option>
							<option value='Inserir'>Inserir</option>
							<option value='Consultar'>Consultar</option>
							<option value='Alterar'>Alterar</option>
							<option value='Deletar'>Deletar</option>
						</select>
						<select name="item">
							<option value=''>Escolha um Item</option>
							<option value='Produto'>Produto</option>
							<option value='Cliente'>Cliente</option>
							<option value='Pedido'>Pedido</option>
						</select>
						<input type="submit" name="Enviar">
					</form>
					<?php
					  	#inicia codigo php
						if (!empty($_POST)) {	
							$acao = $_POST["acao"];
							$item = $_POST["item"];
							switch ($acao) {
								case 'Inserir':
									if($item === 'Produto'){
										echo "</br><form method='POST' action='index2.php'>
											<input type='text' name='Pnome' placeholder='nome'></br>
											<input type='text' name='Pdescricao' placeholder='descrição'></br>
											<input type='text' name='Ppreco' placeholder='preco'></br>
											<input type='hidden' name='funcao' value='inserirProduto'>
											<input type='submit' value='Inserir'>
											</form></br>";
									}
									else if($item === 'Cliente'){
										echo "</br><form method='Post' action='index2.php' name='Cliente'>
											<input type='text' name='Cnome' placeholder='nome'></br>
											<input type='text' name='Cemail' placeholder='email'></br>
											<input type='text' name='Ctelefone' placeholder='telefone'></br>
											<input type='hidden' name='funcao' value='inserirCliente'>
											<input type='submit' value='Inserir'>
											</form></br>";
										if ($flag === 1) {
										    echo "New record created successfully";
										} else if($flag === 2){
										    echo "Error: Insert Produto";
										}
									}
									else if($item === 'Pedido'){
										echo "</br><form method='Post' action='index2.php' name='Pedido'>
											<input type='text' name='Pnome' placeholder='nome'></br>
											<input type='text' name='Pdescricao' placeholder='descrição'></br>
											<input type='text' name='Ppreco' placeholder='preco'></br>
											<input type='text' name='Cnome' placeholder='nome'></br>
											<input type='text' name='Cemail' placeholder='email'></br>
											<input type='text' name='Ctelefone' placeholder='telefone'></br>
											<input type='hidden' name='funcao' value='inserirPedido'>
											<input type='submit' value='Inserir' >";
										if ($flag === 1) {
										    echo "New record created successfully";
										} else if($flag === 2){
										    echo "Error: Insert Produto";
										}
										else{
										}
									}
								break;
								case 'Consultar':
									if($item === 'Produto'){
										echo'<form method="get" action="">
											<h1>Pesquisa</h1></br>
											<input type="text" name="Pid">
											<input type="text" name="Pnome">
											<input type="hidden" name="funcao" value="ConsultarProduto">
											<input type="submit" name="pesquisarProduto" value="pesquisar" >
											</form>';
										if ($flag === 1) {
										    echo "</br><form method='Post' action='index2.php' name='Produto'>
												<input type='text' name='Pnome' placeholder='nome'></br>
												<input type='text' name='Pdescricao' placeholder='descrição'></br>
												<input type='hidden' name='funcao' value='inserirProduto'>
												<input type='text' name='Ppreco' placeholder='preco'></br>
												<input type='submit' value='submit form' >
												</form></br>";
										} else if($flag === 2){
										    echo "Error: Consultar Produto";
										}
										else{
										}
									}
									else if($item ==='Cliente'){
										echo'<form method="get" action="">
											<h1>Pesquisa</h1></br>
											<input type="text" name="Cid">
											<input type="text" name="Cnome">
											<input type="hidden" name="funcao" value="ConsultarCliente">
											<input type="submit" name="pesquisarCliente" value="pesquisar" >
											</form>';
										if ($flag === 1) {
										    echo "</br><form method='Post' action='index2.php' name='Cliente'>
												<input type='text' name='Cnome' placeholder='nome'></br>
												<input type='text' name='Cemail' placeholder='email'></br>
												<input type='hidden' name='funcao' value='inserirProduto'>
												<input type='text' name='Ctelefone' placeholder='telefone'></br>
												<input type='submit' value='submit form' >
												</form></br>";
										} else if($flag === 2){
										    echo "Error: Consultar Cliente";
										}
										else{
										}
										
									}
									else if($item === 'Pedido'){
										echo'<form method="get" action="">
											<h1>Pesquisa</h1></br>
											<input type="text" name="Id_Produto">
											<input type="text" name="Id_Cliente">
											<input type="hidden" name="funcao" value="ConsultarPedido">
											<input type="submit" name="pesquisarPedido" value="pesquisar" >
										</form>';
										if ($flag === 1) {
										    echo "</br><form method='Post' action='index2.php' name='Pedido'>
													<input type='text' name='Pnome' placeholder='nome'></br>
													<input type='text' name='Pdescricao' placeholder='descrição'></br>
													<input type='text' name='Ppreco' placeholder='preco'></br>
													<input type='text' name='Cnome' placeholder='nome'></br>
													<input type='text' name='Cemail' placeholder='email'></br>
													<input type='hidden' name='funcao' value='inserirProduto'>
													<input type='text' name='Ctelefone' placeholder='telefone'></br>
													<input type='submit' value='submit form'>
													</form></br>";
										} else if($flag === 2){
										    echo "Error: Consultar Pedido";
										}
										else{
										}
										
									}
								break;
								
								case'Alterar' :
									if($item === 'Produto'){
										echo'<form method="get" action="">
											<h1>Pesquisa</h1></p>
											<input type="text" name="Pid">
											<input type="text" name="Pnome">
											<input type="hidden" name="funcao" value="ConsultarProduto">
											<input type="submit" name="pesquisarProduto" value="pesquisar" >
										</form>';
										if ($flag === 1) {
										    echo  "</br><form method='Post' action='index2.php' name='Produto'>
												<input type='text' name='Pnome' placeholder='nome'></br>
												<input type='text' name='Pdescricao' placeholder='descrição'></br>
												<input type='text' name='Ppreco' placeholder='preco'></br>
												<input type='hidden' name='funcao' value='inserirProduto'>
												<input type='submit' value='alterar' >
												</form></br>";
										} else if($flag === 2){
										    echo "Error: Alterar Produto";
										}
										else{
										}
										
									}
									else if($item === 'Cliente'){
										echo'<form method="get" action="">
											<h1>Pesquisa</h1></p>
											<input type="text" name="Cid">
											<input type="text" name="Cnome">
											<input type="hidden" name="funcao" value="ConsultarCliente">
											<input type="submit" name="pesquisarCliente" value="pesquisar" >
										</form>';
										if ($flag === 1) {
										    echo "</br><form method='Post' action='index2.php' name='Cliente'>
												<input type='text' name='Cnome' placeholder='nome'></br>
												<input type='text' name='Cemail' placeholder='email'></br>
												<input type='text' name='Ctelefone' placeholder='telefone'></br>
												<input type='hidden' name='funcao' value='AlterarCliente'>
												<input type='submit' value='alterar' >
												</form></br>";
										} else if($flag === 2){
										    echo "Error: Alterar cliente";
										}
										else{
										}
									}
									else if($item = 'Pedido'){
										echo'<form method="get" action="">
											<h1>Pesquisa</h1></p>
											<input type="text" name="Id_Produto">
											<input type="text" name="Id_Cliente">
											<input type="hidden" name="funcao" value="ConsultarPedido">
											<input type="submit" name="pesquisarPedido" value="pesquisar" >
										</form>';
										if ($flag === 1) {
										    echo "</br><form method='Post' action='index2.php' name='Pedido'>
												<input type='text' name='Pnome' placeholder='nome'></br>
												<input type='text' name='Pdescricao' placeholder='descrição'></br>
												<input type='text' name='Ppreco' placeholder='preco'></br>
												<input type='text' name='Cnome' placeholder='nome'></br>
												<input type='text' name='Cemail' placeholder='email'></br>
												<input type='text' name='Ctelefone' placeholder='telefone'></br>
												<input type='hidden' name='funcao' value='AlterarPedido'>
												<input type='submit' value='alterar' >";
										} else if($flag === 2){
										    echo "Error: Alterar Pedido";
										}
										else{
										}
									}
								break;
								
								case 'Deletar':
									if($item === 'Produto'){
										echo'<form method="get" action="">
											<h1>Pesquisa</h1></p>
											<input type="text" name="Pid">
											<input type="text" name="Pnome">
											<input type="hidden" name="funcao" value="DeletarProduto">
											<input type="submit" name="deletarProduto" value="deletar" >
											</form>';
										if ($flag === 1) {
										    echo "New record deleted successfully";
										} else if($flag === 2){
										    echo "Error: Deletar Produto";
										}
										else{
										}
									}
									else if($item = 'Cliente'){
										echo'<form method="get" action="">
											<h1>Pesquisa</h1></p>
											<input type="text" name="Cid">
											<input type="text" name="Cnome">
											<input type="hidden" name="funcao" value="DeletarCliente">
											<input type="submit" name="deletarCliente" value="deletar" >
											</form>';
										if ($flag === 1) {
										    echo "New record deleted successfully";
										} else if($flag === 2){
										    echo "Error: Deletar Cliente";
										}
										else{
										}
									}
									else if($item === 'Pedido'){
										echo'<form method="get" action="">
											<h1>Pesquisa</h1></p>
											<input type="text" name="Id_Produto">
											<input type="text" name="Id_Cliente">
											<input type="hidden" name="funcao" value="DeletarPedido">
											<input type="submit" name="deletarpedido" value="deletar" >
										</form>';
										if ($flag === 1) {
										    echo "New record Deleted successfully";
										} else if($flag === 2){
										    echo "Error: Deletar Pedido";
										}
										else{
										}
									}
								break;
								default:
									Echo 'Error 3';
								break;
							}
						}
					?>
				</div>
			</div>
		</div>
	</section>
</body>
</html>