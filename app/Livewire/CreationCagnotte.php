<?php

namespace App\Livewire;

use Livewire\Component;
use App\Http\Controllers\HomeController;
use App\Models\CrudCategorie;
use App\Models\Cagnotte;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class CreationCagnotte extends Component
{
    use WithFileUploads;

    public $amountShow = false;
    public $showAlert = false;
    
    public $category_id;
    public $user_id;
    public $title;
    public $amount;
    public $photo;
    public $description;

// --------------------------------------------------------------------------------
    public $currentPage = 1;
    public $pages = [
        0 => [
            'heading' => '',
            'icon' => ''
        ], 
        1 => [
            'heading' => 'Choisir une Catégorie',
            'icon' => ''
        ], 
        2 => [
            'heading' => 'Créer votre cagnotte',
            'icon' => ''
        ], 
        3 => [
            'heading' => 'Personnaliser',
            'icon' => 'fa-solid fa-feather-pointed'
        ] 
    ];
// --------------------------------------------------------------------------------
    public function nextPage() {
        $this->currentPage++;
    }

    public function previousPage() {
        $this->currentPage--;
    }
// --------------------------------------------------------------------------------
    public function rules()
    {
        return [
            'title' => 'required|string|max:255|unique:cagnottes,title',
            'amount' => 'required|numeric|min:5|max:999999',
            'description' => 'required|string|max:500',
            'photo' =>'nullable|mimes:png,jpg,jpeg,webp',
        ];
    }

    public $messages = [
        'title.required' => 'Veuillez saisir un Titre',
        'title.unique' => 'Titre déjà utilisé, veuillez choisir un autre.',
        'amount.required' => 'Veuillez saisir un montant',
        'amount.numeric' => 'Le montant doit être un nombre !',
        'amount.min' => 'Montant faible',
        'amount.max' => 'Montant dépassé',
        'description.required' => 'Veuillez saisir une description',
    ];
// --------------------------------------------------------------------------------
    public function show()
    {
        $this->amountShow = !$this->amountShow;
    }

    public function validateStep2()
    {
        $this->validate(['title' => 'required|string|max:255|unique:cagnottes,title']);
        
        if ($this->amountShow){
            $this->validate(['amount' => 'required|numeric|min:1|max:10000000000000000']);
        }

        $this->currentPage++;
    }
// --------------------------------------------------------------------------------
    public function submit()
    {
        $validatedData = $this->validate([
            'description' => 'required|string|max:500',
            'photo' => 'nullable|mimes:png,jpg,jpeg,webp',
        ]);

        $photoPath = $this->photo ? $this->photo->store('photos', 'public') : 'public/uploads/donation-box.jpg';

        $user_id = Auth::id();

        Cagnotte::create([
            'user_id' => $user_id,
            'category_id' => $this->category_id, 
            'title' => $this->title,
            'amount' => $this->amount,
            'photo' => $photoPath,
            'description' => $this->description,
        ]);

        $this->reset(['description', 'photo']);

        return redirect('/profil')->with('message', 'Cagnotte créée avec succès!');
    }
//----------------------------------------------
public $showDetails = false;

public function toggleDetails()
{
    $this->showDetails = !$this->showDetails;
}
    
// --------------------------------------------------------------------------------
    public function render()
    {
        $cruds = CrudCategorie::all();
        $data = [
            'cruds' => $cruds,
            'currentPage' => $this->currentPage,
            'pages' => $this->pages,
        ];
        return view('livewire.Steps', $data);
    }

}
