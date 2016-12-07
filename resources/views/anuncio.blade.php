@extends('layouts.portal')



@section('scripts')	

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

    <script src="{{ url('/') }}/js/tabs.js"></script>

	

<script type="text/javascript">

$(document).ready(function () {    

var elem=$('#container ul');      

	$('#viewcontrols a').on('click',function(e) {

		if ($(this).hasClass('gridview')) {

			elem.fadeOut(1000, function () {

				$('#container ul').removeClass('list').addClass('grid');

				$('#viewcontrols').removeClass('view-controls-list').addClass('view-controls-grid');

				$('#viewcontrols .gridview').addClass('active');

				$('#viewcontrols .listview').removeClass('active');

				elem.fadeIn(1000);

			});						

		}

		else if($(this).hasClass('listview')) {

			elem.fadeOut(1000, function () {

				$('#container ul').removeClass('grid').addClass('list');

				$('#viewcontrols').removeClass('view-controls-grid').addClass('view-controls-list');

				$('#viewcontrols .gridview').removeClass('active');

				$('#viewcontrols .listview').addClass('active');

				elem.fadeIn(1000);

			});									

		}

	});

});

</script>



@endsection



@section('banner')

	<div class="banner text-center">

	  <div class="container">    

			<h1>Lorem ipsum   <span class="segment-heading">    dolor amet </span> lorem ipsum</h1>

			<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>

			<a href="{{ url('/anuncio/create') }}">Criar Anúncio</a>

	  </div>

	</div>

@endsection



@section('content')

	<!-- Mobiles -->

	<div class="total-ads main-grid-border">

		<div class="container">

			<div class="select-box">

				<div>
					<form action="{{url('/')}}/anuncio/busca" method="GET">
						
					<div class="search">

						<div id="custom-search-input">

						<div class="input-group">							

								<input type="text" class="form-control input-lg" name="keyword" placeholder="Buscar"/>

								<span class="input-group-btn">

									<button class="btn btn-info btn-lg" type="button" onclick="submit();">

										<i class="glyphicon glyphicon-search"></i>

									</button>

								</span>
				
						</div>

					</div>

					</div>
				</form>

				</div>

				<div class="clearfix"></div>

			</div>

			<ol class="breadcrumb" style="margin-bottom: 5px;">

			  <li><a href="{{ url('/') }}">Home</a></li>
				@if(isset($bread1))	
			  <li><a href="{{ url('/') }}/{{$bread1a}}">{{$bread1}}</a></li>
			  	@endif
			  <li class="active">

			     @if(isset($bread2))

			         {{ $bread2 }}

			     @endif

			      

			  </li>

			</ol>

			<div class="ads-grid">
				

				</div>

				<div class="ads-display col-md-12">

					<div class="wrapper">					

					<div class="bs-example bs-example-tabs" role="tabpanel" data-example-id="togglable-tabs">

					  <ul id="myTab" class="nav nav-tabs nav-tabs-responsive" role="tablist">

						<li role="presentation" class="active">

						  <a href="#home" id="home-tab" role="tab" data-toggle="tab" aria-controls="home" aria-expanded="true">

							<span class="text">Todos os Anúncios</span>

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

									<label>Visualizar :</label>

									<a class="gridview"><i class="glyphicon glyphicon-th"></i></a>

									<a class="listview active"><i class="glyphicon glyphicon-th-list"></i></a>

								</div>
								<form method="GET" action="">
								@if(isset($keyword))

							         <input type="hidden" name="keyword" value="{{$keyword}}">

							     @endif

								<div class="sort">

								   <div class="sort-by">

										<label>Ordenar por : </label>

										<select name="f" onchange="submit()">

														<option value="">Ordenar</option>

														<option value="top">Relevancia</option>

														<option value="recente">Mais recente</option>

														<option value="antigo">Mais Antigos</option>

														<option value="menorpreco">Menor Preço</option>

														<option value="maiorpreco">Maior Preço</option>

										</select>

									   </div>

									 </div>
								</form>

								<div class="clearfix"></div>
							<div class="row" style="padding: 0 10px">								
							
							<ul class="list">

								@forelse($anuncios as $anuncio)

								<a href="{{ url('/anuncio/show') }}/{{ $anuncio->id }}">

									<li>

									@if($anuncio->imagens->count() > 0)
										<img src="{{ url('/') }}/uploads/{{ $anuncio->imagens[0]->nome }}" title="" alt="" width="300px" height="200px" />
									@else
										<img src="{{ url('/') }}/images/m1.jpg" title="" alt="" width="300px" height="200px"/>
									@endif

									<section class="list-left">

									<h5 class="title">{{ $anuncio->titulo }}</h5>

									<span class="adprice">{{ $anuncio->moeda->cifra }} {{substr_replace($anuncio->valor, ",", strlen($anuncio->valor)-2).substr($anuncio->valor, strlen($anuncio->valor)-2)}}</span>

									<p class="catpath">{{ $anuncio->categoria->nome }}</p>

									</section>

									<section class="list-right">

									<span class="date">{{ $anuncio->created_at}}</span>

									<span class="cityname">{{ $anuncio->cidade->nome }}</span>

									</section>

									<div class="clearfix"></div>

									</li> 

								</a>

								@empty

									<a>Nenhum Anúncio Encontrado</a>

								@endforelse

								

							</ul>
							</div>

						</div>

							</div>

						</div>						

						

						<!--<ul class="pagination pagination-sm">

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

						</ul>-->

					  </div>

					</div>

				</div>

				</div>

				<div class="clearfix"></div>

			</div>

		</div>	

	</div>

	<!-- // Mobiles -->

	@endsection