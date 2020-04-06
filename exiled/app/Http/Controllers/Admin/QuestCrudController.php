<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\QuestRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class QuestCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class QuestCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    public function setup()
    {
        $this->crud->setModel('App\Models\Quest');
        $this->crud->setRoute(config('backpack.base.route_prefix') . '/quest');
        $this->crud->setEntityNameStrings('quest', 'quests');
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
        // Objeto
        $this->crud->addColumn([
            'name' => 'objeto',
            'label' => 'Objeto',
        ]);
        // Experiencia
        $this->crud->addColumn([
            'name' => 'xp',
            'label' => 'XP',
        ]);    
        // Monedas
        $this->crud->addColumn([
            'name' => 'monedas',
            'label' => 'Monedas',
        ]);        
        // Texto
        $this->crud->addColumn([
            'name' => 'texto',
            'label' => 'Texto',
        ]);        
    }  

    protected function setupCreateOperation()
    {
        $this->crud->setValidation(QuestRequest::class);

        // TODO: remove setFromDb() and manually define Fields
        //$this->crud->setFromDb();
        // Categoria
        $this->crud->addField([
            'label' => "Categoria",
            'type' => 'select',
            'name' => 'categoria_id', // the db column for the foreign key
            'entity' => 'categoria', // the method that defines the relationship in your Model
            'attribute' => 'nombre', // foreign key attribute that is shown to user
            'model' => "App\Models\Categoria", // foreign key model
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

        // MISION DETALLADA
        $this->crud->addField([ 
            'name' => 'separator0',
            'type' => 'custom_html',
            'value' => '<h3>MISION DETALLADA</h3>'            
        ]);           
         // Inicio
         $this->crud->addField([
            'name' => 'inicio',
            'label' => 'Inicio',
            'type' => 'ckeditor',
        ]);

        // Progreso
        $this->crud->addField([
            'name' => 'progreso',
            'label' => 'Progreso',
            'type' => 'table',
            'entity_singular' => 'Paso', // used on the "Add X" button
            'columns' => [
                'num' => 'Paso',
                'desc' => 'Descripción',
            ],
            //'max' => 5, // maximum rows allowed in the table
            //'min' => 0, // minimum rows allowed in the table
        ]);

        // // Progreso
        // $this->crud->addField([
        //     'name' => 'progreso',
        //     'label' => 'Progreso',
        //     'type' => 'ckeditor',
        // ]);
        // Guia
        $this->crud->addField([
            'name' => 'guia',
            'label' => 'Guia',
            'type' => 'ckeditor',
        ]);

        // RECOMPENSAS
        $this->crud->addField([ 
            'name' => 'separator',
            'type' => 'custom_html',
            'value' => '<h3>RECOMPENSAS</h3>'            
        ]);         
        // Objeto
        $this->crud->addField([
            'name' => 'objeto',
            'label' => 'Objeto',
            'type' => 'text',
        ]);
        // Experiencia
        $this->crud->addField([
            'name' => 'xp',
            'label' => 'XP',
            'type' => 'number',
        ]);    
        // Monedas
        $this->crud->addField([
            'name' => 'monedas',
            'label' => 'Monedas',
            'type' => 'number',
        ]);        
        // Texto
        $this->crud->addField([
            'name' => 'texto',
            'label' => 'Texto',
            'type' => 'text',
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
