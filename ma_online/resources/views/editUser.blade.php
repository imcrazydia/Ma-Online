<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tightt">
            <span>
                {{ __('Gebruikers rol bewerken') }}
            </span>
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @foreach ($userData as $user)
            <h2>{{ $user->name }}</h2>
            <h2>Rol: {{ App\Models\Role::where(['id' => $user->role])->pluck('role_name')->first() }}</h2>

            @foreach ($roles as $role)
                @if ($user->role == $role->id)
                    <span class="text-magenta-100">{{ $role->role_name }}</span>
                @else
                    <form action="{{ route('updateUser', ['id'=>$user->id]) }}" method="POST">
                        @csrf

                        <label for="role_name" class="block text-sm font-medium text-white">
                            {{ $role->role_name }}
                        </label>
                        <input type="hidden" name="role_id" id="role_id"
                        value="{{ $role->id }}">
                        @if ($role->id == 1)
                            <button type="submit"
                            onclick="return confirm('Weet je zeker dat je de gebruiker een {{$role->role_name}}, wilt maken?')"
                            class="bg-ma-green inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                <span class="">Toepassen</span>
                            </button>
                        @else
                            <button type="submit"
                            class="bg-ma-green inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                <span class="">Toepassen</span>
                            </button>
                        @endif
                    </form>
                @endif
            @endforeach

            @endforeach
        </div>
    </div>
</x-app-layout>
