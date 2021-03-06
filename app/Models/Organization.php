<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Organization extends Model
{
    use HasFactory;

    protected $table = 'organizations';

    protected $fillable = [
        'name',
        'address',
        'contact_number',
        'contact_person',
        'vat_number',
        'email_address',
        'url',
        'plan_id'
    ];

    public function users() {
        return $this->belongsToMany(User::class, 'user_organization', 'organization_id', 'user_id');
    }

    public function plan(){
        return $this->belongsTo(OragnizationPlan::class);
    }
}
