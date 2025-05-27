<x-app-layout>
    <h1>Nieuwe FAQ-categorie</h1>

    <form method="POST" action="{{ route('admin.faq-categorieen.store') }}">
        @csrf
        <label>Naam:</label><br>
        <input type="text" name="name" required><br><br>
        <button type="submit">Opslaan</button>
    </form>
</x-app-layout>
