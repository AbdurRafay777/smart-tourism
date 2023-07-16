<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard</title>

    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/jquery-ui/jquery-ui.min.css') }}">
</head>

<body class="hold-transition sidebar-mini layout-fixed" data-panel-auto-height-mode="height">
    <div class="wrapper">

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i
                            class="fas fa-bars"></i></a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="#" class="nav-link">Home</a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="#" class="nav-link">Contact</a>
                </li>
            </ul>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto p-0">
                <!-- Notifications Dropdown Menu -->
                <li class="nav-item dropdown">
                    <a class="nav-link" data-toggle="dropdown" href="#">
                        <img src="{{ asset('dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo"
                            class="brand-image img-circle elevation-3" width="30" height="30"
                            style="opacity: .8">
                    </a>
                    <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right">
                        <a href="{{ route('logout') }}" class="dropdown-item">
                            <i class="fas fa-door-open mr-2"></i> Logout
                        </a>
                        <div class="dropdown-divider"></div>
                    </div>
                </li>
            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="#" class="brand-link">
                <img src="{{ asset('dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo"
                    class="brand-image img-circle elevation-3" style="opacity: .8">
                <span class="brand-text font-weight-light">Smart Tourism</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">
                        <!-- Add icons to the links using the .nav-icon class
                 with font-awesome or any other icon font library -->
                        @hasrole('tourist')
                            <li class="nav-item">
                                <a href="{{ route('current_trip') }}" class="nav-link">
                                    <i class="nav-icon fas fa-map-marker-alt"></i>
                                    <p>My Trips</p>
                                </a>
                            </li>
                        @endhasrole
                        @hasrole('vendor')
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                    <!--Put routes here-->
                                    <i class="nav-icon fas fa-map-marker-alt"></i>
                                    <i class="fas fa-angle-down right"></i>
                                    <p>Trips</p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="{{ route('create_trip') }}" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Add Trip</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('trips') }}" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>My Trips</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('available_vehicles') }}" class="nav-link">
                                    <!--Put routes here-->
                                    <i class="nav-icon fas fa-car"></i>
                                    <p>Rent Vehicle</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('booked_vehicles') }}" class="nav-link">
                                    <!--Put routes here-->
                                    <i class="nav-icon fas fa-car"></i>
                                    <p>Booked Vehicles</p>
                                </a>
                            </li>
                        @endhasrole
                        @hasrole('rental_service')
                            <li class="nav-item">
                                <a href="{{ route('vehicles') }}" class="nav-link">
                                    <!--Put routes here-->
                                    <i class="nav-icon fas fa-car"></i>
                                    <p>My Vehicles</p>
                                </a>
                            </li>
                        @endhasrole
                        @hasanyrole('Super-Admin|tourist')
                            <li class="nav-item">
                                <a href="{{ route('trips') }}" class="nav-link">
                                    <!--Put routes here-->
                                    <i class="nav-icon fas fa-map-marked-alt"></i>
                                    <p>Available Trips</p>
                                </a>
                            </li>
                        @endhasanyrole
                        <li class="nav-item">
                            <a href="{{ route('dashboard') }}" class="nav-link">
                                <i class="nav-icon far fa-id-card"></i>
                                <p>Profile</p>
                            </a>
                        </li>
                        @hasrole('Super-Admin')
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                    <i class="nav-icon fas fa-city"></i>
                                    <p>Cities</p>
                                </a>
                            </li>
                        @endhasrole
                        @hasrole('Super-Admin')
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                    <i class="nav-icon fas fa-city"></i>
                                    <p>Cities</p>
                                </a>
                            </li>
                        @endhasrole
                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>


        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">

            @yield('content')

        </div>
        <!-- /.content-wrapper -->
    </div>
    <!-- ./wrapper -->

    <!-- jQuery -->
    <script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('plugins/jquery-ui/jquery-ui.min.js') }}"></script>
    <script>
        $.widget.bridge('uibutton', $.ui.button)
    </script>
    <script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
    <script src="{{ asset('dist/js/adminlte.js') }}"></script>
    <script src="{{ asset('plugins/jquery-ui/jquery-ui.min.js') }}"></script>
    <script src="{{ asset('plugins/sweetalert2/sweetalert2.all.min.js') }}"></script>

    <script>

        $(function() {

            $('[data-toggle="tooltip"]').tooltip()

            $("#filter").on('click', function() {
                var role = $(".roles").find(":selected").val();
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': "{{ csrf_token() }}"
                    }
                });

                $.ajax({
                    type: "POST",
                    url: "{{ route('filter_users') }}",
                    data: {
                        role: role
                    },
                    success: function(response) {
                        $("table").html(response);
                    }
                });
            });

            $("select#role_menu").change(function() {
                var role = $(this).children("option:selected").val();

                console.log(role)
                if (role === 'vendor') {
                    $("div.contact_no").removeClass("invisible");
                    $("div.description").removeClass("invisible");
                    $("div.language").addClass("invisible");
                } else if (role === 'tour_guide') {
                    $("div.contact_no").removeClass("invisible");
                    $("div.description").addClass("invisible");
                    $("div.language").removeClass("invisible");
                } else if (role === 'rental_service') {
                    $("div.contact_no").removeClass("invisible");
                    $("div.description").removeClass("invisible");
                    $("div.language").addClass("invisible");
                } else {
                    $("div.contact_no").addClass("invisible");
                    $("div.description").addClass("invisible");
                    $("div.language").addClass("invisible");
                }
            });

            $("select.people").change(function() {
                var seats = $(this).find(":selected").val();
                var price = $("#hidden_price").val();
                console.log(price * seats);
                $("#price").text(price * seats);

            });

            $("button.cancelBtn").on('click', function() {
                var trip_id = $(this).val();
                console.log(trip_id)
                row_to_hide = $(this).parents("tr");

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': "{{ csrf_token() }}"
                    }
                });

                $.ajax({
                    type: "POST",
                    url: "{{ route('cancel_trip') }}",
                    data: {
                        id: trip_id
                    },
                    success: function(response) {
                        console.log(response)
                    },
                    error: function(err) {
                        console.log(err)
                        row_to_hide.hide()
                    }
                });
            });

            var date = new Date();
            date.setDate(date.getDate() + 2);

            $("#start_date").datepicker({
                minDate: date
            })

            $("#start_date").change(function() {
                startDate = $("#start_date").datepicker("getDate");
            });

            $("#end_date").datepicker({
                minDate: date
            })

            function disableUsedOptions($table) {
                $selects = $table.find("select.city_menu");
                $selects.on("change", function() {
                    $selects = $table.find("select.city_menu");

                    if ($selects.length <= 1) return;
                    let selected = [];

                    $selects.each(function(index, select) {
                        if (select.value !== "") {
                            selected.push(select.value);
                        }
                    });

                    $table.find("option").prop("disabled", false);
                    for (var index in selected) {
                        $table
                            .find('option[value="' + selected[index] + '"]:not(:selected)')
                            .prop("disabled", true);
                    }
                });
                $selects.trigger("change");
            }
            $tables = $("section");
            $tables.each(function(index) {
                $table = $(this);
                disableUsedOptions($table);
            });

            $('#price').on('keypress', function(e) {
                var regex = new RegExp("^[0-9]$");
                var key = String.fromCharCode(!e.charCode ? e.which : e.charCode);
                var len = $(this).val().length
                if (regex.test(key)) {
                    if (len > 5) {
                        e.preventDefault();
                        return false;
                    }
                } else {
                    e.preventDefault();
                    return false;
                }

            });

            //returns the select meu for vehicle selection from rental service
            $("select.rentals").change(function() {
                var start_date = $("#start_date").val();
                var end_date = $("#end_date").val();
                var rental_id = $(this).children("option:selected").val();
                console.log(start_date)
                console.log(end_date)
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': "{{ csrf_token() }}"
                    }
                });

                $.ajax({
                    type: "POST",
                    url: "{{ route('rental_menu') }}",
                    data: {
                        rental_id: rental_id,
                        start_date: start_date,
                        end_date: end_date,
                    },
                    success: function(response) {
                        $(".vehicle_menu").removeClass("invisible");
                        console.log(response);
                        $(".vehicle_menu").html(response);
                    },
                    error: function(err) {
                        console.log(err)
                    }
                });
            });

            function subtractDays(date, days) {
                date.setDate(date.getDate() - days);
                return date.toDateString();
            }

            $("select.vendor_vehicles").change(function() {
                var vehicle = JSON.parse($(this).find(":selected").val());

                start_date = new Date(vehicle['start_date'])
                end_date = new Date(vehicle['end_date'])

                console.log(start_date)
                console.log(end_date)

                start_date.setDate(start_date.getDate() + 1);
                end_date.setDate(end_date.getDate() - 1);

                $("#vehicle_start_date").datepicker("destroy")
                $("#vehicle_end_date").datepicker("destroy")

                $("#vehicle_start_date").datepicker({
                    minDate: start_date,
                    maxDate: end_date
                });

                $("#vehicle_end_date").datepicker({
                    minDate: start_date,
                    maxDate: end_date
                });

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': "{{ csrf_token() }}"
                    }
                });

                $.ajax({
                    type: "POST",
                    url: "{{ route('get_seats') }}",
                    data: {
                        id: vehicle['id']
                    },
                    success: function(response) {
                        seats = JSON.stringify(response)
                        $("#hidden_seats").val(seats);
                    },
                    error: function(err) {
                        console.log(err)
                    }
                });

            });

            //returns rental services menu

            $("#start_date").change(function() {
                if ($(this).val() && $("#end_date").val()) {
                    $(".rentals").prop('disabled', false)

                    start_date = $("#start_date").val();
                    end_date = $("#end_date").val();

                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': "{{ csrf_token() }}"
                        }
                    });

                    $.ajax({
                        type: "POST",
                        url: "{{ route('rental_options') }}",
                        data: {
                            start_date: start_date,
                            end_date: end_date,
                        },
                        success: function(response) {
                            console.log(response);
                            $("select.rentals").html(response);
                            console.log("kidd")
                        },
                        error: function(err) {
                            console.log(err)
                        }
                    });
                } else {
                    $(".rentals").prop('disabled', true)
                }
            });

            $("#end_date").change(function() {
                if ($(this).val() && $("#start_date").val()) {
                    $(".rentals").prop('disabled', false)

                    start_date = $("#start_date").val();
                    end_date = $("#end_date").val();

                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': "{{ csrf_token() }}"
                        }
                    });

                    $.ajax({
                        type: "POST",
                        url: "{{ route('rental_options') }}",
                        data: {
                            start_date: start_date,
                            end_date: end_date,
                        },
                        success: function(response) {
                            console.log(response);
                            $("select.rentals").html(response);
                            console.log("kidd")
                        },
                        error: function(err) {
                            console.log(err)
                        }
                    });
                } else {
                    $(".rentals").prop('disabled', true)
                }
            });

            trip_start_date = new Date($("#hidden_start_date").val());
            trip_end_date = new Date($("#hidden_end_date").val());

            $("#trip_start_date").datepicker({
                minDate: trip_start_date,
                maxDate: trip_end_date
            })

            $("#trip_end_date").datepicker({
                minDate: trip_start_date,
                maxDate: trip_end_date
            })

            $("button.cancel_vehicle").on('click', function() {
                var vehicle_id = $(this).val();
                console.log(vehicle_id)
                row_to_hide = $(this).parents("tr");

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': "{{ csrf_token() }}"
                    }
                });

                $.ajax({
                    type: "POST",
                    url: "{{ route('cancel_vehicle_booking') }}",
                    data: {
                        id: vehicle_id
                    },
                    success: function(response) {
                        console.log(response)
                        row_to_hide.hide()
                    },
                    error: function(err) {
                        console.log(err)
                    }
                });
            });

            $("a.trip_vehicle").on('click', function () {
                id = $(this).data("vehicle_id");

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': "{{ csrf_token() }}"
                    }
                });

                $.ajax({
                    type: "POST",
                    url: "{{ route('show_vehicle') }}",
                    data: {
                        id: id
                    },
                    success: function(response) {
                        Swal.fire({
                            title: `<strong> ${response['name']} </strong>`,
                            html: `<p> From: ${response['start_date']} </p>
                                  <p> To: ${response['end_date']} </p>`
                        })
                    },
                    error: function(err) {
                        console.log(err)
                    }
                });

            });

            $("button.get_trip").on('click', function () {
                id = $(this).val();
                status_col = $(this).parents("td")

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': "{{ csrf_token() }}"
                    }
                });

                $.ajax({
                    type: "POST",
                    url: "{{ route('show_trip') }}",
                    data: {
                        vehicle_id: id
                    },
                    success: function(response, status) {
                        console.log(response)
                        if(response['status']){
                            status_col.prev("td").text('Done')
                            Swal.fire({
                                html: ` <strong> From: ${response['departure']} </strong><br>
                                        <strong> To: ${response['destination']} </strong><br>
                                        <strong> Done </strong>`
                            })
                        }
                        else{
                            status_col.prev("td").text('Not Done')
                            Swal.fire({
                                html: ` <strong> From: ${response['departure']} </strong><br>
                                        <strong> To: ${response['destination']} </strong><br>
                                        <strong> Not Done </strong>`
                            })
                        }
                    },
                    error: function(err) {
                        console.log(err)
                    }
                });

            });
        });
    </script>
</body>

</html>
