<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Repositories\Interfaces\ItemRepositoryInterface;
use App\Http\Repositories\Interfaces\PostRepositoryInterface;
use App\Http\Repositories\Interfaces\UserRepositoryInterface;

class BaseController extends Controller
{
    protected $userRepository;

    protected $itemRepository;

    protected $postRepository;


    /**
     * UserController constructor.
     * @param UserRepositoryInterface $userRepository
     */
    public function __construct(UserRepositoryInterface $userRepository, PostRepositoryInterface $postRepository, ItemRepositoryInterface $itemRepository)
    {
        $this->userRepository = $userRepository;
        $this->postRepository = $postRepository;
        $this->itemRepository = $itemRepository;
    }
}
