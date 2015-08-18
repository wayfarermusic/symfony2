<?php

namespace BaseCms\CommonBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Security\Core\Util\SecureRandom;

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
    public function getDbMaster($repository)
    {
        
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
    
    /**
     * ランダムな文字列の作成
     * 
     * @param $integer $length 文字列の長さ
     */
    public function getRandomString($length = 32)
    {
        
        $generator = new SecureRandom();
        
        $value = base64_encode($generator->nextBytes($length));
        
        return $value;
    }
}
