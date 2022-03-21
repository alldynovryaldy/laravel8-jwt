<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Tymon\JWTAuth\Contracts\JWTSubject;

class User extends Authenticatable implements JWTSubject  //<-- implements JWTSubject
{
   use HasApiTokens, HasFactory, Notifiable;

   protected $fillable = [
      'name',
      'email',
      'password',
   ];

   protected $hidden = [
      'password',
      'remember_token',
   ];

   protected $casts = [
      'email_verified_at' => 'datetime',
   ];

   // config JWT
   public function getJWTIdentifier()
   {
      return $this->getKey();
   }

   public function getJWTCustomClaims()
   {
      // data yang di sisipkan pada jwt
      return [
         'name'              => $this->name,
         'email'           => $this->email,
      ];
   }
}
