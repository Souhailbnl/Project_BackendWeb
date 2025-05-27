<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\FaqCategory;
use Illuminate\Http\Request;

class FaqCategoryController extends Controller
{
    public function index()
    {
        $faqCategories = FaqCategory::orderBy('name')->get();
        return view('admin.faq-categorieen.index', compact('faqCategories'));
    }

    public function create()
    {
        return view('admin.faq-categorieen.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        FaqCategory::create([
            'name' => $request->name,
        ]);

        return redirect()->route('admin.faq-categorieen.index')->with('success', 'Categorie toegevoegd!');
    }

    public function edit(FaqCategory $faqCategory)
    {
        return view('admin.faq-categorieen.edit', compact('faqCategory'));
    }

    public function update(Request $request, FaqCategory $faqCategory)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $faqCategory->update([
            'name' => $request->name,
        ]);

        return redirect()->route('admin.faq-categorieen.index')->with('success', 'Categorie bijgewerkt!');
    }

    public function destroy(FaqCategory $faqCategory)
    {
        $faqCategory->delete();

        return redirect()->route('admin.faq-categorieen.index')->with('success', 'Categorie verwijderd!');
    }
}

