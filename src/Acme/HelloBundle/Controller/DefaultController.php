<?php

namespace Acme\HelloBundle\Controller;

use Acme\HelloBundle\Entity\Hello;
use Acme\HelloBundle\Form\HelloType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    public function indexAction(Request $request)
    {
        
        //セッションの読み込み
        $session = $this->getRequest()->getSession();
        
        //セッションのデータを取得
        $arrFormParamTemp = $session->get('contact');
        
        //フォームの作成
        $hello = new Hello();
        
        if(isset($arrFormParamTemp['hello'])){
          
          //確認画面から戻った場合、セッションから値を設定する
          $hello->setAllData($arrFormParamTemp['hello']);
        }
        
        //フォームタイプからのフォーム作成
        $form = $this->createForm(new HelloType(), $hello);
        
        //データが送信されたとき
        if ($request->getMethod() == 'POST') {
            
            $form->handleRequest($request);
            
            $arrFormParam = $request->request->all();
            
            //セッションの読み込み
            $session = $this->getRequest()->getSession();
            
            //セッションの設定
            $session->set('contact', $arrFormParam);
            
            return $this->redirect($this->generateUrl('comfirm'));
        }
        
        return $this->render('AcmeHelloBundle:Default:index.html.twig', array('form' => $form->createView()));
    }
    
    //確認画面
    public function comfirmAction(Request $request)
    {
      
      //セッションの読み込み
      $session = $this->getRequest()->getSession();
      
      //セッションのデータを取得
      $arrFormParamTemp = $session->get('contact');
      
      $arrFormParam = $arrFormParamTemp['hello'];
      
      //フォームの作成
      $hello = new Hello;
      
      //確認画面から戻った場合、セッションから値を設定する
      $hello->setAllData($arrFormParam);
      
      //フォームタイプからのフォーム作成
      $form = $this->createForm(new HelloType(), $hello);
      
      //送信をクリックした場合
      if($request->getMethod() == 'POST'){
        
        //セッションのデータをエラーチェック
        
        //メール送信処理
        $message = \Swift_Message::newInstance()
          ->setSubject('HelloEmail')
          ->setFrom('rirakkuma.music@gmail.com')
          ->setTo('shino.t.music@gmail.com')
          ->setBody('swiftMailerTest test');
        
        $this->get('mailer')->send($message);
        
        //完了画面にリダイレクト
        return $this->redirect($this->generateUrl('complete'));
      }
      
      return $this->render('AcmeHelloBundle:Default:comfirm.html.twig', 
        array(
          'form' => $form->createView(),
          'hello' => $arrFormParam
        )
      );
    }

    //完了画面
    public function completeAction(Request $request)
    {
      
      //テンプレートの表示
      return $this->render('AcmeHelloBundle:Default:complete.html.twig');
    }
}
