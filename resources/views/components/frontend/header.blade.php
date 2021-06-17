<header class="text-gray-50 bg-pink-500 ">
    <div class="container mx-auto flex flex-wrap md:p-3 p-5 flex-col md:flex-row items-center">
        <a class="flex  font-medium items-center text-white mb-4 md:mb-0">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" stroke="currentColor" stroke-linecap="round"
                stroke-linejoin="round" stroke-width="2" class="w-10 h-10 text-white p-2 bg-pink-600 rounded-full"
                viewBox="0 0 24 24">
                <path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5"></path>
            </svg>
            <span class="ml-3 text-xl">Tailblocks</span>
        </a>
        <nav
            class="md:mr-auto md:ml-4 md:py-1 md:pl-4 md:border-l md:border-gray-400	flex flex-wrap items-center text-base justify-center">
            <a href="/" class="mr-5 hover:text-white">Beranda</a>
            <div class="relative inline-block text-left" x-data="{dropdown : false}">
                <a href="javascript:void(0)" @click="dropdown = !dropdown" class=" cursor-pointer mr-5 hover:text-white ">Tentang UNIPO</a>

                <div x-show="dropdown"
                    class="origin-top-right absolute right-0 mt-2 w-56 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 focus:outline-none"
                    role="menu" aria-orientation="vertical" aria-labelledby="menu-button" tabindex="-1">
                    <div class="py-1" role="none">
                        <a href="/tentang/visi-misi" class="text-gray-700 block px-4 py-2 text-sm">Visi Dan Misi</a>
                        <a href="/tentang/struktur-organisasi" class="text-gray-700 block px-4 py-2 text-sm">Struktur Organisasi</a>
                        <a href="/tentang/fasilitas" class="text-gray-700 block px-4 py-2 text-sm">Fasilitas</a>
                    </div>
                </div>
            </div>
            <a href="/artikel" class="mr-5 hover:text-white ">Artikel</a>
            <a href="/fakultas" class="mr-5 hover:text-white">Fakultas</a>
            <a href="/album-galeri" class="mr-5 hover:text-white ">Galeri </a>
            <a class="mr-5 hover:text-white ">Akses Cepat </a>


        </nav>
        {{-- <button
            class="inline-flex items-center bg-gray-100 border-0 py-1 px-3 focus:outline-none hover:bg-gray-200 rounded text-base mt-4 md:mt-0">Button
            <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                stroke-width="2" class="w-4 h-4 ml-1" viewBox="0 0 24 24">
                <path d="M5 12h14M12 5l7 7-7 7"></path>
            </svg>
        </button> --}}
    </div>
</header>
