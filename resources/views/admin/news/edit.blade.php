<x-app-layout>
    <h1>Nieuwsbericht bewerken</h1>

    <form method="POST" action="{{ route('admin.nieuws.update', $news->id) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <label>Titel:</label><br>
        <input type="text" name="title" value="{{ old('title', $news->title) }}" required><br><br>

        <label>Publicatiedatum:</label><br>
        <input type="date" name="published_at" value="{{ old('published_at', $news->published_at) }}" required><br><br>

        <label>Inhoud:</label><br>
        <textarea name="content" rows="5" required>{{ old('content', $news->content) }}</textarea><br><br>

        <label>Afbeelding:</label><br>
        <input type="file" name="image"><br>
        @if ($news->image)
            <img src="{{ asset('storage/' . $news->image) }}" width="150">
        @endif

        <br><br>
        <button type="submit">Bijwerken</button>
    </form>
</x-app-layout>

