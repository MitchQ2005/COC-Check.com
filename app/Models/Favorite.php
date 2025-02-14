<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Favorite extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'base_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function base()
    {
        return $this->belongsTo(Base::class);
    }
}