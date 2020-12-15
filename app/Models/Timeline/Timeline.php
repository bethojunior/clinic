<?php


namespace App\Models\Timeline;


use App\User;
use Illuminate\Database\Eloquent\Model;

class Timeline extends Model
{

    protected $fillable = ['title','user_id','description','procedure','reason','who_inserted'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function user()
    {
        return $this->hasMany(User::class,'id','user_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function whoInserted()
    {
        return $this->hasMany(User::class,'id','who_inserted');
    }


}
