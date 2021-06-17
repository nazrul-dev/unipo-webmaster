@props(['sliders', 'activeSlide'])
<div>
    <section class="text-gray-600 border-b-4 border-gray-100 " x-data="slider()" x-init="init()">
        <div class="container mx-auto flex px-5 py-24 md:flex-row flex-col items-center">
            @foreach ($sliders as $i => $slider)

                @if ($activeSlide == $i + 1)
                    <div
                        class="lg:flex-grow md:w-1/2 lg:pr-24 md:pr-16 flex flex-col md:items-start md:text-left mb-16 md:mb-0 items-center text-center">
                        <h1 class=" sm:text-4xl text-3xl mb-4 font-semibold text-gray-900">{{ $slider->title }}
                            
                        </h1>
                        {{-- <p class="mb-8 leading-relaxed">{{ Str::limit($slider->content, 150) }}</p> --}}
                        <div class="flex justify-center">
                            <button
                                class="inline-flex text-white bg-pink-500 border-0 py-2 px-6 focus:outline-none hover:bg-pink-600 rounded text-lg">Selengkapnya</button>
                            <button
                                class="ml-4 inline-flex text-gray-700 bg-gray-100 border-0 py-2 px-6 focus:outline-none hover:bg-gray-200 rounded text-lg">Share</button>
                        </div>
                    </div>
                    <div class="lg:max-w-lg lg:w-full md:w-1/2 w-5/6">
                        <img class="object-cover w-full rounded-xl border-4 overflow-hidden border-gray-200  shadow-xl h-70"
                            alt="hero" src="{{ $slider->postimage }}">
                        <div class="flex -justify-center" x-show="slides > 1">
                            @foreach ($sliders as $i => $slider)
                                <button
                                    class="flex-1 w-4 h-2 mt-4 mx-2 mb-0 rounded-full overflow-hidden transition-colors duration-200 ease-out hover:bg-pink-600 hover:shadow-lg focus:outline-none"
                                    :class="{ 
                                    'bg-gray-600': activeSlide === {{ $i + 1 }},
                                    'bg-pink-300': activeSlide !== {{ $i + 1 }} 
                                }" x-on:click="activeSlide = {{ $i + 1 }}"></button>
                            @endforeach
                        </div>
                    </div>
                @endif
            @endforeach
        </div>

    </section>
    <script>
        function slider() {
            return {

                activeSlide: @entangle('activeSlide'),
                slides: {{ $sliders->count() }},

                init() {
                    if (this.slides > 1) {
                        setInterval(() => {

                            this.activeSlide = this.activeSlide + 1
                            if (this.activeSlide > this.slides) {
                                this.activeSlide = 1;
                            }
                        }, 3500);
                    }



                },

            }
        }

    </script>

</div>
