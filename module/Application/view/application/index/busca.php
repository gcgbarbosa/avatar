<?php
	 
	// Configuração do script
	// ========================
	$_BS['PorPagina'] = 20; // Número de registros por página
	 
	// Conexão com o MySQL
	// ========================
	$_BS['MySQL']['servidor'] = 'localhost';
	$_BS['MySQL']['usuario'] = 'root';
	$_BS['MySQL']['senha'] = '';
	$_BS['MySQL']['banco'] = 'cpds';
	mysql_connect($_BS['MySQL']['servidor'], $_BS['MySQL']['usuario'], $_BS['MySQL']['senha']);
	mysql_select_db($_BS['MySQL']['banco']);
	// ====(Fim da conexão)====
	 
	// Verifica se foi feita alguma busca
	// Caso contrario, redireciona o visitante
	if (!isset($_GET['consulta'])) {
		echo $this->url('home');
	exit;
	}
	// Se houve busca, continue o script:
	 
	// Salva o que foi buscado em uma variável
	$busca = $_GET['consulta'];
	// Usa a função mysql_real_escape_string() para evitar erros no MySQL
	$busca = mysql_real_escape_string($busca);
	 
	// ============================================
	 
	// Monta a consulta MySQL para saber quantos registros serão encontrados
	$sql = "SELECT COUNT(*) AS total FROM `aluno` WHERE `nomealuno` LIKE '%".$busca."%'";
	// Executa a consulta
	$query = mysql_query($sql);
	// Salva o valor da coluna 'total', do primeiro registro encontrado pela consulta
	$total = mysql_result($query, 0, 'total');
	// Calcula o máximo de paginas
	$paginas =  (($total % $_BS['PorPagina']) > 0) ? (int)($total / $_BS['PorPagina']) + 1 : ($total / $_BS['PorPagina']);
	 
	// ============================================
	 
	// Sistema simples de paginação, verifica se há algum argumento 'pagina' na URL
	if (isset($_GET['pagina'])) {
	$pagina = (int)$_GET['pagina'];
	} else {
	$pagina = 1;
	}
	$pagina = max(min($paginas, $pagina), 1);
	$inicio = ($pagina - 1) * $_BS['PorPagina'];
	 
	// ============================================
	 
	// Monta outra consulta MySQL, agora a que fará a busca com paginação
	$sql = "SELECT * FROM `aluno` WHERE `nome` LIKE '%".$busca."%' ORDER BY idaluno DESC LIMIT ".$inicio.", ".$_BS['PorPagina'];
	// Executa a consulta
	$query = mysql_query($sql);
	 
	// ============================================
	 
	// Começa a exibição dos resultados
	echo "<p>Resultados ".min($total, ($inicio + 1))." - ".min($total, ($inicio + $_BS['PorPagina']))." de ".$total." resultados encontrados para '".$_GET['consulta']."'</p>";
	// <p>Resultados 1 - 20 de 138 resultados encontrados para 'minha busca'</p>
	 
	echo "<ul>";
	while ($resultado = mysql_fetch_assoc($query)) {
	$titulo = $resultado['titulo'];
	$texto = $resultado['texto'];
	$link = $this->url('home') . '/aluno/view/' . $resultado['id'];
	echo "<li>";
	echo '<a href="'.$link.'" title="'.$titulo.'">'.$titulo.'</a><br />';
	echo date('d/m/Y H:i', strtotime($resultado['cadastro']));
	echo '<p>'.$texto.'</p>';
	echo '<a href="'.$link.'" title="'.$titulo.'">'.$link.'</a>';
	echo "</li>";
	}
	echo "</ul>";
	 
	// ============================================
	 
	// Começa a exibição dos paginadores
	if ($total > 0) {
	for($n = 1; $n <= $paginas; $n++) {
	echo '<a href="?consulta='.$_GET['consulta'].'&pagina='.$n.'">'.$n.'</a>&nbsp;&nbsp;';
	}
	}
	 
	?>