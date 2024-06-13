<?php

namespace App;

use App\Models\Role;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\File;
use Laravel\Passport\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use Notifiable;
    use HasRoles, HasApiTokens;
    use HasFactory;

    const ACTIVE = 1;
    const NON_ACTIVE = 0;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'active', 'photo', 'last_name'
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

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name'                  => 'required',
        'password'              => ['required','confirmed','min:8','regex:/[a-z]/','regex:/[A-Z]/', 'regex:/[0-9]/'],
        'email'                 => 'required|email'
    ];

    public function role(){
        return $this->belongsToMany(Role::class, 'role_user');
    }

    public function getIsSuperAdminAttribute(){
        return $this->hasRole(Role::SUPER_ADMIN);
    }

    public function getImageAttribute(){
        return empty($this->photo) ? 'default.png' : $this->photo;
    }

    public function getFullNameAttribute(){
        if (is_null($this->last_name)) {
            return "{$this->name}";
        }
        return "{$this->name} {$this->last_name}";
    }

    //EVENT HANDLER
    public static function boot() {
        parent::boot();
        static::deleting(function($model) { // before delete() method call this
            $file_path = storage_path('app/'.config('path.avatar').'/'.$model->photo);
            if(File::exists($file_path)){
                File::delete($file_path);
            }
        });
    }
}
