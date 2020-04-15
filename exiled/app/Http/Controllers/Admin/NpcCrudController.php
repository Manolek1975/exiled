<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\NpcRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class NpcCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class NpcCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    public function setup()
    {
        $this->crud->setModel('App\Models\Npc');
        $this->crud->setRoute(config('backpack.base.route_prefix') . '/npc');
        $this->crud->setEntityNameStrings('npc', 'npcs');
    }

    protected function setupListOperation()
    {
        // TODO: remove setFromDb() and manually define Columns, maybe Filters
        //$this->crud->setFromDb();
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
        $this->crud->setValidation(NpcRequest::class);

        // TODO: remove setFromDb() and manually define Fields
        //$this->crud->setFromDb();
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
        // faction
        $this->crud->addField([
            'name' => 'faction',
            'label' => 'Faction',
            'type' => 'text',
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
        // Area
        $this->crud->addField([
            'label' => "Area",
            'type' => 'select2',
            'name' => 'area_id', // the db column for the foreign key
            'entity' => 'area', // the method that defines the relationship in your Model
            'attribute' => 'nombre', // foreign key attribute that is shown to user
            'model' => "App\Models\Area", // foreign key model
        ]);
        // Quests
        $this->crud->addField([
            'label' => "Quests",
            'type' => 'select2_multiple',
            'name' => 'quest', // the db column for the foreign key
            'entity' => 'quest', // the method that defines the relationship in your Model
            'attribute' => 'nombre', // foreign key attribute that is shown to user
            'model' => "App\Models\Quest", // foreign key model
            'pivot' => true
        ]);               
        // Descripción
        $this->crud->addField([
            'name' => 'descripcion',
            'label' => 'Descripción',
            'type' => 'ckeditor',
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
