<x-app-layout>
    @foreach ($videos as $video)
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-white leading-tight">
                {{ __($video->title) }}
            </h2>
        </x-slot>

        <div class="py-6">
            <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8 bg-ma-light-gray">
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
                        </h2>
                        <p class="text-white text-sm pt-2 border-t-2">{{ $video->description }}</p>
                    </div>
                    @endforeach

                    <div class="py-3">
                        @foreach ($tagNameList as $tag)
                            <span class="text-white bg-magenta-100 py-1 px-2">{{ $tag->tag_title }}</span>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

</x-app-layout>
