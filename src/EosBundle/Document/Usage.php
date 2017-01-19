<?php

namespace EosBundle\Document;

use Doctrine\ODM\MongoDB\Mapping\Annotations as MongoDB;

/**
 * @MongoDB\Document(collection="usage", repositoryClass="EosBundle\Repository\UsageRepository")
 */
class Usage
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
     * @MongoDB\String()
     *
     * @var string
     */
    protected $date;

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
    public function getDate()
    {
        return $this->date;
    }

    /**
     * @param string $date
     */
    public function setDate($date)
    {
        $this->date = $date;
    }
}
