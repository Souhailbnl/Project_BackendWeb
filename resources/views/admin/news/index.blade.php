<x-app-layout>
    <h1>Nieuwsbeheer</h1>

    <a href="{{ route('admin.nieuws.create') }}">➕ Nieuw bericht toevoegen</a>

    @if(session('success'))
        <p style="color: green">{{ session('success') }}</p>
    @endif

    <ul>
        @foreach ($news as $item)
            <li>
                <strong>{{ $item->title }}</strong> – {{ $item->published_at }}
                <br>
                <a href="{{ route('admin.nieuws.edit', $item->id) }}">✏️ Bewerken</a> |
                <form action="{{ route('admin.nieuws.destroy', $item->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button onclick="return confirm('Verwijder dit bericht?')">🗑️ Verwijderen</button>
                </form>
            </li>
        @endforeach
    </ul>
</x-app-layout>
