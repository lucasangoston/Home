<?php

class User extends Database
{
    private $idUser;
    private $firstName;
    private $lastName;
    private $date;
    private $idAddress;
    private $mail;
    private $password;
    private $number;
    private $inscriptionDate;
    private $role;
    private $active;

    public function __construct()
    {
        $this->inscriptionDate = date("Y-m-d:H:i:s");
        $this->role = 'User';
        $this->active = true;
    }

    //find all

    public function findAll()
    {
        if(empty($this->connection()))
        {
            return $this;
        }
        else
        {
            // Prepare and execute query
            $query = 'SELECT * FROM user';
            $req = $this->connection()->prepare($query);

            $req->execute() or die('Erreur : '.$e->getMessage());

            //Handle result
            if(!empty($req->execute()) && $req->rowCount() != 0)
            {
                $data = array();

                while($row = $req->fetch())
                {
                    $item = new User();
                    $item->findOneByMail($row['mail']);

                    $data[] = $item;
                }
                return $data;
                
            }
            else
            {
                return false;
            }
        }
    }

    //findOneById

    public function findOneByMail($mail)
    {   
        if(empty($this->connection()) || empty($mail))
        {
            return null;
        }
        else
        {
            // Prepare and execute query
            $query = 'SELECT * FROM user WHERE mail = ?';
            $req = $this->connection()->prepare($query);

            $req->execute(array($mail)) or die('Erreur : '.$e->getMessage());

            //Handle result
            if (!empty($req->execute()) && $req->rowCount() != 0) 
            {
                $data = $req->fetch();
               
                $this->idUser = $data['idUser'];
                $this->firstName = $data['firstName'];
                $this->lastName = $data['lastName'];
                $this->date = $data['date'];
                $this->idAddress = $data['idAddress'];
                $this->mail = $data['mail'];
                $this->password = $data['password'];
                $this->number = $data['number'];
                $this->inscriptionDate = $data['inscriptionDate'];
                $this->role = $data['role'];
                $this->active = $data['active'];
                
                return $this;
            }
            else
            {
                return null;
            }
        }
    }

    //FindOneByMailAndPassword

    public function findOneByMailAndPassword($mail,$password)
    {   
        if(empty($this->connection()) || empty($mail) || empty($password))
        {
            return null;
        }
        else
        {
            // Prepare and execute query
            $query = 'SELECT * FROM user WHERE mail = ? and password = ?';
            $req = $this->connection()->prepare($query);

            $req->execute(array($mail,$password)) or die('Erreur : '.$e->getMessage());

            //Handle result
            if (!empty($req->execute()) && $req->rowCount() != 0) 
            {
                $data = $req->fetch();
               
                $this->idUser = $data['idUser'];
                $this->firstName = $data['firstName'];
                $this->lastName = $data['lastName'];
                $this->date = $data['date'];
                $this->idAddress = $data['idAddress'];
                $this->mail = $data['mail'];
                $this->password = $data['password'];
                $this->number = $data['number'];
                $this->inscriptionDate = $data['inscriptionDate'];
                $this->role = $data['role'];
                $this->active = $data['active'];
                
                return $this;
            }
            else
            {
                return null;
            }
        }
    }

    public function insertUser()
    {
        if (empty($this->connection())) 
        {
            return false;
        } 
        else 
        {

            $queryString  = 'INSERT INTO user (
                firstName, 
                lastName, 
                date, 
                idAddress, 
                mail,
                password,
                number,
                inscriptionDate,
                role,
                active
                
            ) VALUES(
                :firstName, 
                :lastName, 
                :date, 
                :idAddress, 
                :mail,
                :password,
                :number,
                :inscriptionDate,
                :role,
                :active
                )';
    
            $query = $this->connection()->prepare($queryString);

            $query->bindParam(':firstName', $this->firstName);
            $query->bindParam(':lastName', $this->lastName);
            $query->bindParam(':date', $this->date);
            $query->bindParam(':idAddress', $this->idAddress);
            $query->bindParam(':mail', $this->mail);
            $query->bindParam(':password', $this->password);
            $query->bindParam(':number', $this->number);
            $query->bindParam(':inscriptionDate', $this->inscriptionDate);
            $query->bindParam(':role', $this->role);
            $query->bindParam(':active', $this->active);
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

    public function updateUser() 
    {
        if (empty($this->connection())) 
        {
            return false;
        } 
        else 
        {
            // Prepare and execute query
            $query = "UPDATE user SET
                firstName = ?, 
                lastName = ?, 
                date = ?, 
                idAddress = ?, 
                mail = ?,
                password = ?,
                number = ?,
                inscriptionDate = ?,
                role = ?,
                active = ?
				
                WHERE idUser = ?";

            $req = $this->connection()->prepare($query);

            $req->execute(array(
                $this->firstName,
                $this->lastName,
                $this->date,
                $this->idAddress,
                $this->mail,
                $this->password,
                $this->number,
                $this->inscriptionDate,
                $this->role,
                $this->active,
                $this->idUser
            )) or die('Erreur : '.$e->getMessage());

            if (empty($req))
            {
                return false;
            } 
            else 
            {
                return $req;
            }
        }
    }

    public function logIn()
    {
        $_SESSION['idUser'] = $this->idUser;
        $_SESSION['firstName'] = $this->firstName;
        $_SESSION['lastName'] = $this->lastName;
        $_SESSION['date'] = $this->date;
        $_SESSION['idAddress'] = $this->idAddress;
        $_SESSION['mail'] = $this->mail;
        $_SESSION['password'] = $this->password;
        $_SESSION['number'] = $this->number;
        $_SESSION['inscriptionDate'] = $this->inscriptionDate;
        $_SESSION['role'] = $this->role;
        $_SESSION['active'] = $this->active;
        $_SESSION['parcel'] = array();
    }

    //Getters
    public function getIdUser()
    {
        return $this->idUser;
    }

    public function getFirstName()
    {
        return $this->firstName;
    }

    public function getLastName()
    {
        return $this->lastName;
    }

    public function getDate()
    {
        return $this->date;
    }

    public function getIdAddress()
    {
        return $this->idAddress;
    }

    public function getMail()
    {
        return $this->mail;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function getInscriptionDate()
    {
        return $this->inscriptionDate;
    }

    public function getNumber()
    {
        return $this->number;
    }

    public function getRole()
    {
        return $this->role;
    }

    public function getActive()
    {
        return $this->active;
    }

    //Setters
    public function setIdUser($idUser)
    {
        $this->idUser = $idUser;
    }

    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;
    }

    public function setLastName($lastName)
    {
        $this->lastName = $lastName;
    }

    public function setDate($date)
    {
        $this->date = $date;
    }

    public function setIdAddress($idAddress)
    {
        $this->idAddress = $idAddress;
    }

    public function setMail($mail)
    {
        $this->mail = $mail;
    }

    public function setPassword($password)
    {
        $this->password = $password;
    }

    public function setNumber($number)
    {
        $this->number = $number;
    }

    public function setInscriptionDate($inscriptionDate)
    {
        $this->inscriptionDate = $inscriptionDate;
    }

    public function setRole($role)
    {
        $this->role = $role;
    }

    public function setActive($active)
    {
        $this->active = $active;
    }
}