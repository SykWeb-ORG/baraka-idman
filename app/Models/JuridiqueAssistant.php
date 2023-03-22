<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JuridiqueAssistant extends Model
{
    use HasFactory;

    /**
     * Get the user.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    /**
     * Get the juridique visites for the juridique assistant.
     */
    public function juridique_visites()
    {
        return $this->hasMany(JuridiqueVisite::class);
    }
}
