<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
 
class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'role','capabilities','password',
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
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
	
	
	
	public function capability(){
		return $this->hasOne('App\Capability');
	}
	
	public function current_user_can($role_cap=NULL){
		
		//echo $role_cap;die;
		if(is_null($role_cap))
			return false;
		if($this->role == $role_cap)
			
		//echo $this->role;die;
			return true;

 $capabilities = $this->capability()->first();
		 
		 
		if($capabilities){
			if(isset($capabilities->capabilities) && !is_null($capabilities->capabilities)){
				$capabilities = unserialize($capabilities->capabilities);
				if(!empty($capabilities)){
				foreach($capabilities as $capability){
					if($capability == $role_cap)
						return true;
				}
			}
			}
		}
		return false;
	}
	
	
	
	
	
}
