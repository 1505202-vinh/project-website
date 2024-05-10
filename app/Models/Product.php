<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Product extends Model
{
    use HasFactory;
    protected $table ='products';
    protected $fillable = ['name','price','image','info','quantity','sold','category_id','status','admin_id'];
    public function admin(){
        return $this->beLongsTo(Admin::class);
    }
    public function category(){
        return $this->beLongsTo(Category::class);
    }


}
