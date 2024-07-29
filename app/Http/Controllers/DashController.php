<?php 

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CrudCategorie;
use App\Models\Cagnotte;
use App\Models\User;
use App\Models\CauseSupport;

class DashController extends Controller
{
    public function index()
    {
        $userCount = User::count();
        $categoryCount = CrudCategorie::count();
        $moneyPotCount = Cagnotte::count();
        $supports = CauseSupport::count();

        return view('admin.admin-dashboard', compact('userCount', 'categoryCount', 'moneyPotCount', 'supports'));
    }

}
