<?php

namespace EosBundle\Document;

use Doctrine\ODM\MongoDB\Mapping\Annotations as MongoDB;

/**
 * @MongoDB\Document(collection="uuid", repositoryClass="EosBundle\Repository\LunaUuidRepository")
 */
class LunaUuid
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
    protected $hardwareId;

    /**
     * @MongoDB\String()
     *
     * @var string
     */
    protected $hashedUuid;

    /**
     * @return string
     */
    public function getHardwareId()
    {
        return $this->hardwareId;
    }

    /**
     * @param string $hardwareId
     */
    public function setHardwareId($hardwareId)
    {
        $this->hardwareId = $hardwareId;
    }

    /**
     * @return string
     */
    public function getHashedUuid()
    {
        return $this->hashedUuid;
    }

    /**
     * @param string $hashedUuid
     */
    public function setHashedUuid($hashedUuid)
    {
        $this->hashedUuid = $hashedUuid;
    }
}
