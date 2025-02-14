<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Base extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'image_url',
        'layout_link',
        'description',
        'base_type',
        'user_id',
        'town_hall_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function townHall()
    {
        return $this->belongsTo(TownHall::class);
    }

    public function favorites()
    {
        return $this->hasMany(Favorite::class);
    }
}