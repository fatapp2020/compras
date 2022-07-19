<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles; //agregado para spatie
class PurchaseOrder extends Model
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;
    use HasRoles; // agregado para spatie

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $table = "purchase_order";
    protected $fillable = [ 'name','date_order', 'date_approve', 'partner_id'  ];
    public $timestamps =false; //no utiliza timestamps en base
  
}
