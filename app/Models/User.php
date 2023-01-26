<?php
    
    namespace App\Models;
    
    // use Illuminate\Contracts\Auth\MustVerifyEmail;
    use App\Enums\OAuthProvider;
    use Illuminate\Database\Eloquent\Factories\HasFactory;
    use Illuminate\Foundation\Auth\User as Authenticatable;
    use Illuminate\Notifications\Notifiable;
    use Laravel\Sanctum\HasApiTokens;
    
    class User extends Authenticatable
    {
        use HasApiTokens, HasFactory, Notifiable;
        
        /**
         * The attributes that are mass assignable.
         *
         * @var array<int, string>
         */
        protected $fillable = [
            'name',
            'email',
            'password',
            'avatar_url',
            'provider',
            'provider_id',
            'provider_token',
            'provider_refresh_token',
        ];
        
        /**
         * The attributes that should be hidden for serialization.
         *
         * @var array<int, string>
         */
        protected $hidden = [
            'password',
            'remember_token',
            'provider_token',
            'provider_refresh_token',
        ];
        
        /**
         * The attributes that should be cast.
         *
         * @var array<string, string>
         */
        protected $casts = [
            'email_verified_at' => 'datetime',
            'provider' => OAuthProvider::class,
            'provider_token' => 'encrypted',
            'provider_refresh_token' => 'encrypted',
        ];
        
        
        public function isOAuthUser(): bool
        {
            return !$this->isTwitterUser() && !$this->isGithubUser();
        }
        
        public function isTwitterUser(): bool
        {
            return $this->twitter_id !== NULL;
        }
        
        public function isGithubUser(): bool
        {
            return $this->github_id !== NULL;
        }
    }
