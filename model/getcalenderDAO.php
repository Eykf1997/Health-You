<?php






class getcalenderDAO {
       
    function get( $username ) {
        
        $connMgr = new ConnectionManager();
        $conn = $connMgr->connect();
        
        $sql = "SELECT username, title, descriptions, starts, ends, className, icon  FROM  usercalender WHERE username = :username";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(":username", $username, PDO::PARAM_STR);
            
        $user = array();
        if ( $stmt->execute() ) {
            while ( $row = $stmt->fetch(PDO::FETCH_ASSOC) ) {
               // $user = new calender($row["username"], $row["title"],$row["descriptions"],$row["starts"],$row["ends"],$row["className"],$row["icon"]);
                 array_push($user,new calender($row["username"], $row["title"],$row["descriptions"],$row["starts"],$row["ends"],$row["className"],$row["icon"]));
            }
        }
        else {
            $connMgr->handleError( $stmt, $sql );
        }
        

        $stmt = null;
        $conn = null;        
        
        return $user;
    }



    function create($user) {
        $result = true;

        $connMgr = new ConnectionManager();
        $conn = $connMgr->connect();

        $sql = "INSERT INTO usercalender (username, title, descriptions, starts, ends, className, icon) VALUES (:username, :title, :descriptions, :starts, :ends, :className, :icon)";
        $stmt = $conn->prepare($sql);
        
        $username = $user->getname();
        $title = $user->gettitle();
        $descriptions = $user->getdescriptions();
        $starts = $user->getstarts();
        $ends = $user->getends();
        $className = $user->getclassName();
        $icon = $user->geticon();

        $stmt->bindParam(":username", $username, PDO::PARAM_STR);
        $stmt->bindParam("title", $title, PDO::PARAM_STR);
        $stmt->bindParam(":descriptions", $descriptions, PDO::PARAM_STR);
        $stmt->bindParam(":starts", $starts, PDO::PARAM_STR);
        $stmt->bindParam(":ends", $ends, PDO::PARAM_STR);
        $stmt->bindParam(":className", $className, PDO::PARAM_STR);
        $stmt->bindParam(":icon", $icon, PDO::PARAM_STR);
        

        $result = $stmt->execute();
        if (! $result ){ 
            $parameters = [ "user" => $user, ];
            $connMgr->handleError( $stmt, $sql, $parameters );
        }
        
        $stmt = null;
        $conn = null;        
        
        return $result;
    }
}


    
//     function create($user) {
//         $result = true;


//         $connMgr = new ConnectionManager();
//         $conn = $connMgr->connect();
        

//         $sql = "INSERT INTO useraccount (username, password_hash) VALUES (:username, :passwordHash)";
//         $stmt = $conn->prepare($sql);
        
//         $username = $user->getUsername();
//         $passwordHash = $user->getPasswordHash();

//         $stmt->bindParam(":username", $username, PDO::PARAM_STR);
//         $stmt->bindParam(":passwordHash", $passwordHash, PDO::PARAM_STR);
        

//         $result = $stmt->execute();
//         if (! $result ){ 
//             $parameters = [ "user" => $user, ];
//             $connMgr->handleError( $stmt, $sql, $parameters );
//         }
        

//         $stmt = null;
//         $conn = null;        
        
//         return $result;
//     }


//     function update($user) {
//         $result = true;


//         $connMgr = new ConnectionManager();
//         $conn = $connMgr->connect();
        

//         $sql = "UPDATE useraccount SET password_hash = :passwordHash  WHERE username = :username";
//         $stmt = $conn->prepare($sql);
        
//         $username = $user->getUsername();
//         $passwordHash = $user->getPasswordHash();

//         $stmt->bindParam(":username", $username, PDO::PARAM_STR);
//         $stmt->bindParam(":passwordHash", $passwordHash, PDO::PARAM_STR);
        

//         $result = $stmt->execute();
//         if (! $result ){ 
//             $parameters = [ "user" => $user, ];
//             $connMgr->handleError( $stmt, $sql, $parameters );
//         }
        

//         $stmt = null;
//         $conn = null;        
        
//         return $result;
//     }
// }