<x-app-layout>
    <h1>Categorie bewerken</h1>

    <form method="POST" action="{{ route('admin.faq-categorien.update', ['faq_categorieen' => $faqCategory->id]) }}">
        @csrf
        @method('PUT')

        <label>Naam:</label><br>
        <input type="text" name="name" value="{{ old('name', $faqCategory->name) }}" required><br><br>

        <button type="submit">Opslaan</button>
    </form>
</x-app-layout>
