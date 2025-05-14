<?php

namespace App\Models\Forms;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InvoicePaymentItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'invoice_payment_id', 'item_name', 'description', 'amount'
    ];


    public function invoice()
    {
        return $this->belongsTo(InvoicePayment::class);
    }

}
