<?php
namespace Formacom\Models;
use Illuminate\Database\Eloquent\Model;
use Formacom\Database; // Add this line to import the Database class
class Product extends Model{
    protected $table="product";
    protected $primaryKey = 'product_id';
 public function category(){
        return $this->belongsTo('Formacom\Models\Category','category_id');
    }
    //provider_id   
    public function provider(){
        return $this->belongsTo('Formacom\Models\Provider','provider_id');
    }   

    public function orders() {
        return $this->belongsToMany('Formacom\Models\Product', 'order_has_product', 'order_id', 'product_id')
                    ->withPivot('quantity', 'price')
                    ->withTimestamps();
    }
}
?>