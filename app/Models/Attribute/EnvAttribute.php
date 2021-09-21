<?php

namespace App\Models\Attribute;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class EnvAttribute extends Model
{
    use HasFactory,SoftDeletes;
}
