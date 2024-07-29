<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use App\Models\CauseSupport;
use App\Models\Cagnotte;
use Illuminate\Support\Facades\Auth;
use App\Models\CrudCategorie;


class CauseSupportController extends Controller
{
    public function index() {
        $pots = Cagnotte::all();
    
        $categories = CrudCategorie::distinct('name')->pluck('name');
    
        return view('supportCause', compact('pots', 'categories'));
    }
    

    public function store(Request $request, $cagnotte_id)
    {
        $request->validate([
            'supported_amount' => 'required|numeric|min:1',
        ]);

        $user_id = auth()->id();
        $supported_amount = $request->supported_amount;

        CauseSupport::create([
            'user_id' => $user_id,
            'cagnotte_id' => $cagnotte_id,
            'supported_amount' => $supported_amount,
        ]);

        return redirect()->back()->with('message', 'Montant envoyé avec succès');
    }

    public function viewSupport(Request $request) {
        $user = Auth::user();    
        $supports = $user->supports()->distinct()->get();  
        return view('pots.viewSupported', compact('supports'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'supported_amount' => 'required|numeric|min:1',
        ]);

        $support = CauseSupport::findOrFail($id);
        $support->supported_amount = $request->supported_amount;
        $support->save();

        return redirect()->back()->with('message', 'Montant mis à jour avec succès');
    }

    public function closePot($potId){
       
        $cagnotte = Cagnotte::find($potId);
        if ($cagnotte) {
            $cagnotte->status = 'closed';
            $cagnotte->save();

            return redirect()->route('viewPots')->with('message', 'Cagnotte fermée avec succès');
        } 
        else 
            return redirect()->route('viewPots')->with('error', 'La cagnotte spécifiée n\'existe pas.');
    }    

}
