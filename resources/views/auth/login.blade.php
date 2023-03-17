<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login | Laundry App</title>
    <link rel="icon" href="{{ asset('assets/images/illustrationLogin.png') }}">
    {{-- My CSS --}}
    <link rel="stylesheet" href="{{ asset('assets/css/my-globals.css') }}">
    {{-- Tailwind --}}
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>
    <div class="flex h-screen bg-white">
        <div class="w-3/5 my-left-content flex flex-col justify-center px-16">
            <span id="tes" class="text-4xl my-font-mplus mb-12">Get's Started</span>
            <form>
                <div class="flex flex-col gap-10 mb-14">
                    <div>
                        <label class="ml-3 text-lg my-login-color">Username</label>
                        <div class="flex items-center gap-3 my-login-input pl-4 pr-4">
                            <img src="{{ asset('assets/images/username.png') }}" width="25px">
                            <input type="text" name="username" id="username"
                                class="focus:outline-none w-full text-lg p-2" placeholder="Masukkan Username" required
                                autocomplete="off">
                        </div>
                    </div>
                    <div>
                        <label class="ml-3 text-lg my-login-color">Password</label>
                        <div class="flex items-center gap-3 my-login-input pl-4 pr-4">
                            <img src="{{ asset('assets/images/password.png') }}" width="25px">
                            <input type="password" name="password" id="password"
                                class="focus:outline-none w-full text-lg p-2" placeholder="Masukkan Password" required
                                autocomplete="off">
                        </div>
                    </div>
                </div>
                <div class="flex flex-col items-center">
                    <button type="submit" class="my-primary-btn text-white w-52 py-3 rounded-full" id="login">Login</button>
                </div>
            </form>
        </div>
        <div class="w-2/5 flex flex-col justify-center items-center my-primary-bg my-right-content">
            <img src="{{ asset('assets/images/illustrationLogin.png') }}" width="258px">
            <span class="text-4xl text-white mt-9 mb-5">LAUNDRY-IN</span>
            <p class="text-lg text-white w-7/12 text-center capitalize">Dengan LAUNDRY-IN pakaian Anda akan menjadi
                harum dan terlihat lebih baik</p>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.4.min.js"
        integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
    <script src="{{ asset('assets/js/mainLogin.js') }}"></script>
</body>

</html>
