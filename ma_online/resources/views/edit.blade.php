<x-app-layout>
    <link rel="stylesheet" href="{{ asset('css/style.css')}}">
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="mt-5 md:mt-0 md:col-span-2">
                <div class="mt-5 md:mt-0 md:col-span-2">
                    @foreach ($videos as $video)
                        <form action="{{ route('update') }}" method="POST">
                            @csrf

                            <div class="px-4 py-5 space-y-6 sm:p-6">
                                <div class="grid grid-cols-3 gap-6">
                                    <div class="col-span-3 sm:col-span-2">
                                        <label for="video_link" class="block text-sm font-medium text-white">
                                            Thumbnail
                                        </label>
                                        <div class="mt-1 flex rounded-md shadow-sm">
                                            <img src="https://img.youtube.com/vi/{{ $video->video_id }}/0.jpg" alt="">
                                            <input type="hidden" name="id" id="id"
                                                   value="{{ $video->id }}">
                                        </div>
                                    </div>
                                </div>

                                <div class="grid grid-cols-3 gap-6">
                                    <div class="col-span-3 sm:col-span-2">
                                        <label for="title" class="block text-sm font-medium text-white">
                                            Titel
                                        </label>
                                        <div class="mt-1 flex rounded-md shadow-sm">
                                            <input type="text" name="title" id="title"
                                                   class="focus:ring-indigo-500 focus:border-indigo-500 flex-1 block w-full text-ma-white sm:text-sm bg-ma-light-gray"
                                                   value="{{ $video->title }}" maxlength="245">
                                        </div>
                                        <p class="mt-2 text-sm text-white">
                                            @if ($errors->has('title'))
                                                <span class="text-danger">{{ $errors->first('title') }}</span>
                                            @endif
                                        </p>
                                    </div>
                                </div>

                                <div>
                                    <label for="description" class="block text-sm font-medium text-white">
                                        Beschrijving
                                    </label>
                                    <div class="mt-1">
                                        <textarea id="description" name="description" rows="5" maxlength="245"
                                                  class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 mt-1 block w-full sm:text-sm bg-ma-light-gray">
                                                {{ $video->description }}
                                            </textarea>
                                    </div>
                                    <p class="mt-2 text-sm text-white">
                                        @if ($errors->has('description'))
                                            <span class="text-danger">{{ $errors->first('description') }}</span>
                                        @endif
                                    </p>
                                </div>
                            </div>
                            <div class="px-4 py-3 text-right sm:px-6">
                                <a href="{{ route('delete', ['user'=>$video->user_id, 'id'=>$video->id]) }}"
                                   class="inline-flex items-center px-4 py-2 bg-red-600
hover:bg-red-500 transition-all border border-transparent border-radius-2px font-semibold text-xs text-white
 tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring
 focus:ring-gray-300 disabled:opacity-25 transition">
                                    Verwijderen
                                </a>
                                <button type="submit"
                                        class="inline-flex items-center px-4 py-2 bg-lightgreen-100
hover:bg-magenta-100 transition-all border border-transparent border-radius-2px font-semibold text-xs text-white
 tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring
 focus:ring-gray-300 disabled:opacity-25 transition">
                                    <span class="">Toepassen</span>
                                </button>
                            </div>
                        </form>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
