<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class NewsController extends Controller
{
    public function index()
    {
        $news = News::latest()->get();
        return view('admin.news.index', compact('news'));
    }

    public function create()
    {
        return view('admin.news.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'published_at' => 'required|date',
            'image' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('news', 'public');
        }

        News::create($data);

        return redirect()->route('admin.nieuws.index')->with('success', 'Nieuwsbericht toegevoegd!');
    }

    public function edit(News $nieuws)
    {
        return view('admin.news.edit', ['news' => $nieuws]);
    }

    public function update(Request $request, News $nieuws)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'published_at' => 'required|date',
            'image' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('image')) {
            if ($nieuws->image) {
                Storage::disk('public')->delete($nieuws->image);
            }
            $data['image'] = $request->file('image')->store('news', 'public');
        }

        $nieuws->update($data);

        return redirect()->route('admin.nieuws.index')->with('success', 'Nieuwsbericht bijgewerkt!');
    }

    public function destroy(News $nieuws)
    {
        if ($nieuws->image) {
            Storage::disk('public')->delete($nieuws->image);
        }

        $nieuws->delete();

        return redirect()->route('admin.nieuws.index')->with('success', 'Nieuwsbericht verwijderd!');
    }
}
