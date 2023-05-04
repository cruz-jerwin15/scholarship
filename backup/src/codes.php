 $user ="college";
//                           $scholar ="fullscholar";
//                           $usertype="admin";
//                           $filter =$_SESSION['search'];
//                           $whatsearch=$_SESSION['whatsearch'];
//                           $order=$_SESSION['order'];
//                           $limit=$_SESSION['limit'];
//                           // if($_SESSION['offset']<=1){
//                           //   $off=$_SESSION['offset'];
//                           // }else{
//                             $off=$_SESSION['offset']-1;
//                           // }

// if( $filter=="ALL"){
//                             if($order=="ASC"){
//                                $sql = "SELECT * FROM tbl_admin WHERE status='$status' AND usertype='$user' AND typescholar='$scholar' order by id ASC limit $limit";
//                             }else{
//                                $sql = "SELECT * FROM tbl_admin WHERE status='$status' AND usertype='$user' AND typescholar='$scholar' order by id DESC limit $limit ";
//                             }
                            
//                              $result = $conn->query($sql);
//                           }else if( $filter=="FIRST NAME"){
//                             if($order=="ASC"){
//                                $sql = "SELECT * FROM tbl_admin WHERE status='$status' AND usertype='$user' AND typescholar='$scholar' AND firstname Like '%$whatsearch%' Order by firstname ASC limit $limit";
//                             }else{
//                                $sql = "SELECT * FROM tbl_admin WHERE status='$status' AND usertype='$user' AND typescholar='$scholar' AND firstname Like '%$whatsearch%' Order by firstname DESC limit $limit";
//                             }
                            
//                              $result = $conn->query($sql);
//                           }else if( $filter=="LAST NAME"){
//                              if($order=="ASC"){
//                                   $sql = "SELECT * FROM tbl_admin WHERE status='$status' AND usertype='$user' AND typescholar='$scholar' AND lastname Like '%$whatsearch%' ORDER BY lastname ASC limit $limit";
//                              }else{
//                                   $sql = "SELECT * FROM tbl_admin WHERE status='$status' AND usertype='$user' AND typescholar='$scholar' AND lastname Like '%$whatsearch%' ORDER BY lastname DESC limit $limit ";
//                              }
                           
//                              $result = $conn->query($sql);
//                           }else if( $filter=="EMAIL"){
//                              if($order=="ASC"){
//                                $sql = "SELECT * FROM tbl_admin WHERE (status='$status' AND usertype='$user' AND typescholar='$scholar') AND username Like '%$whatsearch%' ORDER BY username ASC limit $limit";
//                              }else{
//                                $sql = "SELECT * FROM tbl_admin WHERE (status='$status' AND usertype='$user' AND typescholar='$scholar') AND username Like '%$whatsearch%' ORDER BY username DESC limit $limit ";
//                              }
                            
//                              $result = $conn->query($sql);
//                           }
    // if ($result->num_rows > 0){ 
    // while($row = $result->fetch_assoc()){