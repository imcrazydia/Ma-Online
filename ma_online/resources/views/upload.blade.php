<x-app-layout>
    <link rel="stylesheet" href="{{ asset('css/style.css')}}">
    <div class="py-12">
        @if ($message = Session::get('fail'))
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-red-600 overflow-hidden shadow-xl sm:rounded-lg mb-10">
                    <p class="text-white px-5 sm:py-3 py-5">{{ $message }}</p>
                </div>
            </div>
        @endif
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="mt-5 md:mt-0 md:col-span-2">
                <form action="{{ route('create') }}" method="POST">
                    @csrf

                    <div class="px-4 py-5 space-y-6 sm:p-6">
                        <div class="grid grid-cols-1 gap-6">
                            <div class="col-span-3 sm:col-span-2">
                                <label for="video_link" class="block text-sm font-medium text-ma-white">
                                    Link invoeren
                                </label>
                                <div class="mt-1 flex rounded-md shadow-sm">
                                    <input type="text" name="video_link" id="video_link"
                                           class="focus:ring-lightgreen-100 focus:border-lightgreen-100 flex-1 block w-full bg-ma-light-gray sm:text-sm"
                                           placeholder="https://www.youtube.com/" maxlength="245">
                                </div>
                                @if ($errors->has('video_link'))
                                    <span class="text-red-600">{{ $errors->first('video_link') }}</span>
                                @endif
                                <p class="mt-2 text-sm font-bold text-white">
                                    Alleen youtube links
                                </p>
                            </div>
                            <div class="text-right">
                                <button type="submit"
                                        class="inline-flex items-center px-4 py-2 bg-magenta-100
hover:bg-lightgreen-100 transition-all border border-transparent .border-radius-2px font-semibold text-xs text-white
 tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring
 focus:ring-gray-300 disabled:opacity-25 transition">
                                    Doorgaan
                                </button>
                            </div>
                        </div>
                    </div>
                </form>

                @if(isset($video))
                    <div class="mt-5 md:mt-0 md:col-span-2">
                        <form action="{{ route('store') }}" method="POST">
                            @csrf

                            <div class="px-4 py-5 space-y-6 sm:p-6">
                                <div class="grid grid-cols-3 gap-6">
                                    <div class="col-span-3 sm:col-span-2">
                                        <label for="video_link" class="block text-sm font-medium text-white">
                                            Thumbnail
                                        </label>
                                        <div class="mt-1 flex rounded-md shadow-sm">
                                            <img src="https://img.youtube.com/vi/{{ $video->items['0']->id }}/0.jpg"
                                                 alt="">
                                            <input type="hidden" name="video_id" id="video_id"
                                                   value="{{ $video->items['0']->id }}">
                                            <input type="hidden" name="duration" id="duration"
                                                   value="{{ $video->items['0']->contentDetails->duration }}">
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
                                                   class="focus:ring-lightgreen-100 focus:border-lightgreen-100 flex-1 block w-full text-ma-white sm:text-sm bg-ma-light-gray"
                                                   value="{{ $video->items['0']->snippet->title }}" maxlength="245">
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
                                        <textarea id="description" name="description" rows="5" maxlength="3990"
                                                  class="focus:ring-lightgreen-100 focus:border-lightgreen-100 flex-1 block w-full text-ma-white sm:text-sm bg-ma-light-gray">
                                            {{ $video->items['0']->snippet->description }}
                                        </textarea>
                                    </div>
                                    <p class="mt-2 text-sm text-white">
                                        @if ($errors->has('description'))
                                            <span class="text-danger">{{ $errors->first('description') }}</span>
                                        @endif
                                    </p>
                                </div>

                                <div>
                                    <label for="tags" class="block text-sm font-medium text-white">
                                        Tags
                                    </label>
                                    <div class="mt-1">
                                        <textarea id="tags" name="tags" rows="3" maxlength="245"
                                                  class="focus:ring-lightgreen-100 focus:border-lightgreen-100 flex-1 block w-full text-ma-white sm:text-sm bg-ma-light-gray"
                                                  placeholder="tag, tag"></textarea>
                                    </div>
                                    <p class="mt-2 text-sm text-white">
                                        @if ($errors->has('tags'))
                                            <span
                                                class="text-danger text-gray-500 font-light text-sm">{{ $errors->first('tags') }}</span>
                                        @endif
                                        Elke tag dient ingevoerd te worden met een , om de tag te onderscheiden.
                                    </p>
                                </div>
                            </div>
                            <div class="px-4 py-3 text-right sm:px-6">
                                <button type="submit"
                                        class="inline-flex items-center px-4 py-2 bg-magenta-100
hover:bg-lightgreen-100 transition-all border border-transparent .border-radius-2px font-semibold text-xs text-white
 tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring
 focus:ring-gray-300 disabled:opacity-25 transition">
                                    Upload
                                </button>
                            </div>
                        </form>
                    </div>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>
