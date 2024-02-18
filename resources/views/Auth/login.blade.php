<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Web undangan</title>

    <link rel="stylesheet" href="/asset/tailwind/style.css">

</head>

<body>

    <div class="flex justify-center p-2 mt-20">

        <section class="border border-slate-300 shadow-md" style="width: 500px">
            <form action="/Login" method="post">
                @csrf

                <div class="bg-sky-200 p-2 mb-2">
                    <h1 class="text-center text-sky-700 text-[22px]">LOGIN</h1>
                </div>

                <div class="p-2">

                    @if (session()->has('loginFailed'))
                        <div class="flex justify-center">
                            <div class="basis-10/12 bg-red-200 border border-red-500 rounded text-red-700 p-2 my-4">
                                <p>{{ session()->get('loginFailed') }} </p>
                            </div>
                        </div>
                    @endif

                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" name="email" id="email" placeholder="email"
                            value="{{ old('email') }}" autocomplete="off">
                        @error('email')
                            <p class="text-red-500">{{ $message }} </p>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="password">Kata sandi</label>
                        <input type="password" name="password" id="password" placeholder="Kata sandi">
                        @error('password')
                            <p class="text-red-500">{{ $message }} </p>
                        @enderror
                    </div>

                    <div class="flex justify-center mb-7">
                        <button
                            class="bg-blue-400 w-full py-1 text-white border border-blue-400 hover:bg-white hover:text-blue-400">Login</button>
                    </div>

                </div>
            </form>

            <a href="/Register" class="text-center mb-3 text-blue-500 block">Belum punya akun daftar.</a>
        </section>
    </div>

</body>

</html>
