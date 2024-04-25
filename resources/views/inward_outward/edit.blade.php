
<!DOCTYPE html>
<html lang="en">

<head>

	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">

    <title>Material Inward Outward Quantity || Edit</title>

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
                            <h4>Add Material</h4>
                        </div>
                    </div>
                    <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                            <li class="breadcrumb-item active"><a href="javascript:void(0);">Inward Outward Quantity List</a></li>
                            <li class="breadcrumb-item active"><a href="javascript:void(0);">Edit Material Inward Outward Quantity</a></li>
                        </ol>
                    </div>
                </div>

				<div class="row">
					<div class="col-xl-12 col-xxl-12 col-sm-12">
                        <div class="card">

							<div class="card-body">
                                <form method="post" action="{{ route('inward_outward_quantity_master.update', $data->id) }}" class="form-horizontal" enctype="multipart/form-data">
                                    @csrf

                                    @if (!empty($data->id) || 1 == 1)
                                        <input type="hidden" name="_method" value="PATCH">
                                    @endif

                                    <input type="hidden" id="id" name="id" value="{{ $data['id'] or '' }}">

                                    <div class="pd-20 card-box mb-30">
                                        <div class="form-group row">
                                            <label class="col-sm-2">Material Category : </label>
                                            <div class="col-sm-4 col-md-4">
                                                <select name="category_id" id="category_id" class="form-control @error('category_id') is-invalid @enderror">
													<option value=" ">Please Select Material Category</option>
                                                    @foreach ($Category as $key => $value)
                                                    <option value="{{ $key }}" @if ($key == $data['category_id']) Selected @endif>{{ $value }}</option>
                                                    @endforeach
												</select>
                                                @error('category_id')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>

                                            <label class="col-sm-2">Material Name : </label>
                                            <div class="col-sm-4 col-md-4">
                                                <select name="material_name_id" id="material_name_id" class="form-control @error('material_name_id') is-invalid @enderror">
													<option value=" ">Please Select Material Name</option>
                                                    @foreach ($Material as $key => $value)
                                                    <option value="{{ $key }}" @if ($key == $data['material_name_id']) Selected @endif>{{ $value }}</option>
                                                    @endforeach
												</select>
                                                @error('material_name_id')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>

                                        </div>

                                        <div class="form-group row">
                                                <label class="col-sm-2">Date : <span style="color:red;">*</span></label>
                                                <div class="col-sm-4 col-md-4">
                                                    <input type="text" name="date" id="date" class="form-control datepicker-default @error('date') is-invalid @enderror" value="{{ $data->date }}" placeholder="DD/MM/YYYY">
                                                    @error('date')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>

                                                <label class="col-sm-2">Material Inward Outward Quantity : <span style="color:red;">*</span></label>
                                                <div class="col-sm-4 col-md-4">
                                                    <input type="number" name="inward_outward_quantity" id="inward_outward_quantity" class="form-control @error('inward_outward_quantity') is-invalid @enderror" value="{{ $data->inward_outward_quantity }}" placeholder="Enter Material Inward Outward Quantity.">
                                                    @error('inward_outward_quantity')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group row mt-4">
                                            <label class="col-md-3"></label>
                                            <div class="col-md-9" style="display: flex; justify-content: flex-end;">
                                                <a href="{{ url('/inward_outward_quantity_master') }}" class="btn btn-danger">Cancel</a>&nbsp;&nbsp;
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
