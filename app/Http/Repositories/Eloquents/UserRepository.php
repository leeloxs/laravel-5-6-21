<?php


namespace App\Http\Repositories\Eloquents;


use App\Http\Repositories\Interfaces\UserRepositoryInterface;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\Response as SymfonyResponse;

class UserRepository extends BaseRepository implements UserRepositoryInterface
{
    protected $user;

    /**
     * UserRepository constructor.
     */
    public function __construct(User $user)
    {
        parent::__construct($user);
        $this->user = $user;
    }

    public function updateAvatar(Request $request, User $user): Response
    {
        if ($request->hasFile('avatar')) {

            $path = Storage::putFile('public/avatars', $request->file('avatar'));

            $user->update(['avatar' => basename($path)]);
        }
        return response('Profile Updated Successfully', SymfonyResponse::HTTP_OK);
    }
}
