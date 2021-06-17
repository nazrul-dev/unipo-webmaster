<div class="py-16 ">
    <div class="md:flex ">
        <div class="w-full md:w-2/3 md:px-12 breaks-all">
            <div class="w-full mx-auto">
                <h1 class="text-left sm:text-2xl text-xl font-semibold title-font text-gray-900">{{ $post->title }}
                </h1>
                <div class="flex justify-between items-center mb-4 ">
                    <p class="text-left capitalize ">Penulis : Dwi Ardianshaya </p>
                    <div class="flex">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-brand-instagram" width="44" height="44" viewBox="0 0 24 24" stroke-width="1.5" stroke="#a905b6" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                            <rect x="4" y="4" width="16" height="16" rx="4" />
                            <circle cx="12" cy="12" r="3" />
                            <line x1="16.5" y1="7.5" x2="16.5" y2="7.501" />
                          </svg>
                          <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-brand-twitter" width="44" height="44" viewBox="0 0 24 24" stroke-width="1.5" stroke="#a905b6" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                            <path d="M22 4.01c-1 .49 -1.98 .689 -3 .99c-1.121 -1.265 -2.783 -1.335 -4.38 -.737s-2.643 2.06 -2.62 3.737v1c-3.245 .083 -6.135 -1.395 -8 -4c0 0 -4.182 7.433 4 11c-1.872 1.247 -3.739 2.088 -6 2c3.308 1.803 6.913 2.423 10.034 1.517c3.58 -1.04 6.522 -3.723 7.651 -7.742a13.84 13.84 0 0 0 .497 -3.753c-.002 -.249 1.51 -2.772 1.818 -4.013z" />
                          </svg>
                          <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-brand-telegram" width="44" height="44" viewBox="0 0 24 24" stroke-width="1.5" stroke="#a905b6" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                            <path d="M15 10l-4 4l6 6l4 -16l-18 7l4 2l2 6l3 -4" />
                          </svg>
                          <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-brand-whatsapp" width="44" height="44" viewBox="0 0 24 24" stroke-width="1.5" stroke="#a905b6" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                            <path d="M3 21l1.65 -3.8a9 9 0 1 1 3.4 2.9l-5.05 .9" />
                            <path d="M9 10a0.5 .5 0 0 0 1 0v-1a0.5 .5 0 0 0 -1 0v1a5 5 0 0 0 5 5h1a0.5 .5 0 0 0 0 -1h-1a0.5 .5 0 0 0 0 1" />
                          </svg>
                    </div>
                </div>

                <div class="flex justify-center ">
                    <img class="object-fill rounded-xl border-4 overflow-hidden border-gray-200  h-auto w-full"
                        src="{{ $post->postimage }}">
                </div>
            </div>
            <div class="block py-10">
                <div class="w-full ">
                    <div class="rounded-xl p-8 border bg-gray-50">
                        <div class="mb-5">
                            <strong class="text-xl">{{ $post->title }}</strong>
                        </div>
                        {!! $post->content !!}
                    </div>
                </div>

            </div>
        </div>
        <div class="w-full md:w-1/3 md:border-l-2 pl-2 ">
            <div class="rounded border p-5 mb-2">
                <div class="flex justify-start items-center">

                    <h2 class="tracking-widest text-xs title-font font-medium text-gray-400 mb-1">PUBLISH </h2>
                </div>
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Accusamus fuga ipsa provident iure rem eos
                quibusdam, dolorum, hic debitis libero incidunt! Nostrum error neque quae laboriosam molestias debitis
                nam numquam.
            </div>
            <div class="rounded border p-5 mb-2">
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Accusamus fuga ipsa provident iure rem eos
                quibusdam, dolorum, hic debitis libero incidunt! Nostrum error neque quae laboriosam molestias debitis
                nam numquam.
            </div>
            <div class="rounded border p-5 mb-2">
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Accusamus fuga ipsa provident iure rem eos
                quibusdam, dolorum, hic debitis libero incidunt! Nostrum error neque quae laboriosam molestias debitis
                nam numquam.
            </div>
        </div>
    </div>
</div>
