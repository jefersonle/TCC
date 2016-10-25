@extends('layouts.portal')



@section('scripts')





<link href='//fonts.googleapis.com/css?family=Ubuntu+Condensed' rel='stylesheet' type='text/css'>

<link href='//fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>

<!--//fonts-->	

<!-- js -->

<script type="text/javascript" src="{{ url('/') }}/js/jquery.min.js"></script>

<!-- js -->

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->

<script src="{{ url('/') }}/js/bootstrap.min.js"></script>

<script src="{{ url('/') }}/js/bootstrap-select.js"></script>

<script>

  $(document).ready(function () {

    var mySelect = $('#first-disabled2');



    $('#special').on('click', function () {

      mySelect.find('option:selected').prop('disabled', true);

      mySelect.selectpicker('refresh');

    });



    $('#special2').on('click', function () {

      mySelect.find('option:disabled').prop('disabled', false);

      mySelect.selectpicker('refresh');

    });



    $('#basic2').selectpicker({

      liveSearch: true,

      maxOptions: 1

    });

  });

</script>

<script type="text/javascript" src="{{ url('/') }}/js/jquery.leanModal.min.js"></script>

<link href="{{ url('/') }}/css/jquery.uls.css" rel="stylesheet"/>

<link href="{{ url('/') }}/css/jquery.uls.grid.css" rel="stylesheet"/>

<link href="{{ url('/') }}/css/jquery.uls.lcd.css" rel="stylesheet"/>

<!-- Source -->

<script src="{{ url('/') }}/js/jquery.uls.data.js"></script>

<script src="{{ url('/') }}/js/jquery.uls.data.utils.js"></script>

<script src="{{ url('/') }}/js/jquery.uls.lcd.js"></script>

<script src="{{ url('/') }}/js/jquery.uls.languagefilter.js"></script>

<script src="{{ url('/') }}/js/jquery.uls.regionfilter.js"></script>

<script src="{{ url('/') }}/js/jquery.uls.core.js"></script>

<script>

			$( document ).ready( function() {

				$( '.uls-trigger' ).uls( {

					onSelect : function( language ) {

						var languageName = $.uls.data.getAutonym( language );

						$( '.uls-trigger' ).text( languageName );

					},

					quickList: ['en', 'hi', 'he', 'ml', 'ta', 'fr'] //FIXME

				} );

			} );

		</script>

		<link rel="stylesheet" type="text/css" href="{{ url('/') }}/css/easy-responsive-tabs.css " />

    <script src="{{ url('/') }}/js/easyResponsiveTabs.js"></script>

    

@endsection



@section('banner')



<div class="banner-agro text-center">

	  <div class="container">    

			<h1>Área Restrita</h1>			

	  </div>

	</div>



@endsection



@section('content')





<!-- Categories -->

	<!--Vertical Tab-->

	<div class="categories-section main-grid-border">

		<div class="container">

			<div class="space-top"></div>

			<div class="category-list">

				<div id="parentVerticalTab">

					<ul class="resp-tabs-list hor_1">						

						<li>Anúncios</li>

						<li>Comentários</li>

						<li>Mensagens</li>

						<li>Perfil</li>						

						<a href="{{ url('/logout') }}">Sair</a>

					</ul>

					<div class="resp-tabs-container hor_1">						

						<div>

							<div class="ads-display col-md-12">

								<div class="wrapper">					

								<div class="bs-example bs-example-tabs" role="tabpanel" data-example-id="togglable-tabs">

								  <ul id="myTab" class="nav nav-tabs nav-tabs-responsive" role="tablist">

									<li role="presentation" class="active">

									  <a href="#home" id="home-tab" role="tab" data-toggle="tab" aria-controls="home" aria-expanded="true">

										<span class="text">Meus Anúncios</span>

									  </a>

									</li>

									<!-- <li role="presentation" class="next">

									  <a href="#profile" role="tab" id="profile-tab" data-toggle="tab" aria-controls="profile">

										<span class="text">Anúncios </span>

									  </a>

									</li>

									<li role="presentation">

									  <a href="#samsa" role="tab" id="samsa-tab" data-toggle="tab" aria-controls="samsa">

										<span class="text">Company</span>

									  </a>

									</li> -->

								  </ul>

								  <div id="myTabContent" class="tab-content">

									<div role="tabpanel" class="tab-pane fade in active" id="home" aria-labelledby="home-tab">

									   <div>

											<div id="container">

											<div class="view-controls-list" id="viewcontrols">

												<h3><a href="{{ url('/anuncio/create') }}"><span class="label label-primary">Criar Novo</span></a></h3>

											</div>

											<div class="sort">

											   <div class="sort-by">

													<label>Ordenar por : </label>

													<select>

																	<option value="">Mais recente</option>

																	<option value="">Mais Antigos</option>

																	<option value="">Menor Preço</option>

																	<option value="">Maior Preço</option>

													</select>

												   </div>

												 </div>

											<div class="clearfix"></div>

										<ul class="list">											

												<li>

												<img ="{{ url('/') }}/images/m1.jpg" title="" alt="" />

												<section class="list-left">

												<a href="single.html"><h5 class="title">There are many variations of passages of Lorem Ipsum</h5></a>

												<span class="adprice">$290</span>

												<p class="catpath">Mobile Phones » Brand</p>

												</section>

												<section class="list-right">

												<span class="date">Today, 17:55</span>

												<span class="cityname">City name</span>

												<a href="{{ url('/anuncio/edit') }}/"><span class="label label-success">Editar</span></a>

												<a href="{{ url('/anuncio/destroy') }}/"><span class="label label-danger">Excluir</span></a>

												</section>

												<div class="clearfix"></div>

												</li>



												<li>

												<img ="{{ url('/') }}/images/m1.jpg" title="" alt="" />

												<section class="list-left">

												<a href="single.html"><h5 class="title">There are many variations of passages of Lorem Ipsum</h5></a>

												<span class="adprice">$290</span>

												<p class="catpath">Mobile Phones » Brand</p>

												</section>

												<section class="list-right">

												<span class="date">Today, 17:55</span>

												<span class="cityname">City name</span>

												<a href="single.html"><span class="label label-success">Editar</span></a>

												<a href="single.html"><span class="label label-danger">Excluir</span></a>

												</section>

												<div class="clearfix"></div>

												</li>



												<li>

												<img ="{{ url('/') }}/images/m1.jpg" title="" alt="" />

												<section class="list-left">

												<a href="single.html"><h5 class="title">There are many variations of passages of Lorem Ipsum</h5></a>

												<span class="adprice">$290</span>

												<p class="catpath">Mobile Phones » Brand</p>

												</section>

												<section class="list-right">

												<span class="date">Today, 17:55</span>

												<span class="cityname">City name</span>

												<a href="single.html"><span class="label label-success">Editar</span></a>

												<a href="single.html"><span class="label label-danger">Excluir</span></a>

												</section>

												<div class="clearfix"></div>

												</li>



												<li>

												<img ="{{ url('/') }}/images/m1.jpg" title="" alt="" />

												<section class="list-left">

												<a href="single.html"><h5 class="title">There are many variations of passages of Lorem Ipsum</h5></a>

												<span class="adprice">$290</span>

												<p class="catpath">Mobile Phones » Brand</p>

												</section>

												<section class="list-right">

												<span class="date">Today, 17:55</span>

												<span class="cityname">City name</span>

												<a href="single.html"><span class="label label-success">Editar</span></a>

												<a href="single.html"><span class="label label-danger">Excluir</span></a>

												</section>

												<div class="clearfix"></div>

												</li>



												<li>

												<img ="{{ url('/') }}/images/m1.jpg" title="" alt="" />

												<section class="list-left">

												<a href="single.html"><h5 class="title">There are many variations of passages of Lorem Ipsum</h5></a>

												<span class="adprice">$290</span>

												<p class="catpath">Mobile Phones » Brand</p>

												</section>

												<section class="list-right">

												<span class="date">Today, 17:55</span>

												<span class="cityname">City name</span>

												<a href="single.html"><span class="label label-success">Editar</span></a>

												<a href="single.html"><span class="label label-danger">Excluir</span></a>

												</section>

												<div class="clearfix"></div>

												</li>



												<li>

												<img ="{{ url('/') }}/images/m1.jpg" title="" alt="" />

												<section class="list-left">

												<a href="single.html"><h5 class="title">There are many variations of passages of Lorem Ipsum</h5></a>

												<span class="adprice">$290</span>

												<p class="catpath">Mobile Phones » Brand</p>

												</section>

												<section class="list-right">

												<span class="date">Today, 17:55</span>

												<span class="cityname">City name</span>

												<a href="single.html"><span class="label label-success">Editar</span></a>

												<a href="single.html"><span class="label label-danger">Excluir</span></a>

												</section>

												<div class="clearfix"></div>

												</li>

											

											

										</ul>

									</div>

										</div>

									</div>							

									

									<ul class="pagination pagination-sm">

										<li><a href="#">Anterior</a></li>

										<li><a href="#">1</a></li>

										<li><a href="#">2</a></li>

										<li><a href="#">3</a></li>

										<li><a href="#">4</a></li>

										<li><a href="#">5</a></li>

										<li><a href="#">6</a></li>

										<li><a href="#">7</a></li>

										<li><a href="#">8</a></li>

										<li><a href="#">Próxima</a></li>

									</ul>

								  </div>

								</div>

							</div>

							</div>

				<div class="clearfix"></div>

						</div>

						<div>

							<div class="category">

								 <div class="grid_3 grid_5">

								     <h3 class="head-top">Comentários</h3>								       

									    <div class="col-md-12 page_1">	

									    												

								              <table class="table table-bordered">

												<thead>

													<tr>

														<th width="25%">Produto</th>

														<th width="25%">Comentário</th>

														<th width="25%">Data</th>

														<th width="25%">Ação</th>

													</tr>

												</thead>

												<tbody>

													<tr>

														<td>Produto Teste</td>

														<td>Ótimo Produto</td>

														<td>05/09/2016</td>

														<td><a href="single.html"><span class="label label-primary">Visualizar</span></a>

														<a href="single.html"><span class="label label-danger">Remover</span></a></td>

													</tr>

													<tr>

														<td>Produto Teste</td>

														<td>Ótimo Produto</td>

														<td>05/09/2016</td>

														<td><a href="single.html"><span class="label label-primary">Visualizar</span></a>

														<a href="single.html"><span class="label label-danger">Remover</span></a></td>

													</tr>

													<tr>

														<td>Produto Teste</td>

														<td>Ótimo Produto</td>

														<td>05/09/2016</td>

														<td><a href="single.html"><span class="label label-primary">Visualizar</span></a>

														<a href="single.html"><span class="label label-danger">Remover</span></a></td>

													</tr>

													<tr>

														<td>Produto Teste</td>

														<td>Ótimo Produto</td>

														<td>05/09/2016</td>

														<td><a href="single.html"><span class="label label-primary">Visualizar</span></a>

														<a href="single.html"><span class="label label-danger">Remover</span></a></td>

													</tr>

													<tr>

														<td>Produto Teste</td>

														<td>Ótimo Produto</td>

														<td>05/09/2016</td>

														<td><a href="single.html"><span class="label label-primary">Visualizar</span></a>

														<a href="single.html"><span class="label label-danger">Remover</span></a></td>

													</tr>

													<tr>

														<td>Produto Teste</td>

														<td>Ótimo Produto</td>

														<td>05/09/2016</td>

														<td><a href="single.html"><span class="label label-primary">Visualizar</span></a>

														<a href="single.html"><span class="label label-danger">Remover</span></a></td>

													</tr>

													

												</tbody>

											  </table> 



										</div>										

									   <div class="clearfix"> </div>  

									  

								    </div>									

							</div>							

						</div>

						<div>

							<div class="category">

								 <div class="grid_3 grid_5">

								     <h3 class="head-top">Mensagens</h3>								       

									    <div class="col-md-12 page_1">

									    	<div class="view-controls-list" id="viewcontrols">

													<h3><span class="label label-primary">Nova Mensagem</span></h3>

												</div>											

								              <table class="table table-bordered">

												<thead>

													<tr>

														<th width="20%">De:</th>

														<th width="20%">Para</th>

														<th width="20%">Assunto</th>

														<th width="20%">Data</th>

														<th width="20%">Ação</th>

													</tr>

												</thead>

												<tbody>

													<tr>

														<td>Usuario 1</td>

														<td>Usuario 2</td>

														<td>Compra de Mercadoria</td>

														<td>05/09/2016</td>

														<td><a href="single.html"><span class="label label-primary">Visualizar</span></a></td>

													</tr>

													<tr>

														<td>Usuario 1</td>

														<td>Usuario 2</td>

														<td>Compra de Mercadoria</td>

														<td>05/09/2016</td>

														<td><a href="single.html"><span class="label label-primary">Visualizar</span></a></td>

													</tr>

													<tr>

														<td>Usuario 1</td>

														<td>Usuario 2</td>

														<td>Compra de Mercadoria</td>

														<td>05/09/2016</td>

														<td><a href="single.html"><span class="label label-primary">Visualizar</span></a></td>

													</tr>

													<tr>

														<td>Usuario 1</td>

														<td>Usuario 2</td>

														<td>Compra de Mercadoria</td>

														<td>05/09/2016</td>

														<td><a href="single.html"><span class="label label-primary">Visualizar</span></a></td>

													</tr>

													<tr>

														<td>Usuario 1</td>

														<td>Usuario 2</td>

														<td>Compra de Mercadoria</td>

														<td>05/09/2016</td>

														<td><a href="single.html"><span class="label label-primary">Visualizar</span></a></td>

													</tr>

													<tr>

														<td>Usuario 1</td>

														<td>Usuario 2</td>

														<td>Compra de Mercadoria</td>

														<td>05/09/2016</td>

														<td><a href="single.html"><span class="label label-primary">Visualizar</span></a>

														</td>

													</tr>

													

													

												</tbody>

											  </table> 

											                   

										</div>										

									   <div class="clearfix"> </div>  

									  

								    </div>									

							</div>								

						</div>



						

						

						<div>

							<div class="category">

								<form class="form-horizontal">

										<div class="form-group">

											<label for="focusedinput" class="col-sm-2 control-label">Nome</label>

											<div class="col-sm-8">

												<input type="text" class="form-control1" id="focusedinput" placeholder="Default Input">

											</div>

											<div class="col-sm-2 jlkdfj1">

												<p class="help-block">...!</p>

											</div>

										</div>

										<div class="form-group">

											<label for="focusedinput" class="col-sm-2 control-label">Email</label>

											<div class="col-sm-8">

												<input type="text" class="form-control1" id="focusedinput" placeholder="Default Input">

											</div>

											<div class="col-sm-2 jlkdfj1">

												<p class="help-block">...!</p>

											</div>

										</div>

										<div class="form-group">

											<label for="focusedinput" class="col-sm-2 control-label">Senha</label>

											<div class="col-sm-8">

												<input type="text" class="form-control1" id="focusedinput" placeholder="Default Input">

											</div>

											<div class="col-sm-2 jlkdfj1">

												<p class="help-block">...!</p>

											</div>

										</div>

										<div class="form-group">

											<label for="focusedinput" class="col-sm-2 control-label">Confirmar Senha</label>

											<div class="col-sm-8">

												<input type="text" class="form-control1" id="focusedinput" placeholder="Default Input">

											</div>

											<div class="col-sm-2 jlkdfj1">

												<p class="help-block">...!</p>

											</div>

										</div>	

										<div class="form-group">

											<label for="focusedinput" class="col-sm-2 control-label">CPF:</label>

											<div class="col-sm-8">

												<input type="text" class="form-control1" id="focusedinput" placeholder="Default Input">

											</div>

											<div class="col-sm-2 jlkdfj1">

												<p class="help-block">...!</p>

											</div>

										</div>	

										<div class="form-group">

											<label for="focusedinput" class="col-sm-2 control-label">Telefone 1:</label>

											<div class="col-sm-8">

												<input type="text" class="form-control1" id="focusedinput" placeholder="Default Input">

											</div>

											<div class="col-sm-2 jlkdfj1">

												<p class="help-block">...!</p>

											</div>

										</div>	

										<div class="form-group">

											<label for="focusedinput" class="col-sm-2 control-label">Telefone 2:</label>

											<div class="col-sm-8">

												<input type="text" class="form-control1" id="focusedinput" placeholder="Default Input">

											</div>

											<div class="col-sm-2 jlkdfj1">

												<p class="help-block">...!</p>

											</div>

										</div>	

										<div class="form-group">

											<label for="focusedinput" class="col-sm-2 control-label">Telefone 3:</label>

											<div class="col-sm-8">

												<input type="text" class="form-control1" id="focusedinput" placeholder="Default Input">

											</div>

											<div class="col-sm-2 jlkdfj1">

												<p class="help-block">...!</p>

											</div>

										</div>

										<div class="form-group">

											<label for="focusedinput" class="col-sm-2 control-label">CEP:</label>

											<div class="col-sm-8">

												<input type="text" class="form-control1" id="focusedinput" placeholder="Default Input">

											</div>

											<div class="col-sm-2 jlkdfj1">

												<p class="help-block">...!</p>

											</div>

										</div>

										<div class="form-group">

											<label for="selector1" class="col-sm-2 control-label">Estado</label>

											<div class="col-sm-8"><select name="selector1" id="selector1" class="form-control1">

												<option>Lorem ipsum dolor sit amet.</option>

												<option>Dolore, ab unde modi est!</option>

												<option>Illum, fuga minus sit eaque.</option>

												<option>Consequatur ducimus maiores voluptatum minima.</option>

											</select></div>

										</div>

										<div class="form-group">

											<label for="selector1" class="col-sm-2 control-label">Cidade</label>

											<div class="col-sm-8"><select name="selector1" id="selector1" class="form-control1">

												<option>Lorem ipsum dolor sit amet.</option>

												<option>Dolore, ab unde modi est!</option>

												<option>Illum, fuga minus sit eaque.</option>

												<option>Consequatur ducimus maiores voluptatum minima.</option>

											</select></div>

										</div>

										<div class="form-group">

											<label for="focusedinput" class="col-sm-2 control-label">Logradouro:</label>

											<div class="col-sm-8">

												<input type="text" class="form-control1" id="focusedinput" placeholder="Default Input">

											</div>

											<div class="col-sm-2 jlkdfj1">

												<p class="help-block">...!</p>

											</div>

										</div>

										<div class="form-group">

											<label for="focusedinput" class="col-sm-2 control-label">Número:</label>

											<div class="col-sm-8">

												<input type="text" class="form-control1" id="focusedinput" placeholder="Default Input">

											</div>

											<div class="col-sm-2 jlkdfj1">

												<p class="help-block">...!</p>

											</div>

										</div>

										<div class="form-group">

											<label for="focusedinput" class="col-sm-2 control-label">Complemento:</label>

											<div class="col-sm-8">

												<input type="text" class="form-control1" id="focusedinput" placeholder="Default Input">

											</div>

											<div class="col-sm-2 jlkdfj1">

												<p class="help-block">...!</p>

											</div>

										</div>

										<div class="form-group">

											<label for="focusedinput" class="col-sm-2 control-label">Bairro:</label>

											<div class="col-sm-8">

												<input type="text" class="form-control1" id="focusedinput" placeholder="Default Input">

											</div>

											<div class="col-sm-2 jlkdfj1">

												<p class="help-block">...!</p>

											</div>

										</div>	

										<div class="form-group">

											<label for="focusedinput" class="col-sm-2 control-label">Facebook:</label>

											<div class="col-sm-8">

												<input type="text" class="form-control1" id="focusedinput" placeholder="Default Input">

											</div>

											<div class="col-sm-2 jlkdfj1">

												<p class="help-block">...!</p>

											</div>

										</div>

										<div class="form-group">

											<label for="focusedinput" class="col-sm-2 control-label">LinkedIn:</label>

											<div class="col-sm-8">

												<input type="text" class="form-control1" id="focusedinput" placeholder="Default Input">

											</div>

											<div class="col-sm-2 jlkdfj1">

												<p class="help-block">...!</p>

											</div>

										</div>

									</form>

								<div class="clearfix"></div>

							</div>

							

						</div>

						<div>

							<div class="category">

								<div class="category-img">

									<img ="{{ url('/') }}/images/cat5.png" title="image" alt="" />

								</div>

								<div class="category-info">

									<h4>Furniture</h4>

									<span>1,05,168 Ads</span>

									<a href="all-classifieds.html">View all Ads</a>

								</div>

								<div class="clearfix"></div>

							</div>

							<div class="sub-categories">

								<ul>

									<li><a href="furnitures.html">Sofa & Dining</a></li>

									<li><a href="furnitures.html">Beds & Wardrobes</a></li>

									<li><a href="furnitures.html">Home Decor & Garden</a></li>

									<li><a href="furnitures.html">Other Household Items</a></li>

									<div class="clearfix"></div>

								</ul>

							</div>

						</div>

						<div>

							<div class="category">

								<div class="category-img">

									<img ="{{ url('/') }}/images/cat6.png" title="image" alt="" />

								</div>

								<div class="category-info">

									<h4>Pets</h4>

									<span>1,77,816 Ads</span>

									<a href="all-classifieds.html">View all Ads</a>

								</div>

								<div class="clearfix"></div>

							</div>

							<div class="sub-categories">

								<ul>

									<li><a href="pets.html">Dogs</a></li>

									<li><a href="pets.html">Aquariums</a></li>

									<li><a href="pets.html">Pet Food & Accessories</a></li>

									<li><a href="pets.html">Other Pets</a></li>

									<div class="clearfix"></div>

								</ul>

							</div>

						</div>

						<div>

							<div class="category">

								<div class="category-img">

									<img ="{{ url('/') }}/images/cat7.png" title="image" alt="" />

								</div>

								<div class="category-info">

									<h4>Books, Sports & Hobbies</h4>

									<span>9,58,458 Ads</span>

									<a href="all-classifieds.html">View all Ads</a>

								</div>

								<div class="clearfix"></div>

							</div>

							<div class="sub-categories">

								<ul>

									<li><a href="books-sports-hobbies.html">Books & Magazines</a></li>

									<li><a href="books-sports-hobbies.html">Musical Instruments</a></li>

									<li><a href="books-sports-hobbies.html">Sports Equipment</a></li>

									<li><a href="books-sports-hobbies.html">Gym & Fitness</a></li>

									<li><a href="books-sports-hobbies.html">Other Hobbies</a></li>

									<div class="clearfix"></div>

								</ul>

							</div>

						</div>

						<div>

							<div class="category">

								<div class="category-img">

									<img ="{{ url('/') }}/images/cat8.png" title="image" alt="" />

								</div>

								<div class="category-info">

									<h4>Fashion</h4>

									<span>3,52,345 Ads</span>

									<a href="all-classifieds.html">View all Ads</a>

								</div>

								<div class="clearfix"></div>

							</div>

							<div class="sub-categories">

								<ul>

									<li><a href="fashion.html">Clothes</a></li>

									<li><a href="fashion.html">Footwear</a></li>

									<li><a href="fashion.html">Accessories</a></li>

									<div class="clearfix"></div>

								</ul>

							</div>

						</div>

						<div>

							<div class="category">

								<div class="category-img">

									<img ="{{ url('/') }}/images/cat9.png" title="image" alt="" />

								</div>

								<div class="category-info">

									<h4>Kids</h4>

									<span>8,45,298 Ads</span>

									<a href="all-classifieds.html">View all Ads</a>

								</div>

								<div class="clearfix"></div>

							</div>

							<div class="sub-categories">

								<ul>

									<li><a href="kids.html">Furniture And Toys</a></li>

									<li><a href="kids.html">Prams & Walkers</a></li>

									<li><a href="kids.html">Accessories</a></li>

									<div class="clearfix"></div>

								</ul>

							</div>

						</div>

						<div>

							<div class="category">

								<div class="category-img">

									<img ="{{ url('/') }}/images/cat10.png" title="image" alt="" />

								</div>

								<div class="category-info">

									<h4>Services</h4>

									<span>7,58,867 Ads</span>

									<a href="all-classifieds.html">View all Ads</a>

								</div>

								<div class="clearfix"></div>

							</div>

							<div class="sub-categories">

								<ul>

									<li><a href="services.html">Education & Classes</a></li>

									<li><a href="services.html">Web Development</a></li>

									<li><a href="services.html">Electronics & Computer Repair</a></li>

									<li><a href="services.html">Maids & Domestic Help</a></li>

									<li><a href="services.html">Health & Beauty</a></li>

									<li><a href="services.html">Movers & Packers</a></li>

									<li><a href="services.html">Drivers & Taxi</a></li>

									<li><a href="services.html">Event Services</a></li>

									<li><a href="services.html">Other Services</a></li>

									<div class="clearfix"></div>

								</ul>

							</div>

						</div>

						<div>

							<div class="category">

								<div class="category-img">

									<img ="{{ url('/') }}/images/cat11.png" title="image" alt="" />

								</div>

								<div class="category-info">

									<h4>Jobs</h4>

									<span>5,74,547 Ads</span>

									<a href="all-classifieds.html">View all Ads</a>

								</div>

								<div class="clearfix"></div>

							</div>

							<div class="sub-categories">

								<ul>

									<li><a href="jobs.html">Customer Service</a></li>

									<li><a href="jobs.html">IT</a></li>

									<li><a href="jobs.html">Online</a></li>

									<li><a href="jobs.html">Marketing</a></li>

									<li><a href="jobs.html">Advertising & PR</a></li>

									<li><a href="jobs.html">Sales</a></li>

									<li><a href="jobs.html">Clerical & Administration</a></li>

									<li><a href="jobs.html">Human Resources</a></li>

									<li><a href="jobs.html">Education</a></li>

									<li><a href="jobs.html">Hotels & Tourism</a></li>

									<li><a href="jobs.html">Accounting & Finance</a></li>

									<li><a href="jobs.html">Manufacturing</a></li>

									<li><a href="jobs.html">Part - Time</a></li>

									<li><a href="jobs.html">Other Jobs</a></li>

									<div class="clearfix"></div>

								</ul>

							</div>

						</div>

						<div>

							<div class="category">

								<div class="category-img">

									<img ="{{ url('/') }}/images/cat12.png" title="image" alt="" />

								</div>

								<div class="category-info">

									<h4>Real Estate</h4>

									<span>98,156 Ads</span>

									<a href="all-classifieds.html">View all Ads</a>

								</div>

								<div class="clearfix"></div>

							</div>

							<div class="sub-categories">

								<ul>

									<li><a href="real-estate.html">Houses</a></li>

									<li><a href="real-estate.html">Apartments</a></li>

									<li><a href="real-estate.html">PG & Roommates</a></li>

									<li><a href="real-estate.html">Land & Plots</a></li>

									<li><a href="real-estate.html">Shops - Offices - Commercial Space</a></li>

									<li><a href="real-estate.html">Vacation Rentals - Guest Houses</a></li>

									<div class="clearfix"></div>

								</ul>

							</div>

						</div>

					</div>

					<div class="clearfix"></div>

				</div>

			</div>

		</div>

	</div>

	<!--Plug-in Initialisation-->

	<script type="text/javascript">

    $(document).ready(function() {



        //Vertical Tab

        $('#parentVerticalTab').easyResponsiveTabs({

            type: 'vertical', //Types: default, vertical, accordion

            width: 'auto', //auto or any width like 600px

            fit: true, // 100% fit in a container

            closed: 'accordion', // Start closed if in accordion view

            tabidentify: 'hor_1', // The tab groups identifier

            activate: function(event) { // Callback function if tab is switched

                var $tab = $(this);

                var $info = $('#nested-tabInfo2');

                var $name = $('span', $info);

                $name.text($tab.text());

                $info.show();

            }

        });

    });

</script>

	<!-- //Categories -->





@endsection