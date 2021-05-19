<x-app-layout>
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
                    <p class="text-white">{{ $video->description }}</p>
                </div>
            </div>
        </div>
    @endforeach
</x-app-layout>
