<?php

namespace EosBundle\Manager;

use Doctrine\Bundle\MongoDBBundle\ManagerRegistry;
use Doctrine\Common\Persistence\ObjectRepository;
use Doctrine\ODM\MongoDB\DocumentRepository;
use EosBundle\Model\TimestampableInterface;

class Manager implements ManagerInterface
{
    /**
     * @var ManagerRegistry
     */
    protected $managerRegistry;

    /**
     * @var DocumentRepository
     */
    protected $repository;

    /**
     * @var string
     */
    protected $class;

    /**
     * @param ManagerRegistry    $managerRegistry
     * @param                    $class
     */
    public function __construct(ManagerRegistry $managerRegistry, $class)
    {
        $this->managerRegistry = $managerRegistry;
        $this->class           = $class;
    }

    /**
     * @param ObjectRepository $repository
     */
    public function setRepository(ObjectRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @return ObjectRepository
     */
    public function getRepository()
    {
        return $this->repository ? $this->repository : $this->repository = $this->managerRegistry->getRepository($this->class);
    }

    /**
     * @param object $model
     * @param bool   $flush
     *
     * @throws \Exception
     */
    public function persist($model, $flush = true)
    {
        if (!$model instanceof $this->class) {
            throw new \Exception(sprintf("Model not supported! Expected: %s, got: %s", $this->class, get_class($model)));
        }

        if ($model instanceof TimestampableInterface) {
            if (!$model->getCreatedAt()) {
                $model->setCreatedAt(new \DateTime());
            }

            $model->setUpdatedAt(new \DateTime());
        }

        $this->managerRegistry->getManager()->persist($model);

        if ($flush) {
            $this->flush();
        }
    }

    /**
     *
     */
    public function flush()
    {
        $this->managerRegistry->getManager()->flush();
    }

    /**
     * @param $className
     *
     * @return bool
     */
    public function supports($className)
    {
        return $this->class === $className;
    }
}
