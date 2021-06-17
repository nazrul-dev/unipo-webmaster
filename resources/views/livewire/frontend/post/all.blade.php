<div>
    <section class="text-gray-600 body-font">
        <div class="container px-5 py-16 mx-auto">
            <div class="w-full md:w-2/3 mx-auto mb-10">
                <h1 class="text-center sm:text-2xl text-xl font-semibold title-font text-gray-900">Cari Judul Artikel Anda </h1>
                <p  class="text-center capitalize mb-4 " >Hadir Dengan Berbagai Berita Hangan Dan Terbaru Seputar Universitas Maupun Nasional</p>
                <div class="relative text-gray-600 focus-within:text-gray-400">
                    <span class="absolute inset-y-0 left-0 flex items-center pl-2">
                        <button type="submit" class="p-1 focus:outline-none focus:shadow-outline">
                            <x-tabler icon="search" class="h-6" strokeWidth="2" />
                        </button>
                    </span>
                    <input type="search" wire:model="search"
                        class="w-full py-2 text-sm text-white bg-gray-200 rounded pl-10 focus:outline-none focus:bg-white focus:text-gray-900 border-gray-300"
                        placeholder="Cari Artikel Disini..." autocomplete="off">
                        
                </div>
                <div class="my-2">
                   @if ($search)
                   <span>Pencarian "<strong>{{$search}}</strong>" <em>{{$posts->count() ? 'Ditemukan' : 'Tidak Ditemukan'}}</em> </span> 
                   @endif
                </div>
            </div>
            <div class="flex flex-wrap -m-4">
                @foreach ($posts as $post)
                <div class="p-4 md:w-1/3">
                    <div class="h-full border-2 border-gray-200 border-opacity-60 rounded-lg overflow-hidden">
                        <img class="lg:h-48 md:h-36 w-full object-cover object-center"
                            src="{{$post->postimage}}" alt="blog">
                        <div class="p-6">
                           <div class="flex justify-between items-center">
                            <h2 class="tracking-widest text-xs title-font font-medium text-gray-400 mb-1">CATEGORY</h2>
                            <h2 class="text-xs text-gray-400 mb-1">Publish {{$post->created_at->diffForHumans()}}</h2>
                           </div>
                            <h1 class="title-font text-lg font-medium text-gray-900 mb-3">{{$post->title}}</h1>
                            
                            <div class="flex items-center flex-wrap ">
                                <a href="/artikel/{{$post->slug}}" class="text-pink-500 inline-flex items-center md:mb-2 lg:mb-0">Selengkapnya
                                    <svg class="w-4 h-4 ml-2" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"
                                        fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M5 12h14"></path>
                                        <path d="M12 5l7 7-7 7"></path>
                                    </svg>
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
