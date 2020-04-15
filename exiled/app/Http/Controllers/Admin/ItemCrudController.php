<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\ItemRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class ItemCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class ItemCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    public function setup()
    {
        $this->crud->setModel('App\Models\Item');
        $this->crud->setRoute(config('backpack.base.route_prefix') . '/item');
        $this->crud->setEntityNameStrings('item', 'items');
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
        // Foto
        $this->crud->addColumn([
            'name' => 'imagen',
            'label' => 'Imagen',
            'type' => 'image',
            'prefix' => 'uploads',
            //'height' => '50px',
            //'width' => '50px',
        ]);
        // Tipo
        $this->crud->addColumn([
            'name' => 'tipo',
            'label' => 'Tipo',
        ]);         
        // Nombre
        $this->crud->addColumn([
            'name' => 'nombre',
            'label' => 'Nombre',
        ]);
        // Clase
        $this->crud->addColumn([
            'name' => 'clase',
            'label' => 'Clase',
        ]);  
        // Rareza
        $this->crud->addColumn([
            'name' => 'rareza',
            'label' => 'Rareza',
        ]);  
        // Valor
        $this->crud->addColumn([
            'name' => 'valor',
            'label' => 'Valor',
        ]);  
        // Efecto
        $this->crud->addColumn([
            'name' => 'efecto',
            'label' => 'Efecto',
        ]);  
        // Quest
        $this->crud->addColumn([
            'name' => 'quest.nombre',
            'label' => 'Quest',
        ]);                                              
    }

    protected function setupCreateOperation()
    {
        $this->crud->setValidation(ItemRequest::class);

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
            'options'   => (function ($query) { // Asigna categorias solo del grupo a que pertenecen
                return $query->orderBy('grupo_id', 'ASC')->where('grupo_id', 3)->get();
            }), 
        ]);
        // Tipo
        $this->crud->addField([
            'name' => 'tipo',
            'label' => "Template",
            'type' => 'select2_from_array',
            'options' => ['quest' => 'Quest', 'llave' => 'Llave', 'gema' => 'Gema', 'piel' => 'Piel', 'Hierba' => 'hierba', 'pocion' => 'Poción', 'scroll' => 'Pergamino'],
            'allows_null' => false,
            'default' => 'one',
            // 'allows_multiple' => true, // OPTIONAL; needs you to cast this to array in your model;
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
        // Nombre
        $this->crud->addField([
            'name' => 'nombre',
            'label' => 'Nombre',
            'type' => 'text',
            'limit' => 255
        ]);
        // Clase
        $this->crud->addField([
            'name' => 'clase',
            'label' => 'Clase',
            'type' => 'text',
            'limit' => 255
        ]);   
        // Rareza
        $this->crud->addField([
            'name' => 'rareza',
            'label' => 'Rareza',
            'type' => 'text',
            'limit' => 255
        ]);   
        // Valor
        $this->crud->addField([
            'name' => 'valor',
            'label' => 'Valor',
            'type' => 'number',
            'limit' => 255
        ]);  
        // Efecto
        $this->crud->addField([
            'name' => 'efecto',
            'label' => 'Efecto',
            'type' => 'text',
            'limit' => 255
        ]); 
        // Quest
        $this->crud->addField([
            'label' => "Quest",
            'type' => 'select2',
            'name' => 'quest_id', // the db column for the foreign key
            'entity' => 'quest', // the method that defines the relationship in your Model
            'attribute' => 'nombre', // foreign key attribute that is shown to user
            'model' => "App\Models\Quest", // foreign key model
            // 'options'   => (function ($query) { // Asigna categorias solo del grupo a que pertenecen
            //     return $query->orderBy('grupo_id', 'ASC')->where('grupo_id', 1)->get();
            // }), 
        ]);   

        // SEO
        $this->crud->addField([ 
            'name' => 'separator2',
            'type' => 'custom_html',
            'value' => '<h3>SEO</h3>'            
        ]);  
        // Title
        $this->crud->addField([
            'name' => 'title',
            'label' => 'Meta-title',
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
