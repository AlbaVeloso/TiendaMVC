<?php
namespace Formacom\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model {
    protected $table = 'order';
    protected $primaryKey = 'order_id';

    public function customer() {
        return $this->belongsTo('Formacom\Models\Customer', 'customer_id');
    }
    
    public function products() {
        return $this->belongsToMany('Formacom\Models\Product', 'order_has_product', 'order_id', 'product_id')
                    ->withPivot('quantity', 'price')
                    ->withTimestamps();
    }
}
?>

