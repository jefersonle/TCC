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
		<link rel="stylesheet" href="{{ url('/') }}/css/flexslider.css" media="screen" />
@endsection

@section('banner')
	<div class="banner text-center">
	  <div class="container">    
			<h1>Lorem ipsum   <span class="segment-heading">    dolor amet </span> lorem ipsum</h1>
			<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
			<a href="post-ad.html">Criar Anúncio</a>
	  </div>
	</div>
@endsection

@section('content')
	<!--single-page-->
	<div class="single-page main-grid-border">
		<div class="container">
			<ol class="breadcrumb" style="margin-bottom: 5px;">
				<li><a href="index.html">Home</a></li>
				<li><a href="all-classifieds.html">Todos</a></li>
				<li class="active"><a href="mobiles.html">Mobiles</a></li>
				<li class="active">Mobile Phone</li>
			</ol>
			<div class="product-desc">
				<div class="col-md-7 product-view">
					<h2>{{ $anuncio->titulo }}</h2>
					<p> <i class="glyphicon glyphicon-map-marker"></i><a href="#">{{ $anuncio->cidade->estado->nome }}</a>, <a href="#">{{ $anuncio->cidade->nome }}</a>| Adicionado às 06:55 pm, ID: 987654321</p>
					<div class="flexslider">
						<ul class="slides">
							<li data-thumb="{{ url('/') }}/images/ss1.jpg">
								<img src="{{ url('/') }}/images/ss1.jpg" />
							</li>
							<li data-thumb="{{ url('/') }}/images/ss2.jpg">
								<img src="{{ url('/') }}/images/ss2.jpg" />
							</li>
							<li data-thumb="{{ url('/') }}/images/ss3.jpg">
								<img src="{{ url('/') }}/images/ss3.jpg" />
							</li>
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
						<h4><strong>Descrição</strong> :</h4>
						<p>{{ $anuncio->descricao }}</p>
					
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
							<h4>Novo</h4>
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
						<p><i class="glyphicon glyphicon-earphone"></i>{{ $anuncio->user->contato1 }}</p>
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