<?php
namespace Entity;

use Illuminate\Database\Eloquent\Model;

/**
* Database questions
*/
class Question extends Model
{
    /**
     * Get the linked answer
     */
    public function answer()
    {
        return $this->hasOne('Entity\Answer');
    }
}