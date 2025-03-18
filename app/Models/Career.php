<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Career extends Model
{
    const JOBTYPE_FULLTIME = 'Full Time';
    const JOBTYPE_PARTTIME = 'Part Time';

    protected $guarded = [];
}
