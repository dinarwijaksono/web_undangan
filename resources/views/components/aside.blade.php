<aside class="bg-slate-200 p-2">

    <section class="flex justify-end ">
        <button type="button" name="dinar"
            class="bg-zinc-500 text-white focus:bg-zinc-300 w-16 p-1 text-[14px] rounded">Open</button>
    </section>

    <section class="">
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
    </section>

</aside>
