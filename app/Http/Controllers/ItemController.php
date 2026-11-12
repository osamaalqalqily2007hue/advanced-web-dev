<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    public function index()
    {
        $items = Item::all();
        return view('items.index', compact('items'));
    }

    public function create()
    {
        return view('items.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required|numeric',
        ]);

        Item::create($request->all());

        return redirect()->route('items.index')->with('success', 'تم إضافة العنصر بنجاح!');
    }

    // عرض صفحة تعديل العنصر
    public function edit(Item $item)
    {
        return view('items.edit', compact('item'));
    }

    // حفظ التعديلات في قاعدة البيانات
    public function update(Request $request, Item $item)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required|numeric',
        ]);

        $item->update($request->all());

        return redirect()->route('items.index')->with('success', 'تم تحديث بيانات العنصر بنجاح!');
    }

    // حذف العنصر من قاعدة البيانات
    public function destroy(Item $item)
    {
        $item->delete();

        return redirect()->route('items.index')->with('success', 'تم حذف العنصر بنجاح!');
    }
}