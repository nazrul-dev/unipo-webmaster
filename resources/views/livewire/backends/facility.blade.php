<div x-data="data()">
    <nav class="text-xs font-bold text-black md:text-base" aria-label="Breadcrumb">
        <ol class="inline-flex p-0 arrow-back-up-none">
            <li class="flex items-center">
                <a href="#">Home</a>
                <svg class="w-3 h-3 mx-3 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512">
                    <path
                        d="M285.476 272.971L91.132 467.314c-9.373 9.373-24.569 9.373-33.941 0l-22.667-22.667c-9.357-9.357-9.375-24.522-.04-33.901L188.505 256 34.484 101.255c-9.335-9.379-9.317-24.544.04-33.901l22.667-22.667c9.373-9.373 24.569-9.373 33.941 0L285.475 239.03c9.373 9.372 9.373 24.568.001 33.941z" />
                </svg>
            </li>
            <li class="flex items-center">
                <a href="#">Second Level</a>
                <svg class="w-3 h-3 mx-3 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512">
                    <path
                        d="M285.476 272.971L91.132 467.314c-9.373 9.373-24.569 9.373-33.941 0l-22.667-22.667c-9.357-9.357-9.375-24.522-.04-33.901L188.505 256 34.484 101.255c-9.335-9.379-9.317-24.544.04-33.901l22.667-22.667c9.373-9.373 24.569-9.373 33.941 0L285.475 239.03c9.373 9.372 9.373 24.568.001 33.941z" />
                </svg>
            </li>
            <li>
                <a href="#" class="text-gray-500" aria-current="page" x-text="Mode"></a>
            </li>
        </ol>
    </nav>
    @if ($Mode == 'Data')
        <div>
            <div class="flex md:flex-row flex-col items-center justify-between  mb-5">
                <h1 class="my-5 font-semibold">Data Fasilitas </h1>
                <div class="flex items-center space-x-3">

                    <button type="button" @click="ModeChange('Add')"
                        class="flex items-center px-2 py-1 md:text-sm text-xs text-gray-200 bg-green-500 rounded hover:text-gray-100 hover:bg-green-700 focus:outline-none">
                        <x-tabler icon="square-plus" class="text-gray-50 h-6" strokeWidth="1" /> <span>Fasilitas
                        </span>
                    </button>
                    <div class="flex items-center justify-center ">
                        <div class="relative text-gray-600 focus-within:text-gray-400">
                            <span class="absolute inset-y-0 left-0 flex items-center pl-2">
                                <button type="submit" class="p-1 focus:outline-none focus:shadow-outline">
                                    <x-tabler icon="search" class="h-6" strokeWidth="2" />
                                </button>
                            </span>
                            <input type="search" wire:model="search"
                                class="py-1 text-sm text-gray bg-gray-200 rounded pl-10 focus:outline-none focus:bg-white focus:text-gray-900 border-gray-300"
                                placeholder="Cari Fasilitas..." autocomplete="off">
                        </div>
                    </div>
                </div>
            </div>

            @if (!$DataAll->count())
                @if (!$search)
                    <div
                        class="min-h-screen border-2 rounded-lg bg-gray-100 border-dashed border-gray-300 flex items-center justify-center">
                        <div class="-mt-10">
                            <div class="text-center">
                                <h1 class="text-xl font-bold tracking-widert">TIDAK ADA DATA FASILITAS</h1>
                                <span>Klik icon Tambah Jika Ingin <br>Menambah Fasilitas</span>
                            </div>
                            <div class="flex justify-center">
                                <button type="button" class="focus:outline-none" @click="ModeChange('Add')">
                                    <x-tabler icon="square-plus" class="text-green-500 h-44 hover:text-green-700 "
                                        strokeWidth="1" />
                                </button>

                            </div>
                        </div>
                    </div>
                @else
                    <div class="text-center break-all animate-pulse">
                        <span>Pencarian <br>"{{ $search }}"</span>
                        <h1 class="text-base md:text-xl font-bold tracking-widert">TIDAK DITEMUKAN</h1>
                    </div>
                @endif
            @else
                <div class="grid md:grid-cols-3 grid-cols-2 md:gap-4 gap-2">
                    @foreach ($DataAll as $data)
                        <div class="bg-gray-50 border border-gray-200 rounded-lg overflow-hidden">
                            <img class="md:h-32 h-16 w-full object-cover border-b-2" src="{{ $data->pathimage }}"
                                alt="">
                            <div class="flex justify-center items-end px-2 pt-3  space-x-2 border-gray-700">
                                <button type="button" wire:click.prevent="destroy('{{ $data->id }}')"
                                    class="flex items-center px-2 py-1 bg-red-500 rounded hover:text-gray-100 hover:bg-red-700 focus:outline-none">
                                    <x-tabler icon="trash" class="text-gray-50  h-4 md:h-6" strokeWidth="1" />
                                </button>
                                <button type="button" wire:click.prevent="edit('{{ $data->id }}')"
                                    class="flex items-center px-2 py-1 bg-green-500 rounded hover:text-gray-100 hover:bg-green-700 focus:outline-none">
                                    <x-tabler icon="edit-circle" class="text-gray-50  h-4 md:h-6" strokeWidth="1" />
                                </button>
                            </div>
                            <div class=" border-b-dashed  md:p-5 p-2">
                                <h1 class="text-xs text-center md:text-xl font-bold">{{ $data->name }}</h1>
                                <p class="font-semibold text-left md:text-base text-xs">
                                    {{ Str::words($data->content, 150) }}
                                </p>
                                <p class="text-gray-600 text-left md:text-base text-xs">
                                    {{ $data->created_at->diffForHumans() }}</p>

                            </div>

                        </div>
                    @endforeach
                </div>
                <div class="my-5">
                    {{ $DataAll->links() }}
                </div>
            @endif



        </div>
    @endif
    @if ($Mode == 'Add' or $Mode == 'Edit')
        <div>
            <form wire:submit.prevent="{{ $Mode == 'Add' ? 'store' : 'update' }}">
                <div class="flex items-center justify-between">
                    <h1 class="my-5 font-semibold">Fasilitas <span x-text="Mode"></span> </h1>
                    <div class="flex items-center space-x-3">
                        <button @click="ModeChange('Data')" type="button"
                            class="flex items-center px-2 py-1 text-sm text-gray-200 bg-gray-500 rounded hover:text-gray-100 hover:bg-gray-700 focus:outline-none">
                            <x-tabler icon="arrow-back-up" class="text-gray-50 h-6" strokeWidth="1" /> <span>Data
                            </span>
                        </button>
                        <button type="submit"
                            class="flex items-center px-2 py-1 text-sm text-gray-200 bg-green-500 rounded hover:text-gray-100 hover:bg-green-700 focus:outline-none">
                            <x-tabler icon="circle-check" class="text-gray-50 h-6 mr-1" strokeWidth="1" /> <span>
                                Simpan {{ $Mode == 'Add' ? '' : 'Perubahan' }} </span>
                        </button>
                    </div>
                </div>
                <div class="flex space-x-5">
                    <div class="w-2/3">
                        <div class="mb-5">
                            <label for="" class="block mb-3"> Nama Fasilitas </label>
                            <input type="text" wire:model="name" class="w-full form-input px-4 py-1 rounded">
                            <p class="block text-sm text-red-500 my-2">
                                @error('name') <span class="font-semibold break-normal">{{ $message }}</span>
                                @enderror
                            </p>
                        </div>
                        <div class="mb-5">
                            <label for="" class="block mb-3"> Keterangan Fasilitas </label>
                            <textarea wire:model="content" class="form-textarea w-full rounded"
                                placeholder="Tuliskan Keterangan Fasilitas" rows="3"></textarea>

                            <p class="block text-sm text-red-500 my-2">
                                @error('content') <span class="font-semibold break-normal">{{ $message }}</span>
                                @enderror
                            </p>
                        </div>
                        <div class="w-1/2 mx-auto">

                            @if ($Mode == 'Edit')
                                @if ($oldimage)
                                    <label for="" class="block mb-3"> Gambar Fasilitas </label>
                                    <img class="w-full object-fill border-dashed h-40 border-2 border-gray-200 my-5"
                                        src="{{ Storage::url($oldimage) }}">
                                @endif
                            @endif
                        </div>
                    </div>
                    <div class="w-1/3">

                        <div class="mb-5">
                            <label for="" class="block mb-3"> {{ $Mode == 'Edit' ? 'Ganti' : 'Tambah' }} Gambar
                                Fasilitas
                            </label>
                            <div class="mb-5">
                                @if ($image && in_array($image->getClientOriginalExtension(), ['jpg', 'png', 'jpeg', 'gif']))
                                    <img class="w-full object-fill border-dashed h-40 border-2 border-gray-200 my-5"
                                        src="{{ $this->image->temporaryUrl() }}">
                                @endif

                                <input type="file" wire:model="image"
                                    class="py-2  border-2 w-full form-input px-4  rounded">
                                <p class="block text-sm text-red-500 my-2">
                                    @error('image') <span class="font-semibold break-normal">{{ $message }}</span>
                                    @enderror
                                </p>
                            </div>
                        </div>

                    </div>
                </div>
            </form>
        </div>
    @endif

</div>
<script>
    function data() {
        return {
            Mode: @entangle('Mode'),

            ModeChange(modeSelected) {
                this.Mode = `${modeSelected}`;
            },

        }
    }

</script>
