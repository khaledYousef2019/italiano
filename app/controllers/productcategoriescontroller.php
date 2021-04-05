<?php


namespace PHPMVC\Controllers;


use PHPMVC\LIB\Helper;
use PHPMVC\LIB\InputFilter;
use PHPMVC\Models\ProductCategoryModel;

class ProductCategoriesController extends AbstractController
{
    use InputFilter;
    use Helper;
    public function defaultAction()
    {
        $this->_language->load('template.common');
        $this->_language->load('productcategories.default');

        $this->_data['categories'] = ProductCategoryModel::getAll();

        $this->_view();
    }


    public function createAction()
    {
        $this->_language->load('template.common');
        $this->_language->load('productcategories.create');
        $this->_language->load('productcategories.labels');
        if(isset($_POST['submit'])) {
            $category = new ProductCategoryModel();
            $category->Name = $this->filterStr($_POST['Name']);
            $category->Image = $this->filterStr($_POST['image']);
            if ($category->save()){
                $this->redirect('/productcategories');
            }

        }

        $this->_view();
    }
    public function editAction()
    {
        $id = isset($this->_params[0]) ? $this->filterInt($this->_params[0]):$this->redirect('/productcategories');
        $category = ProductCategoryModel::getByPK($id);

        if($category === false) {
            $this->redirect('/productcategories');
        }

        $this->_language->load('template.common');
        $this->_language->load('productcategories.edit');
        $this->_language->load('productcategories.labels');

        $this->_data['category'] = $category;

        if(isset($_POST['submit'])) {
            $category->Name = $this->filterStr($_POST['Name']);
            $category->Image = $this->filterStr($_POST['image']);
            if ($category->save()){
                $this->redirect('/productcategories');
            }

        }

        $this->_view();
    }

    public function deleteAction()
    {
        $id = isset($this->_params[0]) ? $this->filterInt($this->_params[0]):$this->redirect('/productcategories');
        $category = ProductCategoryModel::getByPK($id);

        if($category === false) {
            $this->redirect('/productcategories');
        }

        $this->_language->load('productcategories.messages');

        $category->delete();
        $this->redirect('/productcategories');
    }
}