<?php

namespace App\Models;

use App\Modules\Auth\Dto\SaveUserDto;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Str;
use Tymon\JWTAuth\Contracts\JWTSubject;

class User extends Authenticatable implements JWTSubject
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = [
        'id',
        'email',
        'isActive',
        'isAdmin',
        'password',
        'player_id',
        'ip_address',
    ];

    protected $hidden = [
        'remember_token',
    ];

    public function player()
    {
        return $this->belongsTo(Player::class);
    }

    public function createUser(SaveUserDto $dto, int $playerId): array
    {
        $token = hash('sha256', Str::random(80));

        $user = self::create([
            'created_at' => now(),
            'updated_at' => now(),
            'email' => $dto->userDto->email,
            'password' => Hash::make($dto->userDto->password),
            'api_token' => $token,
            'ip_address' => getIp(),
            'isActive' => true,
            'isAdmin' => false,
            'player_id' => $playerId,
            'pathToAvatar' => null,
        ]);
        $user->save();

        return $user;
    }

    public function getUserByToken(string $token)
    {
        return self::where('api_token', $token)->get()->first();
    }

    public function getPlayerId(): int
    {
        return self::player()->id;
    }

    // Получите идентификатор, который будет храниться в утверждении субъекта JWT
    // Грубо говоря возращает токен авторизации
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    //возвращает массив "ключ-значение", содержащий все пользовательские
    // утверждения, которые должны быть добавлены в JWT.
    public function getJWTCustomClaims()
    {
        return [];
    }
}
