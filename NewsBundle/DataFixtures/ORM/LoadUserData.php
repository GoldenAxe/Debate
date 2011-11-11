<?php

namespace AlfaDev\Debate\NewsBundle\DataFixtures\ORM;
 
use Doctrine\Common\DataFixtures\FixtureInterface;
use AlfaDev\Debate\NewsBundle\Entity\User;
use AlfaDev\Debate\NewsBundle\Entity\Role;
use AlfaDev\Debate\NewsBundle\Entity\Post;
use AlfaDev\Debate\NewsBundle\Entity\PostType;
use AlfaDev\Debate\NewsBundle\Entity\PostState;
use AlfaDev\Debate\NewsBundle\Entity\UserImage;
use Symfony\Component\Security\Core\Encoder\MessageDigestPasswordEncoder;
 
class LoadUserData implements FixtureInterface
{
    public function load($manager)
    {

 
        // create the ROLE_ADMIN role
        $role = new Role();
        $role->setName('ROLE_ADMIN');
        
        $manager->persist($role);
        
        $posttype = new PostType();
        $posttype->setDescription('Propuesta');
        
        $manager->persist($posttype);
        
        $poststate = new PostState();
        $poststate->setDescription('Ingresada');
        
        $manager->persist($poststate);   
        
        $posttype = new posttype();
        $posttype->setDescription('Propuesta');
        
        $manager->persist($posttype);     
         
        $userimage = new UserImage();
        $userimage->setPath('c:\test.jpg');
        
        $manager->persist($userimage);      
	         
        // create a user
        $user = new User();
        $user->setFirstName('Javier');
        $user->setLastName('López Casanello');
        $user->setEmail('javier.lopezcasanello@gmail.com');
        $user->setUsername('lopezj20');
        $user->setZipCode('1653');
        $user->setAddress('Witcomb 2471');
        $user->setPhone1('47646450');
        $user->setIdCard('30602227');
        $user->setSalt(md5(time()));
        $user->setUserImage($userimage);
        $user->setPhone2('1565459497');
        $user->setPhone3('47681627');        
        
        $encoder = new MessageDigestPasswordEncoder('sha512', true, 10);
        $password = $encoder->encodePassword('admin', $user->getSalt());
        $user->setPassword($password);
 
        $user->getUserRoles()->add($role);
 
        $manager->persist($user);
        
        $post = new Post();        
        
        $post->setText('Lorem ipsum et dolor');
        $post->setPositiveVotes(53);
        $post->setNegativeVotes(35);
        $post->setUser($user);
        $post->setPosttype($posttype);
        $post->setPoststate($poststate);

        $manager->persist($post);
              
 
        // encode and set the password for the user,
        // these settings match our config
 
		  $manager->flush(); 
 
   }
 
}  
