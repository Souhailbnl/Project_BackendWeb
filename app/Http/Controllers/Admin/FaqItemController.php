<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\FaqItem;
use App\Models\FaqCategory;
use Illuminate\Http\Request;

class FaqItemController extends Controller
{
public function index()
{
    $faqItems = FaqItem::with('category')->orderBy('created_at', 'desc')->get();
    return view('admin.faq-items.index', compact('faqItems'));
}


    public function create()
    {
        $categories = \App\Models\FaqCategory::orderBy('name')->get();
        return view('admin.faq-items.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'faq_category_id' => 'required|exists:faq_categories,id',
            'question' => 'required|string|max:255',
            'answer' => 'required|string',
        ]);
    
        \App\Models\FaqItem::create([
            'faq_category_id' => $request->faq_category_id,
            'question' => $request->question,
            'answer' => $request->answer,
        ]);
    
        return redirect()->route('admin.faq-vragen.index')
                         ->with('success', 'Vraag succesvol toegevoegd!');
    }
    

    public function edit(FaqItem $faqItem)
    {
        $faqCategories = FaqCategory::orderBy('name')->get();
        return view('admin.faq-items.edit', compact('faqItem', 'faqCategories'));
    }

    public function update(Request $request, FaqItem $faqItem)
    {
        $request->validate([
            'category_id' => 'required|exists:faq_categories,id',
            'question' => 'required|string|max:255',
            'answer' => 'required|string',
        ]);
    
        $faqItem->update($request->only('category_id', 'question', 'answer'));
    
        return redirect()->route('admin.faq-vragen.index')->with('success', 'Vraag bijgewerkt!');
    }
    

    public function destroy(FaqItem $faqVragen)
    {
        $faqVragen->delete();
        return redirect()->route('faq-vragen.index')->with('success', 'Vraag verwijderd!');
    }
}
