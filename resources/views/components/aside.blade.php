<div>

    <div class="mt-5">
        <a href="/">
            <p class="text-center">{{ auth()->user()->username }}</p>
        </a>

        <p class="text-center text-white">{{ auth()->user()->email }}</p>

    </div>

    <ul>
        @if (!in_array(auth()->user()->role, [0]))
            <a href="/Dashboard">
                <li @class(['active' => $active == 'dashboard'])>Dashboard</li>
            </a>

            <a href="/Section">
                <li @class(['active' => $active == 'section'])>Section</li>
            </a>
        @endif

        @if (in_array(auth()->user()->role, [0]))
            <a href="/User/index">
                <li @class([
                    'active' => $active == 'user',
                ])>List user</li>
            </a>
        @endif

    </ul>

</div>
