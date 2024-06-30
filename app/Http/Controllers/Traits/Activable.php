<?php

namespace App\Http\Controllers\Traits;

trait Activable
{
    public function updateActive($id)
    {
        $model = $this->repository->find($id);

        if (empty($model)) {
            abort(404);
        }

        if (empty($model->active)) {
            $model->active = 1;
        }
        else {
            $model->active = 0;
        }

        $model->save();

        return redirect(route('voyager.'. $model->getTable() .'.index'));
    }
}
