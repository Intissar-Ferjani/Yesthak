<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Cagnotte;


class CrudCategorie extends Model
{
    use HasFactory;
    protected $fillable =['id', 'name', 'details', 'icon'];

    public function cagnottes()
    {
        return $this->hasMany(Cagnotte::class);
    }

}
