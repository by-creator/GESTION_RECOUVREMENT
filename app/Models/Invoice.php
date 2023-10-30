<?php

namespace App\Models;

use App\Repositories\MonthRepository;
use App\Repositories\StateRepository;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Invoice extends Model
{
    use HasFactory;

    protected $table = 'invoices';

    protected $fillable = [
        'invoice_number',
        'users_id',
        'months_id',
        'states_id',
        'amount',
    ];

    public function users()
    {
        return $this->belongsTo(User::class, 'users_id');
    }

    public function months()
    {
        return $this->belongsTo(Month::class, 'months_id');
    }

    public function states()
    {
        return $this->belongsTo(State::class, 'states_id');
    }


    public function getCreatedAtAttribute($value)
    {
        return Carbon::parse($value)->format('d-m-Y H:i:s');
    }

    public function getUpdatedAtAttribute($value)
    {
        return Carbon::parse($value)->format('d-m-Y H:i:s');
    }

    public function getState($states_id)
    {
        $month = StateRepository::findById($states_id);
        
        return $month->name;
    }

}
