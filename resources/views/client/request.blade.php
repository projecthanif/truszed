<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Colorlib Templates">
    <meta name="author" content="Colorlib">
    <meta name="keywords" content="Colorlib Templates">

    <!-- Title Page-->
    <title>Agent Registration Form</title>

    <!-- Icons font CSS-->
    <link href="{{ asset('signup-file/vendor/mdi-font/css/material-design-iconic-font.min.css') }}" rel="stylesheet"
          media="all">
    <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <!-- Font special for pages-->
    <link
        href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Vendor CSS-->
    <link href="{{ asset('signup-file/vendor/select2/select2.min.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('signup-file/vendor/datepicker/daterangepicker.css') }}" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="{{ asset('signup-file/css/main.css') }}" rel="stylesheet" media="all">
</head>

<body>
<div class="page-wrapper bg-gra-02 p-t-130 p-b-100 font-poppins">
    <div class="wrapper wrapper--w680">
        <div class="card card-4">
            <div class="card-body">
                <form action="{{ route('client.request') }}" method="POST">
                    @csrf
                    @method('post')
                    <div class="">
                        <div class="input-group">
                            <label class="label">Name</label>
                            <input class="input--style-4" type="text" name="name">
                            @error('name')
                            {{$message}}
                            @enderror
                        </div>
                    </div>
                    <input type="hidden" value="{{$property_id}}" name="property_id">
                    <input type="hidden" value="{{$agent_id}}" name="agent_id">
                    <div class="row row-space">
                        <div class="col-2">
                            <div class="input-group">
                                <label class="label">Email</label>
                                <input class="input--style-4" type="email" name="email">
                                @error('email')
                                {{$message}}
                                @enderror
                            </div>
                        </div>
                        <div class="col-2">
                            <div class="input-group">
                                <label class="label">Phone Number</label>
                                <input class="input--style-4" type="number" name="number">
                                @error('number')
                                {{$message}}
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="p-t-15">
                        <label class="radio-container"> i have read and i accept <a href="#">terms and
                                conditions</a>
                            <input type="checkbox">
                            <span class="checkmark"></span>
                        </label> <br> <br>
                        <button class="btn btn--radius-2 btn--blue" type="submit"
                                style="background-color:purple;">Submit
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Jquery JS-->
<script src="{{ asset('signup-file/vendor/jquery/jquery.min.js') }}"></script>
<!-- Vendor JS-->
<script src="{{ asset('signup-file/vendor/select2/select2.min.js') }}"></script>
<script src="{{ asset('signup-file/vendor/datepicker/moment.min.js') }}"></script>
<script src="{{ asset('signup-file/vendor/datepicker/daterangepicker.js') }}"></script>

<!-- Main JS-->
<script src="{{ asset('signup-file/js/global.js') }}"></script>

</body>

</html>
<!-- end document-->
