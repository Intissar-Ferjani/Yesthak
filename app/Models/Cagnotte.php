<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\CrudCategorie;
use App\Models\User;
use App\Models\CauseSupport;


class Cagnotte extends Model
{
    use HasFactory;
    protected $fillable=['id', 'title', 'amount', 'photo', 'description', 'category_id', 'user_id' , 'status'];

    public function category()
    {
        return $this->belongsTo(CrudCategorie::class, 'category_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

}

