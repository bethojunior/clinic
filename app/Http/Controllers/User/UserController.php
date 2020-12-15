<?php

namespace App\Http\Controllers\User;

use App\Constants\UserConstant;
use App\Constants\UserStatusConstant;
use App\Http\Controllers\Controller;
use App\Http\Requests\User\InsertUser;
use App\Http\Responses\ApiResponse;
use App\Services\User\UserService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{

    private $service;

    public function __construct(UserService $service)
    {
        $this->service = $service;
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
   public function getPatients()
   {
       $users = $this->service
           ->getAllPatients();
       return view('users.patients')->with(['users' => $users]);
   }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $users = $this->service
            ->getAll();
        return view('users.index')->with(['users' => $users]);
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * @param InsertUser $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function insert(Request $request)
    {
        try{
            $insert = $this
                ->service
                ->insertUser($request->all());
        }catch (\Exception $exception){
            return redirect()->route('user.index')
                ->with('error', $exception->getMessage());
        }
        return redirect()->route('user.index')
            ->with('success', 'Usuário inserido com sucesso');
    }

    /**
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id)
    {
        try{
            $this
                ->service
                ->delete($id);
        }catch (\Exception $exception){
            return ApiResponse::error('',$exception->getMessage());
        }
        return ApiResponse::success('','Excluido com sucesso');
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function findById($id)
    {
        $user = $this->service
            ->find($id);
        return view('users.id')->with(['user' => $user]);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request)
    {
        try{
            $this->service
                ->update($request->all());
        }catch (\Exception $exception){
            return redirect()->route('user.index')
                ->with('error', $exception->getMessage());
        }
        return redirect()->route('user.index')
            ->with('success', 'Usuário atualizado com sucesso');
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showPatient()
    {
        $user = Auth::user();
        return view('patient.profile')->with(['user' => $user]);
    }

}
