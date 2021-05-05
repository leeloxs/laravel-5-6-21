<?php


namespace App\Http\Repositories\Eloquents;


use App\Http\Repositories\Interfaces\ItemRepositoryInterface;
use App\Models\Item;

class ItemRepository extends BaseRepository implements ItemRepositoryInterface
{
    protected $item;

    /**
     * ItemRepository constructor.
     */
    public function __construct(Item $item)
    {
        parent::__construct($item);
        $this->item = $item;
    }
}
