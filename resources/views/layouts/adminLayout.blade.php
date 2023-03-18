<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title }} | Laundry App</title>
    <link rel="icon" href="{{ asset('assets/images/illustrationLogin.png') }}">
    {{-- Bootstrap --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    {{-- My CSS --}}
    <link rel="stylesheet" href="{{ asset('assets/css/my-globals.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/my-admin.css') }}">
    {{-- IconScout --}}
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    {{-- Bulma And DataTable --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.9.3/css/bulma.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bulma.min.css">
</head>

<body>
    <div class="my-container">
        @include('partials.admin.sidebar')

        <div class="my-main-content">
            @include('partials.admin.navbar')
            <div class="my-inner-content">
                @yield('mainContent')
            </div>
        </div>
    </div>

    {{-- JQuery --}}
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"
        integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
    {{-- Bootstrap --}}
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
        integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"
        integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD" crossorigin="anonymous">
    </script>
    {{-- DataTable JS --}}
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/dataTables.bulma.min.js"></script>
    {{-- My JS --}}
    <script src="<?php
    if ($title == 'Dashboard') {
        echo asset('assets/js/mainDashboard.js');
    } elseif ($title == 'Outlet') {
        echo asset('assets/js/mainOutlet.js');
    } elseif ($title == 'Product') {
        echo asset('assets/js/mainProduct.js');
    } elseif ($title == 'Member') {
        echo asset('assets/js/mainMember.js');
    } elseif ($title == 'Transaction') {
        echo asset('assets/js/mainTransaction.js');
    } elseif ($title == 'User') {
        echo asset('assets/js/mainUser.js');
    } elseif ($title == 'Add Transaction') {
        echo asset('assets/js/mainAddTransaction.js');
    } elseif ($title == 'Edit Transaction') {
        echo asset('assets/js/mainEditTransaction.js');
    }
    ?>"></script>
</body>

</html>
