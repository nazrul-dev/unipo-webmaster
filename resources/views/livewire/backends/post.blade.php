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
            <div class="flex items-center justify-between">
                <h1 class="my-5 font-semibold">Post Artikel </h1>
                <div class="flex items-center space-x-3">
                    <button
                        class="flex items-center px-2 py-1 text-sm text-gray-200 bg-gray-500 rounded hover:text-gray-100 hover:bg-gray-700 focus:outline-none">
                        <x-tabler icon="filter" class="text-gray-50 h-6" strokeWidth="1" /> <span>Filter </span>
                    </button>
                    <button type="button" @click="ModeChange('Add')"
                        class="flex items-center px-2 py-1 text-sm text-gray-200 bg-green-500 rounded hover:text-gray-100 hover:bg-green-700 focus:outline-none">
                        <x-tabler icon="square-plus" class="text-gray-50 h-6" strokeWidth="1" /> <span>Post Artikel
                        </span>
                    </button>
                    <div class="flex items-center justify-center ">
                        <div class="relative text-gray-600 focus-within:text-gray-400">
                            <span class="absolute inset-y-0 left-0 flex items-center pl-2">
                                <button type="submit" class="p-1 focus:outline-none focus:shadow-outline">
                                    <x-tabler icon="search" class="h-6" strokeWidth="2" />
                                </button>
                            </span>
                            <input type="search"  wire:model="search" 
                                class="py-1 text-sm text-white bg-gray-200 rounded pl-10 focus:outline-none focus:bg-white focus:text-gray-900 border-gray-300"
                                placeholder="Cari Artikel..." autocomplete="off">
                        </div>
                    </div>
                </div>
            </div>
            <div class="space-y-2" wire:init="loadPosts">
                @foreach ($DataAll as $data)
                    <div
                        class="flex flex-col items-start p-2 border-2 rounded md:items-center md:justify-between md:flex-row hover:bg-gray-100">
                        <div class="flex items-center justify-start mr-4 ">
                            <div class="hidden -ml-5 md:block">
                                <img class="object-cover h-24 border-2 border-gray-400 rounded shadow w-28"
                                    src="{{ $data->postimage }}">
                            </div>
                            <div class="p-2 mb-2 font-semibold border-b-2 md:mb-0 md:border-b-0 md:mx-5">
                                {{ $data->title }}
                                <p class="text-sm font-normal">{{ Str::limit($data->content, 100) }}</p>
                                <p class="text-sm font-semibold">Created By : NAzrul</p>
                            </div>
                        </div>
                        <div class="md:border-l-2 pl-2">
                            <div class="px-2 mb-2 text-sm">
                                <p class="text-xs font-semibold"> Created {{ $data->created_at->format('d F Y') }}</p>
                                <p class="text-xs font-semibold"> Updated {{ $data->updated_at->format('d F Y') }}</p>
                                <p class="text-xs font-semibold"> Publish {{ $data->publish ? 'Yes' : 'No' }}</p>
                            </div>
                            <div class="flex px-2 space-x-2 border-gray-700">
                                <button type="button" wire:click.prevent="show('{{ $data->id }}')"
                                    class="flex items-center px-2 py-1 text-sm text-gray-200 bg-blue-500 rounded hover:text-gray-100 hover:bg-blue-700 focus:outline-none">
                                    <x-tabler icon="eye" class="text-gray-50 h-6" strokeWidth="1" />
                                </button>
                                <button type="button" 
                                    class="flex items-center px-2 py-1 text-sm text-gray-200 bg-red-500 rounded hover:text-gray-100 hover:bg-red-700 focus:outline-none">
                                    <x-tabler icon="trash" class="text-gray-50 h-6" strokeWidth="1" />
                                </button>
                                <button type="button" wire:click.prevent="edit('{{ $data->id }}')"
                                    class="flex items-center px-2 py-1 text-sm text-gray-200 bg-green-500 rounded hover:text-gray-100 hover:bg-green-700 focus:outline-none">
                                    <x-tabler icon="edit-circle" class="text-gray-50 h-6" strokeWidth="1" />
                                </button>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    @endif
    @if ($Mode == 'Add')
        <div>
            <form wire:submit.prevent="store">
                <div class="flex items-center justify-between">
                    <h1 class="my-5 font-semibold">Post <span x-text="Mode"></span> </h1>
                    <div class="flex items-center space-x-3">
                        <button @click="ModeChange('Data')" type="button"
                            class="flex items-center px-2 py-1 text-sm text-gray-200 bg-gray-500 rounded hover:text-gray-100 hover:bg-gray-700 focus:outline-none">
                            <x-tabler icon="arrow-back-up" class="text-gray-50 h-6" strokeWidth="1" /> <span>Data </span>
                        </button>
                        <button type="submit"
                            class="flex items-center px-2 py-1 text-sm text-gray-200 bg-green-500 rounded hover:text-gray-100 hover:bg-green-700 focus:outline-none">
                            <x-tabler icon="circle-check" class="text-gray-50 h-6 mr-1" strokeWidth="1" /> <span>Simpan
                                Perubahan </span>
                        </button>
                    </div>
                </div>
                <div class="flex space-x-5">
                    <div class="w-2/3">
                        <div class="mb-5">
                            <label for="" class="block mb-3"> Judul Artikel </label>
                            <input type="text" wire:model="title" class="w-full form-input px-4 py-1 rounded">
                            <p class="block text-sm text-red-500 my-2">
                                @error('title') <span class="font-semibold break-normal">{{ $message }}</span> @enderror
                            </p>
                        </div>
                        <div class="mb-5 break-all">
                            <label for="" class="block mb-3"> Content Artikel </label>
                            <p class="block text-sm text-red-500 my-2">
                                @error('content') <span class="font-semibold break-normal">{{ $message }}</span> @enderror
                            </p>
                            <x-text-editor wire:model.lazy="content"> </x-text-editor>

                        </div>
                    </div>
                    <div class="w-1/3">
                        <div class="mb-5">
                            <label for="" class="block mb-3"> Kategori </label>
                            <select wire:model="category_id" class="form-select w-full form-input px-4 py-1 rounded">
                                <option value="3">Politik</option>
                                <option value="2">Politik</option>
                            </select>
                            <p class="block text-sm text-red-500 my-2">
                                @error('category_id') <span class="font-semibold break-normal">{{ $message }}</span> @enderror
                            </p>
                        </div>
                        <div class="mb-5">
                            <label for="" class="block mb-3"> Gambar Artikel </label>
                            <div class="mb-5">
                               
                                @if ($image)
                                    <img class="w-full object-fill border-dashed h-40 border-2 border-gray-200 my-5"
                                        src="{{  $tempImage }}">
                                @endif
                                <input type="file" wire:model="image"
                                    class="py-2  border-2 w-full form-input px-4  rounded">
                                    <p class="block text-sm text-red-500 my-2">
                                        @error('image') <span class="font-semibold break-normal">{{ $message }}</span> @enderror
                                    </p>
                            </div>
                        </div>
                        <label for="" class="block mb-1"> Optional </label>
                        <div class="flex ">
                            <label class="inline-flex items-center mt-3 mr-5">
                                <input wire:model="publish" type="checkbox" class="form-checkbox h-5 w-5 text-green-600"
                                    checked><span class="ml-2 text-gray-700">Publish</span>
                            </label>
                            <label class="inline-flex items-center mt-3">
                                <input wire:model="slider" type="checkbox"
                                    class="form-checkbox h-5 w-5 text-green-600"><span
                                    class="ml-2 text-gray-700">Slider</span>
                            </label>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    @endif
    @if ($Mode == 'Edit')
        <div>
            <form wire:submit.prevent="update">
                <div class="flex items-center justify-between">
                    <h1 class="my-5 font-semibold">Post <span x-text="Mode"></span> </h1>
                    <div class="flex items-center space-x-3">
                        <button @click="ModeChange('Data')" type="button"
                            class="flex items-center px-2 py-1 text-sm text-gray-200 bg-gray-500 rounded hover:text-gray-100 hover:bg-gray-700 focus:outline-none">
                            <x-tabler icon="arrow-back-up" class="text-gray-50 h-6" strokeWidth="1" /> <span>Data </span>
                        </button>
                        <button type="submit"
                            class="flex items-center px-2 py-1 text-sm text-gray-200 bg-green-500 rounded hover:text-gray-100 hover:bg-green-700 focus:outline-none">
                            <x-tabler icon="circle-check" class="text-gray-50 h-6 mr-1" strokeWidth="1" /> <span>Simpan
                                Perubahan </span>
                        </button>
                    </div>
                </div>
                <div class="flex space-x-5">
                    <div class="w-2/3">
                        <div class="mb-5">
                            <label for="" class="block mb-3"> Judul Artikel </label>
                            <input type="text" wire:model="title" class="w-full form-input px-4 py-1 rounded">
                        </div>
                        <div class="mb-5 break-all">
                            <label for="" class="block mb-3"> Content Artikel </label>
                            <x-text-editor wire:model.lazy="content"> {!! $content !!}</x-text-editor>
                        </div>
                    </div>
                    <div class="w-1/3">
                        <div class="mb-5">
                            <label for="" class="block mb-3"> Kategori </label>
                            <select wire:model="category_id" class="form-select w-full form-input px-4 py-1 rounded">
                                <option value="3">Politik</option>
                                <option value="2">Politik</option>
                            </select>
                        </div>
                        <div class="mb-5">
                            <label for="" class="block mb-3"> Gambar Artikel </label>
                            <div class="mb-5">
                                @if ($image)
                                    <img class=" w-full object-fill border-dashed h-40 border-2 border-gray-200 my-5"
                                    src="{{ $tempImage ? $tempImage :  $image }}">
                                @endif
                                <input type="file" wire:model="image"
                                    class="py-2  border-2 w-full form-input px-4  rounded">
                            </div>
                        </div>
                        <label for="" class="block mb-1"> Optional </label>
                        <div class="flex ">
                            <label class="inline-flex items-center mt-3 mr-5">
                                <input wire:model="publish" type="checkbox" class="form-checkbox h-5 w-5 text-green-600"
                                    checked><span class="ml-2 text-gray-700">Publish</span>
                            </label>
                            <label class="inline-flex items-center mt-3">
                                <input wire:model="slider" type="checkbox"
                                    class="form-checkbox h-5 w-5 text-green-600"><span
                                    class="ml-2 text-gray-700">Slider</span>
                            </label>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    @endif

    @if ($Mode == 'Show')
    <div>
        <form wire:submit.prevent="update">
            <div class="flex items-center justify-between">
                <h1 class="my-5 font-semibold">Post <span x-text="Mode"></span> </h1>
                <div class="flex items-center space-x-3">
                    <button @click="ModeChange('Data')" type="button"
                        class="flex items-center px-2 py-1 text-sm text-gray-200 bg-gray-500 rounded hover:text-gray-100 hover:bg-gray-700 focus:outline-none">
                        <x-tabler icon="arrow-back-up" class="text-gray-50 h-6" strokeWidth="1" /> <span>Data </span>
                    </button>
                    <button type="button" wire:click.prevent="edit('{{ $ids }}')"
                        class="flex items-center px-2 py-1 text-sm text-gray-200 bg-green-500 rounded hover:text-gray-100 hover:bg-green-700 focus:outline-none">
                        <x-tabler icon="edit-circle" class="text-gray-50 h-6 mr-1" strokeWidth="1" /> <span>Edit Post</span>
                    </button>
                </div>
            </div>
            <div class="flex space-x-5">
                <div class="w-2/3">
                    <div class="mb-5">
                        <label for="" class="block mb-3"> Judul Artikel </label>
                        <p>{{$title}}</p>
                    </div>
                    <div class="mb-5 break-all">
                        <label for="" class="block mb-3"> Content Artikel </label>
                        {!! $content !!}
                    </div>
                </div>
                <div class="w-1/3">
                    <div class="mb-5">
                        <label for="" class="block mb-3"> Kategori </label>
                        <p>{{$category_id}}</p>
                    </div>
                    <div class="mb-5">
                        <label for="" class="block mb-3"> Gambar Artikel </label>
                        <div class="mb-5">
                            @if ($image)
                                <img class="w-full object-fill border-dashed h-40 border-2 border-gray-200 my-5"
                                src="{{ $image  }}">
                            @endif
                            
                        </div>
                    </div>
                    <label for="" class="block mb-1"> Info Lainnya </label>
                    <p>Post Di Publish</p>
                    <p>Post Terakhir Diubah : <strong></strong></p>
                    <p>Post Dibuat</p>
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
            image: @entangle('image'),
            ModeChange(modeSelected) {
                this.Mode = `${modeSelected}`;
            },
            bytesToSize(bytes) {
                var sizes = ['Bytes', 'KB', 'MB', 'GB', 'TB'];
                if (bytes == 0) return '0 Byte';
                var i = parseInt(Math.floor(Math.log(bytes) / Math.log(1024)));
                return Math.round(bytes / Math.pow(1024, i), 2) + ' ' + sizes[i];
            },
            thisFileUpload() {
                document.getElementById("image").click();
            }
        }
    }
</script>
