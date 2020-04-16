<?php 

namespace App\Http\Controllers\Admin\Traits;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\MessageBag;

trait AjaxUploadImagesTrait {

	/**
	 * Upload an image with AJAX to the disk
	 * and store its path in the database.
	 *
	 * @param  Request $request [description]
	 * @return [type]           [description]
	 */
    public function ajaxUploadImages(Request $request)
    {
        $attribute_name = 'images';
        $entry = $this->crud->getEntry($request->input('id'));
        //$attribute_name = $entry->upload_multiple['attribute_name'];
        $files = $request->file($attribute_name);
        $file_count = count($files);
 
        foreach($files as $file){
            $finfo = new \finfo(FILEINFO_MIME_TYPE);
            $mimetype = $finfo->file($file);
            
            switch($mimetype){
                case 'image/jpeg':
                    $extension = '.jpeg'; break;
                case 'image/png':
                    $extension = '.png'; break;
                case 'image/jpeg':
                    $extension = '.gif'; break;
                default:
                    $extension = null ; break;
            }
            if(!$extension){
                return response()->json([
                    'success' => false,
                    'images' => $entry->{$attribute_name},
                ]);
            }
        }

        $entry->{$attribute_name} = $files;
        $entry->save();

        return response()->json([
            'success' => true,
            'message' => ($file_count>1)?'Uploaded '.$file_count.' images.':'Image uploaded',
            'images' => $entry->{$attribute_name},
        ]);
    }

    /**
     * Save new images order from sortable object.
     *
     * @param  Request $request [description]
     * @return [type]           [description]
     */
    public function ajaxReorderImages(Request $request)
    {
        $entry = $this->crud->getEntry($request->input('entry_id'));
        $entry->updateImageOrder($request->input('order'));

        return response()->json([
            'success' => true,
            'message' => 'New image order saved.'
        ]);
    }

    /**
     * Delete an image from the database and disk.
     *
     * @param  Request $request [description]
     * @return [type]           [description]
     */
    public function ajaxDeleteImage(Request $request)
    {
        $image_id = $request->input('image_id');
        $image_path = $request->input('image_path');
        $entry = $this->crud->getEntry($request->input('entry_id'));
        //$disk = $this->crud->getFields('update', $entry->id)['images']['disk'];
        $disk = 'uploads';

        // delete the image from the db
        $entry->removeImage($image_id, $image_path, $disk);

        return response()->json([
            'success' => true,
            'message' => 'Image deleted.'
        ]);
    }
}
