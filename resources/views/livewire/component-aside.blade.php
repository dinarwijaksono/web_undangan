<aside class="bg-slate-200">
    @if ($buttom)
        <ul>
            <a href="/Dashboard">
                <li class="bg-sky-500 hover:bg-sky-300 p-2 mb-1 text-white">Dashboard</li>
            </a>

            <a href="/Section">
                <li class="bg-sky-500 hover:bg-sky-300 p-2 mb-1 text-white">Section</li>
            </a>

            <a href="/User/index">
                <li class="bg-sky-500 hover:bg-sky-300 p-2 mb-1 text-white">List User</li>
            </a>

            <li class="text-white">
                <form action="/logout" method="post">
                    @csrf
                    <button type="submit" class="bg-red-500 w-full text-left p-2 mb-1">Logout</button>
                </form>
            </li>

        </ul>
    @endif
</aside>
