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
        <section class="login">
            <form action="/Login" method="post">
                @csrf

                <div class="bg-sky-200 p-2 mb-2">
                    <h1 class="text-center text-sky-700 text-[22px]">LOGIN</h1>
                </div>

                @if (session()->has('loginFailed'))
                    <div class="flex justify-center">
                        <div class="basis-10/12 bg-red-200 border border-red-500 rounded text-red-700 p-2 my-4">
                            <p>{{ session()->get('loginFailed') }} </p>
                        </div>
                    </div>
                @endif

                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" placeholder="email" value="{{ old('email') }}"
                        autocomplete="off">
                    @error('email')
                        <p>{{ $message }} </p>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="password">Kata sandi</label>
                    <input type="password" name="password" id="password" placeholder="Kata sandi">
                    @error('password')
                        <p>{{ $message }} </p>
                    @enderror
                </div>

                <div class="form-group flex justify-center">
                    <button type="submit">Kirim</button>
                </div>
            </form>

            <a href="/Register" class="text-center">Belum punya akun daftar.</a>

        </section>
    </div>

</body>

</html>
