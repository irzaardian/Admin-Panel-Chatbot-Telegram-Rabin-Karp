<?php

namespace App\Models;

use CodeIgniter\Model;

class PatternModel extends Model
{
    protected $table = 'pattern_template';
    protected $allowedFields = ['pertanyaan', 'jawaban', 'dibuat', 'diubah'];
}
