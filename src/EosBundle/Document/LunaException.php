<?php

namespace EosBundle\Document;

use Doctrine\ODM\MongoDB\Mapping\Annotations as MongoDB;

/**
 * @MongoDB\Document(collection="exception", repositoryClass="EosBundle\Repository\LunaExceptionRepository")
 */
class LunaException
{
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
     * @MongoDB\Date()
     *
     * @var \DateTime
     */
    protected $date;

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
     * @return \DateTime
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * @param \DateTime $date
     */
    public function setDate($date)
    {
        $this->date = $date;
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