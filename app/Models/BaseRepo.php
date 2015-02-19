<?php namespace ERPSAT\Models;


abstract class BaseRepo {

    //

    const PAGINATE = true;

    public $filters = [];

    abstract public function getModel();


    /*public function getFechaCreacionEsAttribute()
    {
        return date('d-m-Y H:i:s', strtotime($this->fecha_creacion));
    }*/


    public function findOrFail($id)
    {
        return $this->getModel()->findOrFail($id);
    }


    public function search(array $data = array(), $paginate = false)
    {
        $data = array_only($data, $this->filters);
        $data = array_filter($data, 'strlen');
        $q = $this->getModel()->select();
        foreach ($data as $field => $value)
        {
            // slug_url -> filterBySlugUrl
            $filterMethod = 'filterBy' . studly_case($field);
            if (method_exists(get_called_class(), $filterMethod))
            {
                $this->$filterMethod($q, $value);
            }
            else
            {
                $q->where($field, $data[$field]);
            }
        }
        return $paginate ?
            $q->paginate()->appends($data)
            : $q->get();
    }


    public function create(array $data)
    {
        return $this->getModel()->create($data);
    }


    public function update($model, array $data)
    {
        $model->fill($data);
        $model->save();
        return $model;
    }


    public function delete($model)
    {
        if (is_numeric($model))
        {
            $model = $this->findOrFail($model);
        }
        $model->delete();
        return $model;
    }
}