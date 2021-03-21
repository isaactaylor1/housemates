<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BankAccountTransactions extends Model
{
    use HasFactory;

    protected $table = 'bank_account_transactions';

    protected $fillable = ['current_balance'];

    public function createTransaction($request, $id)
    {
        $this->account_id = $id;
        $this->transaction_type = $request->type;
        $this->transaction_value = $request->value;
        $this->description = $request->description;
        $this->save();
        return $this;
    }

    public function getCreatedAtAttribute()
    {
        return Carbon::parse($this->attributes['created_at'])->format('d-m-Y H:i');
    }
}
