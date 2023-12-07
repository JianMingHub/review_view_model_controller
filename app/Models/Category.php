<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Category extends Model
{
    use HasFactory;

    // protected $table =  'cms_products_manufacture';     // trường hợp tên table đặt tên khác với tên Models (insert file SQL vào)
    
    // protected $fillable = [             // khai báo trường nào thì cho trường đó sử dụng        
    //     'parent_id',
    //     'name',
    //     'slug',
    //     'meta_title',
    //     'meta_keyword',
    //     'meta_description',
    // ];

    protected $guarded = ['id'];            // $guarded  đối ngược với fillable là khai báo trường nào thì khoá trường đó lại => thường hay sử dụng        
        
    // public $timestamps = false;         // Nếu không thêm 2 trường create_at và update_date (báo lỗi)

    // relationship 1 N with Product
    // public function products()
    // {
    //     return $this->hasMany(Product::class);         
    // }

    public function children()
    {
        return $this->hasMany(Category::class, 'parent_id', 'id');
    }

    public function subCategories()
    {
        return $this->children()->with('subCategories');
    }

    public function getCategories()
    {
        return $this->with('subCategories')->whereParentId(0)->latest('created_at')->get();
    }

    // Mutator get Slug

    public function getSlugUrlAttribute()
    {
        return $this->slug .'-category-'. $this->id .'.html';
    }

    //  Get data category

    public function getAll()
    {
        return $this->get();
    }

    public function findId($id)
    {
        return $this->findOrFail($id);
    }

    // function getGenderName() {
    //     $genderMap = [0 => "nam", 1 => "nữ", 2 => "khác"];
    //     return $genderMap[$this->gender];
    // }
}
