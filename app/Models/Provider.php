<?php

namespace App\Models;

use App\Traits\HasUUID;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Provider extends Model
{
    use HasFactory, HasUUID, SoftDeletes;

    protected $uuidFieldName = 'slug';

    protected $fillable = [ 'slug',
                            'trading_name',
                            'company_name',
                            'abn',
                            'address'];

    public function contacts(){
        return $this->hasMany(ProviderContact::class);
    }

}
