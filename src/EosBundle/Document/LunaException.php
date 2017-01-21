<?php

namespace EosBundle\Document;

use Doctrine\ODM\MongoDB\Mapping\Annotations as MongoDB;

use EosBundle\Model\TimestampableInterface;
use EosBundle\Model\TimestampableTrait;

/**
 * @MongoDB\Document(collection="exception", repositoryClass="EosBundle\Repository\LunaExceptionRepository")
 */
class LunaException implements TimestampableInterface
{
    use TimestampableTrait;

    /**
     * @MongoDB\Id()
     *
     * @var \MongoId
     */
    protected $id;

    /**
     * @MongoDB\ReferenceOne(targetDocument="EosBundle\Document\UserInfo", simple=true)
     *
     * @var UserInfo
     */
    protected $userInformation;

    /**
     * @MongoDB\String()
     *
     * @var string
     */
    protected $exceptionType;

    /**
     * @MongoDB\String()
     *
     * @var string
     */
    protected $exceptionValue;

    /**
     * @MongoDB\Collection()
     *
     * @var array
     */
    protected $traceback;

    /**
     * @return UserInfo
     */
    public function getUserInformation()
    {
        return $this->userInformation;
    }

    /**
     * @param UserInfo $userInformation
     */
    public function setUserInformation($userInformation)
    {
        $this->userInformation = $userInformation;
    }

    /**
     * @return string
     */
    public function getExceptionType()
    {
        return $this->exceptionType;
    }

    /**
     * @param string $exceptionType
     */
    public function setExceptionType($exceptionType)
    {
        $this->exceptionType = $exceptionType;
    }

    /**
     * @return string
     */
    public function getExceptionValue()
    {
        return $this->exceptionValue;
    }

    /**
     * @param string $exceptionValue
     */
    public function setExceptionValue($exceptionValue)
    {
        $this->exceptionValue = $exceptionValue;
    }

    /**
     * @return string
     */
    public function getTraceback()
    {
        return $this->traceback;
    }

    /**
     * @param string $traceback
     */
    public function setTraceback($traceback)
    {
        $this->traceback = $traceback;
    }
}
