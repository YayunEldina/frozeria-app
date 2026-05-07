{{-- resources/views/categories/_delete_modal.blade.php --}}
<div 
    x-data="{ open: false, categoryId: null, categoryName: '' }" 
    @open-delete-category-modal.window="open = true; categoryId = $event.detail.id; categoryName = $event.detail.name"
    x-show="open" 
    x-cloak 
    class="fixed inset-0 z-[9999] overflow-y-auto"
>
    <div class="flex items-center justify-center min-h-screen px-4 pt-4 pb-20 text-center sm:block sm:p-0">
        
        <div 
            class="fixed inset-0 backdrop-blur-sm bg-black/5 transition-opacity" 
            x-show="open"
            x-transition:enter="transition ease-out duration-300"
            x-transition:enter-start="opacity-0"
            x-transition:enter-end="opacity-100"
            x-transition:leave="transition ease-in duration-200"
            x-transition:leave-start="opacity-100"
            x-transition:leave-end="opacity-0"
            @click="open = false"
        ></div>

        <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
        
        <div 
            class="relative z-[101] inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full p-6"
            x-show="open"
            x-transition:enter="transition ease-out duration-300"
            x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
            x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
            x-transition:leave="transition ease-in duration-200"
            x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
            x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
        >
            <div class="sm:flex sm:items-start">
                <div class="mx-auto flex-shrink-0 flex items-center justify-center h-12 w-12 rounded-full bg-red-100 sm:mx-0 sm:h-10 sm:w-10 border border-red-200">
                    <svg class="h-6 w-6 text-red-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                    </svg>
                </div>

                <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                    <h3 class="text-lg leading-6 font-bold text-gray-900">Hapus Kategori?</h3>
                    <div class="mt-2">
                        <p class="text-sm text-gray-500 leading-relaxed">
                            Kategori <span class="font-bold text-gray-900" x-text="categoryName"></span> akan dihapus. Semua barang dalam kategori ini mungkin akan terpengaruh.
                        </p>
                    </div>
                </div>
            </div>

            <div class="mt-8 flex flex-col-reverse sm:flex-row sm:justify-end sm:space-x-3">
                <button @click="open = false" type="button" class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 px-4 py-2 bg-white text-gray-700 hover:bg-gray-50 sm:mt-0 sm:w-auto sm:text-sm">
                    Batal
                </button>
                
                <form :action="'/categories/' + categoryId" method="POST" class="inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="w-full inline-flex justify-center rounded-md border border-red-300 px-4 py-2 bg-white text-red-700 hover:bg-red-50 sm:w-auto sm:text-sm">
                        Ya, Hapus
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>