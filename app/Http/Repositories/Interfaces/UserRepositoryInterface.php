<?php


namespace App\Http\Repositories\Interfaces;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;


interface UserRepositoryInterface extends EloquentRepositoryInterface
{
    public function updateAvatar(Request $request, User $user) : Response;
}
