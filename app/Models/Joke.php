<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Hidden;
use Illuminate\Database\Eloquent\Model;

#[Fillable(['type', 'setup', 'punchline'])]
#[Hidden(['created_at', 'updated_at'])]
class Joke extends Model
{
    //
}
