<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    ///ENTER THE BELOW CODES TO ENABLE FIELDS TO BE FILLABLE
    protected $fillable = ['title', 'description', 'long_description'];
    // protected $guarded = [];    //Use this line to set all the fields fillable authomatically

    public function toggleComplete()
    {
        $this->completed = !$this->completed;
        $this->save();
    }

}
