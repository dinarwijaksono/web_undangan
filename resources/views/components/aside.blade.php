<aside>

    <div class="profile">
        <a href="/">
            <p>{{ auth()->user()->username }}</p>
        </a>

        <p>Admin</p>

    </div>

    <ul>
        <a href="/">
            <li @class([
                'active' => $active == 'dashboard',
            ])>Dashboard</li>
        </a>

        @if (in_array(auth()->user()->role, [0]))
            <a href="/User/index">
                <li @class([
                    'active' => $active == 'user',
                ])>List user</li>
            </a>
        @endif

    </ul>

</aside>
