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
<link rel="stylesheet" href="{{ url('/') }}/jquery-ui/jquery-ui.css">
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
<style>
  #project-label {
    display: block;
    font-weight: bold;
    margin-bottom: 1em;
  }
  #project-icon {
    float: left;
    height: 32px;
    width: 32px;
  }
  #project-description {
    margin: 0;
    padding: 0;
  }
  </style>

@yield('scripts')

<script>
    var cidades = [];
    function loadCidades(id_estado){
                $("#selectCidadesForm").val("0");
                @if(null !== Auth::user())
                  var user_cidade = '{{Auth::user()->cidade_id}}';
                @else
                  var user_cidade = 0;
                @endif
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
                            if(data[i].id == user_cidade){
                              options += '<option selected="selected" value="' + data[i].id + '">' + data[i].nome + '</option>';
                            }else{
                              options += '<option value="' + data[i].id + '">' + data[i].nome + '</option>';
                            }
                            
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
                <div id="project-label">                    
                    <form class="form-horizontal" role="form" id="formcidaderegiao">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="input-group">                                  
                                 <input class="form-control" placeholder="Digite o nome da cidade aqui..." id="project">
                                  <span class="input-group-btn">
                                    <button class="btn btn-default" type="button"><span class="glyphicon glyphicon-search"></span></button>
                                  </span>
                                </div><!-- /input-group -->
                              </div><!-- /.col-lg-6 -->
                        </div>                        
                    </form>                
                </div> 
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

<script src="{{url('/')}}/jquery-ui/jquery-ui.js"></script>          
  
  <script>
  $( function() {
    var cidadesRegioes = []; 
    
        $("#project").on("keyup", function(){
            var valor = $(this).val();
            if(valor.length > 2){

                $.ajax({
                    url: '{{ url('/estado/busca') }}',
                    data: 'term='+valor,
                    name:name,
                    method:'get',
                    success:function(data){
                        cidadesRegioes = data;
                        console.log(cidades);   

                        $( "#project" ).autocomplete({
                              minLength: 0,
                              source: cidadesRegioes,      
                              focus: function( event, ui ) {
                                $( "#project" ).val( ui.item.label );
                                return false;
                              },
                              select: function( event, ui ) {
                                $( "#project" ).val( ui.item.label);
                                var urlaction = '{{url("/")}}/anuncio/'+ui.item.tipo+'/'+ui.item.value;
                                $( "#formcidaderegiao" ).attr('action', urlaction);

                                formcidaderegiao.submit();

                                return false;
                              }
                            })
                            .autocomplete( "instance" )._renderItem = function( ul, item ) {
                              return $( "<li>" )
                                .append( "<div>" + item.label + "<br>" + item.desc + "</div>" )
                                .appendTo( ul );
                            };
                    }           
                });

            }
        });
  
    
  } );



  </script>
</body>
</html>