<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    /**
     * The database table colors by the model.
     *
     * @var string
     */
    protected $table = 'items';
    protected $fillable = ['name'];

    public function items()
    {
        return $this->belongsToMany(Item::class, 'quantity');
    }
}
