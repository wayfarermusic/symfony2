<?php

namespace BaseCms\AdminBundle\Controller;

use BaseCms\CommonBundle\Controller\BaseController;
use BaseCms\CommonBundle\Form\LoginType;
use BaseCms\CommonBundle\Entity\DtbAdmin;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\SecurityContext;

class LoginController extends BaseController
{
    
    /**
     * コンストラクタ
     * 
     */
    public function __construct()
    {
    }
    
    /**
     * ログインページ
     * 
     */
    public function loginAction(Request $request)
    {
        
        //エンティティの宣言
        $dtb_admin = new DtbAdmin();
        
        //ログインフォームの生成
        $form = $this->createForm(new LoginType(), $dtb_admin, array('validation_groups' => array('login')));
        
        //ログインをクリックした場合
        if($request->getMethod() == 'POST'){
            
            $form->handleRequest($request);
            
            $arrRequest = $request->request->all();
            
            $arrLogin = $arrRequest['AdminLogin'];
            
            //ログイン処理
            $validator = $this->get('validator');
            $errors   = $validator->validate($dtb_admin, array('login'));
            
            //エラーがあるとき
            if(count($errors) > 0){
                
                return $this->render('BaseCmsCommonBundle:Admin:System/login.html.twig',
                                array(
                                    'form' => $form->createView(),
                                )
                            );
                            
            }else{
                
                //エラーがないとき
                
                
            }
            
        }
        
        return $this->render('BaseCmsCommonBundle:Admin:System/login.html.twig',
                                array(
                                    'form' => $form->createView(),
                                )
                            );
    }
    
}
