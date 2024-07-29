<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CrudCategorie;
use Illuminate\Support\Facades\DB;

class CrudCategorieController extends Controller
{
    public function index()
    {
        $cruds = CrudCategorie::simplePaginate(5);
        return view('admin.categories.showCategories', compact('cruds'));
    }

    public function create()
    {
        return view('admin.categories.add');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255'
        ]);

        CrudCategorie::create($request->all());
        return redirect()->back()->with('message', 'Créé avec succès');
    }

    public function edit($id)
    {
        $category = CrudCategorie::find($id);
        return view('admin.categories.edit', compact('category'));
    }

    public function update(Request $request, $id)
    {
        $category = CrudCategorie::find($id);

        $request->validate([
            'name' => 'required|max:255'
        ]);

        $category->update($request->all());
        return redirect(route('categories.index'))->with('message', 'Mis à jour avec succés');
    }

    public function destroy($id)
    {
        $category = CrudCategorie::find($id);
        $category->delete();
        return redirect()->back()->with('message', 'Catégorie supprimée avec succès');
    }

    public function bulkDelete()
    {
        CrudCategorie::truncate();
        return redirect(route('categories.index'))->with('message', 'Éléments sélectionnés supprimés!');
    }

    public function search(Request $request)
    {
        if ($request->has('searchName')) {
            $name = $request->input('searchName');

            $category = CrudCategorie::where('name', 'like', "%{$name}%")->get();

            return view('admin.categories.search', compact('category'));
        }

        return redirect(route('categories.index'))->with('error', 'Catégorie introuvable!');
    }
}
