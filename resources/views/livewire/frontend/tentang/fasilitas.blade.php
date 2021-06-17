<div>
    @if ($facilities->count())
    <section class="text-gray-600 ">
        <div class="container px-5 py-16 mx-auto">
            <div class="flex flex-col text-center w-full mb-20">
                <h1 class="sm:text-3xl text-2xl font-medium title-font mb-4 text-gray-900">Fasilitas Universitas
                    Pohuwato</h1>
                <p class="lg:w-2/3 mx-auto leading-relaxed text-base">Universitas Pohuwato Memiliki Lebih Dari
                    <strong>{{ $facilities->count() }}</strong> Fasilitas Yang Menunjang Kenyamanan
                    <br><em>Stackholder</em> ( Mahasiswa , Tenaga Kerja , Orang Tua Wali DLL) </p>
            </div>
            <div class="flex flex-wrap -m-4">
                @foreach ($facilities as $facility)
                    <div class="lg:w-1/3 sm:w-1/2 p-4">
                        <div class="flex relative">
                            <img alt="gallery" class="absolute inset-0 w-full h-full object-cover object-center"
                                src="{{ $facility->pathimage }}">
                            <div
                                class="px-8 py-10 relative z-10 w-full border-4 border-gray-200 bg-white opacity-0 hover:opacity-100">

                                <h1 class="title-font text-lg font-medium text-gray-900 mb-3">{{ $facility->name }}</h1>
                                <p class="leading-relaxed">{{ $facility->content }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </section>  
    @endif
</div>
