<!DOCTYPE html>
<!--[if IE 9 ]>
![endif]-->
<html class="ie9">
<head>

    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
    <meta name="format-detection" content="telephone=no">
    <meta charset="UTF-8">
    <meta name="description" content="Siyaleader Ethekwini Case Console Management">
    <meta name="keywords" content="Siyaleader, Ethekwini, Ethekwini,Ethekwini Management System,Incidents Management System">
    <link rel="icon" type="image/x-icon" sizes="16x16" href="{{ asset('/img/favicon.ico?v1') }}">


    <title>Food For Us</title>


    <!-- CSS -->
    <link href="{{ asset('/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('/css/animate.min.css') }}" rel="stylesheet">
    <link href="{{ asset('/css/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('/css/form.css') }}" rel="stylesheet">
    <link href="{{ asset('/css/calendar.css') }}" rel="stylesheet">
    <link href="{{ asset('/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('/css/generics.css') }}" rel="stylesheet">
    <link href="{{ asset('/css/token-input.css') }}" rel="stylesheet">
    <link href="{{ asset('/css/icons.css') }}" rel="stylesheet">
    <link href="{{ asset('/css/lightbox.css') }}" rel="stylesheet">
    <link href="{{ asset('/css/media-player.css') }}" rel="stylesheet">
    <link href="{{ asset('/css/file-manager.css') }}" rel="stylesheet">
    <link href="{{ asset('/css/buttons.dataTables.min.css') }}" rel="stylesheet">
    <link href="{{ asset('/css/HoldOn.min.css') }}" rel="stylesheet">
    <link href="{{ asset('/css/bootstrap-switch.min.css') }}" rel="stylesheet">
    <link href="{{ asset('/incl/animate.css') }}" rel="stylesheet">
    <link href="{{ asset('/css/Treant.css') }}" rel="stylesheet">
    <link href="{{ asset('/css/collapsable.css') }}" rel="stylesheet">

    <link href="{{ asset('/css/toggles.css') }}" rel="stylesheet">
    <link href="{{ asset('/css/toggle-themes/toggles-all.css') }}" rel="stylesheet">

    <link href="{{ asset('/css/toggles.css') }}" rel="stylesheet">
    <link href="{{ asset('/css/toggle-themes/toggles-all.css') }}" rel="stylesheet">

    <!-- DataTables CSS -->
    <link href="{{ asset('/bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.css') }}" rel="stylesheet">

    <!-- DataTables Responsive CSS -->
{{--<link href="{{ asset('/bower_components/datatables-responsive/css/responsive.dataTables.scss') }}" rel="stylesheet">--}}
<!-- jQuery Library -->
    <script src="{{ asset('/js/jquery.min.js') }}"></script>

    <!-- jQuery Library -->
    <script src="{{ asset('/js/jquery.min.js') }}"></script>





    <!-- DataTables CSS -->
    <link href="{{ asset('/bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.css') }}" rel="stylesheet">

    <!-- DataTables Responsive CSS -->
    <link href="{{ asset('/bower_components/datatables-responsive/css/responsive.dataTables.scss') }}" rel="stylesheet">



    <script>


        var placeSearch, autocomplete;
        var componentForm = {
            street_number: 'short_name',
            route: 'long_name',
            locality: 'long_name',
            administrative_area_level_1: 'short_name',
            country: 'long_name',
            postal_code: 'short_name'
        };

    </script>





</head>
<body id="skin-blur-ocean" style="background-color: #265a88">

<header id="header" class="media">
    <a href="" id="menu-toggle"></a>
    <a class="logo pull-left" href="#">
    <!--<img class="" src="{{ asset('/images/dashboard_logo.png') }}" width="60%" alt="">-->
    </a>

    <div class="media-body">
        <div class="media" id="top-menu">

            <div id="home">

                {{-- <div class="pull-left tm-icon">
                      <a data-drawer="messages" class="drawer-toggle">
                          <i class="fa fa-envelope-o fa-2x"></i>
                          <i class="n-count animated" id='countPrivateMessages'>{{ count($noPrivateMessages,0) }}</i>

                      </a>
                  </div>--}}

                <div class="pull-left tm-icon">

                    <a href="" data-toggle="modal" onClick="launchAddress();" data-target=".modalAddress" >
                    </a>
                </div>

            </div>



            <div id="time" class="pull-right">
                <span id="hours"></span>
                :
                <span id="min"></span>
                :
                <span id="sec"></span>
            </div>
        </div>
    </div>
</header>

<div class="clearfix"></div>

<section id="main" class="p-relative" role="main">

    <!-- Sidebar -->
    <aside id="sidebar">

        <!-- Sidbar Widgets -->
        <div class="side-widgets overflow" style="position: relative;">
            <!-- Profile Menu -->
            <div class="text-center s-widget m-b-25 dropdown" id="profile-menu">
                <a href="#" data-toggle="dropdown">
                    <img class="profile-pic animated" src="{{ asset('/img/food_for_us_logo.png') }}" alt="lomnin">
                </a>

                <ul class="dropdown-menu profile-menu">
                    {{--<li><a href="{{ url('all-messages') }}">Messages</a> <i class="icon left">&#61903;</i><i class="icon right">&#61815;</i></li>--}}
                    {{--<li><a href="{{ url('user-profile') }}">Profile</a> <i class="icon left">&#61903;</i><i class="icon right">&#61815;</i></li>--}}
                    <li><a href="{{ url('/auth/logout') }}">Sign Out</a> <i class="icon left">&#61903;</i><i class="icon right">&#61815;</i></li>
                </ul>
                @if (Auth::user())
                    <h4 class="m-0">
                        {{ Auth::user()->name }}  {{ Auth::user()->surname }}
                    </h4>
                    {{--{{ $systemRole->name }}<br>--}}
                    {{ Auth::user()->email }}
                @endif


            </div>

        @if (Request::is('message-detail/*') || Request::is('all-messages'))
            @include('messages.message-widget')
        @endif

        <!-- Calendar -->
            <div class="s-widget m-b-25">
                <div id="landings_calendar"></div>
            </div>

            {{--<img class="" src="{{ asset('/images/dashboard_logo.png') }}" width="60%" alt="" style=" position: absolute; left: 25px; bottom: 10px;">--}}
        </div>

        <!-- Side Menu -->
        <ul class="list-unstyled side-menu">

            <li {{ (Request::is('list-users') ? "class=active dropdown" : 'dropdown') }}>

                <a class="sa-side-ui"href="#">
                    <span class="menu-item">Settings</span>
                </a>
                <ul class="list-unstyled menu-item">
                    <li><a href="{{ url('register') }}"><span class="badge badge-r"></span>Register Admin</a></li>
                    <li><a href="{{ url('adminUser') }}"><span class="badge badge-r"></span>Admin List</a></li>
                    <li><a href="{{ url('userroleslist')}}"><span class="badge badge-r"></span>User Roles List</a></li>
                    <li><a href="{{ url('allProduct') }}"><span class="badge badge-r"></span>Product List</a></li>
                    <li><a href="{{ url('packaginglist') }}"><span class="badge badge-r"></span>Packaging List</a></li>
                </ul>
            </li>

            <li {{ (Request::is('') ? "class=active dropdown" : 'dropdown') }}>
                <a class="sa-side-user" href="#">
                    {{--<span class="menu-item">App Users</span>--}}
                </a>
                <ul class="list-unstyled menu-item">
                    <h6><b>APP USERS</b></h6>
                    <li><a href="{{ url('inactiveUsers') }}"><span class="badge badge-r"></span>Inactive Users</a></li>
                    <li><a href="{{ url('activeUsers') }}"><span class="badge badge-r"></span>Active Users</a></li>
                    <li><a href="{{ url('deactivatedUser') }}"><span class="badge badge-r"></span>Deactivated Users</a></li>
                </ul>
            </li>

            <li {{ (Request::is('map') ? "class=active" : '') }}>
                <a class="sa-side-home" href="{{ url('getUsers') }}">
                    <span class="menu-item">map</span>
                </a>
            </li>

            <li {{ (Request::is('posts') ? "class=active" : '') }}>
                <a class="sa-side-list" href="{{ url('postslist') }}">
                    <span class="menu-item">Post List</span>

                </a>
            </li>

            <li {{ (Request::is('research') ? "class=active" : '') }}>
                <a class="sa-side-research" href="{{ url('researchList') }}">
                    <span class="menu-item">Researchers List</span>

                </a>
            </li>

            <li {{ (Request::is('public_wall') ? "class=active" : '') }}>
                <a class="sa-side-public_wall" href="{{ url('publicWall') }}">
                    <span class="menu-item">Public Wall</span>

                </a>
            </li>

            <li {{ (Request::is('reports') ? "class=active" : '') }}>
                <a class="sa-side-reports" href="{{ url('reports') }}">
                    <span class="menu-item">Reports</span>

                </a>
            </li>
        </ul>
    </aside>


    <!-- Content -->
    <section id="content" class="container">

        @yield('content')
    </section>
</section>
@yield('footer')
<script src="{{ asset('/js/toggles.js') }}"></script>

<script src="{{ asset('/js/jquery-ui.min.js') }}"></script> <!-- jQuery UI -->
<script src="{{ asset('/js/jquery.easing.1.3.js') }}"></script> <!-- jQuery Easing - Requirred for Lightbox + Pie Charts-->

<!-- Bootstrap -->
<script src="{{ asset('/js/bootstrap.min.js') }}"></script>




<!--  Form Related -->
<script src="{{ asset('/js/icheck.js') }}"></script> <!-- Custom Checkbox + Radio -->

<!-- UX -->
<script src="{{ asset('/js/scroll.min.js') }}"></script> <!-- Custom Scrollbar -->

<!-- Other -->
<script src="{{ asset('/js/calendar.min.js') }}"></script> <!-- Calendar -->
<script src="{{ asset('/js/feeds.min.js') }}"></script> <!-- News Feeds -->


<!--  Form Related -->
<script src="{{ asset('/js/validation/validate.min.js') }}"></script> <!-- jQuery Form Validation Library -->
<script src="{{ asset('/js/validation/validationEngine.min.js') }}"></script> <!-- jQuery Form Validation Library - requirred with above js -->


<!-- All JS functions -->
<script src="{{ asset('/js/functions.js') }}"></script>


<!-- Token Input -->
<script src="{{ asset('/js/jquery.tokeninput.js') }}"></script> <!-- Token Input -->


<!-- Noty JavaScript -->
<script src="{{ asset('/bower_components/noty/js/noty/packaged/jquery.noty.packaged.js') }}"></script>

<!-- DataTables JavaScript -->


<script src="{{ asset('/bower_components/datatables/media/js/datatables-plugins/pagination/scrolling.js') }}"></script>
<script src="{{ asset('/bower_components/datatables/media/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('/bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js') }}"></script>



<!-- Jquery Bootstrap Maxlength -->
<script src="{{ asset('/bower_components/bootstrap-maxlength/bootstrap-maxlength.min.js') }}"></script>


<!-- Media -->
<script src="{{ asset('/js/media-player.min.js') }}"></script> <!-- Video Player -->
<script src="{{ asset('/js/pirobox.min.js') }}"></script> <!-- Lightbox -->
<script src="{{ asset('js/file-manager/elfinder.js') }}"></script> <!-- File Manager -->


<script type="text/javascript" src="{{ asset('/incl/oms.min.js') }}"></script>



<!-- File Upload -->
<script src="{{ asset('/js/fileupload.min.js') }}"></script> <!-- File Upload -->

<!-- Spinner -->
<script src="{{ asset('/js/HoldOn.min.js') }}"></script> <!-- Spinner -->

<!-- bootstrap-switch. -->
<script src="{{ asset('/js/bootstrap-switch.js') }}"></script> <!-- bootstrap-switch. -->

<!-- Date & Time Picker -->
<script src="{{ asset('/js/datetimepicker.min.js') }}"></script> <!-- Date & Time Picker -->

<!-- Buttons HTML5 -->
<script src="{{ asset('/js/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('/js/buttons.html5.min.js') }}"></script>
<script src="{{ asset('/js/jszip.min.js') }}"></script>
<script src="{{ asset('/js/pdfmake.min.js') }}"></script>
<script src="{{ asset('/js/vfs_fonts.js') }}"></script>
<!--  Buttons HTML5 -->

<script src="{{ asset('js/socket.io.js') }}"></script>

<script src="{{ asset('js/calendar.min.js') }}"></script> <!-- Calendar -->

<script src="{{ asset('js/raphael.js') }}"></script>

<!-- D3.js
        <script src="{{ asset('js/d3/plugins.js') }}"></script>
        <script src="{{ asset('js/d3/script.js') }}"></script>
        <script src="{{ asset('js/d3/libs/coffee-script.js') }}"></script>
        <script src="{{ asset('js/d3/libs/d3.v2.js') }}"></script>
        <script src="{{ asset('js/d3/Tooltip.js') }}"></script>
        <script src="{{ asset('js/d3/Tooltip.js') }}"></script>
    -->

</body>
</html>

<script>
    jQuery(document).ready(function($){

        var InactiveUserTable     = $('#InactiveUserTable').DataTable({
            "autoWidth": false,

            "processing": true,
            speed: 500,
            "dom": 'Bfrtip',
            "buttons": [
                'copyHtml5',
                'excelHtml5',
                ,{

                    extend : 'pdfHtml5',
                    title  : 'Siyaleader_Report',
                    header : 'I am text in',
                },

            ],


            "order" :[[0,"desc"]],
            "ajax": "{!! url('/inactive/')!!}","processing": true,
            "serverSide": true,
            "dom": 'Bfrtip',
            "order" :[[0,"desc"]],

            "buttons": [
                'excelHtml5',
                'csvHtml5',
                'pdfHtml5'
            ],


            "columns": [
                {data: 'id', name: 'id'},
                {data: 'name', name: 'name'},
                {data: 'surname', name: 'surname'},
                {data: 'email', name: 'email'},
                {data: 'intrest', name: 'intrest'},
                {data: 'location', name: 'location'},
                {data: 'travelRadius', name: 'travelRadius'},
                {data: 'descriptionOfAcces', name: 'descriptionOfAcces'},
                {data: function(d)
                {
                    return "<a href='{!! url('editUsers/" + d.id + "') !!}' class='btn btn-sm'>" + 'Activate' + "</a>";
                },"name" : 'name'},
            ],

            "aoColumnDefs": [
                { "bSearchable": false, "aTargets": [ 4] },
                { "bSortable": false, "aTargets": [ 4] }
            ]

        });

        var activeUsersTable     = $('#activeUsersTable').DataTable({
            "autoWidth": false,

            "processing": true,
            speed: 500,
            "dom": 'Bfrtip',
            "buttons": [
                'copyHtml5',
                'excelHtml5',
                ,{

                    extend : 'pdfHtml5',
                    title  : 'Siyaleader_Report',
                    header : 'I am text in',
                },

            ],


            "order" :[[0,"desc"]],
            "ajax": "{!! url('/active/')!!}","processing": true,
            "serverSide": true,
            "dom": 'Bfrtip',
            "order" :[[0,"desc"]],

            "buttons": [
                'excelHtml5',
                'csvHtml5',
                'pdfHtml5'
            ],


            "columns": [
                {data: 'id', name: 'id'},
                {data: 'name', name: 'name'},
                {data: 'surname', name: 'surname'},
                {data: 'email', name: 'email'},
                {data: 'intrest', name: 'intrest'},
                {data: 'location', name: 'location'},
                {data: 'travelRadius', name: 'travelRadius'},
                {data: 'descriptionOfAcces', name: 'descriptionOfAcces'},
                {data: function(d)
                {
                    return "<a href='{!! url('inactivateUsers/" + d.id + "') !!}' class='btn btn-sm'>" + 'DeActivate' + "</a>";
                },"name" : 'name'},
            ],

            "aoColumnDefs": [
                { "bSearchable": false, "aTargets": [ 4] },
                { "bSortable": false, "aTargets": [ 4] }
            ]

        });


        var sellersPostTable     = $('#sellersPostTable').DataTable({
            "autoWidth": false,

            "processing": true,
            speed: 500,
            "dom": 'Bfrtip',
            "buttons": [
                'copyHtml5',
                'excelHtml5',
                ,{

                    extend : 'pdfHtml5',
                    title  : 'Siyaleader_Report',
                    header : 'I am text in',
                },

            ],


            "order" :[[0,"desc"]],
            "ajax": "{!! url('/sellersPostList/')!!}",
            "processing": true,
            "serverSide": true,
            "order" :[[0,"desc"]],

            "buttons": [
                'excelHtml5',
                'csvHtml5',
                'pdfHtml5'
            ],


            "columns": [
                {data: 'id', name: 'id'},
                {data: 'name', name: 'name'},
                {data: 'surname', name: 'surname'},
                {data: 'email', name: 'email'},
                {data: 'packaging', name: 'packaging'},
                {data: 'productType', name: 'productType'},
                {data: 'costPerKg', name: 'costPerKg'},
                {data: 'quantity', name: 'quantity'},
                {data: 'created_at', name: 'created_at'},
                {data: function(d)
                {
                    return "<a href='{!! url('postview/" + d.id + "') !!}' class='btn btn-sm'>" + 'View' + "</a>";
                }},
            ],

            "aoColumnDefs": [
                { "bSearchable": false, "aTargets": [ 4] },
                { "bSortable": false, "aTargets": [ 4] }
            ]

        });

        var userRolesTable     = $('#userRolesTable').DataTable({
            "autoWidth": false,

            "processing": true,
            speed: 500,
            "dom": 'Bfrtip',
            "buttons": [
                'copyHtml5',
                'excelHtml5',
                ,{

                    extend : 'pdfHtml5',
                    title  : 'Siyaleader_Report',
                    header : 'I am text in',
                },

            ],


            "order" :[[0,"desc"]],
            "ajax": "{!! url('/allUserRole/')!!}",
            "processing": true,
            "serverSide": true,
            "order" :[[0,"desc"]],

            "buttons": [
                'excelHtml5',
                'csvHtml5',
                'pdfHtml5'
            ],


            "columns": [
                {data: 'id', name: 'id'},
                {data: 'name', name: 'name'},
                {data: function(d)
                {
                    return "<a href='{!! url('getUsersPerGroup/" + d.id + "') !!}' class='btn btn-sm'>" + 'View users' + "</a>";
                },"name" : 'name'},
                {data: function(d)
                {
                    return "<a href='{!! url('editUserRole/" + d.id + "') !!}' class='btn btn-sm'>" + 'Edit '+d.name + "</a>";
                },"name" : 'name'},
                {{--{data: function(d)--}}
                {{--{--}}
                {{--return "<a href='{!! url('postview/" + d.id + "') !!}' class='btn btn-sm'>" + 'Delete' + "</a>";--}}
                {{--},"name" : 'name'},--}}
            ],

            "aoColumnDefs": [
                { "bSearchable": false, "aTargets": [ 1] },
            ]

        });

        var reseachersTable     = $('#reseachersTable').DataTable({
            "autoWidth": false,

            "processing": true,
            speed: 500,
            "dom": 'Bfrtip',
            "buttons": [
                'copyHtml5',
                'excelHtml5',
                ,{

                    extend : 'pdfHtml5',
                    title  : 'Siyaleader_Report',
                    header : 'I am text in',
                },

            ],


            "order" :[[0,"desc"]],
            "ajax": "{!! url('/getResearchList/')!!}",
            "processing": true,
            "serverSide": true,
            "order" :[[0,"desc"]],

            "buttons": [
                'excelHtml5',
                'csvHtml5',
                'pdfHtml5'
            ],


            "columns": [
                {data: 'id', name: 'id'},
                {data: 'natureOfBusiness', name: 'natureOfBusiness'},
                {data: 'summaryBox', name: 'summaryBox'},
                {data: 'researchNotes', name: 'researchNotes'},
                {data: 'created_at', name: 'created_at'},

                {data: function(d)
                {
                    return "<a href='{!! url('researchProfile/" + d.id + "') !!}' class='btn btn-sm'>" + 'View' + "</a>";
                }},
            ],

            "aoColumnDefs": [
                { "bSearchable": false, "aTargets": [ 4] },
                { "bSortable": false, "aTargets": [ 4] }
            ]

        });

        var publicWallTable     = $('#publicWallTable').DataTable({
            "autoWidth": false,

            "processing": true,
            speed: 500,
            "dom": 'Bfrtip',
            "buttons": [
                'copyHtml5',
                'excelHtml5',
                ,{

                    extend : 'pdfHtml5',
                    title  : 'Siyaleader_Report',
                    header : 'I am text in',
                },

            ],


            "order" :[[0,"desc"]],
            "ajax": "{!! url('/allRecipes/')!!}",
            "processing": true,
            "serverSide": true,
            "order" :[[0,"desc"]],

            "buttons": [
                'excelHtml5',
                'csvHtml5',
                'pdfHtml5'
            ],


            "columns": [
                {data: 'id', name: 'id'},
                {data: 'type', name: 'type'},
                {data: 'name', name: 'name'},


                {data: 'methods', name: 'methods'},
                {data: 'created_at', name: 'created_at'},

                {data: function(d)
                {
                    return "<a href='{!! url('RecipeProfile/" + d.id + "') !!}' class='btn btn-sm'>" + 'Read more' + "</a>";
                }},
            ],

            "aoColumnDefs": [
                { "bSearchable": false, "aTargets": [ 4] },
                { "bSortable": false, "aTargets": [ 4] }
            ]

        });



        var deactivated     = $('#deactivated').DataTable({
            "autoWidth": false,

            "processing": true,
            speed: 500,
            "dom": 'Bfrtip',
            "buttons": [
                'copyHtml5',
                'excelHtml5',
                ,{

                    extend : 'pdfHtml5',
                    title  : 'Siyaleader_Report',
                    header : 'I am text in',
                },

            ],


            "order" :[[0,"desc"]],
            "ajax": "{!! url('/deactivated/')!!}","processing": true,
            "serverSide": true,
            "dom": 'Bfrtip',
            "order" :[[0,"desc"]],

            "buttons": [
                'excelHtml5',
                'csvHtml5',
                'pdfHtml5'
            ],


            "columns": [
                {data: 'id', name: 'id'},
                {data: 'name', name: 'name'},
                {data: 'surname', name: 'surname'},
                {data: 'email', name: 'email'},
                {data: 'intrest', name: 'intrest'},
                {data: 'location', name: 'location'},
                {data: 'travelRadius', name: 'travelRadius'},
                {data: 'descriptionOfAcces', name: 'descriptionOfAcces'},
                {data: function(d)
                {
                    return "<a href='{!! url('editUsers/" + d.id + "') !!}' class='btn btn-sm'>" + 'Activate' + "</a>";
                },"name" : 'name'},
            ],

            "aoColumnDefs": [
                { "bSearchable": false, "aTargets": [ 4] },
                { "bSortable": false, "aTargets": [ 4] }
            ]

        });
    });

</script>