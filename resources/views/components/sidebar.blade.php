<nav class="navbar w-1/6 h-screen px-8 flex flex-col gap-8 text-sm py-4 border-r border-divider">
    @php
        $currentTab = request('tab', 'all');

        $tabs = [
            ['id' => 'all',      'name' => 'All Substations'],
            ['id' => 'sub1',     'name' => 'Substation 1'],
            ['id' => 'sub2',     'name' => 'Substation 2'],
            ['id' => 'sub3',     'name' => 'Substation 3'],
            ['id' => 'sub4',     'name' => 'Substation 4'],
            ['id' => 'sub5',     'name' => 'Substation 5'],
            ['id' => 'sub6',     'name' => 'Substation 6'],
        ];
    @endphp
    
    <div class="flex flex-col w-full gap-2">
        <a href="" class="px-4 py-2.5 text-base-content gap-4 flex items-center hover:text-base-content hover:bg-base-content/5">
            <x-lucide-house class="w-4 h-4" />
            Home
        </a>
        <a href="" class="px-4 py-2.5 text-base-content gap-4 flex items-center hover:text-base-content hover:bg-base-content/5">
            <x-lucide-notebook-pen class="w-4 h-4" />
            Incidents
        </a>
    </div>
    
    <div class="flex flex-col w-full gap-1">
        @foreach ($tabs as $tab)
            @php
                $isActive = ($currentTab === $tab['id']);
            @endphp

            <a 
                href="{{ request()->fullUrlWithQuery(['tab' => $tab['id']]) }}"
                class="px-4 py-2.5 flex gap-4 items-center flex-1 text-center transition-all {{
                    $isActive 
                        ? 'bg-primary text-primary-content' 
                        : 'text-base-content hover:text-base-content hover:bg-base-content/5' 
                }}"
            >
                @unless ($loop -> first)
                    <x-lucide-siren class="w-4 h-4" />
                @endunless
                {{ $tab['name'] }}
            </a>
        @endforeach    
    </div>

    <div class="w-full flex-1">
        <a href="" class="px-4 py-2.5 flex gap-4 items-center text-base-content  hover:text-base-content hover:bg-base-content/5">
            <x-lucide-settings class="w-4 h-4" />
            Settings
        </a>
    </div>
</nav>