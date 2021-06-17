<x-layouts.base-layout>
    <div class="relative min-h-screen md:flex">
        <x-backend.sidebar />
        <div class="flex-1 p-2 md:p-8 ">
            {{ $slot }}
        </div>
    </div>
</x-layouts.base-layout>
