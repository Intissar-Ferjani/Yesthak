<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cagnotte;
use App\Models\CrudCategorie;
use Illuminate\Support\facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;


class CagnotteController extends Controller
{
    public function rules()
    {
        return [
            'category_id' => 'required',
            'title' => 'required|string|max:255|unique:cagnottes,title',
            'amount' => 'nullable|numeric|min:5|max:999999',
            'description' => 'required|string|max:500',
            'photo' => 'nullable|image|mimes:png,jpg,jpeg,webp|max:2048',
        ];
    }

    public $messages = [
        'category_id.required' => 'Il faut choisir une Catégorie !',
        'title.required' => 'Veuillez saisir un Titre',
        'title.unique' => 'Titre déjà utilisé, veuillez choisir un autre.',
        'amount.numeric' => 'Le montant doit être un nombre.',
        'amount.min' => 'Le montant doit être d\'au moins :min.',
        'amount.max' => 'Le montant ne peut pas dépasser :max.',
        'description.required' => 'Veuillez saisir une description',
        'photo.image' => 'Le fichier doit être une image.',
        'photo.mimes' => 'Le fichier doit être de type :png, :jpg, :jpeg ou :webp.',
        'photo.max' => 'La taille de l\'image ne doit pas dépasser :max kilo-octets.',
    ];   

    // ------------ admin side ------------------------
    public function index() {
        $cruds = CrudCategorie::all();
        $pots = Cagnotte::simplePaginate(5);
        
        return view('admin.cagnottes.showCagnottes', compact('pots', 'cruds'));
    }

    public function create()
    {
        $cruds = CrudCategorie::all();
        return view('admin.cagnottes.addPot', compact('cruds'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate($this->rules(), $this->messages);

        $user_id = Auth::id();

        $photoPath = $request->photo ? $request->photo->store('photos', 'public') : 'public/uploads/donation-box.jpg';

        $pot = Cagnotte::create([
            'user_id' => $user_id,
            'category_id' => $validatedData['category_id'], 
            'title' => $validatedData['title'],
            'amount' => $validatedData['amount'],
            'photo' => $photoPath,
            'description' => $validatedData['description'],
        ]);

        return redirect()->route('show_cagnottes', ['id' => $pot->id])->with('message', 'Créé avec succès');
    }


    public function edit($id) {
        $pot = Cagnotte::find($id);
        $cruds = CrudCategorie::all();
        
        return view('admin.cagnottes.showCagnottes', compact('pot', 'cruds'));
    }
    

    public function update(Request $request, $id)
    {
        $pot = Cagnotte::findOrFail($id);
    
        $request->validate([
            'title' => 'required|string|max:255',
            'photo' => 'nullable|image|mimes:png,jpg,jpeg,webp|max:2048',
        ]);

       
        if ($request->hasFile('photo')) {
            $pot->photo = $request->photo ? $request->photo->store('photos', 'public') : 'public/uploads/donation-box.jpg';   
        }   
    
        $pot->title = $request->title;
        $pot->amount = $request->amount;
        $pot->category_id = $request->category_id;
        $pot->description = $request->description;
        
        $pot->save();
    
        return redirect()->route('cagnottes.index')->with('message', 'Mis à jour avec succès');
    }
    

      
    public function destroy($id)
    {
        $pot = Cagnotte::find($id);
        $pot->delete();
        return redirect()->back()->with('message', 'Cagnotte supprimée avec succès');
    }

    public function bulkDelete()
    {
        Cagnotte::truncate();
        return redirect(route('cagnottes.index'))->with('message', 'Éléments sélectionnés supprimés!');
    }

    public function search(Request $request)
    {
        $cruds = CrudCategorie::all();

        if ($request->has('searchName')) {
            $title = $request->input('searchName');
            
            $pot = Cagnotte::where('title', 'like', "%{$title}%")
                 ->get();

            return view('admin.cagnottes.searchPot', compact('pot', 'cruds'));
        }

        return redirect(route('cagnottes.index'))->with('error', 'Cagnotte introuvable!');
    }    
}
