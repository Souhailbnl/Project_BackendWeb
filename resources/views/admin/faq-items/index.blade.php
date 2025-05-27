<x-app-layout>
    <h1>FAQ-vragen</h1>

    <a href="{{ route('admin.faq-vragen.create') }}">➕ Nieuwe vraag toevoegen</a>

    @if(session('success'))
        <p style="color: green">{{ session('success') }}</p>
    @endif

    <ul>
        @foreach ($faqItems as $item)
            <li>
                <strong>{{ $item->category->name }}</strong> — {{ $item->question }}

                <a href="{{ route('admin.faq-vragen.edit', $item->id) }}">✏️ Bewerken</a>

                <form action="{{ route('admin.faq-vragen.destroy', $item->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" onclick="return confirm('Verwijder deze vraag?')">🗑️ Verwijderen</button>
                </form>
            </li>
        @endforeach
    </ul>
</x-app-layout>

