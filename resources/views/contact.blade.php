<x-app-layout>
    <h1>Contacteer ons</h1>

    @if (session('success'))
        <p style="color: green">{{ session('success') }}</p>
    @endif

    <form method="POST" action="{{ route('contact.send') }}">
        @csrf

        <label>Naam:</label><br>
        <input type="text" name="name" required><br><br>

        <label>E-mail:</label><br>
        <input type="email" name="email" required><br><br>

        <label>Bericht:</label><br>
        <textarea name="message" rows="5" required></textarea><br><br>

        <button type="submit">Verzenden</button>
    </form>
</x-app-layout>

