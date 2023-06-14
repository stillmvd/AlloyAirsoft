<?php

namespace App\Models;

use App\Modules\Auth\Dto\SaveUserDto;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Http\Request;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Str;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = [
        'id',
        'email',
        'password',
        'isActive',
        'isAdmin',
        'player_id',
        'api_token',
        'ip_address',
    ];

    public function player()
    {
        return $this->belongsTo(Player::class);
    }

    public function createUser(SaveUserDto $dto, int $playerId)
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


}
