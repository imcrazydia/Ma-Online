<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tightt">
            <span>
                {{ __('Video lijst') }}
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
            <div>
                <table class="min-w-full table-auto">
                    <thead class="justify-between">
                    <tr>
                        <th class="py-2 text-left">
                            <span class="text-white">Titel:</span>
                        </th>
                        <th class="py-2">
                            <span class="text-white">Tags:</span>
                        </th>
                        <th class="py-2">
                            <span class="text-white">Gebruiker:</span>
                        </th>

                        <th class="py-2">
                            <span class="text-white">Datum:</span>
                        </th>

                        <th class="py-2">
                        </th>
                    </tr>
                    </thead>
                    <tbody class="bg-gray-200 font-normal">
                    @foreach ($videos as $video)
                        <tr class="table-background text-white">
                            <td class="py-2">
                                <span
                                    class="text-center ml-2">{{\Illuminate\Support\Str::limit($video->title, $limit = 40, $end = '...')}}</span>
                            </td>
                            <td class="px-16 py-2">
                                <span>{{count(explode(',', $video->tags))}}</span>
                            </td>
                            <td class="px-16 py-2">
                                {{ App\Models\User::where(['id' => $video->user_id])->pluck('name')->first() }}
                                @if (App\Models\User::where(['id' => $video->user_id])->pluck('role')->first() == 1)
                                    <i class="fas fa-star text-magenta-100"></i>
                                @elseif (App\Models\User::where(['id' => $video->user_id])->pluck('role')->first() == 2)
                                    <i class="fas fa-check text-lightgreen-100"></i>
                                @endif
                            </td>
                            <td class="px-14 py-2">
                                <span>{{ $video->created_at->format('d-m-Y') }}</span>
                            </td>
                            <td class="pl-16 py-2">
                                <a href="{{ route('deleteVideo', ['id'=>$video->id]) }}"
                                   onclick="return confirm('Weet je zeker dat je de video {{$video->title}}, wilt verwijderen?')"
                                   class="bg-red-500 a inline-flex justify-center py-2 px-4 border border-transparent
                                    shadow-sm text-sm font-medium border-radius-2px text-white focus:outline-none focus:ring-2
                                     focus:ring-offset-2 focus:ring-red-500 hover:bg-red-400 transition-all"><i class="far fa-trash-alt"></i>

                                </a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
