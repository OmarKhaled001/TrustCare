<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Translatable;


class Doctor extends Model
{
    use Translatable;
    use HasFactory;
    public $translatedAttributes = ['name'];
    public $fillable= ['email','email_verified_at','password','phone','name','appointment_id','section_id','status'];
    //protected $guarded=[];


    //   Get the Doctors's image.
    public function image()
    {
        return $this->morphOne(Image::class, 'imageable');
    }

    // One To One get section of Doctor
    public function section()
    {
        return $this->belongsTo(Section::class);
    }

    // One To One get section of Doctor
    public function appointment()
    {
        return $this->belongsTo(Appointment::class);
    }


}
