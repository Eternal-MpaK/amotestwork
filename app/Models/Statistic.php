<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Hidden;
use Illuminate\Database\Eloquent\Attributes\Table;
use Illuminate\Database\Eloquent\Model;

#[Fillable(['ip', 'city', 'device'])]
#[Hidden(['updated_at'])]
#[Table('visited_statistic')]
class Statistic extends Model
{
    protected function casts(): array
    {
        return [
            'created_at' => 'datetime:d-m-Y H:i:s',
        ];
    }
}
