<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Model;
use Storage;

class Quest extends Model
{
    use CrudTrait;

    /*
    |--------------------------------------------------------------------------
    | GLOBAL VARIABLES
    |--------------------------------------------------------------------------
    */

    protected $table = 'quests';
    // protected $primaryKey = 'id';
    // public $timestamps = false;
    protected $guarded = ['id'];
    protected $fillable = ['categoria_id', 'imagequest', 'images', 'nombre', 'inicio', 'area_id', 'npc_id', 'progreso', 'descripcion', 
                            'item_id', 'xp', 'oro', 'reputacion', 'notas', 'quest_id', 'title', 'slug'];
    protected $casts = ['images' => 'array'];
    // protected $hidden = [];
    // protected $dates = [];


    /*
    |--------------------------------------------------------------------------
    | FUNCTIONS
    |--------------------------------------------------------------------------
    */
    // Borrado de imágenes en cascada
	public static function boot(){
        parent::boot();
        static::deleting(function($obj) {
            if (count((array)$obj->imagequest)) {
                \Storage::disk('uploads')->delete($obj->imagequest);
            }
            if (count((array)$obj->images)) {
                foreach ($obj->images as $file_path) {
                    \Storage::disk('uploads')->delete($file_path);
                }
            }
        });
    }

    public function updateImageOrder($order) {
		$new_images_attribute = [];

		foreach ($order as $key => $image) {
		    $new_images_attribute[$image['id']] = $image['path'];
		}
		$new_images_attribute = json_encode($new_images_attribute);

		$this->attributes['images'] = $new_images_attribute;
		$this->save();
    }
    
	public function removeImage($image_id, $image_path, $disk)
	{
		// delete the image from the db
		$images = json_encode(array_except($this->images, [$image_id]));
		$this->attributes['images'] = $images;
		$this->save();

		// delete the image from the folder
		if (Storage::disk($disk)->has($image_path)) {
		    Storage::disk($disk)->delete($image_path);
		}
	}    
	    
    /*
    |--------------------------------------------------------------------------
    | RELATIONS
    |--------------------------------------------------------------------------
    */
    public function categoria(){
        return $this->belongsTo('App\Models\Categoria');        
    }

    public function area(){
        return $this->belongsTo('App\Models\Area');        
    }
    
    public function npc(){
        return $this->belongsTo('App\Models\Npc');
    }
    
    public function item(){
        return $this->belongsTo('App\Models\Item');
    } 
    
    public function quest(){
        return $this->belongsTo('App\Models\Quest');
    }     
    /*
    |--------------------------------------------------------------------------
    | SCOPES
    |--------------------------------------------------------------------------
    */

    /*
    |--------------------------------------------------------------------------
    | ACCESSORS
    |--------------------------------------------------------------------------
    */

    /*
    |--------------------------------------------------------------------------
    | MUTATORS
    |--------------------------------------------------------------------------
    */
    public function setTitleAttribute($value){
        // Rellena el title del nombre si está vacío
        if(!isset($value))
            $this->attributes['title'] = $this->nombre;
        else
            $this->attributes['title'] = $value;
    }

    public function setSlugAttribute($value){
        // Rellena el slug del nombre si está vacío
        if(!isset($value))
            $this->attributes['slug'] = str_slug(($this->nombre)."-");
        else
            $this->attributes['slug'] = $value;
    }
    
    public function setImagequestAttribute($value) //el nombre debe ser igual al del campo
    {
        $attribute_name = "imagequest";
        $disk = "uploads";
        $destination_path = "";
        
        // if the image was erased
        if ($value==null) {
            // delete the image from disk
            \Storage::disk($disk)->delete($this->{$attribute_name});
            // set null in the database column
            $this->attributes[$attribute_name] = null;
        } else
        {
            // Esta validacion debe coincidir con los tipos permitidos en la validacion puesta en el Request
            $extension = '';
            if (starts_with($value, 'data:image/png'))
                $extension = '.png';
            else if (starts_with($value, 'data:image/gif'))
                $extension = '.gif';
            else if (starts_with($value, 'data:image/jpeg'))
                $extension = '.jpg';
                    
                    // if a base64 was sent, store it in the db
                    if($extension!='') //if (starts_with($value, 'data:image'))
                    {
                        // 0. Make the image
                        $image = \Image::make($value);
                        // 1. Generate a filename.
                        $filename = md5($value.time()).$extension;
                        // 2. Store the image on disk.
                        \Storage::disk($disk)->put($destination_path.'/'.$filename, $image->stream());
                        // 3. Save the path to the database
                        $this->attributes[$attribute_name] = $destination_path.'/'.$filename;
                    } else
                    {
                        // si llega hasta aqui es que es una imagen que ya estaba en la base de datos y por tanto nos
                        // llega como un nombre de fichero asi que lo ignoramos y no hacemos nada, porque no hay nada
                        // que guardar (este comportamiento es muy especifico del field type 'image' del backpack)
                    }
        }
        
    }
    // Mutator para subir multiples imágenes
    public function setImagesAttribute($value)
    {
        $attribute_name = "images";
        $disk = "uploads";
        $destination_path = "/";

        $this->uploadMultipleFilesToDisk($value, $attribute_name, $disk, $destination_path);
    }    
}
