<?php
/**
 * @author Naveen Gupta
 * @version 1.0
 */
namespace App\Http\Controllers\api;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Services\AuthServices;

class AuthController extends Controller
{
    /**
     * @author Naveen Gupta
     * @use to authenticate the user 
     * @param Request $request
     * @param AuthServices $authServices
     * @return type
     */
    public function login(Request $request, AuthServices $authServices){        
        $isSuccess = $authServices -> login($request);
        if($isSuccess['statusCode'] === 200){
            return response()->json([
                'status' => 1,
                'token' => $isSuccess['token'],
                'message' => "Successfully login."
            ]);
        }
        else{
            return response()->json([
                'status' => 0,
                'message' => "Unauthorised user."
            ]);
        }//end if-else
    }//end-login
}


