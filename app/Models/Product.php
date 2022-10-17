<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $guarded = [];

    public function capacity(){
        return $this->belongsTo(Capacity::class);
    }

    public function productOption(){
        return $this->hasMany(ProductOption::class);
    }

    public function getCategoryTextAttribute(){
        $category = Category::find($this->category_id);
        if($category){
            return $category->name;
        } else {
            return '';
        }
    }

    public function getColorTextAttribute()
    {
        $colors = ProductOption::where('product_id',$this->id)->with('color')->get();
        $quantityText = $colors->pluck('color.color_name')->toArray();
        return implode(', ', $quantityText);

    }
}
