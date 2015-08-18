<?php

namespace BaseCms\AdminBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TAdmin
 *
 * @ORM\Table(name="t_admin")
 * @ORM\Entity
 */
class TAdmin
{
    /**
     * @var string
     *
     * @ORM\Column(name="name", type="text", nullable=false)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="password", type="text", nullable=false)
     */
    private $password;

    /**
     * @var string
     *
     * @ORM\Column(name="salt", type="text", nullable=false)
     */
    private $salt;

    /**
     * @var integer
     *
     * @ORM\Column(name="admin_level_id", type="smallint", nullable=false)
     */
    private $adminLevelId;

    /**
     * @var string
     *
     * @ORM\Column(name="memo", type="text", nullable=false)
     */
    private $memo;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="create_date", type="datetime", nullable=false)
     */
    private $createDate;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="update_date", type="datetime", nullable=false)
     */
    private $updateDate;

    /**
     * @var integer
     *
     * @ORM\Column(name="del_flg", type="smallint", nullable=false)
     */
    private $delFlg;

    /**
     * @var integer
     *
     * @ORM\Column(name="admin_id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $adminId;


}
