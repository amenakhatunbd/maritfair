<?php

namespace App\Model\Common;

use App\SM\SM;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        "id",
        "title",
        "short_description",
        "long_description",
        "image",
        "slug",
        "sku",
        "stock_status",
        "tax_class",
        "regular_price",
        "sale_price",
        "brand_id",
        "product_qty",
        "alert_quantity",
        "product_weight",
        "product_model",
        "product_type",
        "unit_id",
        "image_gallery",
        "read_a_little",
        "'countrie_id'",
        "views",
        "seo_title",
        "meta_key",
        "meta_description",
        "created_by",
        "modified_by",
        "status",
        "bangla_english_name"
    ];
    protected $table = "products";

    public function unit()
    {
        return $this->belongsTo(Unit::class, 'unit_id');
    }
    public function author()
    {
        return $this->belongsTo(Author::class);
    }
    public function publisher()
    {
        return $this->belongsTo(Publisher::class);
    }
    public function country()
    {
        return $this->belongsTo(Country::class, 'countrie_id' );
    }
    public function categories()
    {
        return $this->belongsTo(Category::class);
    }
    public function brand()
    {
        return $this->belongsTo(Brand::class, 'brand_id');
    }

}
