<?php


namespace App\Http\Repositories\Eloquents;


use App\Helpers\FormatData;
use App\Http\Repositories\Interfaces\EloquentRepositoryInterface;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Response;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;
use Symfony\Component\HttpFoundation\Response as SymfonyResponse;


class BaseRepository implements EloquentRepositoryInterface
{
    use FormatData;

    private $model;
    private $defaultPerPage = 10;

    /**
     * BaseRepository constructor.
     * @param Model $model
     */
    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    public function all(array $relations = [], array $attributes = ['*'] , int $perPage = 10): LengthAwarePaginator
    {
        if( ! $relations ) {
            return $this->model->select($attributes)->paginate($perPage);
        }

        return $this->model::with($relations)->select($attributes)->paginate($perPage);
    }

    public function pluck(string $key, string $value): Collection
    {
        return $this->model->pluck($value, $key);
    }

    public function create(array $attributes): Response
    {
        $this->model->create($attributes);

        return response($this->getClassName($this->model) . ' created Successfully', SymfonyResponse::HTTP_OK);
    }

    public function createAndSync(array $attributes, string $relation): Response
    {
        $model  = $this->model->create($attributes);

        $model->$relation()->sync($attributes[$relation] ?? []);

        return response( $this->getClassName($this->model) . ' created Successfully', SymfonyResponse::HTTP_OK);
    }

    public function createAndAssociate(array $attributes, string $relation): Response
    {
        $model  = $this->model->create($attributes);

        $model->$relation()->associate($attributes[$relation] ?? null);

        return response( $this->getClassName($this->model) . ' created Successfully', SymfonyResponse::HTTP_OK);
    }

    public function update(array $attributes, Model $model): Response
    {
        $model->update($attributes);

        return response($this->getClassName($this->model) . ' updated Successfully', SymfonyResponse::HTTP_OK);
    }

    public function updateAndSync(array $attributes, Model $model, string $relation): Response
    {
        try {
            $model->update($attributes);
            $model->$relation()->sync($attributes[$relation] ?? []);
        } catch (\Exception $e) {
            return response($e);
        }

        return response($this->getClassName(get_class($model)) . ' updated Successfully', SymfonyResponse::HTTP_OK);
    }

    public function updateAndAssociate(array $attributes, Model $model, string $relation): Response
    {
        try {
            $model->update($attributes);
            $model->$relation()->associate($attributes[$relation] ?? null);
        } catch (\Exception $e) {
            return response($e);
        }

        return response($this->getClassName(get_class($model)) . ' updated Successfully', SymfonyResponse::HTTP_OK);
    }

    public function delete(Model $model): Response
    {
        $model->forceDelete();

        return response($this->getClassName($this->model) .' deleted Successfully', SymfonyResponse::HTTP_OK);
    }

    public function massDestroy(array $resourceIDs): Response
    {
        $this->model::whereIn('id', $resourceIDs('ids'))->delete();

        return response($this->getClassName($this->model) . ' deleted Successfully', SymfonyResponse::HTTP_OK);
    }

}

