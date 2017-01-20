<?php

namespace EosBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

use FOS\RestBundle\Controller\Annotations as REST;
use FOS\RestBundle\Controller\FOSRestController;

use EosBundle\Document\Usage;
use EosBundle\Document\UserInfo;
use EosBundle\Manager\UsageManager;

/**
 * @REST\NamePrefix("eos_api_")
 */
class UsageController extends FOSRestController
{
    /**
     * @REST\Route("/user/{user}/usage/create")
     *
     * @param Request  $request
     * @param UserInfo $user
     *
     * @return \FOS\RestBundle\View\View
     */
    public function postUsageAction(Request $request, UserInfo $user)
    {
        $usage = new Usage();
        $usage->setUserInformation($user);
        $dateTime = new \DateTime();
        $usage->setDate($dateTime->format('Y-m-d'));

        $recentUsage = $this->getUsageManager()->getRepository()->getUsageByUserInformationAndDate($user, $usage->getDate());

        if (!$recentUsage) {
            $this->getUsageManager()->persist($usage);

            return $this->view([], Response::HTTP_CREATED);
        }

        return $this->view([], Response::HTTP_ALREADY_REPORTED);
    }

    /**
     * @return UsageManager
     */
    private function getUsageManager()
    {
        return $this->get('eos.manager.usage');
    }
}
