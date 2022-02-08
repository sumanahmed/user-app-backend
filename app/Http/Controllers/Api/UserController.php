<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Interfaces\UserInterface;
use App\Repositories\UserRepository;
use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{    
    private UserRepository $userRepository;

    public function __construct(UserRepository $userRepository) 
    {
        $this->userRepository = $userRepository;
    }
   

    /**
     * get all user
    */
    public function allUser ()
    {
        $allUsers = $this->userRepository->getAllUsers();

        if ($allUsers->count() > 0) {
            return response()->json([
                'success'   =>  true,
                'data'      => $allUsers,
            ]);
        }

        return response()->json([
            'success'   => false,
            'data'      => [],
            'message'   => 'Sorry, Data not found !!'
        ]);
    }

    /**
     * show user detials
    */
    public function show (Request $request)
    {
        $userId = $request->route('id');

        $user = $this->userRepository->getUserById($userId);
        
        if (!$user) {
            return response()->json([
                'success'   => false,
                'user'      => [],
                'message'   => 'Sorry, Data not found !!'
            ]);
        }
        
        return response()->json([
            'success'   => true,
            'data'      => $user
        ]);
    }
}
