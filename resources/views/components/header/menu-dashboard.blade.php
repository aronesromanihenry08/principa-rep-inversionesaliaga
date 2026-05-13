@php
    $menuItems = [
        [
            'text' => 'Avisos',
            'url' => auth()->check() ? route('admin.notificaciones') : route('login'),
            'icon' => '
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 md:h-6 md:w-6 mr-2 md:mb-1 md:mr-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M14.857 17.082a23.848 23.848 0 0 0 5.454-1.31A8.967 8.967 0 0 1 18 9.75V9A6 6 0 0 0 6 9v.75a8.967 8.967 0 0 1-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 0 1-5.714 0m5.714 0a3 3 0 1 1-5.714 0" />
                </svg>',
            'badge' => auth()->check() ? auth()->user()->unreadNotifications->count() : null,
        ],
        [
            'text' => auth()->check() ? auth()->user()->nombre_usuario : 'Usuario',
            'url' => auth()->check() ? route('perfiladm.perfildeadmn') : route('login'),
            'icon' => '
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 md:h-6 md:w-6 mr-2 md:mb-1 md:mr-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z" />
                </svg>'
        ],
        [
            'text' => 'Pedidos',
            'url' => route('admin.pedidos'),
            'icon' => '
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 18.75a1.5 1.5 0 0 1-3 0m3 0a1.5 1.5 0 0 0-3 0m3 0h6m-9 0H3.375a1.125 1.125 0 0 1-1.125-1.125V14.25m17.25 4.5a1.5 1.5 0 0 1-3 0m3 0a1.5 1.5 0 0 0-3 0m3 0h1.125c.621 0 1.129-.504 1.09-1.124a17.902 17.902 0 0 0-3.213-9.193 2.056 2.056 0 0 0-1.58-.86H14.25M16.5 18.75h-2.25m0-11.177v-.958c0-.568-.422-1.048-.987-1.106a48.554 48.554 0 0 0-10.026 0 1.106 1.106 0 0 0-.987 1.106v7.635m12-6.677v6.677m0 4.5v-4.5m0 0h-12" />
                </svg>
                        ',
            'badge' => session('carrito') ? count(session('carrito')) : 0
        ],
    ];
@endphp

<div class="flex justify-around items-center w-full md:w-auto gap-4 md:gap-6 px-2">
    @foreach ($menuItems as $item)
        <a href="{{ $item['url'] }}" class="flex items-center md:flex-col md:text-xs hover:text-orange-500 transition relative space-x-2 md:space-x-0">

            <!-- Ícono con badge flotante -->
            <div class="relative">
                {!! $item['icon'] !!}
                @if(isset($item['badge']) && $item['badge'] > 0)
                    <span class="absolute -top-1 -right-1 bg-orange-500 text-white text-[10px] w-5 h-5 flex items-center justify-center rounded-full shadow-sm">
                        {{ $item['badge'] }}
                    </span>
                @endif
            </div>

            <!-- Texto -->
            <span class="text-[13px] font-medium md:mt-1 truncate max-w-[80px] text-center">
                {{ Str::limit($item['text'], 12) }}
            </span>

        </a>
    @endforeach
</div>

