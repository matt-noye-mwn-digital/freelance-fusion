<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Models\Admin\AdminTodoList;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'full_name',
        'email',
        'password',
        'avatar',
        'status',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    protected function userDetails(){
        return $this->hasOne(UserDetail::class);
    }

    protected function clientDetails(){
        return $this->hasOne(ClientDetail::class, 'client_id');
    }

    protected function currency(){
        return $this->hasOne(Currency::class);
    }

    //Status, Active, inactive, closed
    public function getStatus(){
        return match($this->status) {
            'active' => '<span class="badge text-bg-success">Active</span>',
            'inactive' => '<span class="badge text-bg-warning">Inactive</span>',
            'closed' => '<span class="badge text-bg-danger">Closed</span>',
        };
    }

    public function todos(){
        return $this->hasMany(AdminTodoList::class, 'user_id', 'id');
    }
    public function clientProject(){
        return $this->hasMany(Project::class, 'client_id', 'id');
    }
    public function staffProject(){
        return $this->hasMany(Project::class, 'assigned_to', 'id');
    }
}
