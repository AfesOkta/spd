<x-headhtml />
<body>
@yield('modal') 
    <div class="app-container app-theme-white body-tabs-shadow fixed-sidebar fixed-header">
        <x-header />      
        <div class="app-main">
                <x-sidebar />   
                <div class="app-main__outer">
                    <div class="app-main__inner">
                        <div class="app-page-title">
                            <div class="page-title-wrapper">
                                <div class="page-title-heading">
                                    <div>@yield('page-title')
                                        <div class="page-title-subheading">@yield('page-title-desc')
                                        </div>
                                    </div>
                                </div>   
                            </div>
                        </div>            
                        <div class="row">
                            @yield('content')
                        </div>
                    </div>
                    <x-footer />   
                    
                </div>
                <script src="http://maps.google.com/maps/api/js?sensor=true"></script>
        </div>
    </div>
<script type="text/javascript" src="architectui/assets/scripts/main.js"></script>
@yield('extra-js')
</body>
</html>
