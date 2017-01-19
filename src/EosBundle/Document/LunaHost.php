<?php

namespace EosBundle\Document;

use Doctrine\ODM\MongoDB\Mapping\Annotations as MongoDB;

/**
 * @MongoDB\EmbeddedDocument()
 */
class LunaHost
{
    /**
     * @MongoDB\String()
     *
     * @var string
     */
    protected $gfeVersion;

    /**
     * @MongoDB\Int()
     *
     * @var int
     */
    protected $numberOfGames;

    /**
     * @MongoDB\String()
     *
     * @var string
     */
    protected $hostUuid;

    /**
     * @return string
     */
    public function getGfeVersion()
    {
        return $this->gfeVersion;
    }

    /**
     * @param string $gfeVersion
     */
    public function setGfeVersion($gfeVersion)
    {
        $this->gfeVersion = $gfeVersion;
    }

    /**
     * @return int
     */
    public function getNumberOfGames()
    {
        return $this->numberOfGames;
    }

    /**
     * @param int $numberOfGames
     */
    public function setNumberOfGames($numberOfGames)
    {
        $this->numberOfGames = $numberOfGames;
    }

    /**
     * @return string
     */
    public function getHostUuid()
    {
        return $this->hostUuid;
    }

    /**
     * @param string $hostUuid
     */
    public function setHostUuid($hostUuid)
    {
        $this->hostUuid = $hostUuid;
    }
}
