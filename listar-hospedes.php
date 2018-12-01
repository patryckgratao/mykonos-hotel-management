<?php 
	include("partials/_header.php"); 
	include("banco/conecta.php");
	include("banco/banco.php");
	include("banco/banco-hospede.php");

	$hospedes = listaHospedes($conexao);

?>
<!-- mensagens de sucesso e erro REMOÇÃO E CADASTRO -->
	<?php if(array_key_exists("removido", $_GET) && $_GET['removido']=='true') { ?>
		<div class="alert-list">
			<div class="alert alert-success alert-dismissible" role="alert">
	         	<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true"><i class="notika-icon notika-close"></i></span></button> Hóspede removido com sucesso.
	        </div>
		</div>
	<?php } ?>

	<?php if(array_key_exists("cadastrado", $_GET) && $_GET['cadastrado']=='true')  { ?>
		<div class="alert-list">
			<div class="alert alert-success alert-dismissible" role="alert">
         		<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true"><i class="notika-icon notika-close"></i></span></button> O Hóspede foi cadastrado com sucesso!
        	</div>
		</div>
	<?php } 

		else if (array_key_exists("cadastrado", $_GET) && $_GET['cadastrado']=='false')  { ?>
			<div class="alert-list">
				<div class="alert alert-danger alert-dismissible" role="alert">
         			<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true"><i class="notika-icon notika-close"></i></span></button> O Hóspede não foi cadastrado! Tente novamente.
        		</div>
			</div>
		<?php } ?>
<!-- fim das mensagens -->
<div class="breadcomb-area">
		<div class="container">
			<div class="row">
				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
					<div class="breadcomb-list">
						<div class="row">
							<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
								<div class="breadcomb-wp">
									<div class="breadcomb-icon">
										<i class="notika-icon notika-windows"></i>
									</div>
									<div class="breadcomb-ctn">
										<h2>Todas os Hóspedes</h2>
										<p>Estes são os hóspedes cadastrados no sistema. </p>
									</div>
								</div>
							</div>
							<div class="col-lg-4 col-md-4 col-sm-4 col-xs-3">
								<div class="breadcomb-report">
									<a href="cadastrar-hospede.php" data-toggle="tooltip" data-placement="left" title="Cadastrar novo Hóspede" class="btn"><i class="notika-icon notika-plus-symbol"></i></a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- Breadcomb area End-->

<div class="data-table-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="data-table-list">
						<div class="table-responsive">
							<table id="data-table-basic" class="table table-striped">
								<thead>
								    <tr>
								      <th scope="col" class="text-center">Nome</th>
								      <th scope="col" class="text-center">CPF</th>
								      <th scope="col" class="text-center">Celular com DDD</th>
								      <th scope="col" class="text-center">E-mail</th>
								      <th scope="col" class="text-center">UF</th>
								      <th scope="col centered" class="text-center">Mais Ações</th>
								    </tr>
							  	</thead>
							  	<tbody>
									<?php 
										foreach ($hospedes as $hospede) : ?>
											<tr>
												<td><?= $hospede['nome'] ?></td>
												<td><?= $hospede['cpf'] ?></td>
												<td><?= $hospede['celular'] ?></td>
												<td><?= $hospede['email'] ?></td>
												<td><?= $hospede['estado'] ?></td>
												<td class="mais-acoes text-center" >
													<div class="btn-group notika-group-btn material-design-btn">
						                                <a href="ver-mais.php?id=<?=$hospede['id']?>" class="btn btn-primary btn-sm notika-gp-primary">Ver Mais</a>
						                                <a href="#" class="btn btn-default btn-sm">Editar</a>
						                                <a href="remover.php?id=<?=$hospede['id']?>&recurso=hospedes" class="btn btn-sm btn-danger notika-gp-danger">Excluir</a>
					                          		</div>

												 </td>
											</tr>		
									<?php endforeach ?>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<br>
	<a class="btn btn-primary notika-btn-primary btn-lg" href="cadastrar-hospede.php">Cadastrar Hóspede</a>
<?php include("partials/_footer.php"); ?>