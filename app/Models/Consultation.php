<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Consultation extends Model
{
    use HasFactory;
    use softDeletes;
    public $table = 'consultation';
    public $primaryKey = 'consult_id';
    public $timestamps = true;
    protected $guarded = ['consult_id'];
    
  
    protected $fillable = ['appliance_id', 'employee_id','defective', 'recommendation', 'price'];


    public function employees() {
        return $this->belongsTo('App\Models\Employee');
   }

    public function appliancess() {
        return $this->belongsToMany(Repairs::class,'orderline','repair_id','orderinfo_id');
   }
  
}
