<?php
namespace models;

class Student
{
    private $image ;
    private $studentName ;
    private $studentLastName ;
    private $studentFirstName;
    private $tudentBirthday ;
    private $studentTelephone ;
    private $provSchool ;
    private $chosenFac;
    private $promotion ;
    private $departement ;
    private $email ;

    /**
     * @param $image
     * @param $studentName
     * @param $studentLastName
     * @param $studentFirstName
     * @param $tudentBirthday
     * @param $studentTelephone
     * @param $provSchool
     * @param $chosenFac
     * @param $promotion
     * @param $departement
     * @param $email
     */
    public function __construct($image, $studentName, $studentLastName, $studentFirstName, $tudentBirthday, $studentTelephone, $provSchool, $chosenFac, $promotion, $departement, $email)
    {
        $this->image = $image;
        $this->studentName = $studentName;
        $this->studentLastName = $studentLastName;
        $this->studentFirstName = $studentFirstName;
        $this->tudentBirthday = $tudentBirthday;
        $this->studentTelephone = $studentTelephone;
        $this->provSchool = $provSchool;
        $this->chosenFac = $chosenFac;
        $this->promotion = $promotion;
        $this->departement = $departement;
        $this->email = $email;
    }

    public function registerStudent(): bool
    {
        global  $connection;
        $result = false;
        $image =  $this->image ;
        $studentName = $this->studentName ;
        $studentLastName =$this->studentLastName  ;
        $studentFirstName =$this->studentFirstName ;
        $tudentBirthday =$this->tudentBirthday ;
        $studentTelephone =$this->studentTelephone ;
        $provSchool =$this->provSchool;
        $chosenFac =$this->chosenFac ;
        $promotion =$this->promotion;
        $departement= $this->departement  ;
        $email =$this->email ;
        $requette = 'INSERT INTO ETUDIANT(NOM ,POST_NOM ,PRENOM ,BIRTHDAY ,
                     STUDENT_PHONE,PROV_SCHOOL ,CHOSEN_FAC 
                     ,PROMOTION,   DEPARTMENT  ,PROFILE , E_MAIL) VALUES (:NOM,:POST_NOM ,:PRENOM ,:BIRTHDAY ,
                     :STUDENT_PHONE,:PROV_SCHOOL,:CHOSEN_FAC,:PROMOTION,:DEPARTMENT,:PROFILE,:E_MAIL)';
        $statement = $connection -> prepare($requette);
        echo $statement -> queryString;
        $execution = $statement->execute([
            ":NOM" => $studentName,
            ":POST_NOM" => $studentLastName,
            ":PRENOM" => $studentFirstName,
            ":BIRTHDAY" => $tudentBirthday,
            ":STUDENT_PHONE" => $studentTelephone,
            ":PROV_SCHOOL" => $provSchool,
            ":CHOSEN_FAC" => $chosenFac,
            ":PROMOTION" => $promotion,
            ":DEPARTMENT" => $departement,
            ":PROFILE" => $image,
            ":E_MAIL" => $email,
        ]);


        if ($execution) {
            $result = true;
        }

        return $result;
    }

    static  function  getStudent () {
        global $connection ;
        $requette = 'SELECT * FROM ETUDIANT';
        $statement = $connection -> prepare($requette);
        $execution = $statement -> execute([]);
        $studentList = [];
        if ($execution) {
            while ($data = $statement -> fetch()){
                $student = new Student($data["PROFILE"],$data["NOM"],$data["POST_NOM"],
                $data["PRENOM"],$data["BIRTHDAY"],$data["STUDENT_PHONE"], $data["PROV_SCHOOL"],
                    $data["CHOSEN_FAC"], $data[":PROMOTION"],$data[":DEPARTMENT"], $data["E_MAIL"]
                );

                array_push($studentList, $student);

            }

            return $studentList;
        } else return  [] ;

    }



    public function matricule() {

            global $connection ;
        $image =  $this->image ;
        $studentName = $this->studentName ;
        $studentLastName =$this->studentLastName  ;
        $studentFirstName =$this->studentFirstName ;

        $requette ='SELECT STUDENT_ID FROM ETUDIANT WHERE NOM = :NOM AND
                        POST_NOM = :POST_NOM AND PRENOM = :PRENOM';

           $statement = $connection -> prepare($requette);
           $execution = $statement -> execute([
               ":NOM" => $studentName ,
               ":POST_NOM" => $studentLastName,
               ":PRENOM" => $studentFirstName,

           ]);

            if ($execution) {
                if($data = $statement ->fetch()){
                    return $data["STUDENT_ID"];

                } else return null;
            } else return  null;
    }

    public static function  getStudentPerPromotion($promotion, $departement):array {
         global $connection ;
        $requette = 'SELECT * FROM ETUDIANT WHERE  PROMOTION = :PROMOTION AND DEPARTMENT = :DEPARTMENT';
        $statement = $connection -> prepare($requette);
        $execution = $statement -> execute([
            ":PROMOTION" =>$promotion,
            ":DEPARTMENT" =>$departement
        ]);
        $studentList = [];
        if ($execution) {
            while ($data = $statement -> fetch()){
                $student = new Student($data["PROFILE"],$data["NOM"],$data["POST_NOM"],
                    $data["PRENOM"],$data["BIRTHDAY"],$data["STUDENT_PHONE"], $data["PROV_SCHOOL"],
                    $data["CHOSEN_FAC"], $data["PROMOTION"],$data["DEPARTMENT"], $data["E_MAIL"]
                );

                array_push($studentList, $student);

            }

            return $studentList;
        } else return  [] ;
    }



    /**
     * @return mixed
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * @return mixed
     */
    public function getStudentName()
    {
        return $this->studentName;
    }

    /**
     * @return mixed
     */
    public function getStudentLastName()
    {
        return $this->studentLastName;
    }

    /**
     * @return mixed
     */
    public function getStudentFirstName()
    {
        return $this->studentFirstName;
    }

    /**
     * @return mixed
     */
    public function getTudentBirthday()
    {
        return $this->tudentBirthday;
    }

    /**
     * @return mixed
     */
    public function getStudentTelephone()
    {
        return $this->studentTelephone;
    }

    /**
     * @return mixed
     */
    public function getProvSchool()
    {
        return $this->provSchool;
    }

    /**
     * @return mixed
     */
    public function getChosenFac()
    {
        return $this->chosenFac;
    }

    /**
     * @return mixed
     */
    public function getPromotion()
    {
        return $this->promotion;
    }

    /**
     * @return mixed
     */
    public function getDepartement()
    {
        return $this->departement;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $image
     */
    public function setImage($image)
    {
        $this->image = $image;
    }

    /**
     * @param mixed $studentName
     */
    public function setStudentName($studentName)
    {
        $this->studentName = $studentName;
    }

    /**
     * @param mixed $studentLastName
     */
    public function setStudentLastName($studentLastName)
    {
        $this->studentLastName = $studentLastName;
    }

    /**
     * @param mixed $studentFirstName
     */
    public function setStudentFirstName($studentFirstName)
    {
        $this->studentFirstName = $studentFirstName;
    }

    /**
     * @param mixed $tudentBirthday
     */
    public function setTudentBirthday($tudentBirthday)
    {
        $this->tudentBirthday = $tudentBirthday;
    }

    /**
     * @param mixed $studentTelephone
     */
    public function setStudentTelephone($studentTelephone)
    {
        $this->studentTelephone = $studentTelephone;
    }

    /**
     * @param mixed $provSchool
     */
    public function setProvSchool($provSchool)
    {
        $this->provSchool = $provSchool;
    }

    /**
     * @param mixed $chosenFac
     */
    public function setChosenFac($chosenFac)
    {
        $this->chosenFac = $chosenFac;
    }

    /**
     * @param mixed $promotion
     */
    public function setPromotion($promotion)
    {
        $this->promotion = $promotion;
    }

    /**
     * @param mixed $departement
     */
    public function setDepartement($departement)
    {
        $this->departement = $departement;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }
}