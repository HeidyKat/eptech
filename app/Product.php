<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Product extends Model
{
    protected $fillable = [
        'codigo',
        'nombre',
        'slug',
        'stock',
        'precio',
        'short_description',
        'long_description',
        'estado',
        'subcategory_id',
    ];
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function images()
    {
        return $this->morphMany('App\Image','imageable');
    }
    public function tags()
    {
        return $this ->belongsToMany(Tag::class);
    }
    public function my_store($request)
    {
        //se crea el producto
        $product = self::create([
            'codigo'=> $request->codigo,
            'nombre'=>$request->nombre,
            'slug'=>Str::slug($request->nombre,'_'),

            'precio'=>$request->precio,
            'short_description'=>$request->short_description,
            'long_description'=>$request->long_description,
            'subcategory_id'=>$request->subcategory_id,

        ]);
        $product ->tags()->attach($request->get('tags'));
        $this->generate_code($product);
        $this->upload_files($request, $product);

    }
    public function my_update($request)
    {
        $this ->update([
            'codigo'=> $request->codigo,
            'nombre'=>$request->nombre,
            'slug'=>Str::slug($request->nombre,'_'),
            'precio'=>$request->precio,
            'short_description'=>$request->short_description,
            'long_description'=>$request->long_description,
            'subcategory_id'=>$request->subcategory_id,
        ]);
        $this ->tags()->sync($request->get('tags'));//para que no se duplique los tags
        $this->generate_code($this);
        // $this->upload_files($request, $this);
    }
    public function generate_code($product){
        $numero=$product->id;
        $numeroConCeros = str_pad($numero,8,"0",STR_PAD_LEFT);
        $product->update(['code'=>$numeroConCeros]);

    }
    public function upload_files($request, $product){

        $urlimages =[];
        if($request ->hasFile('images')){
            $images = $request->file('images');
            foreach($images as $image){
                $nombre = time().$image->getClientOriginalName();
                $ruta=public_path().'/image';
                $image->move($ruta,$nombre);
                $urlimages[]['url']='/image/'.$nombre;
            }
        }
        $product->images()->createMany($urlimages);
    }
}
