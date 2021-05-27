<x-app-layout>
    <link rel="stylesheet" href="{{ asset('css/style.css')}}">
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="breakpoint-phone overflow-hidden text-ma-white grid grid-cols-3 gap-6">
                @if($results->isNotEmpty())
                    @foreach ($results as $result)
                        <div class="single-video">
                            <div class="single-video-inner p-4">
                                <a href="{{ route('video', ['id'=>$result->id]) }}">
                                    <img src="https://img.youtube.com/vi/{{ $result->video_id }}/maxresdefault.jpg" alt="">
                                    <h2 class="video-title text-white font-bold pt-4">{{ __($result->title) }}</h2>
                                </a>
                                <p class="text-white text-sm">
                                    <a href="{{ route('profiel', ['user'=>App\Models\User::where(['id' => $result->user_id])->pluck('name')->first()]) }}">
                                        {{ App\Models\User::where(['id' => $result->user_id])->pluck('name')->first() }}
                                    </a>
                                </p>
                            </div>
                        </div>
                    @endforeach
                @else
                    <div>
                        <h2>No posts found</h2>
                    </div>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>
