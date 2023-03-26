<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class transactionModel extends Model
{
    use HasFactory;
    protected $table = 'transactions';

    /**
     * Get the member that owns the TransactionModel
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function member(): BelongsTo
    {
        return $this->belongsTo(MemberModel::class, 'id_member', 'id');
    }

    /**
     * Get the user that owns the TransactionModel
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(UserModel::class, 'id_user', 'id');
    }
}
