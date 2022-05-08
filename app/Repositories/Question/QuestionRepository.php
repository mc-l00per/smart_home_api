<?php

namespace App\Repositories\Question;

use App\Models\Register\Question;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class QuestionRepository implements QuestionRepositoryInterface
{
    protected Question $model;

    /**
     * Constructor para la interfaz del repository de User
     *  Genera un objeto del modelo user
     *
     * AuthRepository constructor.
     *
     * @param Question $question
     */
    public function __construct(Question $question)
    {
        $this->model = $question;
    }

    /**
     *
     */
    public function all(): Collection|array
    {
        return $this->model->with('answers')->get();
    }

    /**
     * @param array $data
     * @return mixed
     */
    public function create(array $data): mixed
    {
        return $this->model->create($data);
    }

    /**
     * @param array $data
     * @param $id
     * @return mixed
     */
    public function update(array $data, $id): mixed
    {
        return $this->model->whereId($id)
            ->update($data);
    }

    /**
     * @param $id
     * @return int
     */
    public function delete($id): int
    {
        return $this->model->destroy($id);
    }

    /**
     * @param $id
     * @return mixed
     */
    public function find($id): mixed
    {
        if (null == $question = $this->model->find($id)) {
            throw new ModelNotFoundException(trans());
        }
        return $question;
    }
}