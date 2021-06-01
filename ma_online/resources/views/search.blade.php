<x-app-layout>
    <link rel="stylesheet" href="{{ asset('css/style.css')}}">
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if($results->isNotEmpty())
            <h1>Gezocht naar: "{{ $searchKey }}"</h1>
            <p>Aantal resultaten gevonden: {{ $searchCount }}</p>
            <div class="breakpoint-phone overflow-hidden text-ma-white grid grid-cols-3 gap-6">
                @foreach ($results as $result)
                <div class="single-video">
                    <div class="single-video-inner p-4">
                        <a href="{{ route('video', ['id'=>$result->id]) }}">
                            <div
                                class="thumbnail-controller relative hover:text-magenta-100 transition-all hover:text-opacity-80">
                                <div class="thumbnail-inner absolute">
                                    <i class="fas fa-play"></i>
                                </div>
                                <img src="https://img.youtube.com/vi/{{ $result->video_id }}/0.jpg"
                                    alt="{{ __($result->title) }}">
                            </div>
                            <h2 class="video-title text-white font-bold pt-4">{{ __($result->title) }}</h2>
                        </a>
                        <p
                            class="text-white text-sm border-2 border-transparent rounded-full focus:outline-none focus:border-gray-300 transition inline-block float-left">
                            <img class="h-8 w-8 rounded-full object-cover inline-block"
                                src="{{ App\Models\User::where(['id' => $result->user_id])->pluck('profile_photo_path')->first() }}"
                                alt="{{ App\Models\User::where(['id' => $result->user_id])->pluck('name')->first() }}" />
                            <a class="mb-3 text-ma-white text-xs inline-block ml-2 mt-2"
                                href="{{ route('profiel', ['user'=>App\Models\User::where(['id' => $result->user_id])->pluck('name')->first()]) }}">
                                {{ App\Models\User::where(['id' => $result->user_id])->pluck('name')->first() }}
                            </a>
                        </p>
                    </div>
                </div>
                @endforeach
            @else
                <div>
                    <h2>Geen resultaten gevonden met: "{{ $searchKey }}"</h2>
                </div>
            @endif
            </div>
        </div>
    </div>
</x-app-layout>
