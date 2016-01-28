<?php

namespace CodeCommerce;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'category_id',
        'name',
        'description',
        'price',
        'featured',
        'recommend'
    ];

    public function category()
    {
        return $this->belongsTo('CodeCommerce\Category');
    }

    public function images()
    {
        return $this->hasMany('CodeCommerce\ProductImage');
    }

    public function tags()
    {
        return $this->belongsToMany('CodeCommerce\Tag');
    }

//    public function nameDescription()
//    {
//        return $this->name." - ".$this->description;
//    }

    //Gera Atributo Personalizado, que não precisa estar no Banco de dados
    public function getNameDescriptionAttribute()
    {
        return $this->name." - ".$this->description;
    }

    //Retorna uma lista de tags separadas por virgula
    public function getTagListAttribute()
    {
        $tags = $this->tags->lists('name')->toArray();

        return implode(', ', $tags);
    }
}
