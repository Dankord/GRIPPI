<nav class="navbar w-full h-16 px-4 flex gap-2">
    @php
        $user = auth()->user();

        $tabs = match($user->role) {
            'officer' => [
                ['name' => 'Dashboard', 'route' => 'officer.dashboard'],
                ['name' => 'Crime Maps', 'route' => 'officer.crime-map'],
                // uncomment this if the page and route is existing now
                // ['name' => 'Analysis', 'route' => 'officer.analysis'],
            ],
            in_array($user->role, ['sub_encoder', 'main_encoder']) => [
                ['name' => 'Dashboard', 'route' => 'encoder.dashboard'],
                // uncomment this if the page and roue is existing
                // ['name' => 'Reports', 'route' => 'encoder.reports'],
                // ['name' => 'Crime Maps', 'route' => 'encoder.crime-map'],
            ],
            // continue this for the other roles (admin and superadmin)
        }
    @endphp

    @foreach ($tabs as $tab)
        @php
            $isActive = request()->routeIs($tab['route']);
        @endphp

        <a
            href="{{ route($tab['route']) }}"
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