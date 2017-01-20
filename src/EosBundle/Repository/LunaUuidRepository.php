<?php

namespace EosBundle\Repository;

use Doctrine\ODM\MongoDB\DocumentRepository;

use EosBundle\Document\LunaUuid;

/**
 * Class LunaUuidRepository
 */
class LunaUuidRepository extends DocumentRepository
{
    /**
     * @param $hardwareId
     *
     * @return null|object|LunaUuid
     */
    public function getByHardwareId($hardwareId)
    {
        return $this->createQueryBuilder()->field('hardwareId')->equals($hardwareId)->getQuery()->getSingleResult();
    }

    /**
     * @param $hashedId
     *
     * @return null|object|LunaUuid
     */
    public function getByHashedId($hashedId)
    {
        return $this->createQueryBuilder()->field('hashedUuid')->equals($hashedId)->getQuery()->getSingleResult();
    }
}
