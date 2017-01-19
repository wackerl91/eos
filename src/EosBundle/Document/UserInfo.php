<?php

namespace EosBundle\Document;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ODM\MongoDB\Mapping\Annotations as MongoDB;

use EosBundle\Model\TimestampableInterface;
use EosBundle\Model\TimestampableTrait;

/**
 * @MongoDB\Document(collection="user_info", repositoryClass="EosBundle\Repository\UserInfoRepository")
 *
 */
class UserInfo implements TimestampableInterface
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
     * @MongoDB\EmbedMany(targetDocument="EosBundle\Document\LunaHost")
     *
     * @var LunaHost[]|ArrayCollection
     */
    protected $hosts;

    /**
     * @param string $userId
     */
    public function __construct($userId)
    {
        $this->userId = $userId;
        $this->hosts  = new ArrayCollection();
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

    /**
     * @return ArrayCollection|LunaHost[]
     */
    public function getHosts()
    {
        return $this->hosts ? $this->hosts : $this->hosts = new ArrayCollection();
    }

    /**
     * @param ArrayCollection|LunaHost[] $hosts
     */
    public function setHosts(ArrayCollection $hosts)
    {
        $this->hosts = $hosts;
    }

    public function addHost(LunaHost $host)
    {
        $this->getHosts()->add($host);
    }
}
