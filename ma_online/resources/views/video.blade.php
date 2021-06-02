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
                            shadow-sm text-sm font-medium rounded-md text-white focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 hover:bg-magenta-100 transition-all">
                                    <a href="{{ route('edit', ['user'=>$video->user_id, 'id'=>$video->id]) }}"><i class="far fa-edit"></i><span>Bewerken</span></a>
                                </button>
                            @endif
                        </h2>
                        <p class="text-white text-sm hover:text-magenta-100 transition-all inline">
                            <a href="{{ route('profiel', ['user'=>$uploader]) }}">
                                {{ __($uploader) }}
                                @if (App\Models\User::where(['name' => $uploader])->pluck('role')->first() == 1)
                                    <i class="fas fa-star text-magenta-100"></i>
                                @elseif (App\Models\User::where(['name' => $uploader])->pluck('role')->first() == 2)
                                    <i class="fas fa-check text-lightgreen-100"></i>
                                @endif
                            </a>
                        </p>
                        <p class="text-ma-light-lighter-gray text-sm pt-2">{{ $video->description }}</p>
                    </div>
                    @endforeach

                    <div class="mt-4 flex flex-controller">
                        @foreach ($tagNameList as $tag)
                            <form class="" action="{{ route('tagSearch') }}" method="GET">
                                @csrf
                                <button type="submit"
                                        class="px-2 m-1 text-white bg-magenta-100 py-1 rounded-md hover:bg-lightgreen-100 transition-all">{{ $tag->tag_title }}</button>
                                <input type="hidden" name="search" value="{{ $tag->tag_title }}">
                            </form>
                        @endforeach
                    </div>

                    <div>
                        <h2 class="video-title text-white font-bold pt-4">Comments - {{ $commentAmount }}</h2>
                        @if ($errors->has('text'))
                            <span class="text-red-600">{{ $errors->first('text') }}</span>
                        @endif
                        <form action="{{ route('storeComment', ['id'=>$id]) }}" method="post">
                            @csrf
                            <input type="hidden" name="author" id="author"
                            value="{{ Auth::user()->name }}">
                            <textarea name="text" class="text-magenta-100 comment-text" placeholder="typ hier..." maxlength="500" required>{{ old('text') }}</textarea>
                            <button type="submit" class="px-4 py-2 text-white bg-magenta-100 rounded-md hover:bg-lightgreen-100 transition-all float-right">Comment</button>
                        </form>

                        <div class="mt-20">
                            @foreach ($comments as $comment)
                            <div class="mb-10">
                                <div class="flex">
                                    <img class="profile-picture object-cover @if ($uploader === $comment->author) border-solid border-2 border-magenta-100 @endif"
                                    src="{{ App\Models\User::where(['name' => $comment->author])->pluck('profile_photo_path')->first() }}"
                                    alt="{{ $comment->author }}" />
                                    <h2 class="self-center ml-2 text-white">
                                        {{ $comment->author }}
                                        @if (App\Models\User::where(['name' => $comment->author])->pluck('role')->first() == 1)
                                            <i class="fas fa-star text-magenta-100"></i>
                                        @elseif (App\Models\User::where(['name' => $comment->author])->pluck('role')->first() == 2)
                                            <i class="fas fa-check text-lightgreen-100"></i>
                                        @endif

                                        @if ($uploader === $comment->author)
                                            <span class="text-magenta-100">(Uploader)</span>
                                        @endif
                                        <span class="mt-2 ml-2 text-ma-light-gray comment-time">{{ \Carbon\Carbon::parse($comment->created_at)->diffForHumans() }}</span>
                                    </h2>
                                </div>
                                <div class="flex justify-between">
                                    <p class="mt-2 text-ma-light-gray">{{ $comment->text }}</p>

                                    @if (Auth::user()->name === $comment->author || Auth::user()->name === $uploader || Auth::user()->id === 1)
                                        <form action="{{ route('destroyComment', ['comment'=>$comment->id]) }}" method="post">
                                            @csrf
                                            <button type="submit"
                                                    onclick="return confirm('Weet je zeker dat je deze comment wilt verwijderen?')"
                                                    class="bg-red-600  inline-flex justify-center py-2 px-4 border border-transparent
                                                    shadow-sm text-sm font-medium border-radius-2px text-white focus:outline-none focus:ring-2
                                                    focus:ring-offset-2 focus:ring-red-600 hover:bg-red-500 transition-all">
                                                <i class="far fa-trash-alt"></i>
                                            </button>
                                        </form>
                                    @endif
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>

</x-app-layout>
