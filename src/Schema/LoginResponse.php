<?php


namespace App\Schema;

use Symfony\Component\Serializer\Annotation\Groups;
use Nelmio\ApiDocBundle\Annotation\Model;
use Swagger\Annotations as SWG;
use App\Entity\User;

class LoginResponse
{
    /**
     * @Groups({"user_all", "user_mini"})
     * @var string
     * @SWG\Property(description="The token.")
     */
    private $token;

    /**
     * @Groups({"user_all", "user_mini"})
     * @var boolean
     * @SWG\Property(description="status of request true: all is fine , false: an error occured")
     */
    private $error;


    /**
     * @Groups({"user_all", "user_mini"})
     * @var object
     * @SWG\Property(ref=@Model(type=User::class))
     */
    private $user;

}
