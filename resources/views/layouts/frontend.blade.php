<x-layouts.base-layout>
    <x-frontend.header></x-frontend.header>
    <div class="mx-10">
        {{ $slot }}
       
    </div>
    <x-frontend.footer></x-frontend.footer>
</x-layouts.base-layout>
