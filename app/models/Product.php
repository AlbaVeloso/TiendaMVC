<?php
namespace Formacom\Models;
use Illuminate\Database\Eloquent\Model;
use Formacom\Database; // Add this line to import the Database class
class Product extends Model{
    protected $table="product";
    protected $primaryKey = 'product_id';
    public function category(){
        return $this->belongsTo(Category::class);
    }
    public function provider(){
        return $this->belongsTo(Provider::class);
    }
   }


?>
