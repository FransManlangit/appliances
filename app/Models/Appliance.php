<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Appliance extends Model
{
    use HasFactory;
    use softDeletes;
    public $table = 'appliances';
    public $primaryKey = 'appliance_id';
    public $timestamps = true;
    protected $guarded = ['appliance_id'];
    

    protected $fillable = ['model',
        'brand'
    ];

//     public function customers() {
//         return $this->belongsTo('App\Models\Customer', 'customer_id');
//    }
  
}
