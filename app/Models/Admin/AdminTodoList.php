<?php

namespace App\Models\Admin;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdminTodoList extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function user() {
        return $this->belongsTo(User::class);
    }
    public function assignedTo() {
        return $this->belongsTo(User::class, 'assigned_to');
    }

    public function getStatus(){
        return match($this->status) {
            'new' => '<span class="badge text-bg-primary">Active</span>',
            'pending' => '<span class="badge text-bg-warning">Pending</span>',
            'postponed' => '<span class="badge text-bg-secondary">Postponed</span>',
            'in-progress' => '<span class="badge text-bg-success">In Progress</span>',
            'Completed' => '<span class="badge text-bg-success">Completed</span>',
        };
    }
}
