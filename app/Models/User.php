<?php 
    use Illuminate\Database\Eloquent\Model as Eloquent;

    class User extends Eloquent
    {
        protected $table = 'users';

        public $name;

        protected $fillable = [
            'username',
            'first_name',
            'last_name',
            'email'
        ];
    }