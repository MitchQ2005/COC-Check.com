<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TownHall extends Model
{
    use HasFactory;

    protected $fillable = [
        'level',
    ];

    public function bases()
    {
        return $this->hasMany(Base::class);
    }
}
