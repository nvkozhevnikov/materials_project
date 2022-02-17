<?php

namespace App\Models\CompileMaterials;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Spravochnik extends Model
{
    use HasFactory;
    protected  $table = 'spravochnik';

    public function getUser()
    {
        return $this->hasOne(User::class,'id', 'redactor_id');
    }

    public function getCreator()
    {
        return $this->hasOne(User::class,'id', 'creator_id');
    }
}
