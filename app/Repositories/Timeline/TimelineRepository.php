<?php


namespace App\Repositories\Timeline;


use App\Contracts\Repository\AbstractRepository;
use App\Models\Timeline\Timeline;

class TimelineRepository extends AbstractRepository
{
    public function __construct()
    {
        $this->setModel(Timeline::class);
    }

    /**
     * @param $id
     * @return \Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection|\Illuminate\Database\Eloquent\Model[]
     */
    public function getByUser($id)
    {
        return $this->getModel()
            ::with('user')
            ->with('whoInserted')
            ->where('user_id','=',$id)
            ->orderByDesc('id')
            ->get();
    }

    /**
     * @return \Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection|\Illuminate\Database\Eloquent\Model[]
     */
    public function getAll()
    {
        return $this->getModel()
            ::with('user')
            ->with('whoInserted')
            ->orderByDesc('id')
            ->get();
    }


}
