<form action="#" method="POST" enctype="multipart/form-data">
    <h2>Create News</h2>
    <div class="shadow sm:rounded-md sm:overflow-hidden">
        <div class="px-4 py-5 bg-white space-y-6 sm:p-6">
            <div class="grid grid-cols-3 gap-6">
                <div class="col-span-3 sm:col-span-2">
                    <label for="url" class="block text-sm font-medium text-gray-700">
                        URL
                    </label>
                    <div class="mt-1 flex rounded-md shadow-sm">
                        <input wire:model="url" type="text" name="url" id="url" class="focus:ring-indigo-500 focus:border-indigo-500 flex-1 block w-full rounded-none rounded-r-md sm:text-sm border-gray-300" placeholder="www.example.com">
                    </div>
                    @error('url') <span class="error">{{ $message }}</span> @enderror
                </div>
            </div>

            <div class="col-span-6 sm:col-span-3">
                <label for="language" class="block text-sm font-medium text-gray-700">Language</label>
                <select wire:model="language_id" id="language" name="language" autocomplete="language" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                    <option>Select Language</option>
                    @foreach($allLanguages as $language)
                        <option value="{{$language->id}}">{{ $language->name }}</option>
                    @endforeach
                </select>
                @error('language_id') <span class="error">{{ $message }}</span> @enderror
            </div>

            <div class="col-span-6">
                <label for="title" class="block text-sm font-medium text-gray-700">Title</label>
                <input wire:model="title" type="text" name="title" id="title" autocomplete="title" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                @error('title') <span class="text-danger">{{ $message }}</span> @enderror
            </div>

            <div>
                <label for="summary" class="block text-sm font-medium text-gray-700">
                    Summary
                </label>
                <div class="mt-1">
                    <textarea wire:model="summary" id="summary" name="summary" rows="3" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 mt-1 block w-full sm:text-sm border-gray-300 rounded-md" placeholder="Summary"></textarea>
                </div>
                @error('summary') <span class="text-danger">{{ $message }}</span> @enderror
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700">
                    Image
                </label>
                <div class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-md">
                    <div class="space-y-1 text-center">
                        <svg class="mx-auto h-12 w-12 text-gray-400" stroke="currentColor" fill="none" viewBox="0 0 48 48" aria-hidden="true">
                            <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                        <div class="flex text-sm text-gray-600">
                            <label for="file-upload" class="relative cursor-pointer bg-white rounded-md font-medium text-indigo-600 hover:text-indigo-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-indigo-500">
                                <span>Upload image</span>
                                <input  type="file"  wire:model="image" id="file-upload" name="file-upload"class="sr-only">
                            </label>
                            <p class="pl-1">or drag and drop</p>
                        </div>
                        <p class="text-xs text-gray-500">
                            PNG, JPG, GIF up to 10MB
                        </p>
                    </div>
                </div>
                @error('image') <span class="text-danger">{{ $message }}</span> @enderror
            </div>

            <div class="col-span-6 sm:col-span-3">
                <label for="companies" class="block text-sm font-medium text-gray-700">Companies</label>
                <select wire:model="companies" id="companies" name="companies" autocomplete="companies" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" multiple>
                    <option>Select Company</option>
                    @foreach($allCompanies as $company)
                        <option value="{{$company->id}}">{{ $company->name }}</option>
                    @endforeach
                </select>
                @error('company_id') <span class="text-danger">{{ $message }}</span> @enderror
            </div>

        </div>
        <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
            <button wire:click.prevent="store()" type="button" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                Save
            </button>
        </div>
    </div>
</form>
