<?php

namespace EosBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

use FOS\RestBundle\Controller\Annotations as REST;
use FOS\RestBundle\Controller\FOSRestController;

use EosBundle\Document\LunaUuid;
use EosBundle\Manager\LunaUuidManager;

/**
 * @REST\NamePrefix("eos_api_")
 */
class UserIdGenerationController extends FOSRestController
{
    /**
     * @REST\Route("/request/{hwid}")
     *
     * @param Request $request
     * @param string  $hwid
     *
     * @return \FOS\RestBundle\View\View
     */
    public function getSaltedUuidAction(Request $request, $hwid)
    {
        $existingPair = $this->getLunaUuidManager()->getRepository()->getByHardwareId($hwid);

        if (!$existingPair) {
            $lunaUuid = new LunaUuid();
            $lunaUuid->setHardwareId($hwid);
            $lunaUuid->setHashedUuid(bin2hex(password_hash($hwid, PASSWORD_BCRYPT)));

            $this->getLunaUuidManager()->persist($lunaUuid);
        } else {
            $lunaUuid = $existingPair;
        }

        return $this->view($lunaUuid->getHashedUuid(), Response::HTTP_OK);
    }

    /**
     * @return LunaUuidManager
     */
    private function getLunaUuidManager()
    {
        return $this->get('eos.manager.luna_uuid');
    }
}
