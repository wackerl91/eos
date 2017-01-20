<?php

namespace EosBundle\Document;

use Doctrine\ODM\MongoDB\Mapping\Annotations as MongoDB;

use EosBundle\Model\TimestampableInterface;
use EosBundle\Model\TimestampableTrait;

/**
 * @MongoDB\Document(collection="luna_logs", repositoryClass="EosBundle\Repository\LunaLogEntryRepository")
 */
class LunaLogEntry implements TimestampableInterface
{
    use TimestampableTrait;

    /**
     * @MongoDB\Id()
     *
     * @var \MongoId
     */
    protected $id;

    /**
     * @MongoDB\String()
     *
     * @var string
     */
    protected $logLevel;

    /**
     * @MongoDB\String()
     *
     * @var string
     */
    protected $logChannel;

    /**
     * @MongoDB\String()
     *
     * @var string
     */
    protected $logMessage;

    /**
     * @MongoDB\String()
     *
     * @var string
     */
    protected $additionalInformation;

    /**
     * @MongoDB\ReferenceOne(targetDocument="EosBundle\Document\UserInfo", simple=true)
     *
     * @var UserInfo
     */
    protected $userInformation;

    /**
     * @return string
     */
    public function getLogLevel()
    {
        return $this->logLevel;
    }

    /**
     * @param string $logLevel
     */
    public function setLogLevel($logLevel)
    {
        $this->logLevel = $logLevel;
    }

    /**
     * @return string
     */
    public function getLogChannel()
    {
        return $this->logChannel;
    }

    /**
     * @param string $logChannel
     */
    public function setLogChannel($logChannel)
    {
        $this->logChannel = $logChannel;
    }

    /**
     * @return string
     */
    public function getLogMessage()
    {
        return $this->logMessage;
    }

    /**
     * @param string $logMessage
     */
    public function setLogMessage($logMessage)
    {
        $this->logMessage = $logMessage;
    }

    /**
     * @return string
     */
    public function getAdditionalInformation()
    {
        return $this->additionalInformation;
    }

    /**
     * @param string $additionalInformation
     */
    public function setAdditionalInformation($additionalInformation)
    {
        $this->additionalInformation = $additionalInformation;
    }

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
    public function setUserInformation(UserInfo $userInformation)
    {
        $this->userInformation = $userInformation;
    }
}
