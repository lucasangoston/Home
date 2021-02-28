<?php

class Parcel extends Database
{
 
    private $idParcel;
    private $idUser;
    private $date;
    private $idAdress;
    private $status;

    public function __construct()
    {
        $this->date = date("Y-m-d H:i:s");
        $this->idUser = $_SESSION['idUser'];
        $this->idAdress = $_SESSION['idAddress'];
        $this->status = 'validé';
    }

    //findOneById

    public function findOneByIdUser($date)
    {   
        if(empty($this->connection()))
        {
            return null;
        }
        else
        {
            // Prepare and execute query
            $query = 'SELECT * FROM parcel WHERE idUser = ? AND date = ?';
            $req = $this->connection()->prepare($query);

            $req->execute(array($this->idUser,$date)) or die('Erreur : '.$e->getMessage());

            //Handle result
            if (!empty($req->execute()) && $req->rowCount() != 0) 
            {
                $data = $req->fetch();
               
                $this->idParcel = $data['idParcel'];
                $this->date = $data['date'];
                $this->idAddress = $data['idAddress'];
                $this->status = $data['status'];
                
                return $this;
            }
            else
            {
                return null;
            }
        }
    }

    public function findOneByIdAndUser($idParcel,$idUser)
    {   
        if(empty($this->connection()) || empty($idParcel) || empty($idUser))
        {
            return null;
        }
        else
        {
            // Prepare and execute query
            $query = 'SELECT * FROM parcel WHERE idParcel = ? AND idUser = ?';
            $req = $this->connection()->prepare($query);

            $req->execute(array($idParcel,$idUser)) or die('Erreur : '.$e->getMessage());

            //Handle result
            if (!empty($req->execute()) && $req->rowCount() != 0) 
            {
                $data = $req->fetch();
               
                $this->idUser = $data['idUser'];
                $this->date = $data['date'];
                $this->idAddress = $data['idAddress'];
                $this->status = $data['status'];
                
                return $this;
            }
            else
            {
                return null;
            }
        }
    }

    public function insertParcel()
    {
        if (empty($this->connection())) 
        {
            return false;
        } 
        else 
        {
            $queryString  = 'INSERT INTO parcel (
                idUser,
                date, 
                idAddress,
                status
                
            ) VALUES(
                :idUser,
                :date, 
                :idAddress,
                :status
                )';
    
            $query = $this->connection()->prepare($queryString);

            $query->bindParam(':idUser', $this->idUser);
            $query->bindParam(':date', $this->date);
            $query->bindParam(':idAddress', $this->idAdress);
            $query->bindParam(':status', $this->status);
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

    public function updateParcel() 
    {
        if (empty($this->connection())) 
        {
            return false;
        } 
        else 
        {
            // Prepare and execute query
            $query = "UPDATE parcel SET
                idUser,
                date, 
                idAddress,
                status
				
                WHERE idParcel = ?";

            $req = $this->connection()->prepare($query);

            $req->execute(array(
                $this->idUser,
                $this->date,
                $this->idAddress,
                $this->status
                
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

    // Delete
    public function deleteByIdAndUser($idParcel,$idUser)
    {   
        if(empty($this->connection()) || empty($idParcel) || empty($idUser))
        {
            return false;
        } 
        else 
        {
            // Prepare and execute query
            $query = "DELETE FROM parcel WHERE idParcel = ? AND idUser = ?";

            $req = $this->connection()->prepare($query);

            $req->execute(array($idParcel,$idUser)) or die('Erreur : '.$e->getMessage());

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

    // Find All Articles 


   // Getters

    public function getIdParcel()
    {
        return $this->idParcel;
    }

    public function getIdUser()
    {
        return $this->idUser;
    }

    public function getDate()
    {
        return $this->date;
    }

    public function getIdAddress()
    {
        return $this->idAddress;
    }

    public function getStatus()
    {
        return $this->status;
    }

    // Setters

    public function setIdParcel($idParcel)
    {
        $this->idParcel = $idParcel;

        return $this;
    }

    public function setIdUser($idUser)
    {
        $this->idUser = $idUser;

        return $this;
    }

    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    public function setIdAddress($idAddress)
    {
        $this->idAddress = $idAddress;

        return $this;
    }

    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }
}