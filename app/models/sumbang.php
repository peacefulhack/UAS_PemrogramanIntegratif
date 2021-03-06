<?php
 
namespace App\Models;

use App\Core\Model;

use PDO;
use PDOException;

class sumbang extends Model
{
 
    public static function getName()
    {
        try {
            $db = static::getDb();
            $stmt = $db->query('SELECT `name`,`id` FROM `jenis_sumbangan` ORDER BY `name`');
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
            
            return $results;
            
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
    public static function setUser($name, $gender)
    {
        try {

            $db = static::getDb();

            $sql = "INSERT INTO `user`( `name`, `gender`) VALUES (:name , :gender)";

            $stmt = $db->prepare($sql);
            
            $stmt->bindParam(":name", $name);
            $stmt->bindParam(":gender", $gender);
            
            $stmt->execute();
            
            return $db->lastInsertId();
            
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public static function isThere($jsumbang)
    {
        try {
            $db = static::getDb();

            $sql = "SELECT `id` FROM `jenis_sumbangan` WHERE `name`=:jsumbang LIMIT 1";

            $stmt = $db->prepare($sql);
            
            $stmt->bindParam(":jsumbang", $jsumbang);

            $stmt->execute();

            //if($results < 1) return FALSE
            //return r
            if($stmt->rowCount() < 1) return FALSE;
            $hasil = $stmt->fetch(PDO::FETCH_ASSOC);
            return $hasil["id"];
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
    public static function setJS($jsumbang)
    {
        try {
            $db = static::getDb();

            $sql = "INSERT INTO jenis_sumbangan(name) VALUES (:jsumbang);SELECT LAST_INSERT_ID() AS id";

            $stmt = $db->prepare($sql);

            $stmt->bindParam(":jsumbang", $jsumbang);

            $stmt->execute();
            $id = $stmt->fetch(PDO::FETCH_ASSOC);
            return $id['id'];
            
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
    public static function setSumbangan($userid,$jenisid,$jumlah)
    {
        try {
            $db = static::getDb();

            $sql = "INSERT INTO `sumbangan`(`userid`, `jenis`, `jumlah`) VALUES (:userid , :jenisid , :jumlah)";

            $stmt = $db->prepare($sql);

            $stmt->bindParam(":userid", $userid);
            $stmt->bindParam(":jenisid", $jenisid);
            $stmt->bindParam(":jumlah", $jumlah);

            $stmt->execute();
            
            $hasil = $stmt->fetch(PDO::FETCH_ASSOC);
            return;
            
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
    public static function getSumbangan()
    {
        try {
            $sql = "SELECT (@cnt := @cnt + 1) AS nomer, b.name,\n"

                    . "b.gender, \n"
                    . "c.name AS jenis, a.jumlah \n"
                    . "FROM `sumbangan` AS a\n"
                    . "CROSS JOIN (SELECT @cnt := 0) AS dummy\n"
                    . "INNER JOIN user AS b ON b.id=a.userid\n"
                    . "INNER JOIN jenis_sumbangan AS c ON c.id=a.jenis\n"
                    . "WHERE 1";
            $db = static::getDb();
            $stmt = $db->query($sql);
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
 
            return $results;
            
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
    public static function getFilterSumbangan($name)
    {
        try {
            $sql = "SELECT (@cnt := @cnt + 1) AS nomer, b.name,\n"
                    . "b.gender, \n"
                    . "c.name AS jenis, a.jumlah \n"
                    . "FROM `sumbangan` AS a\n"
                    . "CROSS JOIN (SELECT @cnt := 0) AS dummy\n"
                    . "INNER JOIN user AS b ON b.id=a.userid\n"
                    . "INNER JOIN jenis_sumbangan AS c ON c.id=a.jenis\n"
                    . "WHERE c.id=:name";
            $db = static::getDb();
            $stmt = $db->prepare($sql);
            $stmt->bindParam(":name", $name);
            $stmt->execute();
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $results;
            
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
}
