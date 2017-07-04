<?php
/**
 * @author Naveen Gupta
 * @version 1.0
 */

namespace App\Http\Services;
use Illuminate\Support\Facades\Auth;
use App\User;

class AuthServices
{
    /**
     * @author Naveen Gupta 
     * @use to authenticate the user
     * @param type $request
     * @return logindetails
     */
    public function login($request){
        $loginDetails = array();
        if(Auth::attempt([
                            'email' => $request->email, 
                            'password' => $request ->password
                          ]
                        )
           ){
            $user = Auth::user();
            $token =  $user->createToken('test app')->accessToken;
            $status = AUTHORIZED_ACCESS;
            
            $loginDetails['token'] = $token;
            $loginDetails['statusCode'] = $status;
            return $loginDetails;
        }
        else{
            $status = ERROR_UNAUTHORIZED_ACCESS;
            $loginDetails['statusCode'] = $status;
            return $loginDetails;
        } //end if-else      
    }//end-login
}
