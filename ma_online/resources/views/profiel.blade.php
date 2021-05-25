<x-app-layout>
    <x-slot name="header">
        <h2 class="profiel-name font-normal text-xl text-white leading-tight">
            <span>{{ Auth::user()->name }}</span>
        </h2>
    </x-slot>

    <div class="py-12">
        @if ($message = Session::get('success'))
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-green-600 overflow-hidden shadow-xl sm:rounded-lg mb-10">
                    <p class="text-white px-5 sm:py-3 py-5">{{ $message }}</p>
                </div>
            </div>
        @endif
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="breakpoint-phone overflow-hidden text-ma-white grid grid-cols-3 gap-6">
                @foreach ($videos as $video)
                    <div class="single-video">
                        <div class="single-video-inner p-4">
                            <a href="{{ route('video', ['id'=>$video->id]) }}">
                                <img src="https://img.youtube.com/vi/{{ $video->video_id }}/maxresdefault.jpg" alt="">
                                <h2 class="video-title text-white font-bold pt-4">{{ __($video->title) }}</h2>
                                <p class="text-white text-sm">
                                    {{ __($video->name) }}
                                    {{--                                    <pre>--}}
                                    {{--                                        <?php--}}
                                    {{--                                        print_r ($video);--}}
                                    {{--                                        ?>--}}
                                    {{--                                    </pre>--}}
                                </p>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</x-app-layout>
