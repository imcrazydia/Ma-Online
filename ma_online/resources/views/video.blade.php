<x-app-layout>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.3/css/all.css" integrity="sha384-SZXxX4whJ79/gErwcOYf+zWLeJdY/qpuqC4cAa9rOGUstPomtqpuNWT9wdPEn2fk" crossorigin="anonymous">
    @foreach ($videos as $video)
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-white leading-tight">
                {{ __($video->title) }}
            </h2>
        </x-slot>

        <div class="py-6">
            <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                <div class="youtube-video-container">
                    <iframe
                        width="560"
                        height="315"
                        src="https://www.youtube.com/embed/{{ $video->video_id }}?autoplay=1"
                        frameborder="0"
                        allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                        allowfullscreen
                    ></iframe>
                </div>
                <div class="py-6">
                    <div class="video-description">
                        <h2 class="text-ma-white font-bold text-2xl pb-3">
                            {{ __($video->title) }}
                            @if ($video->user_id == Auth::user()->id)
                                <button class="relative float-right m-1 bg-ma-green inline-flex justify-center py-1 px-4 border border-transparent
                            shadow-sm text-sm font-medium rounded-md text-white focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                    <a href="{{ route('edit', ['user'=>$video->user_id, 'id'=>$video->id]) }}"><i class="far fa-edit"></i><span>Bewerken</span></a>
                                </button>
                            @endif
                        </h2>
                        <p class="text-white text-sm hover:text-magenta-100 transition-all inline">
                            <a href="{{ route('profiel', ['user'=>$uploader]) }}">
                                {{ __($uploader) }}
                            </a>
                        </p>
                        <p class="text-ma-light-lighter-gray text-sm pt-2">{{ $video->description }}</p>

{{--                        @if ($video->user_id == Auth::user()->id)--}}
{{--                            <button class="float-right m-1 bg-ma-green mt-7 inline-flex justify-center py-1 px-4 border border-transparent--}}
{{--                            shadow-sm text-sm font-medium rounded-md text-white focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">--}}
{{--                                <a href="{{ route('edit', ['user'=>$video->user_id, 'id'=>$video->id]) }}"><i class="far fa-edit"></i><span class="ml-1">Bewerken</span></a>--}}
{{--                            </button>--}}
{{--                        @endif--}}
                    </div>
                    @endforeach

                    <div class="mt-4 flex">
                        @foreach ($tagNameList as $tag)
                            <form action="{{ route('tagSearch') }}" method="GET">
                                @csrf
                                <button type="submit"
                                        class="px-2 m-1 text-white bg-magenta-100 py-1 rounded-md hover:bg-gray-500 transition-all">{{ $tag->tag_title }}</button>
                                <input type="hidden" name="search" value="{{ $tag->tag_title }}">
                            </form>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

</x-app-layout>
