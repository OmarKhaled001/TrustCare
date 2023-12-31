<?php

namespace App\Models;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    use Translatable;
    use HasFactory;
    public $translatedAttributes = ['name','address'];
    public $fillable= ['email','password','date_birth','phone','gender','blood_group'];

    public function doctor()
    {
        return $this->belongsTo(Invoice::class,'doctor_id');
    }

    public function service()
    {
        return $this->belongsTo(Invoice::class,'service_id');
    }
}
