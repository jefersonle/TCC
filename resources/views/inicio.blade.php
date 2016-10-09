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
            <a href="post-ad.html">Criar Anúncio</a>
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
                        <a href="categories.html">
                            <div class="focus-border">
                                <div class="focus-layout">
                                    <div class="focus-image"><i class="fa fa-mobile"></i></div>
                                    <h4 class="clrchg">Mobiles</h4>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-2 focus-grid">
                        <a href="categories.html#parentVerticalTab2">
                            <div class="focus-border">
                                <div class="focus-layout">
                                    <div class="focus-image"><i class="fa fa-laptop"></i></div>
                                    <h4 class="clrchg"> Electronics & Appliances</h4>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-2 focus-grid">
                        <a href="categories.html#parentVerticalTab3">
                            <div class="focus-border">
                                <div class="focus-layout">
                                    <div class="focus-image"><i class="fa fa-car"></i></div>
                                    <h4 class="clrchg">Cars</h4>
                                </div>
                            </div>
                        </a>
                    </div>  
                    <div class="col-md-2 focus-grid">
                        <a href="categories.html#parentVerticalTab4">
                            <div class="focus-border">
                                <div class="focus-layout">
                                    <div class="focus-image"><i class="fa fa-motorcycle"></i></div>
                                    <h4 class="clrchg">Bikes</h4>
                                </div>
                            </div>
                        </a>
                    </div>  
                    <div class="col-md-2 focus-grid">
                        <a href="categories.html#parentVerticalTab5">
                            <div class="focus-border">
                                <div class="focus-layout">
                                    <div class="focus-image"><i class="fa fa-wheelchair"></i></div>
                                    <h4 class="clrchg">Furnitures</h4>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-2 focus-grid">
                        <a href="categories.html#parentVerticalTab6">
                            <div class="focus-border">
                                <div class="focus-layout">
                                    <div class="focus-image"><i class="fa fa-paw"></i></div>
                                    <h4 class="clrchg">Pets</h4>
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
                    <h2>Mais Acessados</h2>
                            <ul id="flexiselDemo3">
                                <li>
                                    <div class="col-md-3 biseller-column">
                                        <a href="single.html">
                                            <img src="images/p1.jpg"/>
                                            <span class="price">R&#36; 450</span>
                                        </a> 
                                        <div class="ad-info">
                                            <h5>There are many variations of passages</h5>
                                            <span>1 hour ago</span>
                                        </div>
                                    </div>
                                    <div class="col-md-3 biseller-column">
                                        <a href="single.html">
                                            <img src="images/p2.jpg"/>
                                            <span class="price">R&#36; 399</span>
                                        </a> 
                                        <div class="ad-info">
                                            <h5>Lorem Ipsum is simply dummy</h5>
                                            <span>3 hour ago</span>
                                        </div>
                                    </div>
                                    <div class="col-md-3 biseller-column">
                                        <a href="single.html">
                                            <img src="images/p3.jpg"/>
                                            <span class="price">R&#36; 199</span>
                                        </a> 
                                        <div class="ad-info">
                                            <h5>It is a long established fact that a reader</h5>
                                            <span>8 hour ago</span>
                                        </div>
                                    </div>
                                    <div class="col-md-3 biseller-column">
                                        <a href="single.html">
                                            <img src="images/p4.jpg"/>
                                            <span class="price">R&#36; 159</span>
                                        </a> 
                                        <div class="ad-info">
                                            <h5>passage of Lorem Ipsum you need to be</h5>
                                            <span>19 hour ago</span>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="col-md-3 biseller-column">
                                        <a href="single.html">
                                            <img src="images/p5.jpg"/>
                                            <span class="price">R&#36; 1599</span>
                                        </a> 
                                        <div class="ad-info">
                                            <h5>There are many variations of passages</h5>
                                            <span>1 hour ago</span>
                                        </div>
                                    </div>
                                    <div class="col-md-3 biseller-column">
                                        <a href="single.html">
                                            <img src="images/p6.jpg"/>
                                            <span class="price">R&#36; 1099</span>
                                        </a> 
                                        <div class="ad-info">
                                            <h5>passage of Lorem Ipsum you need to be</h5>
                                            <span>1 day ago</span>
                                        </div>
                                    </div>
                                    <div class="col-md-3 biseller-column">
                                        <a href="single.html">
                                            <img src="images/p7.jpg"/>
                                            <span class="price">R&#36; 109</span>
                                        </a> 
                                        <div class="ad-info">
                                            <h5>It is a long established fact that a reader</h5>
                                            <span>9 hour ago</span>
                                        </div>
                                    </div>
                                    <div class="col-md-3 biseller-column">
                                        <a href="single.html">
                                            <img src="images/p8.jpg"/>
                                            <span class="price">R&#36; 189</span>
                                        </a> 
                                        <div class="ad-info">
                                            <h5>Lorem Ipsum is simply dummy</h5>
                                            <span>3 hour ago</span>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="col-md-3 biseller-column">
                                        <a href="single.html">
                                            <img src="images/p9.jpg"/>
                                            <span class="price">R&#36; 2599</span>
                                        </a> 
                                        <div class="ad-info">
                                            <h5>Lorem Ipsum is simply dummy</h5>
                                            <span>3 hour ago</span>
                                        </div>
                                    </div>
                                    <div class="col-md-3 biseller-column">
                                        <a href="single.html">
                                            <img src="images/p10.jpg"/>
                                            <span class="price">R&#36; 3999</span>
                                        </a> 
                                        <div class="ad-info">
                                            <h5>It is a long established fact that a reader</h5>
                                            <span>9 hour ago</span>
                                        </div>
                                    </div>
                                    <div class="col-md-3 biseller-column">
                                        <a href="single.html">
                                            <img src="images/p11.jpg"/>
                                            <span class="price">R&#36; 2699</span>
                                        </a> 
                                        <div class="ad-info">
                                            <h5>passage of Lorem Ipsum you need to be</h5>
                                            <span>1 day ago</span>
                                        </div>
                                    </div>
                                    <div class="col-md-3 biseller-column">
                                        <a href="single.html">
                                            <img src="images/p12.jpg"/>
                                            <span class="price">R&#36; 899</span>
                                        </a> 
                                        <div class="ad-info">
                                            <h5>There are many variations of passages</h5>
                                            <span>1 hour ago</span>
                                        </div>
                                    </div>
                                </li>
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