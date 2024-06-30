<?php

namespace App\Http\Controllers\Traits;

trait LinkedInActivable
{
    public function updateLinkedInActive($id)
    {
        $model = $this->repository->find($id);

        if (empty($model)) {
            abort(404);
        }

        if (empty($model->linkedin_post_status)) {
            $model->linkedin_post_status = 1;
        }
        else {
            $model->linkedin_post_status = 0;
        }

        $model->save();

        return redirect(route('voyager.'. $model->getTable() .'.index'));
    }
}
