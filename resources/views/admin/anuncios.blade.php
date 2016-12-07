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
			<h1>Área Administrativa</h1>			
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
						<li id="anunciosLink" onclick="location.href = '{{url("/admin/anuncios")}}';">Anúncios</li>
						<li id="categoriasLink" onclick="location.href = '{{url("/admin/categorias")}}';">Categorias</li>
						<li id="categoriasLink" onclick="location.href = '{{url("/admin/entrega")}}';">Formas de Entrega</li>
						<li id="categoriasLink" onclick="location.href = '{{url("/admin/pagamento")}}';">Formas de Pagamento</li>
						<li id="categoriasLink" onclick="location.href = '{{url("/admin/moedas")}}';">Moedas</li>
						<li id="categoriasLink" onclick="location.href = '{{url("/admin/statuslist")}}';">Status</li>
						<li id="comentariosLink" onclick="location.href = '{{url("/admin/comentarios")}}';">Comentários</li>
						<li id="mensagensLink" onclick="location.href = '{{url("/admin/mensagens")}}';">Mensagens</li>
						<li id="denunciasLink" onclick="location.href = '{{url("/admin/denuncias")}}';">Denúncias</li>
						<li id="cidadesLink" onclick="location.href = '{{url("/admin/cidades")}}';">Cidades</li>
						<li id="estadosLink" onclick="location.href = '{{url("/admin/estados")}}';">Estados</li>
						<li id="usuariosLink" onclick="location.href = '{{url("/admin/usuarios")}}';">Usuários</li>
						<li onclick="location.href = '{{url("/admin/perfil")}}';">Perfil</li>						
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
												<h3><a href="{{url('/anuncio/create')}}" target="_blank"><span class="label label-primary">Criar Novo Anúncio</span></a></h3>
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
											@if(session()->has('msg'))
												<div class="alert">{{session('msg')}}</div>
												{{session()->forget('msg')}}
											@endif
										<ul class="list">

												@forelse($anuncios as $anuncio)								
													<li>
														@if($anuncio->imagens->count() !=0)
														<img src="{{ url('/') }}/uploads/{{$anuncio->imagens[0]->nome}}" title="" alt="" />
														@else
														<img src="{{ url('/') }}/images/p1.jpg" title="" alt="" />
														@endif
														<section class="list-left">
														<a href="{{ url('/anuncio/show') }}/{{$anuncio->id}}" target="_blank"><h5 class="title">{{$anuncio->titulo}}</h5></a>
														<span class="adprice">{{$anuncio->valor}}</span>
														<p class="catpath">{{$anuncio->categoria->nome}}</p>
														</section>
														<section class="list-right">
														<span class="date">{{$anuncio->updated_at}}</span>
														<span class="cityname">{{$anuncio->cidade->nome}}</span>
														<a href="{{ url('/anuncio/edit') }}/{{$anuncio->id}}"><span class="label label-success">Editar</span></a>
														<a href="{{ url('/admin/anuncios/destroy') }}/{{$anuncio->id}}"><span class="label label-danger" onclick="if(!confirm('Tem certeza que deseja excluir este anúncio\n\n Isto excluirá permantentemente o anúncio, juntamente com suas imagens e comentários!')) return false;">Excluir</span></a>
														</section>
														<div class="clearfix"></div>
													</li>
												@empty
													<li><h5 class="title">Nenhum anúncio encontrado</h5></li>
												@endforelse
											
											
										</ul>
									</div>
										</div>
									</div>							
									
									{!! $anuncios->render() !!}

								  </div>
								</div>
							</div>
							</div>
				<div class="clearfix"></div>
						</div>
						
					
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

        $(".resp-tabs-list li").attr("aria-controls", "");      


    });
</script>
	<!-- //Categories -->


@endsection