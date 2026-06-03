<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Record extends Model
{
    use HasFactory;
    protected $fillable = [
        'file_number',
        'manager_name',
        'service_provider_name',
        'claim_number',
        'assignment_id',
        'company_name',
        'invoice_date',
        'expenses',
        'sale_tax',
        'payment_amount',
        'balance_amount',
        'payment_date',
        'loss_amount',
    ];

}
