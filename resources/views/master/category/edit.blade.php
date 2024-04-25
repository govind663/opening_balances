
<!DOCTYPE html>
<html lang="en">

<head>

	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">

    <title>Materials || Edit</title>

    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="images/favicon.png">

    <link rel="stylesheet" href="{{ url('/') }}/assets/vendor/bootstrap-select/dist/css/bootstrap-select.min.css">
    <link rel="stylesheet" href="{{ url('/') }}/assets/css/style.css">

	<!-- Pick date -->
    <link rel="stylesheet" href="{{ url('/') }}/assets/vendor/pickadate/themes/default.css">
    <link rel="stylesheet" href="{{ url('/') }}/assets/vendor/pickadate/themes/default.date.css">

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
            <!-- row -->
            <div class="container-fluid">

				<div class="row page-titles mx-0">
                    <div class="col-sm-6 p-md-0">
                        <div class="welcome-text">
                            <h4>Add Category</h4>
                        </div>
                    </div>
                    <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                            <li class="breadcrumb-item active"><a href="javascript:void(0);">Category List</a></li>
                            <li class="breadcrumb-item active"><a href="javascript:void(0);">Edit Category</a></li>
                        </ol>
                    </div>
                </div>

				<div class="row">
					<div class="col-xl-12 col-xxl-12 col-sm-12">
                        <div class="card">

							<div class="card-body">
                                <form method="post" action="{{ route('category_master.update', $data->id) }}" class="form-horizontal" enctype="multipart/form-data">
                                    @csrf

                                    @if (!empty($data->id) || 1 == 1)
                                        <input type="hidden" name="_method" value="PATCH">
                                    @endif

                                    <input type="hidden" id="id" name="id" value="{{ $data['id'] or '' }}">

                                    <div class="pd-20 card-box mb-30">
                                        <div class="form-group row">
                                            <label class="col-sm-2">Raw Material : <span style="color:red;">*</span></label>
                                            <div class="col-sm-4 col-md-4">
                                                <input type="text" name="raw_material" id="raw_material" class="form-control @error('raw_material') is-invalid @enderror" value="{{ $data->raw_material }}" placeholder="Enter Raw Material.">
                                                @error('raw_material')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>

                                            <label class="col-sm-2">Finish Goods : <span style="color:red;">*</span></label>
                                            <div class="col-sm-4 col-md-4">
                                                <input type="text" name="finish_goods" id="finish_goods" class="form-control @error('finish_goods') is-invalid @enderror" value="{{ $data->finish_goods }}" placeholder="Enter Finish Goods.">
                                                @error('finish_goods')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-sm-2">Spares : <span style="color:red;">*</span></label>
                                            <div class="col-sm-4 col-md-4">
                                                <input type="text" name="spares" id="spares" class="form-control @error('spares') is-invalid @enderror" value="{{ $data->spares }}" placeholder="Enter Spares.">
                                                @error('spares')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>

                                            <label class="col-sm-2">Machines : <span style="color:red;">*</span></label>
                                            <div class="col-sm-4 col-md-4">
                                                <input type="text" name="machines" id="machines" class="form-control @error('machines') is-invalid @enderror" value="{{ $data->machines }}" placeholder="Enter Machines.">
                                                @error('machines')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-sm-2">Others : <span style="color:red;">*</span></label>
                                            <div class="col-sm-4 col-md-4">
                                                <input type="text" name="others" id="others" class="form-control @error('others') is-invalid @enderror" value="{{ $data->others }}" placeholder="Enter Others.">
                                                @error('others')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="form-group row mt-4">
                                            <label class="col-md-3"></label>
                                            <div class="col-md-9" style="display: flex; justify-content: flex-end;">
                                                <a href="{{ url('/category_master') }}" class="btn btn-danger">Cancel</a>&nbsp;&nbsp;
                                                <button type="submit" class="btn btn-success">Submit</button>
                                            </div>
                                        </div>

                                    </div>
                                </form>
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

		<!--**********************************
           Support ticket button start
        ***********************************-->

        <!--**********************************
           Support ticket button end
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

	<!-- Svganimation scripts -->
    <script src="{{ url('/') }}/assets/vendor/svganimation/vivus.min.js"></script>
    <script src="{{ url('/') }}/assets/vendor/svganimation/svg.animation.js"></script>
    <script src="{{ url('/') }}/assets/js/styleSwitcher.js"></script>

	<!-- pickdate -->
    <script src="{{ url('/') }}/assets/vendor/pickadate/picker.js"></script>
    <script src="{{ url('/') }}/assets/vendor/pickadate/picker.time.js"></script>
    <script src="{{ url('/') }}/assets/vendor/pickadate/picker.date.js"></script>

	<!-- Pickdate -->
    <script src="{{ url('/') }}/assets/js/plugins-init/pickadate-init.js"></script>

</body>
</html>
