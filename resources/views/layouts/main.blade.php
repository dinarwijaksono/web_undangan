<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Web Undangan</title>

    <link rel="stylesheet" href="/asset/tailwind/style.css">

</head>

<body>

    <nav>
        <div class="title ">
            <h1>Web Undangan</h1>
        </div>

        <div class="menu">
            <form action="/logout" method="post">
                @csrf

                <button type="submit" class="logout">LOGOUT</button>
            </form>
        </div>

    </nav>


    <div class="wraper">

        <x-aside active="user" />

        <main>

            @yield('content')

        </main>
    </div>

    <footer>
        <p>Created by dinarwijaksono11@gmail.com</p>
    </footer>


</body>

</html>
