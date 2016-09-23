<?php
//Possui um
 public function phone()
    {
        return $this->hasOne('App\Phone');

        return $this->hasOne('App\Phone', 'foreign_key');

    }


	 /**
     * Get the user that owns the phone.
     */
    public function user()
    {
        return $this->belongsTo('App\User');
        return $this->belongsTo('App\User', 'foreign_key');
    }


	/**
     * Get the comments for the blog post.
     */
    public function comments()
    {
        return $this->hasMany('App\Comment');
        return $this->hasMany('App\Comment', 'foreign_key');
    }