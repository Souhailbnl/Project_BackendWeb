<x-app-layout>
    <h1>{{ $user->name }}</h1>

    @if ($user->avatar)
        <img src="{{ asset('storage/' . $user->avatar) }}" width="150"><br>
    @endif

    <p><strong>Verjaardag:</strong> {{ $user->birthdate }}</p>
    <p><strong>Over mij:</strong><br>{{ $user->bio }}</p>
</x-app-layout>
