<?php

class Address extends Database
{
    private $idAdress;
    private $address;
    private $zipCode;
    private $city;
    private $country;

    public function __construct()
    {

    }

    public function findOneByAddressZipCodeCityCountry($address,$zipCode,$city,$country)
    {
        if(empty($this->connection()) || empty($address) || empty($zipCode) || empty($city) || empty($country))
        {
            return null;
        }
        else
        {
            // Prepare and execute query
            $query = 'SELECT * FROM address WHERE address = ? AND zipCode = ? AND city = ? AND country = ?';
            $req = $this->connection()->prepare($query);

            $req->execute(array($address,$zipCode,$city,$country)) or die('Erreur : '.$e->getMessage());

            //Handle result
            if (!empty($req->execute()) && $req->rowCount() != 0)
            {
                $data = $req->fetch();

                $this->idAdress = $data['idAddress'];
                $this->address = $data['address'];
                $this->zipCode = $data['zipCode'];
                $this->city = $data['city'];
                $this->country = $data['country'];

                return $this;
            }
            else
            {
                return null;
            }
        }
    }

    public function insertAddress()
    {
        if (empty($this->connection())) 
        {
            return false;
        } 
        else 
        {

            $queryString  = 'INSERT INTO address (
                address, 
                zipCode, 
                city, 
                country
                
            ) VALUES(
                :address, 
                :zipCode, 
                :city, 
                :country
                )';
    
            $query = $this->connection()->prepare($queryString);

            $query->bindParam(':address', $this->address);
            $query->bindParam(':zipCode', $this->zipCode);
            $query->bindParam(':city', $this->city);
            $query->bindParam(':country', $this->country);
            $query-> execute();

            if (empty($query))
            {
                return false;
            } 
            else 
            {
                return $query;
            }
        }
    }

    //Getters
    public function getIdAddress()
    {
        return $this->idAdress;
    }

    public function getAddress()
    {
        return $this->address;
    }

    public function getZipCode()
    {
        return $this->zipCode;
    }

    public function getCity()
    {
        return $this->city;
    }

    public function getCountry()
    {
        return $this->country;
    }

    public function getIdUser()
    {
        return $this->idUser;
    }

    //Setters
    

    public function setIdAddress($idAdress)
    {
        $this->idAdress = $idAdress;
    }

    public function setAddress($address)
    {
        $this->address = $address;
    }

    public function setZipCode($zipCode)
    {
        $this->zipCode = $zipCode;
    }

    public function setCity($city)
    {
        $this->city = $city;
    }

    public function setCountry($country)
    {
        $this->country = $country;
    }
}