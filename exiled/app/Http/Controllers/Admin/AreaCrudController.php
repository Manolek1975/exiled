<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\AreaRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class AreaCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class AreaCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    public function setup()
    {
        $this->crud->setModel('App\Models\Area');
        $this->crud->setRoute(config('backpack.base.route_prefix') . '/area');
        $this->crud->setEntityNameStrings('area', 'areas');
    }

    protected function setupListOperation()
    {
        // TODO: remove setFromDb() and manually define Columns, maybe Filters
        //$this->crud->setFromDb();
        // Categoria
        $this->crud->addColumn([
            'name' => 'categoria.nombre',
            'label' => 'Categoria',
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
        $this->crud->setValidation(AreaRequest::class);

        // TODO: remove setFromDb() and manually define Fields
        //$this->crud->setFromDb();
        // Categoria
        $this->crud->addField([
            'label' => "Categoria",
            'type' => 'select2',
            'name' => 'categoria_id', // the db column for the foreign key
            'entity' => 'categoria', // the method that defines the relationship in your Model
            'attribute' => 'nombre', // foreign key attribute that is shown to user
            'model' => "App\Models\Categoria", // foreign key model

            'options'   => (function ($query) {
                return $query->orderBy('grupo_id', 'ASC')->where('grupo_id', 2)->get();
            }), 
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
        // Leyenda
        $this->crud->addField([
            'name' => 'leyenda',
            'label' => 'Leyenda',
            'type' => 'table',
            'entity_singular' => 'eyenda', // used on the "Add X" button
            'columns' => [
                'num' => 'Leyenda',
                'desc' => 'Descripción',
            ],
            //'max' => 5, // maximum rows allowed in the table
            //'min' => 0, // minimum rows allowed in the table
        ]);
        // NPCs
        $this->crud->addField([
            'label' => "NPCs",
            'type' => 'select2',
            'name' => 'npcs_id', // the db column for the foreign key
            'entity' => 'npc', // the method that defines the relationship in your Model
            'attribute' => 'nombre', // foreign key attribute that is shown to user
            'model' => "App\Models\Npc", // foreign key model
        ]);
        // Quests
        $this->crud->addField([
            'label' => "Quests",
            'type' => 'select2',
            'name' => 'quest_id', // the db column for the foreign key
            'entity' => 'quest', // the method that defines the relationship in your Model
            'attribute' => 'nombre', // foreign key attribute that is shown to user
            'model' => "App\Models\Quest", // foreign key model
        ]);
        // Title
        $this->crud->addField([
            'name' => 'title',
            'label' => 'Meta-title',
            'type' => 'text',
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
