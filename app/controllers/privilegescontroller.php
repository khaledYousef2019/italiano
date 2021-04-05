<?php


namespace PHPMVC\Controllers;


use PHPMVC\LIB\Helper;
use PHPMVC\LIB\InputFilter;
use PHPMVC\Models\PrivilegesModel;
use PHPMVC\Models\UserGroupPrivilegeModel;

class PrivilegesController extends AbstractController
{
    use InputFilter;
    use Helper;
    public function defaultAction()
    {

        $this->_language->load('template.common');
        $this->_language->load('privileges.default');
        $this->_data['privileges'] = PrivilegesModel::getAll();

        $this->_view();
    }
    // TODO: still need to prevent cross site request forgery Attack
    public function createAction(){
        $this->_language->load('template.common');
        $this->_language->load('privileges.labels');
        $this->_language->load('privileges.create');

        if (isset($_POST['submit'])){
            $privilege = new PrivilegesModel();
            $privilege->PrivilegeTitle = $this->filterStr($_POST['PrivilegeTitle']);
            $privilege->Privilege = $this->filterStr($_POST['Privilege']);
            if ($privilege->save()){
                $this->redirect('/privileges') ;
            }
        }
        $this->_view();
    }
    public function editAction(){
        $privilegeId = $this->filterInt($this->_params[0]);
        $privilege = PrivilegesModel::getByPK($privilegeId);
        if ($privilege == false){
            $this->redirect('/privileges');
        }
        $this->_data['privilege'] = $privilege;
        $this->_language->load('template.common');
        $this->_language->load('privileges.labels');
        $this->_language->load('privileges.edit');

        if (isset($_POST['submit'])){
            $privilege->PrivilegeTitle = $this->filterStr($_POST['PrivilegeTitle']);
            $privilege->Privilege = $this->filterStr($_POST['Privilege']);
            if ($privilege->save()){
                $this->redirect('/privileges') ;
            }
        }
        $this->_view();
    }
    public function deleteAction(){
        $privilegeId = isset($this->_params[0]) ? $this->filterInt($this->_params[0]):$this->redirect('/privileges');
        $privilege = PrivilegesModel::getByPK($privilegeId);
        if ($privilege == false){
            $this->redirect('/privileges');
        }
        $groupPrivileges = UserGroupPrivilegeModel::getBy(['PrivilegeId' => $privilege->PrivilegeId]);
        if (false !== $groupPrivileges){
            foreach ($groupPrivileges as $groupPrivilege){
                $groupPrivilege->delete();
            }
        }
        if ($privilege->delete()){
            $this->redirect('/privileges') ;
        }
        $this->_view();
    }
}