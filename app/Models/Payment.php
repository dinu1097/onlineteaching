<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    // Specify the table associated with the model
    protected $table = 'payments';

    // Specify which attributes are mass assignable
    protected $fillable = [
        'enrollment_id',
        'amount',
        'payment_method',
        'payment_status',
        'transaction_id',
        'user_id', // Foreign key to associate payment with a user
    ];

    // Define relationship with User model
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
