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
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap4.min.js"></script>
<script>
    $('.datatable').DataTable();
</script>
@yield('extra-js')
</body>
</html>
