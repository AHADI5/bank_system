<?php

namespace models;

class Teacher
{
    private $teacherName;
    private $teacherLastName ;
    private $teacherFirstName;
    private $teacherBirthday ;
    private $teacherPhone ;
    private $techerPovSchool;
    private $teacherStatud;
    private $teacherDomain;

    private $teacherImage;
    private $teacherEmal;

    private  $teacherTitle ;


    /**
     * @param $teacherName
     * @param $teacherLastName
     * @param $teacherFirstName
     * @param $teacherBirthday
     * @param $teacherPhone
     * @param $techerPovSchool
     * @param $teacherStatud
     * @param $teacherDomain
     * @param $teacherEmal
     * @param $teacherImage
     */
        public function __construct($teacherName, $teacherLastName, $teacherFirstName,
                                    $teacherBirthday, $teacherPhone, $techerPovSchool,
                                    $teacherStatud, $teacherDomain, $teacherEmal,
                                    $teacherImage ,$teacherTitle)
        {
            $this->teacherName = $teacherName;
            $this->teacherLastName = $teacherLastName;
            $this->teacherFirstName = $teacherFirstName;
            $this->teacherBirthday = $teacherBirthday;
            $this->teacherPhone = $teacherPhone;
            $this->techerPovSchool = $techerPovSchool;
            $this->teacherStatud = $teacherStatud;
            $this->teacherDomain = $teacherDomain;
            $this->teacherEmal = $teacherEmal;
            $this -> teacherImage = $teacherImage;
            $this -> teacherTitle = $teacherTitle;
        }

    /**
     * @param bool $execution
     * @param $statement
     * @return array
     */
    public static function extracted(bool $execution, $statement): array
    {
        $teachers = [];

        if ($execution) {
            while ($data = $statement->fetch()) {
                $teacher = new Teacher($data["NOM_ENSEIGNANT"], $data["POST_NOM_ENSEIGNANT"],
                    $data["PRENOM_ENSEIGNANT"], $data["BIRTHDAY"], $data["PHONE"], $data["PROVSCHOOL"],
                    $data["STATUS_ENSEIGNANT"], $data["DOMAINE"], $data["EMAIL"], $data["IMAGE"], $data["TITLE"]);
                $teachers[] = $teacher;
            }

            return $teachers;
        } else return [];
    }

    public  function registerTeacher(): bool
        {
            global $connection ;
            $result = false;
            $teacherName = $this->teacherName ;
            $teacherLastName =$this->teacherLastName ;
            $teacherFirstName =$this->teacherFirstName ;
            $teacherBirthday =$this->teacherBirthday  ;
            $teacherPhone = $this->teacherPhone  ;
            $teacherPovSchool = $this->techerPovSchool  ;
            $teacherStatud = $this->teacherStatud ;
            $teacherDomain= $this->teacherDomain ;
            $teacherEmal = $this->teacherEmal  ;

            $teacherImage = $this -> teacherImage;
            $teacherTitle = $this -> teacherTitle;

            $requette = 'INSERT INTO ENSEIGNANT (NOM_ENSEIGNANT,POST_NOM_ENSEIGNANT,PRENOM_ENSEIGNANT,
           STATUS_ENSEIGNANT,PHONE,BIRTHDAY,PROVSCHOOL,DOMAINE,EMAIL, IMAGE ,TITLE) VALUES (:NOM_ENSEIGNANT,:POST_NOM_ENSEIGNANT,:PRENOM_ENSEIGNANT,:STATUS_ENSEIGNANT
           ,:PHONE,:BIRTHDAY,:PROVSCHOOL,:DOMAINE,:EMAIL, :IMAGE, :TITLE)';
            $statement = $connection -> prepare($requette);
            $execution = $statement -> execute([
                ":NOM_ENSEIGNANT" => $teacherName ,
                ":POST_NOM_ENSEIGNANT" => $teacherLastName,
                ":PRENOM_ENSEIGNANT" => $teacherFirstName,
                ":STATUS_ENSEIGNANT" => $teacherStatud,
                ":PHONE" => $teacherPhone,
                ":BIRTHDAY" => $teacherBirthday,
                ":PROVSCHOOL" => $teacherPovSchool,
                ":DOMAINE" => $teacherDomain,
                ":EMAIL" => $teacherEmal,
                ":IMAGE" => $teacherImage,
                ":TITLE" => $teacherTitle,
            ]);

            if ($execution) {
               $result = true ;
            }
            return $result;

        }

        static  function getTeacher (): array
        {
            global  $connection ;
            $requette = 'SELECT * FROM ENSEIGNANT';
            $statement = $connection ->prepare($requette);
            $execution = $statement -> execute([]);
            return self::extracted($execution, $statement);
        }

    static  function getTeacherPerId ($number): array
    {
        global  $connection ;
        $requette = 'SELECT * FROM ENSEIGNANT WHERE ID_ENSEIGNANT = :ID_ENSEIGNANT ';
        $statement = $connection ->prepare($requette);
        $execution = $statement -> execute([
            ":ID_ENSEIGNANT" => $number,
        ]);
        return self::extracted($execution, $statement);
    }
        public function teacherNumber() {
            global $connection ;
            $teacherName = $this->teacherName ;
            $teacherLastName =$this->teacherLastName ;
            $teacherFirstName =$this->teacherFirstName ;
            $teacherBirthday =$this->teacherBirthday  ;
            $teacherPhone = $this->teacherPhone  ;
            $teacherPovSchool = $this->techerPovSchool  ;
            $teacherStatud = $this->teacherStatud ;
            $teacherDomain= $this->teacherDomain ;
            $teacherEmal = $this->teacherEmal  ;

            $teacherImage = $this -> teacherImage;
            $teacherTitle = $this -> teacherTitle;
            $requette ='SELECT ID_ENSEIGNANT FROM ENSEIGNANT WHERE NOM_ENSEIGNANT = :NOM_ENSEIGNANT AND
                        POST_NOM_ENSEIGNANT = :POST_NOM_ENSEIGNANT AND PRENOM_ENSEIGNANT = :PRENOM_ENSEIGNANT AND 
                        STATUS_ENSEIGNANT = :STATUS_ENSEIGNANT AND PHONE = :PHONE AND BIRTHDAY = :BIRTHDAY AND PROVSCHOOL = :PROVSCHOOL
                        AND DOMAINE = :DOMAINE AND EMAIL = :EMAIL AND IMAGE = :IMAGE AND TITLE = :TITLE ';
            $statement = $connection -> prepare($requette);
            $execution = $statement -> execute([
                ":NOM_ENSEIGNANT" => $teacherName ,
                ":POST_NOM_ENSEIGNANT" => $teacherLastName,
                ":PRENOM_ENSEIGNANT" => $teacherFirstName,
                ":STATUS_ENSEIGNANT" => $teacherStatud,
                ":PHONE" => $teacherPhone,
                ":BIRTHDAY" => $teacherBirthday,
                ":PROVSCHOOL" => $teacherPovSchool,
                ":DOMAINE" => $teacherDomain,
                ":EMAIL" => $teacherEmal,
                ":IMAGE" => $teacherImage,
                ":TITLE" => $teacherTitle,
            ]);

            if ($execution) {
               if($data = $statement ->fetch()){
                   return $data["ID_ENSEIGNANT"];

               } else return null;
            } else return  null;
        }



    /**
     * @return mixed
     */
    public function getTeacherName()
    {
        return $this->teacherName;
    }

    /**
     * @param mixed $teacherName
     */
    public function setTeacherName($teacherName): void
    {
        $this->teacherName = $teacherName;
    }

    /**
     * @return mixed
     */
    public function getTeacherLastName()
    {
        return $this->teacherLastName;
    }

    /**
     * @param mixed $teacherLastName
     */
    public function setTeacherLastName($teacherLastName): void
    {
        $this->teacherLastName = $teacherLastName;
    }

    /**
     * @return mixed
     */
    public function getTeacherFirstName()
    {
        return $this->teacherFirstName;
    }

    /**
     * @param mixed $teacherFirstName
     */
    public function setTeacherFirstName($teacherFirstName): void
    {
        $this->teacherFirstName = $teacherFirstName;
    }

    /**
     * @return mixed
     */
    public function getTeacherBirthday()
    {
        return $this->teacherBirthday;
    }

    /**
     * @param mixed $teacherBirthday
     */
    public function setTeacherBirthday($teacherBirthday): void
    {
        $this->teacherBirthday = $teacherBirthday;
    }

    /**
     * @return mixed
     */
    public function getTeacherPhone()
    {
        return $this->teacherPhone;
    }

    /**
     * @param mixed $teacherPhone
     */
    public function setTeacherPhone($teacherPhone): void
    {
        $this->teacherPhone = $teacherPhone;
    }

    /**
     * @return mixed
     */
    public function getTecherPovSchool()
    {
        return $this->techerPovSchool;
    }

    /**
     * @param mixed $techerPovSchool
     */
    public function setTecherPovSchool($techerPovSchool): void
    {
        $this->techerPovSchool = $techerPovSchool;
    }

    /**
     * @return mixed
     */
    public function getTeacherStatud()
    {
        return $this->teacherStatud;
    }

    /**
     * @param mixed $teacherStatud
     */
    public function setTeacherStatud($teacherStatud): void
    {
        $this->teacherStatud = $teacherStatud;
    }

    /**
     * @return mixed
     */
    public function getTeacherDomain()
    {
        return $this->teacherDomain;
    }

    /**
     * @param mixed $teacherDomain
     */
    public function setTeacherDomain($teacherDomain): void
    {
        $this->teacherDomain = $teacherDomain;
    }

    /**
     * @return mixed
     */
    public function getTeacherEmal()
    {
        return $this->teacherEmal;
    }

    /**
     * @param mixed $teacherEmal
     */
    public function setTeacherEmal($teacherEmal): void
    {
        $this->teacherEmal = $teacherEmal;
    }


    /**
     * @return mixed
     */
    public function getTeacherImage()
    {
        return $this->teacherImage;
    }
    /**
     * @return mixed
     */
    public function getTeacherTitle()
    {
        return $this->teacherTitle;
    }

    /**
     * @param mixed $teacherTitle
     */
    public function setTeacherTitle($teacherTitle): void
    {
        $this->teacherTitle = $teacherTitle;
    }

}

