<?php

 include('config.db.php');//ดึงไฟล์เชื่อมต่อฐานข้อมูล
 $dataJSON = json_decode(file_get_contents('php://input'), true);
 $message = array();

  //ประกาศตัวแปร สำหรับเพิ่มข้อมูล
  $id_stu = $dataJSON['id_stu'];
  $name = $dataJSON['name'];
  $nname = $dataJSON['nname'];
  $age = $dataJSON['age'];
  $phon = $dataJSON['phon'];
  $address = $dataJSON['address'];
  $status = $dataJSON['status'];

  //เขียนคำสั่งในการเพิ่มข้อมูล
  $sql = "INSERT INTO mambers (id_stu, name, nname, age, phon, address, status) 
  VALUES('$id_stu', '$name', '$nname', '$age', '$phon', '$address', '$status')";

  //รันคำสั่ง
  $qr_insert = mysqli_query($conn,$sql);

  if($qr_insert){
     //เพิ่มข้อมูลได้
    http_response_code(201);
    $message['status'] = "เพิ่มข้อมูลสำเร็จ";
  }else{
    //เพิ่มไม่ได้
    http_response_code(422);
    $message['status'] = "เพิ่มข้อมูลไม่สำเร็จ";
  }

  //ส่งข้อมูลการดำเนินการกลับไป
  echo json_encode($message);
  echo mysqli_error($conn);

?>