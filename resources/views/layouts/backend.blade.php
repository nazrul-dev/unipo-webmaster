<x-layouts.base-layout>
    <div class="relative min-h-screen md:flex">

        <!-- mobile menu bar -->
        <x-backend.sidebar />

        <!-- content -->
        <div class="flex-1 p-2 md:p-8 ">
            {{ $slot }}
        </div>

    </div>

</x-layouts.base-layout>
