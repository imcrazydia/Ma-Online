<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tightt">
            <span>
                {{ __('Tags lijst') }}
            </span>
        </h2>
    </x-slot>

    <div class="py-12 overflow-x-auto overflow-y-auto">
        @if ($message = Session::get('success'))
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-green-600 overflow-hidden shadow-xl sm:rounded-lg mb-10">
                    <p class="text-white px-5 sm:py-3 py-5">{{ $message }}</p>
                </div>
            </div>
        @endif
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div>
                <table class="min-w-full table-aut">
                    <thead class="justify-between">
                    <tr>
                        <th class="py-2 text-left">
                            <span class="text-white">Titel:</span>
                        </th>
                        <th class="pr-2">
                            <span class="text-white">Hoe vaak gebruikt:</span>
                        </th>

                        <th class="py-2">
                            <span class="text-white">Datum geupload:</span>
                        </th>

                        <th class="py-2">
                            @if ($emptyTags === 0)
                                <span class="text-white">
                                    {{ $emptyTags }} Lege tags
                                </span>
                            @else
                                <a href="{{ route('deleteEmptyTags') }}"
                                    class="bg-red-600  inline-block py-2 px-4 border border-transparent
                                            shadow-sm text-sm font-medium border-radius-2px text-white focus:outline-none focus:ring-2
                                            focus:ring-offset-2 focus:ring-red-600 hover:bg-red-500 transition-all">
                                    <span>{{ $emptyTags }} Lege tags</span>
                                    <i class="far fa-trash-alt"></i>
                                </a>
                            @endif
                        </th>
                    </tr>
                    </thead>
                    <tbody class="bg-gray-200 font-normal">
                    @foreach ($tags as $tag)
                        <tr class="table-background text-white">
                            <td class="py-2">
                                <span
                                    class="text-center ml-2">{{\Illuminate\Support\Str::limit($tag->tag_title, $limit = 40, $end = '...')}}</span>
                            </td>
                            <td class="px-16 py-2 text-center">
                                <span>{{ $tag->amount_used }}</span>
                            </td>
                            <td class="px-14 py-2 text-center">
                                <span>{{ $tag->created_at->format('d-m-Y') }}</span>
                            </td>
                            <td class="pl-16 py-2 text-center">
                                @if ($tag->amount_used > 0)
                                    <a href="{{ route('deleteTag', ['id'=>$tag->id]) }}"
                                        onclick="return confirm('Weet je zeker dat je de tag {{$tag->tag_title}}, wilt verwijderen?')"
                                        class="bg-red-600  inline-flex justify-center py-2 px-4 border border-transparent
                                                shadow-sm text-sm font-medium border-radius-2px text-white focus:outline-none focus:ring-2
                                                focus:ring-offset-2 focus:ring-red-600 hover:bg-red-500 transition-all">
                                        <i class="far fa-trash-alt"></i>
                                    </a>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
