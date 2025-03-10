<?php
namespace Formacom\Models;
use Illuminate\Database\Eloquent\Model;
use Formacom\Database; // Add this line to import the Database class
class Customer extends Model{
    protected $table="customer";
    protected $primaryKey = 'customer_id';
    public function addresses(){
        return $this->hasMany(Address::class,"customer_id");
    }
    public function phones(){
        return $this->hasMany(Phone::class,"customer_id");
    }

    public function orders(){
        return $this->hasMany(Order::class,"customer_id");
    }
   
}


?>
