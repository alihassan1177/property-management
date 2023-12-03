<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $fillable = [
        "tenant_id",
        "property_id",
        "task_description",
        "due_date",
        "status",
        "user_id"
    ];


    function user(){
        return $this->hasOne(User::class, "id", "user_id");
    }
    
    function tenant() {
        return $this->hasOne(Tenant::class, "id", "tenant_id");
    }

    function getAssigneeAttribute() {
        if (!is_null($this->tenant_id)) {
            return $this->tenant->name;
        }else{
            return $this->user->name;
        }
    }

}
