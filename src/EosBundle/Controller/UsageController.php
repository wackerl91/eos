<?php

namespace EosBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

use FOS\RestBundle\Controller\Annotations as REST;
use FOS\RestBundle\Controller\FOSRestController;

use EosBundle\Document\Usage;
use EosBundle\Document\UserInfo;

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

        $dm = $this->get('eos.manager.usage');

        $recentUsage = $dm->getRepository()->findOneBy(['userInformation' => $user->getId(), 'date' => $usage->getDate()]);

        if (!$recentUsage) {
            $dm->persist($usage);

            return $this->view([], Response::HTTP_CREATED);
        }

        return $this->view([], Response::HTTP_ALREADY_REPORTED);
    }
}
