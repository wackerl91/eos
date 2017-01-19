<?php

namespace EosBundle\Document;

use Doctrine\ODM\MongoDB\Mapping\Annotations as MongoDB;

/**
 * @MongoDB\Document(collection="user_info", repositoryClass="EosBundle\Repository\UserInfoRepository")
 *
 */
class UserInfo
{
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
    protected $userId;

    /**
     * @MongoDB\String()
     *
     * @var string
     */
    protected $lunaVersion;

    /**
     * @MongoDB\String()
     *
     * @var string
     */
    protected $systemIdentifier;

    /**
     * @MongoDB\String()
     *
     * @var string
     */
    protected $systemVersion;

    /**
     * @MongoDB\String()
     *
     * @var string
     */
    protected $kodiVersion;

    /**
     * @MongoDB\String()
     *
     * @var string
     */
    protected $moonlightVersion;

    /**
     * @param string $userId
     */
    public function __construct($userId)
    {
        $this->userId = $userId;
    }

    /**
     * @return \MongoId
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getUserId()
    {
        return $this->userId;
    }

    /**
     * @return string
     */
    public function getLunaVersion()
    {
        return $this->lunaVersion;
    }

    /**
     * @param string $lunaVersion
     */
    public function setLunaVersion($lunaVersion)
    {
        $this->lunaVersion = $lunaVersion;
    }

    /**
     * @return string
     */
    public function getSystemIdentifier()
    {
        return $this->systemIdentifier;
    }

    /**
     * @param string $systemIdentifier
     */
    public function setSystemIdentifier($systemIdentifier)
    {
        $this->systemIdentifier = $systemIdentifier;
    }

    /**
     * @return string
     */
    public function getSystemVersion()
    {
        return $this->systemVersion;
    }

    /**
     * @param string $systemVersion
     */
    public function setSystemVersion($systemVersion)
    {
        $this->systemVersion = $systemVersion;
    }

    /**
     * @return string
     */
    public function getKodiVersion()
    {
        return $this->kodiVersion;
    }

    /**
     * @param string $kodiVersion
     */
    public function setKodiVersion($kodiVersion)
    {
        $this->kodiVersion = $kodiVersion;
    }

    /**
     * @return string
     */
    public function getMoonlightVersion()
    {
        return $this->moonlightVersion;
    }

    /**
     * @param string $moonlightVersion
     */
    public function setMoonlightVersion($moonlightVersion)
    {
        $this->moonlightVersion = $moonlightVersion;
    }
}