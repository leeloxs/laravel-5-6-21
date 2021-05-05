<?php


namespace App\Http\Repositories\Eloquents;


use App\Http\Repositories\Interfaces\PostRepositoryInterface;
use App\Models\Post;

class PostRepository extends BaseRepository implements PostRepositoryInterface
{
    protected $post;

    /**
     * ItemRepository constructor.
     */
    public function __construct(Post $post)
    {
        parent::__construct($post);
        $this->post = $post;
    }
}
