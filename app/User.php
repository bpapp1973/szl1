<?php

namespace App;

use App\Notifications\ActivateAccount as ActivateAccountNotification;
use App\Notifications\ResendActivation as ResendActivateAccountNotification;
use App\Notifications\ResetPassword as ResetPasswordNotification;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

/**
 * App\User
 *
 * @mixin \Eloquent
 */
class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username', 'email', 'password', 'roles_id', 'first_name', 'last_name', 'birthday', 'address', 'cities_id', 'phone', 'companies_id',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * Validation rules for user creation
     *
     * @var array
     */
    public static $createRules = [
            'username'      => 'required|max:255|unique:users',
            'email'         => 'required|email|max:255|unique:users',
            'password'      => 'required|min:6|confirmed',
            'first_name'    => 'required|max:255',
            'last_name'     => 'required|max:255',
            'birthday'      => 'required|max:255',
            'address'       => 'required|max:255',
            'city'          => 'required|max:10000',
            'phone'         => 'required|max:255',
    ];

    /**
     * Validation rules for user update
     *
     * @var array
     */
    public static $updateRules = [
            'first_name'    => 'required|max:255',
            'last_name'     => 'required|max:255',
            'birthday'      => 'required|max:255',
            'address'       => 'required|max:255',
            'city'          => 'required|max:10000',
            'phone'         => 'required|max:255',
    ];

    /**
     * Get the city record associated with the user.
     */
    public function city()
    {
        return $this->belongsTo('App\Models\Cities', 'cities_id');
    }

    /**
     * Get the roles record associated with the user.
     */
    public function role()
    {
        return $this->belongsTo('App\Models\Roles', 'roles_id');
    }

    /**
     * Get the company records associated with the user.
     */
    public function companies()
    {
        return $this->belongsToMany('App\Models\Companies', 'user_companies', 'users_id', 'companies_id');
    }

    /**
     * Get the comments records associated with the user.
     */
    public function comments()
    {
        return $this->hasMany('App\Models\comments', 'users_id');
    }

    /**
     * Send the password reset notification.
     *
     * @param  string  $token
     * @return void
     */
    public function sendPasswordResetNotification($token)
    {
        $this->notify(new ResetPasswordNotification($token));
    }

    /**
     * Send the password reset notification.
     *
     * @param  string  $token
     * @return void
     */
    public function sendActivateAccountNotification($token)
    {
        $this->notify(new ActivateAccountNotification($token));
    }

    /**
     * Send the password reset notification.
     *
     * @param  string  $token
     * @return void
     */
    public function resendActivateAccountNotification($token)
    {
        $this->notify(new ResendActivateAccountNotification($token));
    }

}
