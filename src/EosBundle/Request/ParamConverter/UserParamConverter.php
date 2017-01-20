<?php
namespace EosBundle\Request\ParamConverter;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Sensio\Bundle\FrameworkExtraBundle\Request\ParamConverter\ParamConverterInterface;

use EosBundle\Document\UserInfo;
use EosBundle\Manager\LunaUuidManager;
use EosBundle\Manager\UserInfoManager;

class UserParamConverter implements ParamConverterInterface
{
    /**
     * @var UserInfoManager
     */
    protected $userManager;

    /**
     * @var LunaUuidManager
     */
    protected $uuidManager;

    /**
     * @param UserInfoManager $userManager
     * @param LunaUuidManager $uuidManager
     */
    public function __construct(UserInfoManager $userManager, LunaUuidManager $uuidManager)
    {
        $this->userManager = $userManager;
        $this->uuidManager = $uuidManager;
    }

    /**
     * @param Request        $request
     * @param ParamConverter $configuration
     *
     * @return bool
     *
     * @throws \Exception
     */
    public function apply(Request $request, ParamConverter $configuration)
    {
        if ($request->attributes->has('userId')) {
            $userId = $request->attributes->get('userId');

            if ($userId instanceof UserInfo) {

                return true;
            } else {
                $user = $this->userManager->getRepository()->getUserInfoByUserId($userId);

                if ($user === null) {
                    $existingIdPair = $this->uuidManager->getRepository()->getByHashedId($userId);

                    if (!$existingIdPair) {

                        throw new AccessDeniedException("I don't know you, go away!");
                    }

                    $user = new UserInfo($userId);
                }

                $request->attributes->set('userId', $user);
            }
        }

        if ($request->attributes->has('user')) {
            $user = $request->attributes->get('user');

            if ($user instanceof UserInfo) {

                return true;
            }

            $user = $this->userManager->getRepository()->getUserInfoByUserId($user);

            if ($user === null) {
                throw new AccessDeniedException("I don't know you, go away!");
            }

            $request->attributes->set('user', $user);
        }

        return true;
    }

    public function supports(ParamConverter $configuration)
    {
        return $this->userManager->supports($configuration->getClass());
    }
}
