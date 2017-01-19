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
    protected $exceptionString;

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
    public function getExceptionString()
    {
        return $this->exceptionString;
    }

    /**
     * @param string $exceptionString
     */
    public function setExceptionString($exceptionString)
    {
        $this->exceptionString = $exceptionString;
    }
}
