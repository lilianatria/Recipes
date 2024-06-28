<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dish extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'description', 'difficulty_id', 'region_id', 'preparation_min','cooking_min', 'price_id','poster'];
    public function region()
{
return $this->belongsTo(Region::class);
}
public function ingredients()
{
return $this->belongsToMany(Ingredient::class);
}
public function difficulty()
{
return $this->belongsTo(Difficulty::class);
}
public function price()
{
return $this->belongsTo(Price::class);
}
}
