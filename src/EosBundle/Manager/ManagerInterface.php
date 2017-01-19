<?php

namespace EosBundle\Manager;

use Doctrine\Common\Persistence\ObjectRepository;

interface ManagerInterface
{
    /**
     * @param ObjectRepository $repository
     */
    public function setRepository(ObjectRepository $repository);

    /**
     * @return ObjectRepository
     */
    public function getRepository();

    /**
     * @param      $model
     * @param bool $flush
     */
    public function persist($model, $flush = true);

    /**
     */
    public function flush();

    /**
     * @param string $class
     */
    public function supports($class);
}
