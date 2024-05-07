<!doctype html>
<html lang="en">

<head>
    <title>Dashboard Expert System</title>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap5.min.css">

    <link rel="stylesheet" href="{{ asset('css/modernize/assets/css/styles.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/adminlte/css/datatables/buttons.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/adminlte/css/datatables/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/fontawesome/css/all.min.css') }}">

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">

    <style>
        * {
            font-family: "Poppins";
        }

        input[type="search"]:not(.form-control) {
            border: none;
            border-bottom: 1px solid rgb(117, 117, 214);
            padding: .3rem;
        }

        :is(.sidebar-nav, .modal-body, .left-sidebar)::-webkit-scrollbar {
            width: 0;
            height: 0;
        }

        .card-body::-webkit-scrollbar {
            width: 0;
            height: 0;
        }

        .table-responsive::-webkit-scrollbar-button {
            display: none;
            visibility: hidden;
        }

        .table-responsive {
            padding-bottom: .5rem;
        }

        .table-responsive::-webkit-scrollbar {
            display: none;
        }

        .table-responsive::-webkit-scrollbar:horizontal {
            height: .5rem;
            background-color: #ccc;
        }

        .table-responsive::-webkit-scrollbar-thumb:horizontal {
            background-color: #5D87FF;
            border-radius: .2rem;
        }

        .table th {
            text-transform: capitalize;
            /* font-size: .75rem; */
        }

        .accordion-body {
            cursor: pointer;
            transition: all .3s ease-in;
        }

        .accordion-body:hover {
            background-color: var(--bs-border-color);
        }

        .active-accordion {
            background-color: var(--bs-border-color);
            color: black;
            font-weight: 400;
        }

        .left-sidebar {
            overflow: auto;
        }

        .dropdown-toggle:focus {
            outline: #e1e6ec solid 2px !important;
            /* outline: none !important;
            border: none; */
        }

        .loading-wrapper {
            height: 100vh;
            content: "";
            background-color: rgba(0, 0, 0, 0.5);
            display: flex;
            position: fixed;
            z-index: 9999;
            justify-content: center;
            align-items: center;
            inset: 0;
        }

        /* loading spinner */
        .lds-ring {
            display: inline-block;
            position: relative;
            width: 80px;
            height: 80px;
        }

        .lds-ring div {
            box-sizing: border-box;
            display: block;
            position: absolute;
            width: 40px;
            height: 40px;
            margin: 8px;
            border: 5px solid #fff;
            border-radius: 50%;
            animation: lds-ring 1.2s cubic-bezier(0.5, 0, 0.5, 1) infinite;
            border-color: #fff transparent transparent transparent;
        }

        .lds-ring div:nth-child(1) {
            animation-delay: -0.45s;
        }

        .lds-ring div:nth-child(2) {
            animation-delay: -0.3s;
        }

        .lds-ring div:nth-child(3) {
            animation-delay: -0.15s;
        }

        @keyframes lds-ring {
            0% {
                transform: rotate(0deg);
            }

            100% {
                transform: rotate(360deg);
            }
        }
    </style>

    @stack('css')
</head>

<body class="bg-gray-100/50">
    <!--  Body Wrapper -->
    <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
        data-sidebar-position="fixed" data-header-position="fixed">

        <!-- Sidebar -->
        @include('components.sidebar')

        <!--  Main wrapper -->
        <div class="body-wrapper">
            <!--  Header  -->
            @include('components.header')

            <!--  Content  -->
            <div class="container-fluid">@yield('content')</div>
        </div>
    </div>
    <script src="{{ asset('css/modernize/assets/libs/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ asset('css/modernize/assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('css/modernize/assets/js/sidebarmenu.js') }}"></script>
    <script src="{{ asset('css/modernize/assets/js/app.min.js') }}"></script>

    <script src="{{ asset('js/bootstrap/bootstrap.bundle.min.js') }}"></script>

    <script src="https://kit.fontawesome.com/ddfc3eb1ad.js" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap5.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        $(document).ready(function() {

            $('.modal').on('hidden.bs.modal', event => $(event.target).find('table').DataTable().clear().destroy())
            $('table').not($('.not-datatable')).DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": true,
                "ordering": true,
                "info": true,
                "autoWidth": true,
                "responsive": true,
            });

            $('.modal-dialog').addClass('modal-dialog-scrollable')

            $('.card-body').addClass('table-responsive')

            $('.btn-delete').on('click', function() {
                Swal.fire({
                    title: 'Yakin ingin menghapus data?',
                    icon: 'question',
                    showDenyButton: true,
                }).then(value => value.isConfirmed && $(this).parent().submit())
            })
        });
    </script>
    @stack('script')
</body>

</html>
