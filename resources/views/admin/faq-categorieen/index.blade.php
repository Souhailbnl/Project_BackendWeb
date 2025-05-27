<x-app-layout>
    <h1>FAQ-categorieën</h1>

    <a href="{{ route('admin.faq-categorieen.create') }}">➕ Nieuwe categorie toevoegen</a>

    @if(session('success'))
        <p style="color: green">{{ session('success') }}</p>
    @endif

    <ul>
        @foreach ($faqCategories as $category)
            <li>
                <strong>{{ $category->name }}</strong>
                <a href="{{ route('admin.faq-categorieen.edit', $category->id) }}">✏️ Bewerken</a>
                <form action="{{ route('admin.faq-categorieen.destroy', $category->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button onclick="return confirm('Verwijder deze categorie?')">🗑️ Verwijderen</button>
                </form>
            </li>
        @endforeach
    </ul>
</x-app-layout>
