<?php

namespace App\Http\Controllers;

use App\Models\Stuclass;
use Illuminate\Http\Request;

class StuclassController extends Controller
{
    public function index()
    {
        $stuclasses = Stuclass::all();
        return view('stuclasses', compact('stuclasses'));
    }

    public function create()
    {
        return view('createclas');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'credits' => 'required|integer',
        ]);

        Stuclass::create($request->all());

        return redirect()->route('stuclasses.index')
            ->with('success', 'Class created successfully.');
    }

    public function edit(Stuclass $stuclass)
    {
        return view('editclass', compact('stuclass'));
    }

    public function update(Request $request, Stuclass $stuclass)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'credits' => 'required|integer',
        ]);

        $stuclass->update($request->all());

        return redirect()->route('stuclasses.index')
            ->with('success', 'Class updated successfully.');
    }

    public function destroy(Stuclass $stuclass)
    {
        $stuclass->delete();

        return redirect()->route('stuclasses.index')
            ->with('success', 'Class deleted successfully.');
    }
}
