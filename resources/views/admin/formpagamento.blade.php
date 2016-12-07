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
						<li id="categoriasLink" class="active resp-tab-active" onclick="location.href = '{{url("/admin/pagamento")}}';">Formas de Pagamento</li>
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
							<div class="category">
								<h3 class="head-top">Cadastro de Forma de Pagamento</h3>
								@if(session()->has('msg'))
												<div class="alert">{{session('msg')}}</div>
												{{session()->forget('msg')}}
											@endif	
								@foreach ($errors->all() as $message) 
									<div class="alert">{{$message}}</div>
								@endforeach

								@if(isset($edit) && $edit)
								<form class="form-horizontal" method="POST" action="{{url('/admin/pagamento/update')}}/{{$pagamento->id}}">
								@else
								<form class="form-horizontal" method="POST" action="{{url('/admin/pagamento/store')}}">
								@endif

								
									{{ csrf_field() }}
										<div class="form-group">
											<label for="focusedinput" class="col-sm-2 control-label">Nome</label>
											<div class="col-sm-8">
												<input type="text" class="form-control1" id="focusedinput" name="nome" placeholder="Digite o nome da forma de pagamento..."
												@if(isset($edit) && $edit)
													value="{{$pagamento->nome}}"
												@endif
												>
											</div>
											<div class="col-sm-2 jlkdfj1">
												<p class="help-block">...!</p>
											</div>
										</div>	

										<div class="form-group">								
											<div class="col-sm-12">
												<input type="submit" class="btn btn-block" value="Salvar">
											</div>											
										</div>
										@if(isset($edit) && $edit)
										<div class="form-group">											
											<div class="col-sm-12">
												<a href="{{url('/admin/pagamento')}}" class="btn btn-block">Cancelar</a>
											</div>											
										</div>
										@endif
									</form>
								<div class="clearfix"></div>
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
            
        });

        $("#anunciosLink").removeClass("active resp-tab-active");

        $(".resp-tabs-list li").attr("aria-controls", "");
     

    });
</script>
	<!-- //Categories -->


@endsection