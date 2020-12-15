<?php


namespace App\Http\Controllers\Timeline;


use App\Http\Controllers\Controller;
use App\Services\Timeline\TimelineService;
use App\Services\User\UserService;
use Illuminate\Http\Request;

class TimelineController extends Controller
{

    private $userService;
    private $timelineService;

    /**
     * TimelineController constructor.
     * @param UserService $userService
     * @param TimelineService $timelineService
     */
    public function __construct(UserService $userService , TimelineService $timelineService)
    {
        $this->timelineService = $timelineService;
        $this->userService = $userService;
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $users = $this->userService
            ->getAllPatients();
        return view('timeline.user')->with(['users' => $users]);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function create(Request $request)
    {
        try{
            $this
                ->timelineService
                ->create($request->all());
        }catch (\Exception $exception){
            return redirect()->route('timeline.index')
                ->with('error', $exception->getMessage());
        }
        return redirect()->route('timeline.index')
            ->with('success', 'Dados inserido ao cliente com sucesso');
    }


    /**
     * @param $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function findById($id)
    {
        $data = $this->timelineService
            ->getDataByUser($id);
        return view('timeline.timeline')->with(['data' => $data]);
    }

}
