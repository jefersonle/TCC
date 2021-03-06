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
     <script src="{{ url('/') }}/js/inputmask.js"></script>
    <script type="text/javascript">
    	$(document).ready(function(){
    		$('#cpf').mask('000.000.000-00', {reverse: true});
    		$('#telefone').mask('(00) 9 0000-0000');
    		$('#whatsapp').mask('(00) 9 0000-0000');
    		$('#cep').mask('00000-000');
    	});
    </script>
    
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
						<li class="active resp-tab-active" onclick="location.href = '{{url("/admin/perfil")}}';">Perfil</li>						
						<a href="{{ url('/logout') }}">Sair</a>

					</ul>
					<div class="resp-tabs-container hor_1">					
						
						<div>
							<div class="category">
								<h3 class="head-top">Meu Perfil</h3>
								@if(session()->has('msg'))
									<div class="clearfix"></div>
												
										<div class="alert alert-success" role="alert">{{session('msg')}}
									</div>	
									{{session()->forget('msg')}}
								@endif		

								@foreach ($errors->all() as $message) 
									<div class="clearfix"></div>
									<div class="alert alert-danger" role="alert">{{$message}}</div>
								@endforeach
								<form class="form-horizontal" method="POST" action="{{url('/admin/perfil/store')}}">
								{{ csrf_field() }}
										<div class="form-group" method="POST" action="{{url('/admin/usuarios/store')}}">
											<label for="focusedinput" class="col-sm-2 control-label">Nome</label>
											<div class="col-sm-8">
												<input type="text" name="nome" class="form-control1" id="focusedinput" placeholder="Digite o nome do usuário..."
												@if(null !== Auth::user()->name)
													value="{{Auth::user()->name}}"
												@endif
												>
											</div>
											<div class="col-sm-2 jlkdfj1">
												<p class="help-block">...!</p>
											</div>
										</div>
										<div class="form-group">
											<label for="focusedinput" class="col-sm-2 control-label">Email</label>
											<div class="col-sm-8">
												<input type="email" name="email" class="form-control1" id="focusedinput" placeholder="Digite o email do usuário..."
												@if(null !== Auth::user()->email)
													value="{{Auth::user()->email}}"
												@endif
												>
											</div>
											<div class="col-sm-2 jlkdfj1">
												<p class="help-block">...!</p>
											</div>
										</div>
										<div class="form-group">
											<label for="focusedinput" class="col-sm-2 control-label">Senha</label>
											<div class="col-sm-8">
												<input type="password" class="form-control1" id="focusedinput" name="senha" placeholder="Digite uma senha para o usuário...">
											</div>
											<div class="col-sm-2 jlkdfj1">
												<p class="help-block">...!</p>
											</div>
										</div>
										<div class="form-group">
											<label for="focusedinput" class="col-sm-2 control-label">Confirmar Senha</label>
											<div class="col-sm-8">
												<input type="password" class="form-control1" name="senha_confirmation" id="focusedinput" placeholder="Confirme a senha digitada acima...">
											</div>
											<div class="col-sm-2 jlkdfj1">
												<p class="help-block">...!</p>
											</div>
										</div>	
										<div class="form-group">
											<label for="focusedinput" class="col-sm-2 control-label">CPF:</label>
											<div class="col-sm-8">
												<input type="text" name="cpf" class="form-control1" id="cpf" placeholder="Digite o CPF do usuário..."
												@if(null !== Auth::user()->cpf)
													value="{{Auth::user()->cpf}}"
												@endif
												>
											</div>
											<div class="col-sm-2 jlkdfj1">
												<p class="help-block">...!</p>
											</div>
										</div>	
										<div class="form-group">
											<label for="focusedinput" class="col-sm-2 control-label">Telefone:</label>
											<div class="col-sm-8">
												<input type="text" name="telefone" class="form-control1" id="telefone" placeholder="Digite o telefone do usuário..."
												@if(null !== Auth::user()->contato_fone)
													value="{{Auth::user()->contato_fone}}"
												@endif
												>
											</div>
											<div class="col-sm-2 jlkdfj1">
												<p class="help-block">...!</p>
											</div>
										</div>	
										<div class="form-group">
											<label for="focusedinput" class="col-sm-2 control-label">WhatsApp:</label>
											<div class="col-sm-8">
												<input type="text" name="whatsapp" class="form-control1" id="whatsapp" placeholder="Digite o WhatsApp do usuário..."
												@if(null !== Auth::user()->contato_whatsapp)
													value="{{Auth::user()->contato_whatsapp}}"
												@endif
												>
											</div>
											<div class="col-sm-2 jlkdfj1">
												<p class="help-block">...!</p>
											</div>
										</div>	
										<div class="form-group">
											<label for="focusedinput" class="col-sm-2 control-label">Facebook:</label>
											<div class="col-sm-8">
												<input type="text" name="facebook" class="form-control1" id="focusedinput" placeholder="Digite o link do perfil do usuário no facebook..."
												@if(null !== Auth::user()->contato_facebook)
													value="{{Auth::user()->contato_facebook}}"
												@endif
												>
											</div>
											<div class="col-sm-2 jlkdfj1">
												<p class="help-block">...!</p>
											</div>
										</div>										
										<div class="form-group">
											<label for="focusedinput" class="col-sm-2 control-label">CEP:</label>
											<div class="col-sm-8">
												<input type="text" name="cep" class="form-control1" id="cep" placeholder="Digite o CEP do usuário..."
												@if(null !== Auth::user()->cep)
													value="{{Auth::user()->cep}}"
												@endif
												>
											</div>
											<div class="col-sm-2 jlkdfj1">
												<p class="help-block">...!</p>
											</div>
										</div>
										<div class="form-group">
											<label for="selector1" class="col-sm-2 control-label">Estado</label>
											<div class="col-sm-8"><select name="estado" id="estado" class="form-control1" onchange="loadCidades(this);">
												<option value="">Selecione um estado.</option>
												@forelse($estados as $estado)
												<option value="{{$estado->id}}"
												@if(Auth::user()->cidade_id !="" && Auth::user()->cidade_id != null)
													@if(Auth::user()->city->estado_id == $estado->id)
														selected="selected"
													@endif
												@endif

												>{{$estado->nome}}</option>
												@empty
												<option value="">Nenhum estado encontrado.</option>
												@endforelse
											</select></div>
										</div>										
										<div class="form-group">
											<label for="selector1" class="col-sm-2 control-label">Cidade</label>
											<div class="col-sm-8"><select name="cidade_id" id="selectCidadesForm" class="form-control1">
												<option value="">Selecione um estado primeiro.</option>	
											</select></div>
										</div>
										<div class="form-group">
											<label for="focusedinput" class="col-sm-2 control-label">Logradouro:</label>
											<div class="col-sm-8">
												<input type="text" name="logradouro" class="form-control1" id="focusedinput" placeholder="Digite o logradouro do usuário..."
												@if(null !== Auth::user()->logradouro)
													value="{{Auth::user()->logradouro}}"
												@endif
												>
											</div>
											<div class="col-sm-2 jlkdfj1">
												<p class="help-block">...!</p>
											</div>
										</div>
										<div class="form-group">
											<label for="focusedinput" class="col-sm-2 control-label">Número:</label>
											<div class="col-sm-8">
												<input type="text" name="numero" class="form-control1" id="focusedinput" placeholder="Digite o número da casa do usuário..."
												@if(null !== Auth::user()->numero)
													value="{{Auth::user()->numero}}"
												@endif
												>
											</div>
											<div class="col-sm-2 jlkdfj1">
												<p class="help-block">...!</p>
											</div>
										</div>
										<div class="form-group">
											<label for="focusedinput" class="col-sm-2 control-label">Complemento:</label>
											<div class="col-sm-8">
												<input type="text" name="complemento" class="form-control1" id="focusedinput" placeholder="Digite um complemento..."
												@if(null !== Auth::user()->complemento)
													value="{{Auth::user()->complemento}}"
												@endif
												>
											</div>
											<div class="col-sm-2 jlkdfj1">
												<p class="help-block">...!</p>
											</div>
										</div>
										<div class="form-group">
											<label for="focusedinput" class="col-sm-2 control-label">Bairro:</label>
											<div class="col-sm-8">
												<input type="text" name="bairro" class="form-control1" id="focusedinput" placeholder="Digite o bairro do usuário..."
												@if(null !== Auth::user()->bairro)
													value="{{Auth::user()->bairro}}"
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

        @if(Auth::user()->cidade_id !="" && Auth::user()->cidade_id != null)
			var Obj = {"value":"{{Auth::user()->city->estado_id}}"};
        	loadCidades(Obj);
			
		@endif

        
        

    });
</script>
	<!-- //Categories -->


@endsection