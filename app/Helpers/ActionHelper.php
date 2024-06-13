<?php
namespace App\Helpers;

class ActionHelper {

    /**
     * ActionHelper constructor.
     */
    private $namaRoute;

    /**
     * @param null $namaRoute
     */
    public function setNamaRoute($namaRoute): void{
        $this->namaRoute = $namaRoute;
    }

    private $initWarna=['create'=>'success', 'read'=>'info','update'=>'primary','delete'=>'danger'];

    public function __construct($namaRoute=null, $id=null){
        $this->namaRoute = $namaRoute;
        $this->id = $id;
    }

    public function showUpdateDeleteButton($id, $permission){

        $showButton = auth()->user()->cannot($permission.'.read') ? '' :
                    '<a href="' . route($this->namaRoute.'.show', $id) . '" class="btn btn-sm btn-'.$this->getColorClass('read').'
                        " title="Show"><i class=\'fa fa-eye\'></i></a>';
        $editButton = auth()->user()->cannot($permission.'.update') ? '' :
                    '<a href="' . route($this->namaRoute.'.edit', $id) . '" class="btn btn-sm btn-'.$this->getColorClass('update').'
                        " title="Edit"><i class=\'fa fa-edit\'></i></a>';
        $deleteButton = auth()->user()->cannot($permission.'.delete') ? '' :
                    '<a href="' . route($this->namaRoute.'.destroy', $id) .'" class="btn btn-delete btn-sm btn-'.$this->getColorClass('delete').'
                        " title="Delete"><i class=\'fa fa-trash\'></i></a>';
        return $showButton.' '.$editButton.' '.$deleteButton;
    }

    public function getAllInitWarna (){
        return $this->initWarna;
    }

    public function getColorClass($crud){
        return array_key_exists($crud, $this->initWarna) ? $this->initWarna[$crud] : 'secondary';
    }

    public static function getActiveUnactiveIcon($active){
        return $active?
            "<a href='#' class='btn btn-success btn-circle btn-sm not-clickable'><i class='fas fa-check'></i></a>"
            :
            "<a href='#'  class='btn btn-danger btn-circle btn-sm not-clickable'><i class='fas fa-times'></i></a>";

    }

    public function customButton($namaRoute, $icon){

    }
}

?>
