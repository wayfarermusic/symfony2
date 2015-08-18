<?php

namespace BaseCms\CommonBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

use Symfony\Component\Validator\Mapping\ClassMetadata;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\Email;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\GreaterThan;

use BaseCms\CommonBundle\Validator\UserId;
use BaseCms\CommonBundle\Validator\Password;

/**
 * DtbAdmin
 */
class DtbAdmin
{
    /**
     * @var string
     */
    private $name;
    
    /**
     * @var string
     */
    private $userId;
    
    /**
     * @var string
     */
    private $password;

    /**
     * @var string
     */
    private $salt;

    /**
     * @var integer
     */
    private $adminLevelId;

    /**
     * @var string
     */
    private $memo;

    /**
     * @var \DateTime
     */
    private $createDate;

    /**
     * @var \DateTime
     */
    private $updateDate;

    /**
     * @var integer
     */
    private $delFlg;

    /**
     * @var integer
     */
    private $adminId;


    /**
     * Set name
     *
     * @param string $name
     * @return DtbAdmin
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }
    
    /**
     * Set userId
     *
     * @param string $userId
     * @return DtbAdmin
     */
    public function setUserId($userId)
    {
        $this->userId = $userId;

        return $this;
    }
    
    /**
     * Get userId
     *
     * @return string 
     */
    public function getUserId()
    {
        return $this->userId;
    }
    
    /**
     * Set password
     *
     * @param string $password
     * @return DtbAdmin
     */
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Get password
     *
     * @return string 
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set salt
     *
     * @param string $salt
     * @return DtbAdmin
     */
    public function setSalt($salt)
    {
        $this->salt = $salt;

        return $this;
    }

    /**
     * Get salt
     *
     * @return string 
     */
    public function getSalt()
    {
        return $this->salt;
    }

    /**
     * Set adminLevelId
     *
     * @param integer $adminLevelId
     * @return DtbAdmin
     */
    public function setAdminLevelId($adminLevelId)
    {
        $this->adminLevelId = $adminLevelId;

        return $this;
    }

    /**
     * Get adminLevelId
     *
     * @return integer 
     */
    public function getAdminLevelId()
    {
        return $this->adminLevelId;
    }

    /**
     * Set memo
     *
     * @param string $memo
     * @return DtbAdmin
     */
    public function setMemo($memo)
    {
        $this->memo = $memo;

        return $this;
    }

    /**
     * Get memo
     *
     * @return string 
     */
    public function getMemo()
    {
        return $this->memo;
    }

    /**
     * Set createDate
     *
     * @param \DateTime $createDate
     * @return DtbAdmin
     */
    public function setCreateDate($createDate)
    {
        $this->createDate = $createDate;

        return $this;
    }

    /**
     * Get createDate
     *
     * @return \DateTime 
     */
    public function getCreateDate()
    {
        return $this->createDate;
    }

    /**
     * Set updateDate
     *
     * @param \DateTime $updateDate
     * @return DtbAdmin
     */
    public function setUpdateDate($updateDate)
    {
        $this->updateDate = $updateDate;

        return $this;
    }

    /**
     * Get updateDate
     *
     * @return \DateTime 
     */
    public function getUpdateDate()
    {
        return $this->updateDate;
    }

    /**
     * Set delFlg
     *
     * @param integer $delFlg
     * @return DtbAdmin
     */
    public function setDelFlg($delFlg)
    {
        $this->delFlg = $delFlg;

        return $this;
    }

    /**
     * Get delFlg
     *
     * @return integer 
     */
    public function getDelFlg()
    {
        return $this->delFlg;
    }

    /**
     * Get adminId
     *
     * @return integer 
     */
    public function getAdminId()
    {
        return $this->adminId;
    }
    /**
     * @var integer
     */
    private $status;


    /**
     * Set status
     *
     * @param integer $status
     * @return DtbAdmin
     */
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Get status
     *
     * @return integer 
     */
    public function getStatus()
    {
        return $this->status;
    }
    
    public static function loadValidatorMetadata(ClassMetadata $metadata)
    {
        
        /**
         * 登録時のバリデーション
         * 
         */
        $metadata->addPropertyConstraint('name', 
                                            new NotBlank( array(
                                                'message' => 'お名前を入力してください',
                                                'groups' => array('registration')
                                            ))
                                         );
        
        $metadata->addPropertyConstraint('userId', 
                                            new UserId( array(
                                                'message' => 'ユーザーIDは半角英数字とアンダースコア「_」のみ利用できます。',
                                                'groups' => array('registration')
                                            ))
                                         );
        
        $metadata->addPropertyConstraint('userId', 
                                            new NotBlank( array(
                                                'message' => 'ユーザーIDを入力してください',
                                                'groups' => array('registration')
                                            ))
                                         );
        
        $metadata->addPropertyConstraint('userId', 
                                            new Length( array(
                                                'min' => 8,
                                                'max' => 32,
                                                'minMessage' => 'ユーザーIDは8文字以上32文字以下で入力してください',
                                                'maxMessage' => 'ユーザーIDは8文字以上32文字以下で入力してください',
                                                'groups' => array('registration')
                                            ))
                                         );
        
        $metadata->addPropertyConstraint('password', 
                                            new Password( array(
                                                'message' => 'パスワードは半角英数と記号のみが利用できます。',
                                                'groups' => array('registration')
                                            ))
                                         );
        
        $metadata->addPropertyConstraint('password', 
                                            new NotBlank( array(
                                                'message' => 'パスワードを入力してください',
                                                'groups' => array('registration')
                                            ))
                                         );
        
        $metadata->addPropertyConstraint('password', 
                                            new Length( array(
                                                'min' => 8,
                                                'max' => 32,
                                                'minMessage' => 'パスワードは8文字以上32文字以下で入力してください',
                                                'maxMessage' => 'パスワードは8文字以上32文字以下で入力してください',
                                                'groups' => array('registration')
                                            ))
                                         );
        
        $metadata->addPropertyConstraint('adminLevelId', 
                                            new GreaterThan( array(
                                                'value' => 0,
                                                'message' => '管理者レベルを選択してください',
                                                'groups' => array('registration')
                                            ))
                                         );
        
        $metadata->addPropertyConstraint('status', 
                                            new NotBlank( array(
                                                'message' => '状態を入力してください',
                                                'groups' => array('registration')
                                            ))
                                         );
        
        
        /**
         * ログイン時のバリデーション
         * 
         */
        
        $metadata->addPropertyConstraint('userId', 
                                            new NotBlank( array(
                                                'message' => 'ユーザーIDを入力してください',
                                                'groups' => array('login')  
                                            ))
                                         );
        
        $metadata->addPropertyConstraint('password', 
                                            new NotBlank( array(
                                                'message' => 'パスワードを入力してください',
                                                'groups' => array('login')
                                            ))
                                         );
                                         
    }
}
