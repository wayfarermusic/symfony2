<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

//namespace Symfony\Component\Validator\Constraints;
namespace BaseCms\CommonBundle\Validator;

use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;
use Symfony\Component\Validator\Exception\UnexpectedTypeException;

/**
 * @author Bernhard Schussek <bschussek@gmail.com>
 *
 * @api
 */
class UserIdValidator extends ConstraintValidator
{
    /**
     * {@inheritdoc}
     */
    public function validate($value, Constraint $constraint)
    {
        if (!$constraint instanceof UserId) {
            throw new UnexpectedTypeException($constraint, __NAMESPACE__.'\UserId');
        }
        
        //値がある場合は、NotBlankクラスでエラーを表示する
        if(!(false === $value || (empty($value) && '0' != $value))){
            
            //アンダースコアと半角英数字のみ許可
            if(!preg_match("/^[a-zA-Z0-9|_]+$/", $value)){
                $this->buildViolation($constraint->message)
                    ->setParameter('{{ value }}', $this->formatValue($value))
                    ->addViolation();
            }
            
        }
    }
}
