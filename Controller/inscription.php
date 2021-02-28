<?php

require(dirname(__FILE__).'/../Model/User.php');
require(dirname(__FILE__).'/../Model/Address.php');

if(empty($_POST))
{
    require(dirname(__FILE__).'/../View//Html/inscription.php');
}
else
{
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $date = $_POST['date'];
    $mail = $_POST['mail'];
    $number = $_POST['number'];
    $password = $_POST['password'];
    $adresse = $_POST['address'];
    $zipCode = $_POST['zipCode'];
    $city = $_POST['city'];
    $country = $_POST['country'];

    $user = new User();
    $address = new Address();

    if($user->findOneByMail($mail) != null)
    {
        require(dirname(__FILE__).'/../View/Html/pageErrorInscription.php');
    }
    else
    {
        $address->setAddress(strtoupper($adresse));
        $address->setZipCode($zipCode);
        $address->setCity($city);
        $address->setCountry($country);

        $is_address = $address->findOneByAddressZipCodeCityCountry($address->getAddress(),$address->getZipCode(),$address->getCity(),$address->getCountry());

        if(!$is_address){
            $address->insertAddress();
        }

        $test = $address->findOneByAddressZipCodeCityCountry($address->getAddress(),$address->getZipCode(),$address->getCity(),$address->getCountry());
        $user->setIdAddress($test->getIdAddress());

        $user->setFirstname($firstName);
        $user->setLastName($lastName);
        $user->setDate($date);
        $user->setMail($mail);
        $user->setPassword($password);
        $user->setNumber($number);

        $user->insertUser();

        require(dirname(__FILE__).'/../View/Html/pageCreationAccount.php');
    }
}
