<?php 
class RaviKoQr
{
  public $server = "localhost";
  public $user = "root";
  public $pass = "";
  public $dbname = "ticket1";
  public $conn;
  public function __construct()
  {
    $this->conn= new mysqli($this->server,$this->user,$this->pass,$this->dbname);
    if($this->conn->connect_error)
    {
      die("connection failed");
    }
  }
  public function insertQr($ticket_title,$event,$ticket_price,$final,$status,$start_date,$time11,$seat_num,$country,$address,$description,$duration,$ticket_code,$ticket_image,$remark)
  {
      $sql = "INSERT INTO tickets(ticket_title,event,ticket_price,final,status,start_date,time11,seat_num,country,address,description,duration,ticket_code,ticket_image,remark,added_date) VALUES('$ticket_title','$event','$ticket_price','$final','$status','$start_date','$time11','$seat_num','$country','$address','$description','$duration','$ticket_code','$ticket_image','$remark',NOW())";
      $query = $this->conn->query($sql);
      return $query;

  
  }
    public function insertQrr($ev_or_id,$ticket_title,$event,$ticket_type,$ticket_price,$final,$status,$start_date,$time11,$seat_num,$country,$address,$description,$duration,$ticket_code,$ticket_image,$added_by,$remark)
  {
      $sql = "INSERT INTO tickets(ev_or_id,ticket_title,event,ticket_type,ticket_price,final,status,start_date,time11,seat_num,country,address,description,duration,ticket_code,ticket_image,added_by,remark,added_date) VALUES('$ev_or_id','$ticket_title','$event','$ticket_type','$ticket_price','$final','$status','$start_date','$time11','$seat_num','$country','$address','$description','$duration','$ticket_code','$ticket_image','$added_by','$remark',NOW())";
      $query = $this->conn->query($sql);
      return $query;

  
  }
  public function insertQrrr($ev_or_id,$ticket_title,$event,$ticket_type,$ticket_price,$final,$status,$start_date,$time11,$seat_num,$country,$address,$description,$duration,$ticket_code,$ticket_image,$added_by,$remark)
  {
      $sql = "INSERT INTO tickets(ev_or_id,ticket_title,event,ticket_type,ticket_price,final,status,start_date,time11,seat_num,country,address,description,duration,ticket_code,ticket_image,added_by,remark,added_date) VALUES('$ev_or_id','$ticket_title','$event','$ticket_type','$ticket_price','$final','$status','$start_date','$time11','$seat_num','$country','$address','$description','$duration','$ticket_code','$ticket_image','$added_by','$remark',NOW())";
      $query = $this->conn->query($sql);
      return $query;

  
  }
    
  public function displayImg()
  {
    $sql = "SELECT qrimg,qrlink from qrcodes where qrimg='$ticket_image'";

  }
}
$meravi = new RaviKoQr();