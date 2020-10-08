<?php
namespace PHPMVC\Controllers;

use PHPMVC\LIB\Helper;
use PHPMVC\LIB\InputFilter;
use PHPMVC\Models\EmployeeModel;

class EmployeeController extends AbstractController
{
    use InputFilter;
    use Helper;

    public function defaultAction()
    {
        $this->_language->load('template.common');
        $this->_language->load('employee.default');
        $this->_data['employees'] = EmployeeModel::getAll();
        $this->_view();
//        var_dump($this->_data);
    }

    public function addAction(){
        $this->_language->load('template.common');
        $this->_language->load('employee.labels');
        $this->_language->load('employee.add');
        if (isset($_POST['btnSubmit'])){
            $emp = new EmployeeModel();
            $emp->name = $this->filterStr($_POST['name']);
            $emp->age = $this->filterInt($_POST['age']);
            $emp->address = $this->filterStr($_POST['address']);
            $emp->salary = $this->filterFloat($_POST['salary']);
            $emp->tax = $this->filterFloat($_POST['tax']);
            if ($emp->save()){
                $this->redirect('/employee');
//             echo "Employee $emp->name Has Been saved successfully with ID : $emp->id";
            }
//            var_dump($emp);
//            try {
//                $emp = new EmployeeModel($name, $age, $address, $salary, $tax);
//                $emp->save();
//                header("LOCATION: /employee");
//            } catch (\PDOException $e){
//                throw new \Exception("Error While Registering ");
//            }
            }


        $this->_view();
    }

    public function editAction(){
        $this->_language->load('template.common');
        $this->_language->load('employee.labels');
        $this->_language->load('employee.edit');
        $id = $this->filterInt($this->_params[0]);
        if (isset($id) && $id > 0 ){
            $this->_data['employee'] = EmployeeModel::getByPK($id);
            if ($this->_data['employee'] === false){
                $this->redirect('/employee');
            }
            $this->_view();
        }
        if (isset($_POST['btnEdit'])){
            filter_INPUT(INPUT_POST,'id',FILTER_VALIDATE_INT);
            $id = filter_var($id,FILTER_SANITIZE_NUMBER_INT);

            $emp = EmployeeModel::getByPK($id);

            $emp->name = $this->filterStr($_POST['name']);
            $emp->age = $this->filterInt($_POST['age']);
            $emp->address = $this->filterStr($_POST['address']);
            $emp->salary = $this->filterFloat($_POST['salary']);
            $emp->tax = $this->filterFloat($_POST['tax']);
            if ($emp->save()){
                $this->redirect('/employee');
//             echo "Employee $emp->name Has Been saved successfully with ID : $emp->id";
            }
//            $emp = new EmployeeModel($name,$age,$address,$salary,$tax);
//            $emp->setProps($id,$name,$age,$address,$salary,$tax);
//            $emp->save();
////          $emp = $emp->getClone($id,$name,$age,$address,$salary,$tax);
////            $emp->save();
//            $emp->save();
//            var_dump($emp);
        }

    }
    public function deleteAction(){
        $id = $this->filterInt($this->_params[0]);
        $emp = EmployeeModel::getByPK($id);
            if ($emp === false){
                $this->redirect('/employee');
            }
       if ($emp->delete()){
           $this->redirect('/employee');
       }

    }

}