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
		<link rel="stylesheet" type="text/css" href="{{ url('/') }}/css/easy-responsive-tabs.css " />
    <script src="{{ url('/') }}/js/easyResponsiveTabs.js"></script>
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
	<!-- Categories -->
	<!--Vertical Tab-->
	<div class="categories-section main-grid-border">
		<div class="container">
			<h2 class="head">Categorias</h2>
			<div class="category-list">
				<div id="parentVerticalTab">
					<ul class="resp-tabs-list hor_1">
						@foreach($categorias as $categoria)
							@if($categoria->categoria_id == 0)
								<li>{{ $categoria->nome }}</li>
							@endif
						@endforeach
						<a href="{{ url('/anuncio') }}">Todos os Anúncios</a>
					</ul>
					<div class="resp-tabs-container hor_1">
						<span class="active total" style="display:block;" data-toggle="modal" data-target="#myModal"><strong>Em Todo o Brasil</strong> (Selecione sua cidade para ver anúncios locais)</span>
						@foreach($categorias as $categoria)
							@if($categoria->categoria_id == 0)
								<div>
									<div class="category">										
										<div class="category-info">
											<h3>{{ $categoria->nome }}</h3>
											<span>{{ $categoria->anuncios->count() }} Anúncios</span>
											<a href="{{ url('/anuncio/categoria') }}/{{ $categoria->id }}">Ver todos os anúncios</a>
										</div>
										<div class="clearfix"></div>
									</div>
									<div class="sub-categories">
										@if($categoria->subcategorias->count() > 0)
											<h4>Subcategorias:</h4>
										@endif
										<ul>
											@foreach($categoria->subcategorias as $subcategoria)
												<li><a href="{{ url('/anuncio/categoria') }}/{{ $subcategoria->id }}">{{ $subcategoria->nome }}</a></li>
											@endforeach
											<div class="clearfix"></div>
										</ul>
									</div>
								</div>
							@endif
						@endforeach						
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