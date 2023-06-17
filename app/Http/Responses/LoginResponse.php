<?php
 
namespace App\Http\Responses;
 
use Laravel\Fortify\Contracts\LoginResponse as LoginResponseContract;
 
class LoginResponse implements LoginResponseContract
{
    /**
     * @param  $request
     * @return mixed
     */
    public function toResponse($request)
    {
        $home = route('dashboard');
        $intended = $request->session()->get('x.url.intended');

        if ($intended) {
            $home = $intended;
            $request->session()->forget('x.url.intended');
        }

        return redirect()->intended($home);
    }
}