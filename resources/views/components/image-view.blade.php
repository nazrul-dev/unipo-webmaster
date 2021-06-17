<div>
    <div class="fixed z-10 inset-0 overflow-y-auto" aria-labelledby="modal-title" role="dialog" aria-modal="true">
        <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
            <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" aria-hidden="true"></div>
            <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
            <div
                class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
                {!!$slot!!}
                <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                  
                   
                    <button type="button" @click="ModalView = false" class=" text-white flex items-center px-2 py-1 bg-red-500 rounded hover:text-gray-100 hover:bg-red-700 focus:outline-none" >
                        <x-tabler icon="square-minus" class="text-gray-50  h-4 md:h-6" strokeWidth="1" /> <span>Tutup</span>
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>