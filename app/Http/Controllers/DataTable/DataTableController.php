<?php

namespace App\Http\Controllers\DataTable;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Exception;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Schema;

abstract class DataTableController extends Controller
{
    protected $builder;

    abstract public function builder();

    public function __construct()
    {
        $builder = $this->builder();

        if (!$builder instanceof Builder) {
            throw new Exception('Entity not instance of Builder');
        }

        $this->builder = $builder;
    }
    /*
    * response we send back to the frontend
    */
    public function index(Request $request)
    {
        return response()->json([
            'data' => [
                'table' => $this->builder->getModel()->getTable(),
                'displayable' => array_values($this->getDisplayableColumns()),
                'updatable' => array_values($this->getUpdatableColumns()),
                'records' => $this->getRecords($request),
            ]
        ]);
    }

    public function update($id, Request $request)
    {
        $this->builder->find($id)->update($request->only($this->getUpdatableColumns()));
    }


    /*
    * to get the list of fields in the builder that was passed
    * excluding the fields that should be hidden
    */
    public function getDisplayableColumns()
    {
        return array_diff($this->getDatabaseColumns(), $this->builder->getModel()->getHidden());
    }

    public function getUpdatableColumns()
    {
        return $this->getDisplayableColumns();
    }

    /*
    * to get the list of fields in the builder that was passed
    */
    public function getDatabaseColumns()
    {
        return Schema::getColumnListing($this->builder->getModel()->getTable());
    }

    public function getRecords(Request $request)
    {
        return $this->builder->limit($request->limit)->orderBy('id')->get($this->getDisplayableColumns());
    }
}
