<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tightt">
            <span>
                {{ __($user) }}
                @if (App\Models\User::where(['name' => $user])->pluck('role')->first() == 1)
                    <i class="fas fa-star text-magenta-100"></i>
                @elseif (App\Models\User::where(['name' => $user])->pluck('role')->first() == 2)
                    <i class="fas fa-check text-lightgreen-100"></i>
                @endif
            </span>
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
                                <div class="thumbnail-controller relative hover:text-magenta-100 transition-all hover:text-opacity-80">
                                    <div class="thumbnail-inner absolute">
                                        <i class="fas fa-play"></i>
                                    </div>
                                    <div class="thumb">
                                        <img src="https://img.youtube.com/vi/{{ $video->video_id }}/0.jpg" alt="">
                                    </div>
                                </div>
                                <h2 class="video-title text-white font-bold pt-4">{{ __($video->title) }}</h2>
                                <p class="mb-3 text-ma-white text-xs inline-block ml-2 mt-2">
                                    {{ __($user) }}
                                    @if (App\Models\User::where(['name' => $user])->pluck('role')->first() == 1)
                                        <i class="fas fa-star text-magenta-100"></i>
                                    @elseif (App\Models\User::where(['name' => $user])->pluck('role')->first() == 2)
                                        <i class="fas fa-check text-lightgreen-100"></i>
                                    @endif
                                </p>
                                @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                                    <button
                                        class="text-sm border-2 border-transparent rounded-full focus:outline-none focus:border-gray-300 transition inline-block float-left">
                                        <img class="h-7 w-7 rounded-full object-cover"
                                             src="{{ $profilePic }}" alt="{{ $user }}"/>
                                    </button>
                                @endif
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</x-app-layout>
