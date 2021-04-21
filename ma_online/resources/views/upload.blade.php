<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Upload') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if(session('status'))
                <div class="px-4 py-5 bg-green-400  space-y-6 sm:p-6">
                    {{ session('status') }}
                </div>
            @endif
            <div class="mt-5 md:mt-0 md:col-span-2">
              <form action="{{ route('store_video') }}" method="POST">
                @csrf

                <div class="shadow sm:rounded-md sm:overflow-hidden">
                  <div class="px-4 py-5 bg-white space-y-6 sm:p-6">
                    <div class="grid grid-cols-3 gap-6">
                      <div class="col-span-3 sm:col-span-2">
                        <label for="video_link" class="block text-sm font-medium text-gray-700">
                          Video link
                        </label>
                        <div class="mt-1 flex rounded-md shadow-sm">
                          <input type="text" name="video_link" id="video_link" class="focus:ring-indigo-500 focus:border-indigo-500 flex-1 block w-full rounded-md sm:text-sm border-gray-300" placeholder="https://www.youtube.com/">
                        </div>
                        <p class="mt-2 text-sm text-gray-500">
                            Alleen youtube links
                        </p>
                      </div>
                    </div>

                    <div class="grid grid-cols-3 gap-6">
                        <div class="col-span-3 sm:col-span-2">
                          <label for="title" class="block text-sm font-medium text-gray-700">
                            Titel
                          </label>
                          <div class="mt-1 flex rounded-md shadow-sm">
                            <input type="text" name="title" id="title" class="focus:ring-indigo-500 focus:border-indigo-500 flex-1 block w-full rounded-md sm:text-sm border-gray-300">
                          </div>
                        </div>
                    </div>

                    <div>
                      <label for="description" class="block text-sm font-medium text-gray-700">
                        Beschrijving
                      </label>
                      <div class="mt-1">
                        <textarea id="description" name="description" rows="5" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 mt-1 block w-full sm:text-sm border-gray-300 rounded-md"></textarea>
                      </div>
                    </div>

                    <div>
                        <label for="tags" class="block text-sm font-medium text-gray-700">
                          Tags
                        </label>
                        <div class="mt-1">
                          <textarea id="tags" name="tags" rows="3" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 mt-1 block w-full sm:text-sm border-gray-300 rounded-md" placeholder="tag, tag"></textarea>
                        </div>
                        <p class="mt-2 text-sm text-gray-500">
                          Onderscheid de tags met een ,
                        </p>
                      </div>
                  </div>
                  <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                    <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                      Upload
                    </button>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
    </div>
</x-app-layout>
