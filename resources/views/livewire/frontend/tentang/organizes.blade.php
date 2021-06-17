<div>
    <section class="text-gray-600 body-font">
        <div class="container px-5 py-16 mx-auto">
            <div class="flex flex-col text-center w-full mb-20">
                <h1 class="sm:text-3xl text-2xl font-bold title-font mb-4 text-gray-900">Struktur Organisasi
                    Universitas
                    Pohuwato</h1>
                <p class="lg:w-2/3 mx-auto leading-relaxed text-base">Ada Lebih Dari 50 Tenaga Kerja Yang Memiliki </p>
            </div>
            <div class="flex flex-wrap -m-4">
                @for ($i = 0; $i < 6; $i++)
                <div class="p-4 lg:w-1/2">
                    <div
                        class="h-full flex sm:flex-row flex-col items-center sm:justify-start justify-center text-center sm:text-left">
                        <img alt="team"
                            class="flex-shrink-0 rounded-lg w-48 h-48 object-cover object-center sm:mb-0 mb-4"
                            src="http://unipo.ac.id/media/organizer/600e5459a04f3.jpg">
                        <div class="flex-grow sm:pl-8">
                            <h2 class="title-font font-medium text-lg text-gray-900">Dr. Imran kamaruddin, SS,MM.,M.I Kom</h2>
                            <h3 class="text-gray-500">Rektor Institut Teknologi Indonesia</h3>
                            <p class="mb-4">Jabatan Akademik Lektor
                            </p>
                            <span class="inline-flex">
                                <x-tabler icon="mail-forward" class="text-gray-700 mr-1 h-4 md:h-6" strokeWidth="1" />  <span>admin@emailasasa.com</span>
                            </span>
                        </div>
                    </div>
                </div>
                @endfor
            
            </div>
        </div>
    </section>
</div>
