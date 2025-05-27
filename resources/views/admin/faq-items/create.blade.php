<x-app-layout>
    <h1>Nieuwe FAQ-vraag</h1>

    @if ($errors->any())
        <div style="color: red">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('admin.faq-vragen.store') }}">
        @csrf

        <label for="faq_category_id">Categorie:</label><br>
        <select name="faq_category_id" required>
            @foreach ($categories as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
            @endforeach
        </select><br><br>

        <label for="question">Vraag:</label><br>
        <input type="text" name="question" value="{{ old('question') }}" required><br><br>

        <label for="answer">Antwoord:</label><br>
        <textarea name="answer" required>{{ old('answer') }}</textarea><br><br>

        <button type="submit">Opslaan</button>
    </form>
</x-app-layout>
