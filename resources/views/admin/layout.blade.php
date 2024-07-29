<html>
    <head>
        <!-- Fonts -->
        <link rel="stylesheet" href="https://demos.themeselection.com/sneat-bootstrap-html-laravel-admin-template/demo/assets/vendor/fonts/boxicons.css?id=87122b3a3900320673311cebdeb618da">
        <link rel="stylesheet" type="text/css" href="https://demos.themeselection.com/sneat-bootstrap-html-laravel-admin-template/demo/assets/vendor/css/rtl/core.css?id=55b2a9dfaa009c41df62ca8d16e913a8" class="template-customizer-core-css">
        <link rel="stylesheet" type="text/css" href="https://demos.themeselection.com/sneat-bootstrap-html-laravel-admin-template/demo/assets/vendor/css/rtl/theme-default.css?id=9182924a7b965439eca5e189ba43eba1" class="template-customizer-theme-css">
        <link rel="stylesheet" href="https://demos.themeselection.com/sneat-bootstrap-html-laravel-admin-template/demo/assets/vendor/libs/datatables-bs5/datatables.bootstrap5.css">

        <!-- Scripts -->
        <script src="https://demos.themeselection.com/sneat-bootstrap-html-laravel-admin-template/demo/assets/vendor/js/bootstrap.js?id=4648227467e3fd3f4cf976cfb0e43aea"></script>

        <!-- Include jQuery -->
        <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

        <!-- Include Bootstrap JS -->


        
        <!-- Include Popper.js -->
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>

        <!-- Include Bootstrap JS -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"></script>

        <!-- Include SweetAlert2 CSS and JS from CDN -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10/dist/sweetalert2.min.css">

        <!-- Include Axios library -->
        <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

        <!-- Include SweetAlert2 JS -->
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

        <meta name="csrf-token" content="{{ csrf_token() }}">

        <style>
                    /* Modal styles */
                    .modal .modal-dialog {
                        max-width: 400px;
                    }

                    .modal .modal-header,
                    .modal .modal-body,
                    .modal .modal-footer {
                        padding: 20px 30px;
                    }

                    .modal .modal-content {
                        border-radius: 1px;
                    }

                    .modal .modal-footer {
                        background: #1c1d26;
                        border-radius: 0 0 1px 1px;
                    }

                    .modal .modal-title {
                        display: inline-block;
                    }

                    .modal .form-control {
                        border-radius: 1px;
                        box-shadow: none;
                        border-color: #1c1d26;
                    }

                    .modal textarea.form-control {
                        resize: vertical;
                    }

                    .modal .btn {
                        border-radius: 1px;
                        min-width: 100px;
                    }

                    .modal form label {
                        font-weight: normal;
                    }
                    
                    .card {
                        background: #1c1d26;
                        color: #1c1d26;
                    }

                    .card-datatable {
                        background: #1c1d26;
                    }

                    .container.bg-light {
                        background: #1c1d26;
                    }

                    .custom-checkbox label:before {
                        border-color: #e44c65;
                    }

                    .custom-checkbox input[type="checkbox"]:checked + label:after {
                        border-color: #fff;
                    }

                    .modal .modal-footer {
                        background: #1c1d26;
                    }

                    

                    /* Navbar */
                .navbar {
                    background-color: #1c1d26;
                }

                .navbar-light .navbar-toggler-icon {
                    background-color: #1c1d26;
                }

                .navbar-light .navbar-nav .nav-link {
                    color: #1c1d26;
                }

                .navbar-light .navbar-nav .nav-link:hover {
                    color: #e44c65;
                }

                /* Search Input */
                .dataTables_filter input[type="search"] {
                    background-color: #1c1d26;
                    color: #c7c7c7;
                    border: 1px solid #e44c65;
                }

                /* Body Background */
                body {
                    background-color: #1c1d26;
                    color: #1c1d26;
                }

                /* Navbar Menu */
                .collapse.navbar-collapse {
                    background-color: #1c1d26;
                }

                .collapse.navbar-collapse a {
                    color: #c7c7c7;
                }

                .collapse.navbar-collapse a:hover {
                    color: #e44c65;
                }


                /* Modal Background */
                .modal-content {
                    background-color: #1c1d26;
                    color: #fff;
                }

                .modal-content label {
                    color: #fff;
                }

                .modal-content .btn {
                    background-color: #e44c65;
                    color: #fff;
                }

                .modal-content .btn:hover {
                    background-color: #1c1d26;
                }

                /* Table Header */
                .table th {
                    color: #c7c7c7 !important;
                }

                /* Table Data */
                .table td {
                    color: #c7c7c7 !important;
                }




        </style>
        <script>
            $(document).ready(function () {
                // Activate tooltip
                $('[data-toggle="tooltip"]').tooltip();

                // Select/Deselect checkboxes
                var checkbox = $('table tbody input[type="checkbox"]');
                $("#selectAll").click(function () {
                    if (this.checked) {
                        checkbox.each(function () {
                            this.checked = true;
                        });
                    } else {
                        checkbox.each(function () {
                            this.checked = false;
                        });
                    }
                });
                checkbox.click(function () {
                    if (!this.checked) {
                        $("#selectAll").prop("checked", false);
                    }
                });
            });
        </script>
    </head>
    <body>
        @yield('content')
    </body>
</html>