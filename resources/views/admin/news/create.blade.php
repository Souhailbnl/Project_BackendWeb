<x-app-layout>
    <h1>Nieuw nieuwsbericht toevoegen</h1>

    <form method="POST" action="{{ route('admin.nieuws.store') }}" enctype="multipart/form-data">
        @csrf

        <label>Titel:</label><br>
        <input type="text" name="title" required><br><br>

        <label>Publicatiedatum:</label><br>
        <input type="date" name="published_at" required><br><br>

        <label>Inhoud:</label><br>
        <textarea name="content" rows="5" required></textarea><br><br>

        <label>Afbeelding:</label><br>
        <input type="file" name="image"><br><br>

        <button type="submit">Opslaan</button>
    </form>
</x-app-layout>

