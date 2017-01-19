<?php

namespace EosBundle\Model;

interface TimestampableInterface
{
    /**
     * @return \DateTime
     */
    public function getCreatedAt();

    /**
     * @param \DateTime $date
     */
    public function setCreatedAt(\DateTime $date);

    /**
     * @return \DateTime
     */
    public function getUpdatedAt();

    /**
     * @param \DateTime $date
     */
    public function setUpdatedAt(\DateTime $date);
}
