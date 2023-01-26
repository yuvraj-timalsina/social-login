<?php
    
    namespace App\Http\Controllers;
    
    use App\Models\User;
    use Illuminate\Support\Str;
    use Illuminate\Http\Request;
    use App\Enums\OAuthProvider;
    use Illuminate\Http\RedirectResponse;
    use Laravel\Socialite\Facades\Socialite;

    class OAuthController extends Controller
    {
        public function redirect(OAuthProvider $provider): RedirectResponse
        {
            return Socialite::driver($provider->driver())->redirect();
        }
    
    
        public function callback(OAuthProvider $provider): RedirectResponse
    
        {
            try {
                $oAuthUser = Socialite::driver($provider->driver())->user();
            
                $user = User::updateOrCreate([
                    'provider_id' => $oAuthUser->getId(),
                    'provider' => $provider,
                ], [
                    'name' => $oAuthUser->getName(),
                    'email' => $oAuthUser->getEmail(),
                    'password' => bcrypt(Str::random(50)),
                    'avatar_url' => $oAuthUser->getAvatar(),
                    'provider_token' => $oAuthUser->token,
                    'provider_refresh_token' => $oAuthUser->refreshToken,
                ]);
            
                auth()->login($user);
            
                return to_route('home');
            }
            catch (\Exception $e) {
                session()->flash('error', 'Something went wrong!');
                return to_route('welcome');
            }
        }
    }
