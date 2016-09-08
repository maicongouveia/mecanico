<nav class='navbar navbar-default navbar-cls-top ' role='navigation' style='margin-bottom: 0'>
	<div class='navbar-header'>

		<button type='button' class='navbar-toggle' data-toggle='collapse' data-target='.sidebar-collapse'>
			<span class='sr-only'>Toggle navigation</span> 
			<span class='icon-bar'></span> 
			<span class='icon-bar'></span> 
			<span class='icon-bar'></span>
		</button>

		<a class='navbar-brand' href='#' style='font-size: 20px;'>Tico Volare</a>
	</div>

	<div style='color: white; padding: 15px 50px 5px 50px; float: right; font-size: 16px;'>
		<a href='logout.php' class='btn btn-warning square-btn-adjust hidden-xs hidden-sm' style='background-color:#fac545; font-color: white;'> <span class='glyphicon glyphicon-off' ></span> Logout</a>
	</div>
</nav>

<!-- /. NAV TOP  -->

<nav class='navbar-default navbar-side' role='navigation'>
	<div class='sidebar-collapse'>
	<ul class='nav' id='main-menu'  style='font-size: 20px;'>
		<li>
			<a href='home.php'>
				<i class='glyphicon glyphicon-calendar'></i>
				&nbsp Página Inicial
			</a>
		</li>
		<li>
			<a href='#.php'>
				<i class='glyphicon glyphicon-user'></i>
				&nbsp Clientes
			</a>
			<ul class='nav nav-second-level'>
				<li><a href='clienteForm.php'><span class='glyphicon glyphicon-plus'></span>&nbsp Adicionar Cliente</a></li>
				<li><a href='clienteConsulta.php'><span class='glyphicon glyphicon-search'></span>&nbsp Consultar Clientes</a></li>
			</ul>
		</li>
		<li>
			<a href='#.php'>
				<i class='glyphicon glyphicon-list-alt'></i>
				&nbsp Usuários
			</a>
			<ul class='nav nav-second-level'>
				<li><a href='processoForm.php'><span class='glyphicon glyphicon-plus'></span>&nbsp Adicionar Usuário</a></li>
				<li><a href='processoTabela.php'><span class='glyphicon glyphicon-search'></span>&nbsp Consultar Usuários</a></li>
			</ul>
		</li>
		<li>
			<a href='configuracoes.php'>
				<i class='glyphicon glyphicon-cog'></i>
				&nbsp Configurações
			</a>
		</li>	
	</ul>
	</div>
</nav>