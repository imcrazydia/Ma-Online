<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
            {{ __('Profiel') }}
        </h2>
    </x-slot>

    <div class="py-12">
        @if ($message = Session::get('success'))
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-green-600 overflow-hidden shadow-xl sm:rounded-lg">
                    <p class="text-white px-5 sm:py-3 py-5">{{ $message }}</p>
                </div>
            </div>
        @endif
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="overflow-hidden sm:rounded-lg text-ma-white">
                @foreach ($videos as $video)
                    <img src="https://img.youtube.com/vi/{{ $video->video_id }}/0.jpg" alt="">
                    {{ $video->title }}
                    <br>
                @endforeach
            </div>
        </div>
    </div>
</x-app-layout>
