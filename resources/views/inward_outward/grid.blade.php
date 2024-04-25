
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Material Inward Outward Quantity || List</title>

    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{ url('/') }}/assets/images/favicon.png">

    <!-- Datatable -->
    <link href="{{ url('/') }}/assets/vendor/datatables/css/jquery.dataTables.min.css" rel="stylesheet">

    <!-- Custom Stylesheet -->
    <link href="{{ url('/') }}/assets/vendor/bootstrap-select/dist/css/bootstrap-select.min.css" rel="stylesheet">
    <link href="{{ url('/') }}/assets/css/style.css" rel="stylesheet">

    <!-- Toaster Message -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
</head>

<body>

    <!--*******************
        Preloader start
    ********************-->
    @include('common.preloader.preloader')
    <!--*******************
        Preloader end
    ********************-->


    <!--**********************************
        Main wrapper start
    ***********************************-->
    <div id="main-wrapper">

        <!--**********************************
            Nav header start
        ***********************************-->
        @include('common.nav_header.nav-header')
        <!--**********************************
            Nav header end
        ***********************************-->

        <!--**********************************
            Header start
        ***********************************-->
        @include('common.header.header')
        <!--**********************************
            Header end ti-comment-alt
        ***********************************-->

        <!--**********************************
            Sidebar start
        ***********************************-->
        @include('common.sidebar.sidebar')
        <!--**********************************
            Sidebar end
        ***********************************-->

        <!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">
            <div class="container-fluid">
                <div class="row page-titles mx-0">
                    <div class="col-sm-6 p-md-0">
                        <div class="welcome-text">
                            <span class="ml-1">Material Inward Outward Quantity</span>
                        </div>
                    </div>
                    <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Material Inward Outward Quantity</a></li>
                            <li class="breadcrumb-item active"><a href="javascript:void(0)">Material Inward Outward Quantity List</a></li>
                        </ol>
                    </div>
                </div>
                <!-- row -->


                <div class="row">
					<div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Material Inward Outward Quantity List</h4>
                                <a href="{{ route('inward_outward_quantity_master.create') }}" class="btn btn-primary">+ Add new</a>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="example4" class="display" style="min-width: 845px">
                                        <thead>
                                            <tr>
                                                <th>Sr. No</th>
                                                <th>Inward Id</th>
                                                <th>Meterial Category</th>
                                                <th>Meterial Name</th>
                                                <th>Opening Balance</th>
                                                <th>Edit</th>
                                                <th>Delete</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            @php
                                                 $total_current_balance = 0;
                                            @endphp

                                            @foreach ($inward_outward_quantity as $key => $value )



                                            <tr>
                                                <td>{{ $key+1 }}</td>
                                                <td>{{ $value->unique_id }}</td>
                                                <td>{{ $value->raw_material}}</td>
                                                <td>{{ $value->material_name }}</td>
                                                <th>Rs {{ $value->opening_balance }}</th>
                                                <td>
                                                    <a href="{{ route('inward_outward_quantity_master.edit', $value->id) }}" class="btn btn-sm btn-warning"><i class="la la-pencil"></i></a>
                                                </td>
                                                <td>
                                                    <form action="{{ route('inward_outward_quantity_master.destroy', $value->id) }}" method="post">
                                                        @csrf
                                                        @method('DELETE')
                                                        <input name="_method" type="hidden" value="DELETE">
                                                        <button type="submit" class="btn btn-danger btn-sm " onclick="return confirm('Are you sure to delete?')">
                                                            <i class="la la-trash-o"></i>
                                                        </button>
                                                    </form>
                                                </td>
                                            </tr>

                                              <?php
                                                  $total_current_balance += $value->opening_balance
                                              ?>

                                            @endforeach
                                            <tr>
                                                <td colspan="3">
                                                    <th>Current Balance : Rs {{ $total_current_balance }}</th>
                                                </td>
                                            </tr>

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
        </div>
        <!--**********************************
            Content body end
        ***********************************-->


        <!--**********************************
            Footer start
        ***********************************-->
        <div class="footer">
            <div class="copyright">
                <p>Copyright © Designed &amp; Developed by <a href="../index.htm" target="_blank">DexignLab</a> 2020</p>
            </div>
        </div>
        <!--**********************************
            Footer end
        ***********************************-->


    </div>
    <!--**********************************
        Main wrapper end
    ***********************************-->

    <!--**********************************
        Scripts
    ***********************************-->
    <!-- Required vendors -->
    <script src="{{ url('/') }}/assets/vendor/global/global.min.js"></script>
	<script src="{{ url('/') }}/assets/vendor/bootstrap-select/dist/js/bootstrap-select.min.js"></script>
    <script src="{{ url('/') }}/assets/js/custom.min.js"></script>
    <script src="{{ url('/') }}/assets/js/dlabnav-init.js"></script>



    <!-- Datatable -->
    <script src="{{ url('/') }}/assets/vendor/datatables/js/jquery.dataTables.min.js"></script>
    <script src="{{ url('/') }}/assets/js/plugins-init/datatables.init.js"></script>

	<!-- Svganimation scripts -->
    <script src="{{ url('/') }}/assets/vendor/svganimation/vivus.min.js"></script>
    <script src="{{ url('/') }}/assets/vendor/svganimation/svg.animation.js"></script>
    <script src="{{ url('/') }}/assets/js/styleSwitcher.js"></script>

    <script>
        @if(Session::has('message'))
        toastr.options =
        {
            "closeButton" : true,
            "progressBar" : true
        }
                toastr.success("{{ session('message') }}");
        @endif

        @if(Session::has('error'))
        toastr.options =
        {
            "closeButton" : true,
            "progressBar" : true
        }
                toastr.error("{{ session('error') }}");
        @endif

        @if(Session::has('info'))
        toastr.options =
        {
            "closeButton" : true,
            "progressBar" : true
        }
                toastr.info("{{ session('info') }}");
        @endif

        @if(Session::has('warning'))
        toastr.options =
        {
            "closeButton" : true,
            "progressBar" : true
        }
                toastr.warning("{{ session('warning') }}");
        @endif
    </script>
    <script type="text/javascript">
        function confirmation() {
            var result = confirm("Are you sure to delete?");
            if (result) {
            }
        }
    </script>
</body>

</html>
