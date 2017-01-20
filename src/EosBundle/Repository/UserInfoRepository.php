<?php

namespace EosBundle\Repository;

use Doctrine\ODM\MongoDB\DocumentRepository;

use EosBundle\Document\UserInfo;

/**
 * Class UserInfoRepository
 */
class UserInfoRepository extends DocumentRepository
{
    /**
     * @param $userId
     *
     * @return null|object|UserInfo
     */
    public function getUserInfoByUserId($userId)
    {
        return $this->createQueryBuilder()->field('userId')->equals($userId)->getQuery()->getSingleResult();
    }
}
