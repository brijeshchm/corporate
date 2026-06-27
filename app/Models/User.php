<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
	
	
	
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
