<div class="py-16">
    <section class="text-gray-600 body-font">
        <div class="container px-5  mx-auto">
            <div class="flex flex-col text-center w-full mb-20">
                <h1 class="sm:text-3xl text-2xl font-medium title-font mb-4 text-gray-900">Album Galeri Universitas
                    Pohuwato</h1>
                <p class="lg:w-2/3 mx-auto leading-relaxed text-base">Selalu Update Dalam Hal Dokumentasi Kegiatan
                    Maupun Event Apa Saja Yang Berkaitan Dengan <br> <strong>Universitas Pohuwato</strong></p>
            </div>
            <div class="flex flex-wrap -m-4">
                @foreach ($albums as $album)
                    <div class="lg:w-1/3 sm:w-1/2 p-4">
                        <div class="flex relative">
                            <img alt="gallery" class="absolute inset-0 w-full h-full object-cover object-center"
                                src="{{ $album->paththumb }}">
                            <div
                                class="px-8 py-10 relative z-10 w-full border-4 border-gray-200 bg-white opacity-0 hover:opacity-100">

                                <h1 class="title-font text-lg font-medium text-gray-900 ">{{ $album->name }}</h1>
                                <p class="leading-relaxed">{{ $album->content }}</p>
                                <div class="flex justify-start space-x-3 my-5">
                                    <a href="javascript:void(0)"
                                        class="flex items-center px-2 py-1 bg-gray-500 rounded hover:text-gray-100 hover:bg-gray-700 focus:outline-none">
                                        <x-tabler icon="squares-filled" class="text-gray-50  h-4 md:h-6"
                                            strokeWidth="1" /> <span
                                            class="md:text-base text-xs text-white">{{ $album->galeries_count }} Total
                                            Galeri </span>
                                    </a>
                                    <a href="{{route('frontend.galery', $album->id)}}"
                                    class="flex items-center px-2 py-1 bg-blue-500 rounded hover:text-gray-100 hover:bg-blue-700 focus:outline-none">
                                    <x-tabler icon="eye" class="text-gray-50  h-4 md:h-6"
                                        strokeWidth="1" /> <span
                                        class="md:text-base text-xs text-white">Lihat Galeri </span>
                                </a>
                                </div>


                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </section>
</div>
