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

			
			@if (Auth::user())

			$("#comentarioSave").click(function(){							

				var url = "{{url('/')}}/comentario/store";
				$.ajax({
			           type: "POST",
			           url: url,
			           data: $("#comentarioForm").serialize(), // serializes the form's elements.
			           success: function(data)
			           {
			               alert(data); // show response from the php script.
			               window.location.reload();
			           }
			         });

				$('#comentarioForm').trigger("reset");

				return false;
			    

			});

			$("#mensagemSave").click(function(){
							
					
				var url = "{{url('/')}}/mensagem/store";
				$.ajax({
			           type: "POST",
			           url: url,
			           data: $("#mensagemForm").serialize(), // serializes the form's elements.
			           success: function(data)
			           {
			               alert(data); // show response from the php script.
			           }
			         });
				$('#mensagemForm').trigger("reset");
			    return false;

			});

			
			
	        $("#gostei").click(function(){							
					
				var url = "{{url('/')}}/likes/gostei";

				$.ajax({						
			           type: "POST",
			           url: url,
			           data: "anuncio_id={{$anuncio->id}}&user_id={{Auth::user()->id}}&_token={{ csrf_token() }}", // serializes the form's elements.
			           success: function(data)
			           {
			               alert(data); // show response from the php script.
			           }
			         });

			    return false;

			});     

	        $("#naogostei").click(function(){
		
					
				var url = "{{url('/')}}/likes/naogostei";

				$.ajax({						
			           type: "POST",
			           url: url,
			           data: "anuncio_id={{$anuncio->id}}&user_id={{Auth::user()->id}}&_token={{ csrf_token() }}", // serializes the form's elements.
			           success: function(data)
			           {
			               alert(data); // show response from the php script.
			           }
			         });

			    return false;

			});

			$("#denunciar").click(function(){
									
				var url = "{{url('/')}}/likes/denunciar";

				$.ajax({						
			           type: "POST",
			           url: url,
			           data: "anuncio_id={{$anuncio->id}}&user_id={{Auth::user()->id}}&_token={{ csrf_token() }}", // serializes the form's elements.
			           success: function(data)
			           {
			               alert(data); // show response from the php script.
			           }
			         });

			    return false;

			});
            @endif
            
			
		});
	</script>

		<link rel="stylesheet" href="{{ url('/') }}/css/flexslider.css" media="screen" />

@endsection



@section('banner')

	<div class="banner text-center">

	  <div class="container">    

			<h1>O Maior Portal de Anúncios Agrícola do Brasil</h1>
			<p>A tecnologia facilitando a vida do home do campo!.</p>

			<a href="{{ url('/anuncio/create') }}">Criar Anúncio</a>

	  </div>

	</div>

@endsection



@section('content')

	<!--single-page-->

	<div class="single-page main-grid-border">

		<div class="container">

			<ol class="breadcrumb" style="margin-bottom: 5px;">

				<li><a href="{{ url('/') }}">Home</a></li>

				<li><a href="{{ url('/anuncio') }}">Todos</a></li>

				<li class="active"><a href="{{ url('/anuncio') }}/categoria/{{ $anuncio->categoria_id }}">{{ $anuncio->categoria->nome }}</a></li>

				<li class="active">{{ $anuncio->titulo }}</li>

			</ol>

			<div class="product-desc">

				<div class="col-md-7 product-view">

					<h2>{{ $anuncio->titulo }}</h2>

					<p> <i class="glyphicon glyphicon-map-marker"></i><a href="javascript:void;">{{ $anuncio->cidade->estado->nome }}</a>, <a href="{{url('/anuncio/cidade')}}/{{ $anuncio->cidade->id }}">{{ $anuncio->cidade->nome }},</a> <a href="{{url('/anuncio/regiao')}}/{{ $anuncio->ddd }}">Região DDD ({{ $anuncio->ddd}})</a>| Adicionado em {{ date_format($anuncio->created_at, 'd-m-Y H:i') }}, ID: {{ $anuncio->id }}</p>

					<div class="flexslider">

						<ul class="slides">
							@forelse($anuncio->imagens as $imagem)
							<li data-thumb="{{ url('/') }}/uploads/{{ $imagem->nome }}">

								<img src="{{ url('/') }}/uploads/{{ $imagem->nome }}" />

							</li>
							@empty
							<li data-thumb="{{ url('/') }}/images/m1.jpg">

								<img src="{{ url('/') }}/images/m1.jpg" />

							</li>
							@endforelse						

						</ul>

					</div>

					<!-- FlexSlider -->

					  <script defer src="{{ url('/') }}/js/jquery.flexslider.js"></script>

					<link rel="stylesheet" href="{{ url('/') }}/css/flexslider.css" type="text/css" media="screen" />



						<script>

					// Can also be used with $(document).ready()

					$(window).load(function() {

					  $('.flexslider').flexslider({

						animation: "slide",

						controlNav: "thumbnails"

					  });

					});

					</script>

					<!-- //FlexSlider -->					

					<div class="product-details">						
						<hr>
						<h3>Descrição:</h3>

						<p>{{ $anuncio->descricao }}</p>

					

					</div>
					<hr>
					<div class="product-details">						

						<div>

							<p style="display: inline;">Forma de Entrega:  <h4 style="display: inline;">{{$anuncio->formadeentrega->nome}}</h4></p>
							<div class="clearfix"></div>

						</div>
						<div>

							<p style="display: inline;">Formas de Pagamento:  <h4 style="display: inline;">
							@forelse($anuncio->pagamentos as $pagamento)
								{{$pagamento->nome}},
							@empty
								Nenhuma Forma de Pagamento Informada
							@endforelse
							</h4></p>

							

							<div class="clearfix"></div>

						</div>
						
						<div class="col-md-12 text-center">
						<hr>
						<h4>
							<a href="{{url('/')}}/anuncio/usuario/{{ $anuncio->user_id}}">Clique aqui para ver todos os anúncios deste vendedor!</a>
						</h4>
						<hr>
						</div>

					</div>		




					@if (Auth::user())
					<div class="product-details">	
											

						

						<div class="col-md-12">
							<form method="POST" id="comentarioForm">	
							{{ csrf_field() }}					
								<div class="form-group">
									<label><h3>Deixe seu comentário:</h3></label>
									<textarea class="form-control" placeholder="" name="comentario"></textarea>
								</div>
								<div class="form-group">
									<input type="hidden" name="user_id" value="{{Auth::user()->id}}">	
									<input type="hidden" name="anuncio_id" value="{{$anuncio->id}}">	
									<input type="button" id="comentarioSave" class="btn btn-default btn-block" value="Publicar">	
								</div>
								
						</form>
						</div>
						

					

					</div>
					@endif
					<div class="product-details">	

						<div class="col-md-12">
						<hr>
							<h3>Comentários:</h3>

							@forelse($anuncio->comentarios as $comentario)
								<p><strog>{{$comentario->user->name}}: </strong>{{$comentario->comentario}}</p>
							@empty
								<p>Nenhum comentário encontrado...</p>
							@endforelse
						</div>

					

					</div>

				</div>

				<div class="col-md-5 product-details-grid">

					<div class="item-price">

						<div class="product-price">

							<p class="p-price">Preço</p>

							<h3 class="rate">{{$anuncio->moeda->cifra}} {{substr_replace($anuncio->valor, ",", strlen($anuncio->valor)-2).substr($anuncio->valor, strlen($anuncio->valor)-2)}}</h3>

							<div class="clearfix"></div>

						</div>

						<div class="condition">

							<p class="p-price">Moeda</p>

							<h4>{{$anuncio->moeda->nome}}({{$anuncio->moeda->sigla}})</h4>

							<div class="clearfix"></div>

						</div>

						<div class="condition">

							<p class="p-price">Condição</p>

							<h4>{{ucfirst($anuncio->condicao)}}</h4>

							<div class="clearfix"></div>

						</div>

						<div class="itemtype">

							<p class="p-price">Categoria</p>

							<h4>{{ $anuncio->categoria->nome }}</h4>

							<div class="clearfix"></div>

						</div>

					</div>					

					<div class="interested text-center">

						<h4>Gostou deste produto?</h4>

						<h4><small>Entre em contato com o vendedor!</small><h4>

						@if($anuncio->contato_fone1 == 1)
						<p><i class="glyphicon glyphicon-earphone"></i>Telefone: {{ $anuncio->user->contato_fone }}</p>
						@endif
						@if($anuncio->contato_whatsapp == 1)
						<p><i class="glyphicon glyphicon-comment"></i>WhatsApp: {{ $anuncio->user->contato_whatsapp }}</p>
						@endif
						@if($anuncio->contato_facebook == 1)						
						<p><i class="glyphicon glyphicon-user"></i>Facebook: {{ $anuncio->user->contato_facebook }}</p>
						@endif
						@if($anuncio->contato_email == 1)						
						<p><i class="glyphicon glyphicon-envelope"></i> Email: {{ $anuncio->user->email }}</p>
						@endif						
					</div>
					<div class="clearfix"></div>
					@if (Auth::user() && Auth::user()->id != $anuncio->user->id)
							@if($anuncio->contato_mensagem == 1)	
								<div class="interested text-center" style="background-color: #F4F5F6; padding: 20px 20px;">	
									<div class="row">
										<div class="col-md-12">								

											<form method="POST" id="mensagemForm">	
											{{ csrf_field() }}					
												<div class="form-group">
												<label><h4><i class="glyphicon glyphicon-share-alt"></i>Enviar Mensagem Para o Vendedor: </h4></label>
													<textarea class="form-control" placeholder="" name="mensagem"></textarea>
												</div>
												<div class="form-group">
													<input type="hidden" name="user_id" value="{{Auth::user()->id}}">
													<input type="hidden" name="vendedor_id" value="{{$anuncio->user->id}}">
													<input type="button" id="mensagemSave" class="btn btn-default btn-block" value="Enviar">	
												</div>
												<hr>
											</form>						

										</div>
									</div>
								</div>

							@endif
						@endif		
										

					@if (Auth::user() && Auth::user()->id != $anuncio->user->id)

					<div class="interested text-center" style="background-color: #F4F5F6; padding: 15px">						
						<p style="margin-top: 0;">O que achou deste anúncio?</p>
						<div class="btn-group" role="group" aria-label="...">						
						  <button class="btn btn-success" id="gostei"><span class="glyphicon glyphicon-thumbs-up"></span> {{$anuncio->gostei}}</button>					  
						  <button class="btn btn-danger" id="denunciar"> <span class="glyphicon glyphicon-remove"></span>Denunciar</button>
						  <button class="btn btn-success" id="naogostei"><span class="glyphicon glyphicon-thumbs-down"></span> {{$anuncio->nao_gostei}}</button>
						</div>

					</div>
					@endif

						<!-- <div class="tips">

						<h4>Safety Tips for Buyers</h4>

							<ol>

								<li><a href="#">Contrary to popular belief.</a></li>

								<li><a href="#">Contrary to popular belief.</a></li>

								<li><a href="#">Contrary to popular belief.</a></li>

								<li><a href="#">Contrary to popular belief.</a></li>

								<li><a href="#">Contrary to popular belief.</a></li>

								<li><a href="#">Contrary to popular belief.</a></li>

								<li><a href="#">Contrary to popular belief.</a></li>

								<li><a href="#">Contrary to popular belief.</a></li>

								<li><a href="#">Contrary to popular belief.</a></li>

							</ol>

						</div> -->

				</div>

			<div class="clearfix"></div>

			</div>

		</div>

	</div>

	<!--//single-page-->

@endsection