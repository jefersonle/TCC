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







  	







  	var categorias = [];		















		







		$.ajax({







			url: '{{ url('/categoria') }}',







			data: '',







			name:name,







			method:'get',







   			success:function(data){







				categorias = data;







				console.log(categorias);				















				var options = '<option value="">Selecionar Categoria</option>';







			      for (var i = 0; i < data.length; i++) {







			        options += '<option value="' + data[i].id + '">' + data[i].nome + '</option>';







			      }

			      $("#selectCategorias").html(options);	

			      @if (isset($tipo) && isset($anuncio) && $tipo == "editar")        

                    $("#selectCategorias").val({{$anuncio->categoria_id}});

                 @endif          


			}			







		});	















		







	















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















	  </div>







	</div>







@endsection















@section('content')







	<!-- Submit Ad -->







	<div class="submit-ad main-grid-border">







		<div class="container">







			<h2 class="head">Criar Anúncio</h2>







			<div class="post-ad-form">



                @if (isset($success) && $success)



                    <div class="alert alert-success alert-dismissible" role="alert">



                      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>



                      Cadastro realizado com sucesso!



                    </div>



                @endif



				<form action="" method="POST" enctype="multipart/form-data"> 







					{{ csrf_field() }}







					<label>Selecione uma categoria <span>*</span></label>







					<select class="" id="selectCategorias" name="categoria_id" required>
					</select>







					<div class="clearfix"></div>







					<label>Digite o título do seu anúncio aqui...<span>*</span></label>







					<input type="text" class="phone" placeholder="" name="titulo" required

					     @if (isset($tipo) && $tipo == "editar")

					         value="{{ $anuncio->titulo }}"

					     @endif

					>







					<div class="clearfix"></div>







					<label>Digite a descrição do seu anúncio aqui...<span>*</span></label>







					<textarea class="mess" placeholder="Write few lines about your product" name="descricao" required>@if (isset($tipo) && $tipo == "editar"){{ $anuncio->descricao }}@endif</textarea>







					<div class="clearfix"></div>







				<div class="upload-ad-photos">







				<label>Adicione fotos ao seu anúncio:</label>	







					<div class="photos-upload-view">	







						<div>







							<input type="file" id="images" name="images[]" multiple="multiple" />					







						</div>	

						@if (isset($tipo) && $tipo == "editar")						
						
						<div class="row">
							<br/>
								<h4>Fotos do anúncio:</h4>
								<br/>
								<ul class="slides">
										@forelse($anuncio->imagens as $imagem)
										<li>
											
											<img src="{{url('/')}}/uploads/{{$imagem->nome}}" class="col-md-2"/>
											
										</li>
										@empty
										<li>
											<p>Nenhuma foto encontrada...</p>	
										</li>
										@endforelse
								</ul>
						</div>

						@endif






					</div>







					<div class="clearfix"></div>







						<script src="js/filedrag.js"></script>







				</div>







					<div class="personal-details">					







						<label>Selecione um estado para o anúncio...<span>*</span></label>







						<select class="" id="selectEstadosForm" name="estado_id" onchange="loadCidades(this);" required>







						  







						</select>







						<div class="clearfix"></div>







						<label>Selecione uma cidade para o anúncio...<span>*</span></label>







						<select class="" id="selectCidadesForm" name="cidade_id" required>







						<option value="">Selecione um estado primeiro...</option>







						</select>







						<div class="clearfix"></div>







						<label>Preço <span>*</span></label>







						<input type="text" class="name" placeholder="" name="valor" required

					     @if (isset($tipo) && $tipo == "editar")

					         value="{{ $anuncio->valor }}"

					     @endif

					    >







						<div class="clearfix"></div>







						<label>Selecione a condição do produto...<span>*</span></label>







						<select class="" required>	


						  <option value="novo">Novo</option>


						  <option value="usado">Usado</option>		


						</select>







						<div class="clearfix"></div>







												







						<p class="post-terms">Ao clicar no<strong>botão Publicar</strong> você aceita nossos <a href="terms.html" target="_blank">Termos de Uso</a> e nossa <a href="privacy.html" target="_blank">Política de Privacidade</a></p>







					<input type="submit" value="Publicar">					







					<div class="clearfix"></div>







					</form>







					</div>







			</div>







		</div>	







	</div>






	<!-- // Submit Ad -->







@endsection