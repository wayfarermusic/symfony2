<?php

namespace BaseCms\AdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use BaseCms\CommonBundle\Entity\MtbAdminLevel;

class BaseController extends Controller
{
    
    /**
     * コンストラクタ
     * 
     */
    public function __construct(){
        
    }
    
    /**
     * マスタを取得し、値を返す
     * 
     * @param $string $repository リポジトリ名
     */
    public function getDbMaster($repository){
        
        $arrMasterTemp = $this->getDoctrine()
                        ->getRepository($repository)
                        ->findAll();
        
        $arrMaster = array();
        
        if($arrMasterTemp){
            foreach($arrMasterTemp as $index => $masterTemp){
                $arrMaster[$masterTemp->getId()] = $masterTemp->getName();
            }
        }
        
        return $arrMaster;
    }
}
