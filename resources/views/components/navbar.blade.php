<nav class="navbar w-full h-16 px-4 flex gap-2">
    @php
        $currentTab = request('tab', 'dashboard');

        $tabs = [
            ['id' => 'dashboard',  'name' => 'Dashboard'],
            ['id' => 'reports',    'name' => 'Reports'],
            ['id' => 'maps',       'name' => 'Crime Maps'],
            ['id' => 'analysis',   'name' => 'Analysis'],
        ];
    @endphp

    @foreach ($tabs as $tab)
        @php
            $isActive = ($currentTab === $tab['id']);
        @endphp

        <a 
            href="{{ request()->fullUrlWithQuery(['tab' => $tab['id']]) }}"
            class="px-5 py-2.5 flex-1 text-xs text-center transition-all {{
                $isActive 
                    ? 'bg-primary text-primary-content font-medium' 
                    : 'text-base-content/70 font-base hover:text-base-content hover:bg-base-content/5' 
            }}"
        >
            {{ $tab['name'] }}
        </a>
    @endforeach    
</nav>