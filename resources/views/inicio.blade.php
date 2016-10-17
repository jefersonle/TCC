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

@endsection

@section('banner')
    <!-- Banner Header -->
    <div class="main-banner banner text-center">
      <div class="container">    
            <h1>Lorem ipsum   <span class="segment-heading">    dolor amet </span> lorem ipsum</h1>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
            <a href="{{ url('/anuncio/create') }}">Criar Anúncio</a>
      </div>
    </div>
    <!-- Fim Banner Header -->
@endsection

@section('content')

    <!-- content-starts-here -->
        <div class="content">
            <div class="categories">
                <div class="container">
                    <div class="col-md-2 focus-grid">
                        <a href="{{ url('/') }}/categoria">
                            <div class="focus-border">
                                <div class="focus-layout">
                                    <div class="focus-image"><i class="fa fa-mobile"></i></div>
                                    <h4 class="clrchg">Agricultura</h4>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-2 focus-grid">
                        <a href="{{ url('/') }}/categoria#parentVerticalTab3">
                            <div class="focus-border">
                                <div class="focus-layout">
                                    <div class="focus-image"><i class="fa fa-laptop"></i></div>
                                    <h4 class="clrchg">Pecuária</h4>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-2 focus-grid">
                        <a href="{{ url('/') }}/categoria#parentVerticalTab6">
                            <div class="focus-border">
                                <div class="focus-layout">
                                    <div class="focus-image"><i class="fa fa-car"></i></div>
                                    <h4 class="clrchg">Vestuario</h4>
                                </div>
                            </div>
                        </a>
                    </div>  
                    <div class="col-md-2 focus-grid">
                        <a href="{{ url('/') }}/categoria#parentVerticalTab5">
                            <div class="focus-border">
                                <div class="focus-layout">
                                    <div class="focus-image"><i class="fa fa-motorcycle"></i></div>
                                    <h4 class="clrchg">Veículos</h4>
                                </div>
                            </div>
                        </a>
                    </div>  
                    <div class="col-md-2 focus-grid">
                        <a href="{{ url('/') }}/categoria#parentVerticalTab2">
                            <div class="focus-border">
                                <div class="focus-layout">
                                    <div class="focus-image"><i class="fa fa-wheelchair"></i></div>
                                    <h4 class="clrchg">Imóveis</h4>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-2 focus-grid">
                        <a href="{{ url('/') }}/categoria#parentVerticalTab4">
                            <div class="focus-border">
                                <div class="focus-layout">
                                    <div class="focus-image"><i class="fa fa-paw"></i></div>
                                    <h4 class="clrchg">Serviços</h4>
                                </div>
                            </div>
                        </a>
                    </div>  
                    
                    <div class="clearfix"></div>
                </div>
            </div>
            <div class="trending-ads">
                <div class="container">
                <!-- slider -->
                <div class="trend-ads">
                    <h2>Ultimos Anúncios</h2>
                        <ul id="flexiselDemo3">                            
                            @foreach($anuncios as $anuncio)
                                @if($cont == 1 || $cont == 5 || $cont == 9)
                                    <li>
                                @endif
                                    <div class="col-md-3 biseller-column">
                                        <a href="single.html">
                                            <img src="images/p1.jpg"/>
                                            <span class="price">R&#36; {{ $anuncio->valor }}</span>
                                        </a> 
                                        <div class="ad-info">
                                            <h5>{{ $anuncio->titulo }}</h5>
                                            <span>{{ $anuncio->created_at }}</span>
                                        </div>
                                    </div>
                                @if($cont == 4 || $cont == 8)
                                    </li>
                                @endif

                                <?php $cont++; ?>

                            @endforeach                            
                            @if($cont != 4 && $cont != 8)
                            </li>
                            @endif

                        </ul>
                    <script type="text/javascript">
                         $(window).load(function() {
                            $("#flexiselDemo3").flexisel({
                                visibleItems:1,
                                animationSpeed: 1000,
                                autoPlay: true,
                                autoPlaySpeed: 5000,            
                                pauseOnHover: true,
                                enableResponsiveBreakpoints: true,
                                responsiveBreakpoints: { 
                                    portrait: { 
                                        changePoint:480,
                                        visibleItems:1
                                    }, 
                                    landscape: { 
                                        changePoint:640,
                                        visibleItems:1
                                    },
                                    tablet: { 
                                        changePoint:768,
                                        visibleItems:1
                                    }
                                }
                            });
                            
                        });
                       </script>
                       <script type="text/javascript" src="{{ url('/') }}/js/jquery.flexisel.js"></script>
                    </div>   
            </div>
            <!-- //slider -->               
            </div>
            
        </div>
        <!-- Fim Content -->
@endsection