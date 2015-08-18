<?php

namespace BaseCms\AdminBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TMastertAdminLevel
 *
 * @ORM\Table(name="t_mastert_admin_level")
 * @ORM\Entity
 */
class TMastertAdminLevel
{
    /**
     * @var string
     *
     * @ORM\Column(name="name", type="text", nullable=false)
     */
    private $name;

    /**
     * @var integer
     *
     * @ORM\Column(name="rank", type="smallint", nullable=false)
     */
    private $rank;

    /**
     * @var integer
     *
     * @ORM\Column(name="del_flg", type="smallint", nullable=false)
     */
    private $delFlg;

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="smallint")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;


}
