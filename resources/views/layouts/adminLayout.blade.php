<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{$title}} | Laundry App</title>
    <link rel="icon" href="{{ asset('assets/images/illustrationLogin.png') }}">
    {{-- My CSS --}}
    <link rel="stylesheet" href="{{ asset('assets/css/my-globals.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/my-admin.css') }}">
    {{-- IconScout --}}
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
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
</body>

</html>
