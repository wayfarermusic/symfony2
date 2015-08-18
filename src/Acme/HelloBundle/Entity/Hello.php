<?php

namespace Acme\HelloBundle\Entity;

use Symfony\Component\Validator\Mapping\ClassMetadata;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\Email;

class Hello
{
  
  public $name;
  
  public $email;
  
  public $tel1;
  
  public $tel2;
  
  public $tel3;
  
  public $comment;
  
  public function getName()
  {
      return $this->name;
  }
  
  public function getEmail()
  {
      return $this->email;
  }
  
  public function setEmail()
  {
      $this->email = $email;
  }
  
  public function setAllData($arrHelloParam)
  {
      $this->name    = $arrHelloParam['name'];
      $this->email   = $arrHelloParam['email'];
      $this->tel1    = $arrHelloParam['tel1'];
      $this->tel2    = $arrHelloParam['tel2'];
      $this->tel3    = $arrHelloParam['tel3'];
      $this->comment = $arrHelloParam['comment'];
  }
  
  public static function loadValidatorMetadata(ClassMetadata $metadata)
  {
      
      $metadata->addPropertyConstraint('name', 
                                           new NotBlank( array(
                                              'message' => 'お名前を入力してください'
                                           ))
                                      );
                                      
      $metadata->addPropertyConstraint('email', 
                                           new Email( array(
                                              'message' => 'メールアドレスを入力してください',
                                           ))
                                      );
  }
  
}
