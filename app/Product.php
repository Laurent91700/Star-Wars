<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Product extends Model
{

    protected $dates = ['published_at'];
    protected $fillable = ['name','content', 'abstract', 'price','category_id', 'quantity', 'status', 'published_at','slug'];
    public function category()
    {
        return $this->belongsTo('App\Category');
    }

    public function tags()
    {
        return $this->belongsToMany('App\Tag');

    }
    public function picture()
    {
        return $this->hasOne('App\Picture');
    }

    public function scopeOnline($query)
    {
        return $query->where('status', '=', 'opened');
    }

    public function getNameAttribute($value){
        return ucfirst($value);
    }
    public function getPublishedAtAttribute($value){
        return Carbon::createFromFormat('Y-m-d H:i:s', $value)->format('d/m/Y');
    }

    public function setPublishedAtAttribute($value){
        $this->attributes['published_at'] = (empty($value)) ? '0000-00-00 00:00:00' : Carbon::createFromFormat('d/m/Y', $value)->format('Y-m-d H:i:s');
    }

    public function hasTag($tagId){
        foreach($this->tags as $tag){
            if($tag->id==$tagId) return true;
        }
        return false;
    }
}
