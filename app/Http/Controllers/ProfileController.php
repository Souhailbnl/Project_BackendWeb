<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    // 🧾 Publiek profiel tonen (bijv. /profiel/1)
    public function show(User $user)
    {
        return view('profile.show', compact('user'));
    }

    // ✏️ Eigen profiel bewerken (alleen als ingelogd)
    public function edit()
    {
        return view('profile.edit', ['user' => auth()->user()]);
    }

    // 💾 Profielgegevens opslaan (form submission)
    public function update(Request $request)
    {
        $user = auth()->user();

        // ✅ Validatie van het formulier
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'birthdate' => 'nullable|date',
            'bio' => 'nullable|string|max:1000',
            'avatar' => 'nullable|image|max:2048', // max 2MB
        ]);

        // 📁 Afbeelding uploaden (optioneel)
        if ($request->hasFile('avatar')) {
            $path = $request->file('avatar')->store('avatars', 'public');
            $data['avatar'] = $path;
        }

        // 📝 Gebruiker updaten
        $user->update($data);

        return redirect()->route('profile.edit')->with('success', 'Profiel bijgewerkt!');
    }
}
