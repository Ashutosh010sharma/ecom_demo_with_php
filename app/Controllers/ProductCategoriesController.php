<?php

namespace App\Controllers;
use App\Models\ProductCategories;



class ProductCategoriesController extends BaseController
{
    public function categories(){
        if ($this->request->is('get')){
            $model=new ProductCategories();
            $data=[
                'records'=>$model->paginate(10),
                'pager'=>$model->pager,
            ];
            return view('product_categories/product_categories',$data);
        }
        else if ($this->request->is('post')){
            if (! $isValid = $this->valid([
                'name'=>'required|max_length[120]',
                'image'=>'uploaded[image]|max_size[image,1024]|ext_in[image,png,jpg,gif]'
            ])){
                return redirect()->back()->withInput()->with('errors', service('validation')->getErrors());
            }
            else{
                $name=$this->request->getVar("name");
                $image=$this->request->getFile("image");

                if ($image->isValid() && !$image->hasMoved()) {
                    $newName = $image->getRandomName();
                    $image->move("images/product_categories", $newName);
                    
                    $model=new ProductCategories();
                    $data=[
                        'name'=>$name,
                        "image"=>$newName
                    ];
                    $model->insert($data);
                    return redirect()->to(base_url("admin/product_categories"));
                }
                else {
                    // Handle the case where image upload failed
                    return redirect()->back()->withInput()->with('error', 'Image upload failed.');
                }
        }
         
    }
}
}