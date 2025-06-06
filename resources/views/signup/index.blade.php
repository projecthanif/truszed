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
                    <h2 class="title"> Agent Registration Form</h2>
                    <form action="{{ route('agent.register') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('post')
                        <div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">first name</label>
                                    <input class="input--style-4" type="text" name="first_name">
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">last name</label>
                                    <input class="input--style-4" type="text" name="last_name">
                                </div>
                            </div>
                        </div>
                        <div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">Birthday</label>
                                    <div class="input-group-icon">
                                        <input class="input--style-4 js-datepicker" type="text" name="dob">
                                        <i class="zmdi zmdi-calendar-note input-icon js-btn-calendar"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">Gender</label>
                                    <div class="p-t-10">
                                        <label class="radio-container m-r-45">Male
                                            <input type="radio" checked="checked" name="gender" value="male">
                                            <span class="checkmark"></span>
                                        </label>
                                        <label class="radio-container">Female
                                            <input type="radio" name="gender" value="female">
                                            <span class="checkmark"></span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">Email</label>
                                    <input class="input--style-4" type="email" name="email">
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">Phone Number</label>
                                    <input class="input--style-4" type="number  " name="phone">
                                </div>
                            </div>
                        </div>
                        <div class="input-group">
                            <div class="input-group">
                                <div class="input-group">
                                    <label class="label">NIN Number</label>
                                    <input class="input--style-4" type="number" name="nin">
                                </div>
                                <label class="label">Front of ID</label>
                                <input class="input--style-4" type="file" name="idfront">
                            </div>
                            <div class="input-group">
                                <label class="label">Back of ID</label>
                                <input class="input--style-4" type="file" name="idback">
                            </div>
                            <div class="input-group">
                                <label class="label">Address</label>
                                <input class="input--style-4" type="text" name="address">
                            </div>
                            <div class="input-group">
                                <label class="label">Password</label>
                                <input class="input--style-4" type="text" name="password">
                            </div>
                            <div class="p-t-15">
                                <label class="radio-container"> i have read and i accept <a href="#">terms and
                                        conditions</a>
                                    <input type="checkbox">
                                    <span class="checkmark"></span>
                                </label> <br> <br>
                                <button class="btn btn--radius-2 btn--blue" type="submit"
                                    style="background-color:purple;">Submit</button>
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
