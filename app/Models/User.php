<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    // IDは自動生成するものなので、書き換えることはできない
    protected $guarded = array('id');

    // バリデーションルール
    public static $rules = [
        'name' => 'required|max:50',
        'email' => 'required|email|max:100',
        'password' => 'required|max:100',
        'authority' => 'required',
        'remember_token' => 'max:100',
        'is_show' => 'required',
        'created_at' => 'required',
        'created_user_id' => 'required',
    ];

    public function getTitle()
    {
        $ret = $this->id . ':' . $this->language_id;
        return $ret;
    }
}
