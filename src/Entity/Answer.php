<?php
namespace Entity;

use Illuminate\Database\Eloquent\Model;

/**
* Database answers
*/
class Answer extends Model
{
    /**
     * Get the linked question
     */
    public function question()
    {
        return $this->belongsTo('Entity\Question');
    }
}