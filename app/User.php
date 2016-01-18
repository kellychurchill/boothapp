<?php

namespace App;

use Illuminate\Auth\Authenticatable;
use \SleepingOwl\Models\SleepingOwlModel;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class User extends SleepingOwlModel implements AuthenticatableContract,
                                    AuthorizableContract,
                                    CanResetPasswordContract
{
    use Authenticatable, Authorizable, CanResetPassword;

    protected $program_levels = [
        'Brownie'    => 'Brownie',
        'Junior'     => 'Junior', 
        'Cadette'    => 'Cadette',
        'Senior'     => 'Senior',
        'Ambassador' => 'Ambassador'
    ];

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'email', 'phone', 'status', 'program_level', 'weekend', 'num_girls'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['password', 'remember_token'];

    public function scopeProgramLevels() {
        return $this->program_levels;
    }

    public static function getList() {
        return static::lists('id', 'id')->all();
    }

    public static function getTroops($program_level, $weekend = false) {
        $type = [0];
        if ($weekend) {
            $type = [0, 1];
        }

        return User::where('program_level', $program_level)
                    ->where('status', 1)
                    ->whereIn('weekend', $type)
                    ->orderBy('id', 'asc')
                    ->get();
    }
}
