<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\GrupoRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class GrupoCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class GrupoCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    public function setup()
    {
        $this->crud->setModel('App\Models\Grupo');
        $this->crud->setRoute(config('backpack.base.route_prefix') . '/grupo');
        $this->crud->setEntityNameStrings('grupo', 'grupos');
    }

    protected function setupListOperation()
    {
        // TODO: remove setFromDb() and manually define Columns, maybe Filters
        //$this->crud->setFromDb();
        // Nombre
        $this->crud->addColumn([
            'name' => 'nombre',
            'label' => 'Nombre',
        ]);          
    }

    protected function setupCreateOperation()
    {
        $this->crud->setValidation(GrupoRequest::class);

        // TODO: remove setFromDb() and manually define Fields
        //$this->crud->setFromDb();
        // Nombre
        $this->crud->addField([
            'name' => 'nombre',
            'label' => 'Grupo',
            'type' => 'text',
            'limit' => 255
        ]); 
        // Slug
        $this->crud->addField([
            'name' => 'slug',
            'label' => 'Slug',
            'type' => 'text',
            'limit' => 255
        ]);         
    }

    protected function setupUpdateOperation()
    {
        $this->setupCreateOperation();
    }
}
