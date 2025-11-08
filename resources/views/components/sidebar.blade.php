<!-- <aside x-data="{ isSidebarOpen: true }" 
    x-bind:class="{ '-translate-x-full': !isSidebarOpen }" 
    class="w-64 bg-[#4b2aad] text-white min-h-screen shadow-2xl fixed left-0 top-0 z-30 transform transition-transform duration-300"> 

    {{-- START: LOGO SECTION (Dibiarkan sama) --}}
    <div class="p-4 border-b border-white/10">
        <div class="bg-white rounded-lg p-2 flex items-center space-x-1 shadow-lg w-fit">
            <a href="{{ route('dashboard') }}" class="text-2xl font-bold text-gray-900">
                <span class="text-yellow-500">e</span>Student
            </a>
            <span class="text-xs text-gray-600 font-medium">Information System</span>
        </div>
    </div>
    {{-- END: LOGO SECTION --}}

    {{-- START: NAVIGATION LINKS (Dibiarkan sama) --}}
    <nav class="mt-4 space-y-1">
        {{-- ... (Kode Navigasi Anda Dibiarkan Sama) ... --}}
        @php
            $currentRoute = Route::currentRouteName();
            $activeClass = 'bg-yellow-500 text-purple-900 font-extrabold shadow-md';
            $hoverClass = 'hover:bg-purple-700 hover:text-yellow-300';
            $baseClass = 'flex items-center px-6 py-2 transition duration-150 ease-in-out rounded-lg mx-3';
        @endphp

        <a href="{{ route('dashboard') }}" class="{{ $baseClass }} {{ $currentRoute == 'dashboard' ? $activeClass : $hoverClass }}">
            <i class="fas fa-chart-line w-5 mr-3"></i> Dashboard
        </a>
        <a href="{{ route('krs.menu') }}" class="{{ $baseClass }} {{ $currentRoute == 'krs.menu' ? $activeClass : $hoverClass }}">
            <i class="fas fa-graduation-cap w-5 mr-3"></i> Academic Data
        </a>
        <a href="{{ route('materials.index') }}" class="{{ $baseClass }} {{ $currentRoute == 'materials.index' ? $activeClass : $hoverClass }}">
            <i class="fas fa-book w-5 mr-3"></i> Learning Data
        </a>
        <a href="{{ route('billing.info') }}" class="{{ $baseClass }} {{ $currentRoute == 'billing.info' ? $activeClass : $hoverClass }}">
            <i class="fas fa-credit-card w-5 mr-3"></i> Billing Info
        </a>
        <a href="{{ route('announcements.index') }}" class="{{ $baseClass }} {{ $currentRoute == 'announcements.index' ? $activeClass : $hoverClass }}">
            <i class="fas fa-bullhorn w-5 mr-3"></i> Announcement
        </a>
    </nav>
    {{-- END: NAVIGATION LINKS --}}

    {{-- Profile section (Dibiarkan sama) --}}
    <div class="absolute bottom-0 w-full p-4 border-t border-white/20">
        {{-- ... (Kode Profil Anda Dibiarkan Sama) ... --}}
        <div class="flex items-center space-x-3">
            <img src="https://placehold.co/40x40/fcd34d/4b5563?text=AA" class="w-10 h-10 rounded-full border-2 border-yellow-300" alt="Profile">
            <div>
                <p class="font-semibold text-white">da</p>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button class="text-sm text-white/80 hover:underline">Logout</button>
                </form>
            </div>
        </div>
    </div>
</aside> -->