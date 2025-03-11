<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class sale_details extends Model
{
    use HasFactory;
    protected $fillable = (
        [
            'bill_id',
            'product_id',
            'price',
            'qty',
            'ref',
            'date'
        ]
    );

    public function product(){
        return $this->belongsTo(products::class, 'product_id', 'id');
    }

    public function bill(){
        return $this->belongsTo(sale::class, 'bill_id', 'id');
    }
}
