<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
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
        'user_type',
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
    ];

    public function definecategories(){
        return $this->hasMany(DefineCategories::class)->orderBy('created_at', 'DESC');
    }

    public function definetopic(){
        return $this->hasMany(Topics::class)->orderBy('created_at', 'DESC');
    }

    public function definecarrier(){
        return $this->hasMany(Carrier::class)->orderBy('created_at', 'DESC');
    }

    // public function definetimetracking(){
    //     return $this->hasMany(Timetracker::class)->orderBy('created_at', 'DESC');
    // }

    public function definetimetracking()
    {
        $thirtyDaysAgo = now()->subDays(30);

        return $this->hasMany(Timetracker::class)
            ->where('created_at', '>=', $thirtyDaysAgo)
            ->orderBy('created_at', 'DESC');
    }

    public function salesdailyupdate()
    {
        $thirtyDaysAgo = now()->subDays(30);

        return $this->hasMany(SalesDailyUpdate::class)
            ->where('created_at', '>=', $thirtyDaysAgo)
            ->orderBy('created_at', 'DESC');
    }

    public function timehistoryforalluser()
    {
        return $this->hasMany(Timetracker::class)
            ->whereDate('created_at', now()->toDateString())
            ->orderBy('created_at', 'DESC');
    }

    public function defineload(){
        return $this->hasMany(Load::class)->orderBy('created_at', 'DESC');
    }

    public function resources(){
        return $this->hasMany(Resource::class)->orderBy('created_at', 'DESC');
    }

    public function notes(){
        return $this->hasMany(Notes::class)->orderBy('created_at', 'DESC');
    }
}
