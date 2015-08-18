<?php

namespace BaseCms\CommonBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * MtbAdminLevel
 */
class MtbAdminLevel
{
    /**
     * @var string
     */
    private $name;

    /**
     * @var integer
     */
    private $rank;

    /**
     * @var integer
     */
    private $delFlg;

    /**
     * @var integer
     */
    private $id;


    /**
     * Set name
     *
     * @param string $name
     * @return MtbAdminLevel
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
     * Set rank
     *
     * @param integer $rank
     * @return MtbAdminLevel
     */
    public function setRank($rank)
    {
        $this->rank = $rank;

        return $this;
    }

    /**
     * Get rank
     *
     * @return integer 
     */
    public function getRank()
    {
        return $this->rank;
    }

    /**
     * Set delFlg
     *
     * @param integer $delFlg
     * @return MtbAdminLevel
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
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }
}
