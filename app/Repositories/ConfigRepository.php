<?php

namespace App\Repositories;

use App\Models\Config;
use App\Repositories\BaseRepository;

/**
 * Class ConfigRepository
 * @package App\Repositories
 * @version May 19, 2021, 3:40 pm WIB
*/

class ConfigRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'key',
        'value'
    ];
    protected $selectColumns = [
        '*',
    ];
    protected $paginate = 10;

    /**
     * Return searchable fields filled search query
     *
     * @return array
     */
    public function search($request)
    {
        return $request->search ? array_fill_keys($this->getFieldsSearchable(), $request->search) : [];
    }

    /**
     * Return searchable fields filled search query
     *
     * @return LengthAwarePaginator
     */
    public function getPaginate($search, $columns = null)
    {
        $columns = !empty($columns) ? $columns : $this->selectColumns;
        return $this->allQuery($this->search($search), true)->paginate($this->paginate, $columns);
    }

    /**
     * Return searchable fields
     *
     * @return array
     */
    public function getFieldsSearchable()
    {
        return $this->fieldSearchable;
    }

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Config::class;
    }
}
