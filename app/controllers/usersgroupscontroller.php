<?php


namespace PHPMVC\Controllers;


use PHPMVC\LIB\Helper;
use PHPMVC\LIB\InputFilter;
use PHPMVC\Models\PrivilegesModel;
use PHPMVC\Models\UserGroupModel;
use PHPMVC\Models\UserGroupPrivilegeModel;

class UsersGroupsController extends AbstractController
{
    use InputFilter;
    use Helper;

    public function defaultAction()
    {


        $this->_language->load('template.common');
        $this->_language->load('usersgroups.default');
        $this->_data['groups'] = UserGroupModel::getAll();

        $this->_view();
    }
    public function createAction()
    {

        $this->_language->load('template.common');
        $this->_language->load('usersgroups.labels');
        $this->_language->load('usersgroups.create');
        $this->_data['privileges'] = $privileges = PrivilegesModel::getAll();

        if (isset($_POST['submit'])){
            $group = new UserGroupModel();
            $group->GroupName = $this->filterStr($_POST['GroupName']);
            if ($group->save()){
                if (isset($_POST['privileges']) && is_array($_POST['privileges'])){
                    $groupPrivileges = $_POST['privileges'];
                      foreach ($groupPrivileges as $privilegeId){
                        $newPrivilege = new UserGroupPrivilegeModel();
                        $newPrivilege->GroupId = $group->GroupId;
                        $newPrivilege->PrivilegeId = $privilegeId;
                        $newPrivilege->save();
                    }
                    $this->redirect("/usersgroups");
                }
            }
        }
        $this->_view();
    }
    public function editAction()
    {
        $id = isset($this->_params[0]) ? $this->filterInt($this->_params[0]) : $this->redirect('/usersgroups');
        $Group = UserGroupModel::getByPK($id);
        if (!$Group){
            $this->redirect('/usersgroups');
        }
        $this->_language->load('template.common');
        $this->_language->load('usersgroups.labels');
        $this->_language->load('usersgroups.edit');
        $this->_data['group'] = $Group ;
        $this->_data['privileges'] = PrivilegesModel::getAll();
        $groupPrivileges= UserGroupPrivilegeModel::getBy(['GroupId'=>$Group->GroupId]);
        $extractePrivilegeIds=[];
        if (false !== $groupPrivileges){
            foreach ($groupPrivileges as $privilege){
                $extractePrivilegeIds[] = $privilege->PrivilegeId;
            }
        }
        $this->_data['groupPrivileges'] = $extractePrivilegeIds;
        if (isset($_POST['submit'])){
            $Group->GroupName = $this->filterStr($_POST['GroupName']);
            $_POST['privileges'] = isset($_POST['privileges']) ? $_POST['privileges'] : [];
            $privilegesIdsToDelete = array_diff($extractePrivilegeIds , $_POST['privileges'] );

            $privilegesIdsToAdd = array_diff($_POST['privileges'],$extractePrivilegeIds);
            foreach ($privilegesIdsToDelete as $deletedPrivilege){
                $unwantedPrivilege = UserGroupPrivilegeModel::getBy(['PrivilegeId'=>$deletedPrivilege,'GroupId'=>$Group->GroupId]);
                $unwantedPrivilege->current()->delete();
            }
            foreach ($privilegesIdsToAdd as $AddedPrivilege){
                $newPrivilege = new UserGroupPrivilegeModel();
                $newPrivilege->GroupId = $Group->GroupId;
                $newPrivilege->PrivilegeId = $AddedPrivilege;
                $newPrivilege->save();

            }
            $this->redirect('/usersgroups');

        }

        $this->_view();
    }
    public function deleteAction(){
        $id = isset($this->_params[0]) ? $this->filterInt($this->_params[0]) : $this->redirect('/usersgroups');
        $Group = UserGroupModel::getByPK($id);
        if (!$Group){
            $this->redirect('/usersgroups');
        }
        $privileges = UserGroupPrivilegeModel::getBy(['GroupId'=>$Group->GroupId]);
        if (false !== $privileges){
            foreach ($privileges as $privilege){
                $privilege->delete();
            }
        }
        if ($Group->delete()) {
            $this->redirect('/usersgroups');
        }
    }
}

