<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<html>
<head>
<title>Agro Anúncios</title>
<link rel="stylesheet" href="{{ url('/') }}/css/bootstrap.min.css">
<link rel="stylesheet" href="{{ url('/') }}/css/bootstrap-select.css">
<link href="{{ url('/') }}/css/style.css" rel="stylesheet" type="text/css" media="all" />
<link rel="stylesheet" href="{{ url('/') }}/css/flexslider.css" type="text/css" media="screen" />
<link rel="stylesheet" href="{{ url('/') }}/css/font-awesome.min.css" />
<!-- for-mobile-apps -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Resale Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, Sony Ericsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- //for-mobile-apps -->
<!--fonts-->
<link href='//fonts.googleapis.com/css?family=Ubuntu+Condensed' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>
<!--//fonts-->  

@yield('scripts')

<script>
    var cidades = [];
    function loadCidades(id_estado){
                $("#selectCidadesForm").val("0");
                $.ajax({
                    url: '{{ url('/cidade/index') }}/' +  id_estado.value,
                    data: '',
                    name:name,
                    method:'get',
                    success:function(data){
                        cidades = data;
                        console.log(cidades);  

                        var options = '<option value="0">Selecionar Cidade</option>';
                          for (var i = 0; i < data.length; i++) {
                            options += '<option value="' + data[i].id + '">' + data[i].nome + '</option>';
                          }
                          $("#selectCidades").html(options);   
                          $("#selectCidadesForm").html(options);

                          @if (isset($tipo) && isset($anuncio) && $tipo == "editar")              

                            if(id_estado.value == "{{$anuncio->cidade->estado_id}}"){
                                $("#selectCidadesForm").val({{$anuncio->cidade_id}});
                            }

                         @endif                              
                    }           
                });
        }   
    @if (isset($tipo) && isset($anuncio) && $tipo == "editar")    
        var Obj = {"value":"{{$anuncio->cidade->estado_id}}"};
        loadCidades(Obj); 
    @endif

    function loadAnuncios(id_cidade){
                var page = "{{ url('/anuncio/cidade') }}/" + id_cidade.value;
                window.location= page; 
        }   
  $(document).ready(function () {   
    var estados = [];    

        $.ajax({
            url: '{{ url('/estado') }}',
            data: '',
            name:name,
            method:'get',
            success:function(data){
                estados = data;
                console.log(estados);   

                var options = '<option value="">Selecionar Estado</option>';
                  for (var i = 0; i < data.length; i++) {
                    options += '<option value="' + data[i].id + '">' + data[i].nome + '</option>';
                  }
                  $("#selectEstados").html(options); 
                  $("#selectEstadosForm").html(options);  

                   @if (isset($tipo) && isset($anuncio) && $tipo == "editar")                

                    $("#selectEstadosForm").val({{$anuncio->cidade->estado_id}});
                                                         

                 @endif              
            }           
        });
      
  });
</script>

</head>
<body>
    <div class="header">
        <div class="container">
            <div class="logo">
                <a href="{{ url('/') }}"><span>Agro</span>Anúncios</a>
            </div>
            <div class="header-right">
                @if (Auth::guest())
                        <a class="account" href="{{ url('/dashboard/anuncio') }}">Minha Conta</a>
		@else
                        <a class="account" href="{{ url('/dashboard/anuncio') }}">{{ Auth::user()->name }}</a>  
                        <a class="account" href="{{ url('/logout') }}">Sair</a>                         
                @endif
            
            <!-- <span class="active uls-trigger">Idioma</span> -->
    <!-- Large modal -->
            <div class="selectregion">
                <button class="btn btn-primary" data-toggle="modal" data-target="#myModal">
                Selecionar Região</button>
                    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
                    aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                                        &times;</button>
                                    <h4 class="modal-title" id="myModalLabel">
                                        Selecione sua região</h4>
                                </div>
                                <div class="modal-body">
                                     <form class="form-horizontal" role="form">
                                         <div class="form-group">
                                            <select id="selectEstados" class="form-control" onchange="loadCidades(this);">
                                                <option selected style="display:none;color:#eee;">Selecionar Estado</option>                                               
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <select id="selectCidades" class="form-control" onchange="loadAnuncios(this);">
                                                <option selected style="display:none;color:#eee;">Selecionar Cidade</option>                                               
                                            </select>
                                        </div>
                                      </form>    
                                </div>
                            </div>
                        </div>
                    </div>
                <script>
                $('#myModal').modal('');
                </script>
            </div>
        </div>
        </div>
    </div>
    <!-- Fim Header -->

    @yield('banner')

    @yield('content')


        <!--footer section start-->     
        <footer>            
            <div class="footer-bottom text-center">
            <div class="container">
                <div class="footer-logo">
                    <a href="{{ url('/') }}"><span>Agro</span>Anúncios</a>
                </div>
                <div class="footer-social-icons">
                    <ul>
                        <li><a class="facebook" href="#"><span>Facebook</span></a></li>
                        <li><a class="twitter" href="#"><span>Twitter</span></a></li>
                        <li><a class="googleplus" href="#"><span>Google+</span></a></li>
                        
                    </ul>
                </div>
                <div class="copyrights">
                    <p> © 2016 Agro Anúncios. All Rights Reserved | Design by  <a href="http://w3layouts.com/"> W3layouts</a></p>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
        </footer>
        <!--footer section end-->
</body>
</html>