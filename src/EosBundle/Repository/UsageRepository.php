<?php

namespace EosBundle\Repository;

use Doctrine\ODM\MongoDB\DocumentRepository;

use EosBundle\Document\Usage;
use EosBundle\Document\UserInfo;

/**
 * Class UserInfoRepository
 */
class UsageRepository extends DocumentRepository
{
    /**
     * @param UserInfo $userInfo
     * @param string   $date
     *
     * @return null|object|Usage
     */
    public function getUsageByUserInformationAndDate(UserInfo $userInfo, $date)
    {
        return $this->createQueryBuilder()
            ->field('userInformation')->equals((string) $userInfo->getId())
            ->field('date')->equals($date)
            ->getQuery()->getSingleResult();
    }
}
