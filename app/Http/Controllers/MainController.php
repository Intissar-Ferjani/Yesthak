<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;
use App\Models\CrudCategorie;
use App\Models\Cagnotte;
use App\Models\User;
use App\Models\Contact;

class MainController extends Controller
{
    public function index() {
        $cruds = CrudCategorie::all();
        return view('home', compact('cruds'));
    }

    public function CreatePot() {
        $cruds = CrudCategorie::all();
        return view('CreatePot', compact('cruds'));
    }

    public function viewPots(Request $request) {
        $user = $request->user();
        $pots = $user->cagnottes()->get();
        return view('pots.viewPots', compact('pots'));
    }

    public function edit(Cagnotte $cagnotte)
    {
        $cruds = CrudCategorie::all();
        return view('pots.editPots', compact('cagnotte', 'cruds'));
    }

    public function update(Request $request, Cagnotte $cagnotte): RedirectResponse
    {
        if ($request->hasFile('photo')) {
            if ($cagnotte->photo) {
                Storage::disk('public')->delete($cagnotte->photo);
            }

            $path = $request->file('photo')->store('photos', 'public');
            $cagnotte->update(['photo' => $path]);
        }

        $cagnotte->update($request->except('photo'));

        return redirect()->route('viewPots')->with('message', 'Mis à jour avec succès');
    }

    public function destroy($potId){
        Cagnotte::find($potId)->delete();
        return redirect()->route('viewPots')->with('message', 'Supprimé avec succès');
    }   


    public function commentMarche() {
        return view('commentMarche');
    }

    public function storeEmail(Request $request): RedirectResponse
    {
        $email = $this->extractEmail($request);
        Contact::create(['email' => $email]);
        return redirect()->back()->with('message', 'Email enregistré avec succès');
    }

    private function extractEmail(Request $request)
    {
        return $request->input('email');
    }

}
