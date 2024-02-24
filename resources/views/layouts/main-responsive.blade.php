<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ env('APP_NAME') }} </title>

    <link rel="stylesheet" href="/asset/tailwind/style.css">

    @livewireStyles
</head>

<body class="bg-slate-50">

    <div class="container flex justify-center">
        <section class="wrapper w-[400px]">

            <nav>
                @livewire('component-navbar')
            </nav>

            <aside>
                @livewire('component-aside')
            </aside>

            <section>
                @yield('content')
            </section>

        </section>
    </div>

    @livewireScripts
</body>

</html>
