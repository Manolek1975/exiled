<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\QuestRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;
use App\Http\Controllers\Admin\Traits\AjaxUploadImagesTrait;

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
    use AjaxUploadImagesTrait;

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
        // Nombre
        $this->crud->addColumn([
            'name' => 'nombre',
            'label' => 'Nombre',
        ]);
        // Area
        $this->crud->addColumn([
            'name' => 'area.nombre',
            'label' => 'Area',
        ]);
        // NPC
        $this->crud->addColumn([
            'name' => 'npc.nombre',
            'label' => 'NPC',
        ]);                
        // Item
        $this->crud->addColumn([
            'name' => 'item.nombre',
            'label' => 'Item',
        ]);
        // Experiencia
        $this->crud->addColumn([
            'name' => 'xp',
            'label' => 'XP',
        ]);    
        // Monedas
        $this->crud->addColumn([
            'name' => 'oro',
            'label' => 'Oro',
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
            'type' => 'select2',
            'name' => 'categoria_id', // the db column for the foreign key
            'entity' => 'categoria', // the method that defines the relationship in your Model
            'attribute' => 'nombre', // foreign key attribute that is shown to user
            'model' => "App\Models\Categoria", // foreign key model

            'options'   => (function ($query) { // Asigna categorias solo del grupo a que pertenecen
                return $query->orderBy('grupo_id', 'ASC')->where('grupo_id', 1)->get();
            }), 
        ]);
        // Imagen
        $this->crud->addField([
            'name' => 'imagequest',
            'label' => 'Imagen Quest',
            'type' => 'image',
            'upload' => false,
            'prefix' => 'uploads/',
            'crop' => true,
            'aspect_ratio' => 0,
        ]);        
        // Multiples Imagenes
        $this->crud->addField([   // Upload varias imagenes
            'name' => 'images', //nombre del campo
            'label' => 'Imagenes', //etiqueta a mostrar
            'type' => 'upload_multiple',
            'upload' => true,
            'disk' => 'uploads', // directorio donde se guardan
        ]);          
        // Nombre
        $this->crud->addField([
            'name' => 'nombre',
            'label' => 'Nombre',
            'type' => 'text',
            'limit' => 255
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
            'type' => 'text',
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
        // NPC
        $this->crud->addField([
            'label' => "NPC",
            'type' => 'select2',
            'name' => 'npc_id', // the db column for the foreign key
            'entity' => 'npc', // the method that defines the relationship in your Model
            'attribute' => 'nombre', // foreign key attribute that is shown to user
            'model' => "App\Models\Npc", // foreign key model
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
        ]);
        // Descripción
        $this->crud->addField([
            'name' => 'descripcion',
            'label' => 'Descripción',
            'type' => 'ckeditor',
        ]);

        // RECOMPENSAS
        $this->crud->addField([ 
            'name' => 'separator',
            'type' => 'custom_html',
            'value' => '<h3>RECOMPENSAS</h3>'            
        ]);         
        // Item
        $this->crud->addField([
            'label' => "Objeto",
            'type' => 'select2',
            'name' => 'item_id', // the db column for the foreign key
            'entity' => 'item', // the method that defines the relationship in your Model
            'attribute' => 'nombre', // foreign key attribute that is shown to user
            'model' => "App\Models\Item", // foreign key model
        ]);  
        // Experiencia
        $this->crud->addField([
            'name' => 'xp',
            'label' => 'XP',
            'type' => 'number',
        ]);    
        // Oro
        $this->crud->addField([
            'name' => 'oro',
            'label' => 'Oro',
            'type' => 'number',
        ]);
        // Reputación
        $this->crud->addField([
            'name' => 'reputacion',
            'label' => 'Reputación',
            'type' => 'table',
            'entity_singular' => 'Reputacion', // used on the "Add X" button
            'columns' => [
                'faccion' => 'Facción',
                'valor' => 'Valor',
            ],
        ]);                
        // Notas
        $this->crud->addField([
            'name' => 'notas',
            'label' => 'Notas',
            'type' => 'text',
        ]);
        // Quest relacionada
        $this->crud->addField([
            'label' => "Quest relacionada",
            'type' => 'select2',
            'name' => 'quest_id', // the db column for the foreign key
            'entity' => 'quest', // the method that defines the relationship in your Model
            'attribute' => 'nombre', // foreign key attribute that is shown to user
            'model' => "App\Models\Quest", // foreign key model
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
        //$this->setupCreateOperation();
        // Categoria
        $this->crud->addField([
            'label' => "Categoria",
            'type' => 'select2',
            'name' => 'categoria_id', // the db column for the foreign key
            'entity' => 'categoria', // the method that defines the relationship in your Model
            'attribute' => 'nombre', // foreign key attribute that is shown to user
            'model' => "App\Models\Categoria", // foreign key model

            'options'   => (function ($query) { // Asigna categorias solo del grupo a que pertenecen
                return $query->orderBy('grupo_id', 'ASC')->where('grupo_id', 1)->get();
            }), 
        ]);
        // Imagen
        $this->crud->addField([
            'name' => 'imagequest',
            'label' => 'Imagen Quest',
            'type' => 'image',
            'upload' => false,
            'prefix' => 'uploads/',
            'crop' => true,
            'aspect_ratio' => 0,
        ]);        
        // Multiples Imagenes Edición
        $this->crud->addField([
            'name'          => 'images',
            'type'          => 'dropzone',
            'upload_route'  => 'upload_images',
            'reorder_route' => 'reorder_images',
            'delete_route'  => 'delete_image',
            'disk'          => 'uploads', // local disk where images will be uploaded
            'mimes'         => 'image/*', //allowed mime types separated by comma. eg. image/*, application/*, etc
            'filesize'      => 5, // maximum file size in MB
        ], 'update');         
        // Nombre
        $this->crud->addField([
            'name' => 'nombre',
            'label' => 'Nombre',
            'type' => 'text',
            'limit' => 255
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
            'type' => 'text',
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
        // NPC
        $this->crud->addField([
            'label' => "NPC",
            'type' => 'select2',
            'name' => 'npc_id', // the db column for the foreign key
            'entity' => 'npc', // the method that defines the relationship in your Model
            'attribute' => 'nombre', // foreign key attribute that is shown to user
            'model' => "App\Models\Npc", // foreign key model
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
        ]);
        // Descripción
        $this->crud->addField([
            'name' => 'descripcion',
            'label' => 'Descripción',
            'type' => 'ckeditor',
        ]);

        // RECOMPENSAS
        $this->crud->addField([ 
            'name' => 'separator',
            'type' => 'custom_html',
            'value' => '<h3>RECOMPENSAS</h3>'            
        ]);         
        // Item
        $this->crud->addField([
            'label' => "Objeto",
            'type' => 'select2',
            'name' => 'item_id', // the db column for the foreign key
            'entity' => 'item', // the method that defines the relationship in your Model
            'attribute' => 'nombre', // foreign key attribute that is shown to user
            'model' => "App\Models\Item", // foreign key model
        ]);  
        // Experiencia
        $this->crud->addField([
            'name' => 'xp',
            'label' => 'XP',
            'type' => 'number',
        ]);    
        // Oro
        $this->crud->addField([
            'name' => 'oro',
            'label' => 'Oro',
            'type' => 'number',
        ]);
        // Reputación
        $this->crud->addField([
            'name' => 'reputacion',
            'label' => 'Reputación',
            'type' => 'table',
            'entity_singular' => 'Reputacion', // used on the "Add X" button
            'columns' => [
                'faccion' => 'Facción',
                'valor' => 'Valor',
            ],
        ]);                
        // Notas
        $this->crud->addField([
            'name' => 'notas',
            'label' => 'Notas',
            'type' => 'text',
        ]);
        // Quest relacionada
        $this->crud->addField([
            'label' => "Quest relacionada",
            'type' => 'select2',
            'name' => 'quest_id', // the db column for the foreign key
            'entity' => 'quest', // the method that defines the relationship in your Model
            'attribute' => 'nombre', // foreign key attribute that is shown to user
            'model' => "App\Models\Quest", // foreign key model
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
}
