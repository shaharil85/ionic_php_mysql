<?php

require("conn.php");

class CartDao
{
    //get cart data list
    public static function get_cart_list($customer)
    {
        $data=array();
        try{
            $db = Factory::getConnection();

            $statement = $db->prepare("SELECT id, name, date, time FROM attendance_control_1516 WHERE name=:customer");

            $statement->execute(array(':customer'=>$customer));
            $data=$statement->fetchAll(PDO::FETCH_ASSOC);


            $statement=null;
        }
        catch (PDOException $e){
                print $e->getMessage();
        }

        return $data;
    }


    public static function delete_cart($customer)
    {
        $data=array();
        try
        {
            $db = Factory::getConnection();

            $statement = $db->prepare("DELETE FROM attendance_control_1516 WHERE name=:customer");
            $statement->execute(array(':customer'=>$customer));

            if ($statement->rowCount()){
                $data["status"]=1;
              } else{
                $data["status"]=0;
              }

            $statement=null;
          }
          catch (PDOException $e)
          {
            print $e->getMessage();
          }

      return $data;
    }

    public static function add_cart($p)
    {
        $data=array();
        try
        {
            $db = Factory::getConnection();

            $statement = $db->prepare("INSERT into attendance_control_1516(name,date,time)
            values(:name,:date,:time)");
            $statement->execute(array(':name'=>$p->name,':date'=>$p->date,':time'=>$p->time));
            if ($statement->rowCount()){
                $data["status"]=1;
              } else{
                $data["status"]=0;
              }

            $statement=null;
          }
          catch (PDOException $e)
          {
            print $e->getMessage();
          }

          return $data;
    }

    public static function all_list()
        {
            $data=array();
            try{
                $db = Factory::getConnection();

                $statement = $db->prepare("SELECT * FROM attendance_control_1516");

                $statement->execute(array());
                $data=$statement->fetchAll(PDO::FETCH_ASSOC);

                //print_r($data);
                $statement=null;
            }
            catch (PDOException $e){
                    print $e->getMessage();
            }

            return $data;
        }

}
?>
