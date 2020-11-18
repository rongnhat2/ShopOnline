<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Size extends Model
{
    /**
     * The database table sizes by the model.
     *
     * @var string
     */
    protected $table = 'sizes';
    protected $fillable = ['name'];

    public function items()
    {
        return $this->belongsToMany(Item::class, 'quantity');
    }
}
