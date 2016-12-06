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
				alert("comentario");
				

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
				alert("mensagem");
				
					
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

				alert("gostei");
				
					
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

				alert("nao gostei");
				
					
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

				alert("denunciar");
				
					
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

			<h1>Lorem ipsum   <span class="segment-heading">    dolor amet </span> lorem ipsum</h1>

			<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>

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

					<p> <i class="glyphicon glyphicon-map-marker"></i><a href="#">{{ $anuncio->cidade->estado->nome }}</a>, <a href="#">{{ $anuncio->cidade->nome }},</a> <a href="#">Região ({{ $anuncio->ddd}})</a>| Adicionado em {{ date_format($anuncio->created_at, 'd-m-Y H:i') }}, ID: {{ $anuncio->id }}</p>

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
					@if (Auth::user())

					<div class="product-details">						

						

						<p><button id="gostei">Gostei</button><button id="naogostei">Não Gostei</button><button id="denunciar">Denunciar</button></p>

					

					</div>
					@endif

					<div class="product-details">						

						<h4><strong>Descrição</strong> :</h4>

						<p>{{ $anuncio->descricao }}</p>

					

					</div>

					<div class="product-details">						

						<div>

							<p>Envio:</p>

							<h4>{{$anuncio->formadeentrega->nome}}</h4>

							<div class="clearfix"></div>

						</div>
						<div>

							<p>Formas de Pagamento</p>

							<h4>
							@forelse($anuncio->pagamentos as $pagamento)
								{{$pagamento->nome}},
							@empty
								Nenhuma Forma de Pagamento Informada
							@endforelse
							</h4>

							<div class="clearfix"></div>

						</div>

						<p><a href="{{url('/')}}/anuncio/usuario/{{ $anuncio->user_id}}">Clique aqui para ver todos os anúncios deste vendedor!</a></p>

					</div>
					




					@if (Auth::user())
					<div class="product-details">						

						<h4><strong>Deixe seu comentário</strong> :</h4>

						<form method="POST" id="comentarioForm">	
						{{ csrf_field() }}					
							<div>
								<textarea class="mess" placeholder="" name="comentario"></textarea>
								<input type="hidden" name="user_id" value="{{Auth::user()->id}}">	
								<input type="hidden" name="anuncio_id" value="{{$anuncio->id}}">	
								<input type="button" id="comentarioSave" value="Publicar">	
							</div>
						</form>

					

					</div>
					@endif
					<div class="product-details">						

						<h4><strong>Comentários</strong> :</h4>

						@forelse($anuncio->comentarios as $comentario)
							<p><strog>{{$comentario->user->name}}: </strong>{{$comentario->comentario}}</p>
						@empty

						@endforelse

					

					</div>

				</div>

				<div class="col-md-5 product-details-grid">

					<div class="item-price">

						<div class="product-price">

							<p class="p-price">Preço</p>

							<h3 class="rate">R$ {{ $anuncio->valor }}</h3>

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
						<p><i class="glyphicon glyphicon-envelope"></i> Email: {{ $anuncio->user->contato_email }}</p>
						@endif

						@if (Auth::user())
							@if($anuncio->contato_mensagem == 1)						
							<p><i class="glyphicon glyphicon-share-alt"></i>Enviar Mensagem</p>
							@endif						
							
							
							<div class="product-details">						

								<h4><strong>Envie uma mensagem</strong> :</h4>

								<form method="POST" id="mensagemForm">	
								{{ csrf_field() }}					
									<div>
										<textarea class="mess" placeholder="" name="mensagem"></textarea>
										<input type="hidden" name="user_id" value="{{Auth::user()->id}}">
										<input type="hidden" name="vendedor_id" value="{{$anuncio->user->id}}">
										<input type="button" id="mensagemSave" value="Enviar">	
									</div>
								</form>

						

							</div>
						@endif
					</div>

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