<?php

namespace BaseCms\AdminBundle\Controller;

use BaseCms\CommonBundle\Controller\BaseController;
use BaseCms\CommonBundle\Entity\DtbAdmin;
use BaseCms\CommonBundle\Form\SystemType;
use BaseCms\CommonBundle\Form\SystemSearchType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\Util\SecureRandom;
use Symfony\Component\Security\Core\Encoder\EncoderFactory;
use Symfony\Component\DependencyInjection\Container;

class SystemController extends BaseController
{
    /**
     * コンストラクタ
     * 
     */
    public function __construct(){
        parent::__construct();
    }
    
    /**
     * 検索ページ
     * 
     * 
     */
    public function indexAction(Request $request)
    {
        
        //検索フォームの生成
        $form = $this->createForm(new SystemSearchType());
        
        //データベースの値の取得
        $arrAdmin = $this->getDoctrine()
                        ->getRepository('BaseCmsCommonBundle:DtbAdmin')
                        ->findAll();
        
        return $this->render('BaseCmsCommonBundle:Admin:System/index.html.twig', 
                        array(
                                'form' => $form->createView(),
                                'arrAdmin' => $arrAdmin,
                            ));
    }
    
    /**
     * 検索結果ページ
     * 
     * 
     */
    public function searchAction(Request $request)
    {
        
        //エンティティの宣言
        $dtb_admin = new DtbAdmin();
        
        //検索フォームの生成
        $form = $this->createForm(new SystemSearchType());
        
        $arrAdminLevel = parent::getDbMaster('BaseCmsCommonBundle:MtbAdminLevel');
        
        //検索条件
        $arrSearch = array();
        
        //送信をクリックした場合
        if($request->getMethod() == 'GET'){
            
            $form->handleRequest($request);
            
            $arrRequest = $request->query->all();
            
            if($arrRequest){
                
                foreach($arrRequest as $req){
                    
                    foreach($req as $key => $value){
                        
                        if($key != 'number' && $key != 'status' && $value){
                            $arrSearch[lcfirst(Container::camelize($key))] = $value;
                        }
                        
                    }
                }
                
            }
        }
        
        //データベースの値の取得
        $arrAdmin = $this->getDoctrine()
                        ->getRepository('BaseCmsCommonBundle:DtbAdmin')
                        ->findBy($arrSearch);

        return $this->render('BaseCmsCommonBundle:Admin:System/search.html.twig', 
                        array(
                                'form' => $form->createView(),
                                'arrAdminLevel' => $arrAdminLevel,
                                'arrAdmin' => $arrAdmin,
                            ));
    }
    
    /**
     * @author T.shinohara
     * @version 1.
     */
    public function registAction(Request $request)
    {
        
         //セッションの読み込み/
        $session = $this->getRequest()->getSession();
        
        //セッションのデータを取得
        $arrFormParamTemp = $session->get('admin_system_regist');
        
        //フォームの作成
        $dtb_admin = new DtbAdmin();
        
        //フォームタイプの宣言
        $SystemType = new SystemType();
        
        //フォーム名の取得
        $formKey = $SystemType->getName();
        
        //フォームタイプからのフォーム作成
        $form = $this->createForm($SystemType, $dtb_admin, array('validation_groups' => array('registration')));
        
        //確認画面から戻った場合、セッションから値を設定する
        if(isset($arrFormParamTemp[$formKey])){
            
            if($arrFormParamTemp[$formKey]){
                foreach($arrFormParamTemp[$formKey] as $key => $value){
                    $form->get($key)->setData($value);
                }
            }
        }
        
        //データが送信されたとき
        if ($request->getMethod() == 'POST') {
            
            $form->handleRequest($request);
            
            $arrFormParam = $request->request->all();
             
            //セッションの読み込み
            $session = $this->getRequest()->getSession();
            
            //セッションの削除
            $session->remove('admin_system_regist');
            
            //セッションの設定
            $session->set('admin_system_regist', $arrFormParam);
            
            $validator = $this->get('validator');
            $errors   = $validator->validate($dtb_admin, array('registration'));

             //エラーがあるとき
            if(count($errors) > 0){
              
              return $this->render('BaseCmsCommonBundle:Admin:System/regist_input.html.twig', 
                                array(
                                    'form' => $form->createView(),
                                    'errors' => $errors
                                ));
              
            }else{
              return $this->redirect($this->generateUrl('base_cms_admin_system_regist_confirm'));
            }
            
        }
        
        return $this->render('BaseCmsCommonBundle:Admin:System/regist_input.html.twig', array('form' => $form->createView()));
    }
    
    //確認画面
    public function confirmAction(Request $request)
    {
        
        //セッションの読み込み
        $session = $this->getRequest()->getSession();
        
        //セッションのデータを取得
        $arrFormParamTemp = $session->get('admin_system_regist');
        
        //フォームタイプの宣言
        $SystemType = new SystemType();
        
        //フォーム名の取得
        $formKey = $SystemType->getName();
        
        $arrFormParam = $arrFormParamTemp[$formKey];
        
        //エンティティの宣言
        $dtb_admin = new DtbAdmin();
        
        //フォームタイプからのフォーム作成
        $form = $this->createForm($SystemType, $dtb_admin, array('validation_groups' => array('registration')));
        
        //確認画面から戻った場合、セッションから値を設定する
        if(isset($arrFormParam)){
            
            if($arrFormParam){
                foreach($arrFormParam as $key => $value){
                    $form->get($key)->setData($value);
                }
            }
        }
        
        //送信をクリックした場合
        if($request->getMethod() == 'POST'){
            
            //DB登録よ用に値を設定
            
            $timestamp = new \DateTime("now");
            
            $dtb_admin->setName($arrFormParam['name']);
            $dtb_admin->setUserId($arrFormParam['userId']);
            $dtb_admin->setAdminLevelId($arrFormParam['adminLevelId']);
            $dtb_admin->setPassword($arrFormParam['password']);
            $dtb_admin->setMemo($arrFormParam['memo']);
            $dtb_admin->setStatus($arrFormParam['status']);
            $dtb_admin->setCreateDate($timestamp);
            $dtb_admin->setUpdateDate($timestamp);
            $dtb_admin->setDelFlg(0);
            
            $validator = $this->get('validator');
            $errors    = $validator->validate($dtb_admin, array('registration'));
            
             //エラーがあるとき
            if(count($errors) > 0){
                return $this->redirect($this->generateUrl('base_cms_admin_system_regist'));
            }
            
            /**
             * エラーがない場合、パスワードを作成シ、設定する
             */
            $salt = parent::getRandomString();
            
            $factory  = $this->get('security.encoder_factory');
            $password = $factory->getEncoder($dtb_admin)->encodePassword($arrFormParam['password'], $salt);
            
            $dtb_admin->setPassword($password);
            $dtb_admin->setSalt($salt);
            
            //エンティティマネージャーの取得
            $em = $this->getDoctrine()->getEntityManager();
            
            //オブジェクトをマネージする
            $em->persist($dtb_admin);
            
            //データベースを更新
            $em->flush();
            
            //メール送信処理   
            $message = \Swift_Message::newInstance()
                ->setSubject('HelloEmail')
                ->setFrom('rirakkuma.music@gmail.com')
                ->setTo('shino.t.music@gmail.com')
                ->setBody('swiftMailerTest test');
            
            $this->get('mailer')->send($message);
            
            //完了画面にリダイレクト
            return $this->redirect($this->generateUrl('base_cms_admin_system_regist_complete'));
        }
        
        return $this->render('BaseCmsCommonBundle:Admin:System/regist_confirm.html.twig', 
            array(
                'form' => $form->createView(),
                'admin' => $arrFormParam
            )
        );
        
    }

    //完了画面
    public function completeAction(Request $request)
    {
      
      //セッションの読み込み
      $session = $this->getRequest()->getSession();
      
      //セッションの削除
      $session->remove('admin_system_regist');
      
      //テンプレートの表示
      return $this->render('BaseCmsCommonBundle:Admin:System/regist_complete.html.twig');
    }
}
