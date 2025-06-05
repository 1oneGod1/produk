<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    // Daftar kolom yang dapat diisi secara massal
    protected $fillable = [
        'name',                // Nama produk
        'description',         // Deskripsi produk
        'price',               // Harga produk
        'product_category_id', // ID kategori produk
        'photo',               // Path foto produk
    ];

    // Relasi ke model ProductCategory (kategori produk)
    public function category()
    {
        return $this->belongsTo(ProductCategory::class); // Relasi ke kategori produk
    }
}
