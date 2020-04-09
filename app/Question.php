<?php

namespace App;

// use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Question extends BaseModel
{
    //
    public function owner(){
        return $this->belongsTo(User::class, 'user_id');
    }

    public function answers(){
        return $this->hasMany(Answer::class);
    }

    public function favourites(){
        return $this->belongsToMany(User::class)->withTimestamps();
    }

    public function markAsBestAnswer(Answer $answer){
        $this->best_answer_id = $answer_id;
        $this->save();
    }

    //mutator
    public function setTitleAttribute($title){
        $this->attributes['title'] = $title;
        $this->attributes['slug'] = Str::slug($title);
    }

    //accessor
    public function getUrlAttribute(){
        return "questions/{$this->slug}";
    }

    public function getCreatedDateAttribute(){
        return $this->created_at->diffForHumans();
    }

    public function getAnswersStylesAttribute(){
        if($this->answers_count > 0){
            if($this->best_answer_id){
                return "has-best-answer";
            }
            return "answered";
        }
        return "unanswered";
    }

    public function markBestAnswer(Answer $answer){
        $this->best_answer_id = $answer->id;
        $this->save();
    }

    public function getFavouritesCountAttribute()
    {
        return $this->favorites->count();
    }

    public function getFavouritesAttribute(){
        return $this->favourites()->where(['user_id'=>auth()->id()])->count() >0;
    }
}
