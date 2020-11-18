<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Color extends Model
{
    /**
     * The database table colors by the model.
     *
     * @var string
     */
    protected $table = 'colors';
    protected $fillable = ['name'];

    public function items()
    {
        return $this->belongsToMany(Item::class, 'quantity');
    }
}
