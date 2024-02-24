<nav class="w-full flex bg-green-600 p-2 px-4">
    <div class="basis-5/12">
        <h1 class="font-bold text-white text-[18px]">{{ env('APP_NAME') }}</h1>
    </div>
    <div class="basis-7/12 flex justify-end">

        <ul>
            <li>
                <button type="button" wire:click="$emitTo('component-aside', 'do-click-togle-menu')"
                    class="bg-blue-500 py-1 px-2 rounded text-white text-[14px]">Menu</button>

            </li>
        </ul>

    </div>

</nav>
