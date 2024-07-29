<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Cagnotte;


class CauseSupport extends Model
{
    use HasFactory;
    protected $fillable = ['user_id', 'cagnotte_id', 'supported_amount'];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function cagnotte()
    {
        return $this->belongsTo(Cagnotte::class, 'cagnotte_id');
    }

}
