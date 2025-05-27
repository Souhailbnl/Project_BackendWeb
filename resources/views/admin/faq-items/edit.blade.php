<x-app-layout>
    <h1>FAQ-vraag bewerken</h1>

    <form method="POST" action="{{ route('admin.faq-vragen.update', $faqItem->id) }}">
        @csrf
        @method('PUT')

        <label for="category_id">Categorie:</label><br>
        <select name="category_id" required>
            @foreach($faqCategories as $category)
                <option value="{{ $category->id }}" {{ $faqItem->category_id == $category->id ? 'selected' : '' }}>
                    {{ $category->name }}
                </option>
            @endforeach
        </select><br><br>

        <label for="question">Vraag:</label><br>
        <input type="text" name="question" value="{{ old('question', $faqItem->question) }}" required><br><br>

        <label for="answer">Antwoord:</label><br>
        <textarea name="answer" rows="5" required>{{ old('answer', $faqItem->answer) }}</textarea><br><br>

        <button type="submit">Bijwerken</button>
    </form>
</x-app-layout>
