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
						<li id="mensagensLink" class="active resp-tab-active" onclick="location.href = '{{url("/admin/mensagens")}}';">Mensagens</li>
						<li id="denunciasLink" onclick="location.href = '{{url("/admin/denuncias")}}';">Denúncias</li>
						<li id="cidadesLink" onclick="location.href = '{{url("/admin/cidades")}}';">Cidades</li>
						<li id="estadosLink" onclick="location.href = '{{url("/admin/estados")}}';">Estados</li>
						<li id="usuariosLink" onclick="location.href = '{{url("/admin/usuarios")}}';">Usuários</li>
						<li onclick="location.href = '{{url("/admin/perfil")}}';">Perfil</li>						
						<a href="{{ url('/logout') }}">Sair</a>

					</ul>
					<div class="resp-tabs-container hor_1">						
						
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
													
													
												</tbody>
											  </table> 
											                   
										</div>										
									   <div class="clearfix"> </div>  
									  
								    </div>									
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

        $("#anunciosLink").removeClass("active resp-tab-active");
        $(".resp-tabs-list li").attr("aria-controls", "");

    });
</script>
	<!-- //Categories -->


@endsection