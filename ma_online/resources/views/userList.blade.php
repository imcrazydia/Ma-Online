<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tightt">
            <span>
                {{ __('Gebruiker lijst') }}
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
                <table class="min-w-full table-auto text-white">
                    <thead class="justify-between">
                    <tr>
                        <th class="px-16 py-2">
                            <span class="text-white">Gebruiker:</span>
                        </th>
                        <th class="px-16 py-2">
                            <span class="text-white">Email:</span>
                        </th>
                        <th class="px-13 py-2">
                            <span class="text-white">Rol:</span>
                        </th>

                        <th class="px-16 py-2">
                            <span class="text-white">Datum geregistreerd:</span>
                        </th>

                        <th class="px-16 py-2">
                        </th>
                    </tr>
                    </thead>
                    <tbody class="bg-gray-200">
                    @foreach ($users as $user)
                        <tr class="table-background text-white">
                            <td class="py-2">
                                <a href="{{ route('profiel', ['user'=>$user->name]) }}" class="hover:text-lightgreen-100">
                                    <img class="h-8 w-8 rounded-full object-cover inline-block"
                                    src="{{ $user->profile_photo_path }}"
                                    alt="{{ $user->name }}"/>

                                    {{ $user->name }}
                                    @if ($user->role == 1)
                                        <i class="fas fa-star text-magenta-100"></i>
                                    @elseif ($user->role == 2)
                                        <i class="fas fa-check text-lightgreen-100"></i>
                                    @endif
                                </a>
                            </td>
                            <td class="px-16 py-2">
                                <span>{{ $user->email }}</span>
                            </td>
                            <td class="px-13 py-2">
                                <span>{{ App\Models\Role::where(['id' => $user->role])->pluck('role_name')->first() }}</span>
                                <a href="{{ route('editUser', ['id'=>$user->id]) }}">
                                    <i class="fas fa-pen text-lightgreen-100 hover:text-magenta-100 transition-all"></i>
                                </a>
                            </td>
                            <td class="px-16 py-2">
                                <span>{{ $user->created_at === NULL ? "00-00-0000" : $user->created_at->format('d-m-Y') }}</span>
                            </td>
                            <td class="pl-16 py-2">
                                <a href="{{ route('deleteUser', ['id'=>$user->id]) }}"
                                   onclick="return confirm('Weet je zeker dat je de gebruiker {{$user->name}}, wilt verwijderen?')"
                                   class="bg-red-600  inline-flex justify-center py-2 px-4 border border-transparent
                                    shadow-sm text-sm font-medium border-radius-2px text-white focus:outline-none focus:ring-2
                                     focus:ring-offset-2 focus:ring-red-600 hover:bg-red-500 transition-all"><i
                                        class="far fa-trash-alt"></i>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
