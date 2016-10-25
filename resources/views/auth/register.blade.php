<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<html>
<head>
<title>Resale a Business Category Flat Bootstrap Responsive Website Template | Login :: w3layouts</title>
<link rel="stylesheet" href="{{ url('/') }}/css/bootstrap.min.css">
<link rel="stylesheet" href="{{ url('/') }}/css/bootstrap-select.css">
<link href="{{ url('/') }}/css/style.css" rel="stylesheet" type="text/css" media="all" />
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
</head>
<body>
<div class="header">
        <div class="container">
            <div class="logo">
                <a href="{{ url('/') }}"><span>Agro</span>Anúncios</a>
            </div>
            <div class="header-right">
    
        </div>
        </div>
    </div>
     <section>
            <div id="page-wrapper" class="sign-in-wrapper">
                <div class="graphs">
                    <div class="sign-up">
                        <h1>Criar Nova Conta</h1>
                        <p class="creating">Preencha o formuário abaixo para criar sua conta.</p>
                        <h2>Informações da Conta</h2>
                        <form method="POST" action="{{ url('/register') }}">
                        {!! csrf_field() !!}
                        <div class="sign-u">
                            <div class="sign-up1">
                                <h4>Nome* :</h4>
                            </div>
                            <div class="sign-up2">                                
                                    <input type="text" placeholder=" " name="name" required=" "/>
                                
                            </div>
                            <div class="clearfix"> </div>
                        </div>
                        <div class="sign-u">
                            <div class="sign-up1">
                                <h4>Email* :</h4>
                            </div>
                            <div class="sign-up2">
                                
                                    <input type="text" name="email" placeholder=" " required=" "/>
                                
                            </div>
                            <div class="clearfix"> </div>
                        </div>
                        <div class="sign-u">
                            <div class="sign-up1">
                                <h4>Senha* :</h4>
                            </div>
                            <div class="sign-up2">
                               
                                    <input type="password" name="password" placeholder=" " required=" "/>
                                
                            </div>
                            <div class="clearfix"> </div>
                        </div>
                        <div class="sign-u">
                            <div class="sign-up1">
                                <h4>Confirme a Senha* :</h4>
                            </div>
                            <div class="sign-up2">
                               
                                    <input type="password" name="password_confirmation" placeholder=" " required=" "/>
                               
                            </div>
                            <div class="clearfix"> </div>
                        </div>                      
                        
                        
                        <div class="sub_home">
                            <div class="sub_home_left">
                                
                                    <input type="submit" value="Criar Conta">
                               
                            </div>
                            <div class="sub_home_right">
                                <p>Voltar para a <a href="{{ url('/') }}">Home Page</a></p>
                            </div>
                            <div class="clearfix"> </div>
                        </div>
                     </form>

                    </div>
                </div>
            </div>
        <!--footer section start-->
            <footer class="diff">
               <p class="text-center">&copy 2016 Agro Anúncios. All Rights Reserved | Design by <a href="https://w3layouts.com/" target="_blank">w3layouts.</a></p>
            </footer>
        <!--footer section end-->
    </section>
</body>
</html>