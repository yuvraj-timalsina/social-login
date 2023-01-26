<?php
    
    namespace App\Enums;
    
    enum OAuthProvider: string
    
    {
        case GitHub = 'github';
        case Twitter = 'twitter';
        
        public function driver(): string
        {
            return match ($this) {
                self::GitHub => 'github',
                self::Twitter => 'twitter-oauth-2',
            };
        }
        
    }