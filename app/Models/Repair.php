<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Repair extends Model
{
    use HasFactory;
    use softDeletes;
    public $table = 'repairs';
    public $primaryKey = 'repair_id';
    public $timestamps = true;
    protected $guarded = ['repair_id'];

    protected $fillable = ['type','description','price','imagePath'
   
];
public function orders() {
    return $this->belongToMany(Order::class,'orderline','orderinfo_id','repair_id');
}


}
