<?php


namespace App\Models\Timeline;


use App\User;
use Illuminate\Database\Eloquent\Model;

class Timeline extends Model
{

    protected $fillable = ['title','user_id','description','procedure','reason'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function user()
    {
        return $this->hasMany(User::class,'id','user_id');
    }


}
