<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\CategoriaRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class CategoriaCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class CategoriaCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    public function setup()
    {
        $this->crud->setModel('App\Models\Categoria');
        $this->crud->setRoute(config('backpack.base.route_prefix') . '/categoria');
        $this->crud->setEntityNameStrings('categoria', 'categorias');
    }

    protected function setupListOperation()
    {
        // TODO: remove setFromDb() and manually define Columns, maybe Filters
        //$this->crud->setFromDb();
        // Grupo
        $this->crud->addColumn([
            'name' => 'grupo.nombre',
            'label' => 'Grupo',
        ]);
        // Imagen
        $this->crud->addColumn([
            'name' => 'imagen',
            'label' => 'Imagen',
            'type' => 'image',
            'prefix' => 'uploads',
            //'height' => '50px',
            //'width' => '50px',
        ]);      
        // Nombre
        $this->crud->addColumn([
            'name' => 'nombre',
            'label' => 'Nombre',
        ]);
        // Descripción
        $this->crud->addColumn([
            'name' => 'descripcion',
            'label' => 'Descripción',
        ]);   
    }

    protected function setupCreateOperation()
    {
        $this->crud->setValidation(CategoriaRequest::class);

        // TODO: remove setFromDb() and manually define Fields
        //$this->crud->setFromDb();
        // Categoria
        $this->crud->addField([
            'label' => "Grupo",
            'type' => 'select',
            'name' => 'grupo_id', // the db column for the foreign key
            'entity' => 'grupo', // the method that defines the relationship in your Model
            'attribute' => 'nombre', // foreign key attribute that is shown to user
            'model' => "App\Models\Grupo", // foreign key model
        ]);          
        // Nombre
        $this->crud->addField([
            'name' => 'nombre',
            'label' => 'Nombre',
            'type' => 'text',
            'limit' => 255
        ]);
        // Descripción
        $this->crud->addField([
            'name' => 'descripcion',
            'label' => 'Descripción',
            'type' => 'ckeditor',
        ]); 
        // Imagen
        $this->crud->addField([
            'name' => 'imagen',
            'label' => 'imagen',
            'type' => 'image',
            'upload' => false,
            'prefix' => 'uploads/',
            'crop' => true,
            'aspect_ratio' => 0,
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
