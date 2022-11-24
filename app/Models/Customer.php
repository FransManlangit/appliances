<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Customer extends Model
{
    use HasFactory;
    use softDeletes;
    public $timestamps = true;
    public $primaryKey = 'customer_id';

    protected $guarded = ['customer_id'];
    protected $fillable =['fname','lname','addressline','town','zipcode','phone'];

    //  public function orders(){

    //     return $this->hasMany('App\Models\Order','customer_id');
    //  }
}
