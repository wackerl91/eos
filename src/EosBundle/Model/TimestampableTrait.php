<?php

namespace EosBundle\Model;

use Doctrine\ODM\MongoDB\Mapping\Annotations as MongoDB;

trait TimestampableTrait
{
    /**
     * @MongoDB\Date()
     *
     * @var \DateTime
     */
    protected $createdAt;

    /**
     * @MongoDB\Date()
     *
     * @var \DateTime
     */
    protected $updatedAt;

    /**
     * @return \DateTime
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * @param \DateTime $createdAt
     */
    public function setCreatedAt(\DateTime $createdAt)
    {
        $this->createdAt = $createdAt;
    }

    /**
     * @return \DateTime
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }

    /**
     * @param \DateTime $updatedAt
     */
    public function setUpdatedAt(\DateTime $updatedAt)
    {
        $this->updatedAt = $updatedAt;
    }
}
