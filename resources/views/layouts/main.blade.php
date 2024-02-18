<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Web Undangan</title>

    <link rel="stylesheet" href="/asset/tailwind/style.css">

    @livewireStyles
</head>

<body class="bg-zinc-200">

    <nav>
        <div class="title basis-2/12 ">
            <h2>Web Undangan</h2>
        </div>

        <div class="menu basis-10/12 flex justify-end">
            <ul>
                <li>
                    <form action="/logout" method="post">
                        @csrf
                        <button type="submit"
                            class="bg-red-500 text-[12px] py-1 px-2 text-white rounded hover:bg-red-400">LOGOUT</button>
                    </form>
                </li>
            </ul>
        </div>

    </nav>


    <div class="content">

        <aside>
            <x-aside active="{{ $active }}" />
        </aside>

        <div class="wraper">
            <main>

                @yield('content')

            </main>

            <footer>
                <p>Created by dinarwijaksono11@gmail.com</p>
            </footer>

        </div>
    </div>

    @livewireScripts
</body>

</html>
