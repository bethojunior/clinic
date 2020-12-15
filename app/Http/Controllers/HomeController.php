<?php

namespace App\Http\Controllers;

use App\Constants\SalesStatus;
use App\Constants\UserConstant;
use App\Services\User\UserService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{

    private $userService;
    private $salesService;

    /**
     * HomeController constructor.
     * @param UserService $userService
     */
    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {

        $patients = $this->userService
            ->countAllPatients();

        $user = Auth::user();

        if($user->user_type_id === UserConstant::ADMIN){
            return view('home.home')
                ->with
                (
                    [
                        'patients' => $patients
                    ]
                );
        }

        return view('patient.profile')
            ->with
            (
                [
                    'user' => $user
                ]
            );


    }
}
