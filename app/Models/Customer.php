<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Customer extends Model
{
    use HasFactory;
    use softDeletes;
    public $table = 'customers';
    public $primaryKey = 'customer_id';
    public $timestamps = true;
    protected $guarded = ['customer_id'];
    

    protected $fillable = ['fname','lname',
        'addressline','town','zipcode',
        'phone','imagePath','user_id'
    ];

    //  public function orders(){

    //     return $this->hasMany('App\Models\Order','customer_id');

    // }
}
