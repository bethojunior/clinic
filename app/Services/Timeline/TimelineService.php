<?php


namespace App\Services\Timeline;


use App\Constants\SalesStatus;
use App\Models\Sales\Sales;
use App\Models\Timeline\Timeline;
use App\Repositories\Timeline\TimelineRepository;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class TimelineService
{

    private $repository;

    /**.
     * TimelineService constructor.
     * @param TimelineRepository $repository
     */
    public function __construct(TimelineRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @param array $request
     * @return Timeline
     * @throws \Exception
     */
    public function create(array $request)
    {
        try{
            DB::beginTransaction();
            $user = Auth::user();
            $request['who_inserted'] = $user->id;
            $timeline = new Timeline($request);
            $timeline->save();
            DB::commit();

        }catch (\Exception $exception){
            DB::rollBack();
            throw $exception;
        }
        return $timeline;
    }

    /**
     * @param $id
     * @return \Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection|\Illuminate\Database\Eloquent\Model[]
     */
    public function getDataByUser($id)
    {
        return $this->repository
            ->getByUser($id);
    }
}
