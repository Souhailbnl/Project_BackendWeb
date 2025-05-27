<x-app-layout>
    <h1>Profiel bewerken</h1>

    @if(session('success'))
        <p style="color: green">{{ session('success') }}</p>
    @endif

    <form method="POST" action="{{ route('profile.update') }}" enctype="multipart/form-data">
        @csrf

        <label>Naam:</label><br>
        <input type="text" name="name" value="{{ old('name', $user->name) }}" required><br><br>

        <label>Verjaardag:</label><br>
        <input type="date" name="birthdate" value="{{ old('birthdate', $user->birthdate) }}"><br><br>

        <label>Over mij:</label><br>
        <textarea name="bio" rows="5">{{ old('bio', $user->bio) }}</textarea><br><br>

        <label>Profielfoto:</label><br>
        <input type="file" name="avatar"><br><br>

        @if ($user->avatar)
            <img src="{{ asset('storage/' . $user->avatar) }}" width="150">
        @endif

        <br><br>
        <button type="submit">Opslaan</button>
    </form>
</x-app-layout>
