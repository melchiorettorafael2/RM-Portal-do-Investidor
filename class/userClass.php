<?php
class userClass
{
    /*User Status*/
    public function userStatus($usernameEmail,$password){
         $db = getDB();
         $stmt = $db->prepare("SELECT status FROM users WHERE  (username=:usernameEmail or email=:usernameEmail) AND  password=:hash_password");
         $stmt->bindParam("usernameEmail", $usernameEmail,PDO::PARAM_STR) ;
         $stmt->bindParam("hash_password", $hash_password,PDO::PARAM_STR) ;
         $stmt->execute();
         $count2=$stmt->rowCount();
         if($count2){
             return true;
         }else{
             return false;
         }

    }
    
    
      /* User Login */
     public function userLogin($usernameEmail,$password,$secret)
     {
         
          $db = getDB();
          $hash_password= hash('sha256', $password);
          $stmt = $db->prepare("SELECT uid FROM users WHERE  (username=:usernameEmail or email=:usernameEmail) AND  password=:hash_password  AND status!='Inativo'");
          $stmt->bindParam("usernameEmail", $usernameEmail,PDO::PARAM_STR) ;
          $stmt->bindParam("hash_password", $hash_password,PDO::PARAM_STR) ;
          $stmt->execute();
          $count=$stmt->rowCount();
          $data=$stmt->fetch(PDO::FETCH_OBJ);
          $db = null;

          if($count)
          {
               $_SESSION['uid']=$data->uid;
               $_SESSION['google_auth_code']=$google_auth_code;
                return true;
          }
          
        
          
          else
          {
               return false;
          }    
     }

     /* User Registration */
     public function userRegistration($username,$password,$email,$name,$secret,$telefone,$cpf,$banco,$agencia,$conta_corrente,$profile_pic,$montante,$rentabilidade,$saldo,$id_investidor)
     {
          try{
          $db = getDB();
          $st = $db->prepare("SELECT uid FROM users WHERE username=:username OR email=:email");  
          $st->bindParam("username", $username,PDO::PARAM_STR);
          $st->bindParam("email", $email,PDO::PARAM_STR);
          $st->execute();
          $count=$st->rowCount();
          $data_cadastro= date('Y-m-d');
          $numero = 0;

          if($count<1)
          {
          $stmt = $db->prepare("INSERT INTO users(username,password,email,name,google_auth_code,telefone,cpf,banco,agencia,conta_corrente, profile_pic, data_cadastro) VALUES (:username,:hash_password,:email,:name,:google_auth_code,:telefone,:cpf,:banco,:agencia,:conta_corrente,:profile_pic,:data_cadastro)");

          $stmt2 =$db->prepare("INSERT INTO info_financeira(name,cpf,montante,rentabilidade,saldo,id_investidor) VALUES (:name,:cpf,:montante,:rentabilidade,:saldo,:id_investidor)");

          $stmt3 =$db->prepare("INSERT INTO enderecos(name, id_investidor, numero) VALUES(:name, :id_investidor, :numero )");

          $stmt4 =$db->prepare("INSERT INTO beneficiarios(name_investidor, id_investidor) VALUES(:name_investidor, :id_investidor)");
          
           $stmt6 =$db->prepare("INSERT INTO beneficiarios2(name_investidor, id_investidor) VALUES(:name_investidor,:id_investidor)");

          $stmt->bindParam("username", $username,PDO::PARAM_STR) ;
          $hash_password= hash('sha256', $password);
          $stmt->bindParam("hash_password", $hash_password,PDO::PARAM_STR) ;
          $stmt->bindParam("email", $email,PDO::PARAM_STR) ;
          $stmt->bindParam("name", $name,PDO::PARAM_STR) ;
          $stmt->bindParam("google_auth_code", $secret,PDO::PARAM_STR) ;
          $stmt->bindParam("telefone", $telefone,PDO::PARAM_STR) ;
            $stmt->bindParam("cpf", $cpf,PDO::PARAM_STR) ;
             $stmt->bindParam("banco", $banco,PDO::PARAM_STR) ;
              $stmt->bindParam("agencia", $agencia,PDO::PARAM_STR) ;
              $stmt->bindParam("conta_corrente", $conta_corrente,PDO::PARAM_STR) ;
              $stmt->bindParam("profile_pic", $profile_pic,PDO::PARAM_STR);
   		$stmt->bindParam("data_cadastro", $data_cadastro,PDO::PARAM_STR);
              $stmt->execute();
             
         
          $uid=$db->lastInsertId();
          $db = null;
          $_SESSION['uid']=$uid;
          
           $stmt2->bindParam("name", $name,PDO::PARAM_STR);
              $stmt2->bindParam("cpf", $cpf,PDO::PARAM_STR);
               $stmt2->bindParam("montante", $montante,PDO::PARAM_STR);
               $stmt2->bindParam("rentabilidade", $rentabilidade,PDO::PARAM_STR);
               $stmt2->bindParam("saldo", $saldo,PDO::PARAM_STR);
               $stmt2->bindParam("id_investidor", $uid,PDO::PARAM_STR);
               $stmt3->bindParam("name", $name,PDO::PARAM_STR);
               $stmt3->bindParam("id_investidor", $uid,PDO::PARAM_STR);
               $stmt3->bindParam("numero", $numero,PDO::PARAM_STR);
               $stmt4->bindParam("name_investidor", $name,PDO::PARAM_STR);
               $stmt4->bindParam("id_investidor", $uid,PDO::PARAM_STR);
               $stmt6->bindParam("name_investidor", $name,PDO::PARAM_STR);
               $stmt6->bindParam("id_investidor", $uid,PDO::PARAM_STR);  
          
          $stmt2->execute();
          $stmt3->execute();
          $stmt4->execute();
        
          $stmt6->execute();

          return true;
          }
          else
          {
          $db = null;
          return false;
          }
          
         
          } 
          catch(PDOException $e) {
          echo '{"error":{"text":'. $e->getMessage() .'}}'; 
          }
     }
     
     /* User Details */
     public function userDetails($uid)
     {
        try{
          $db = getDB();
          $stmt = $db->prepare("SELECT email,username,name,google_auth_code,telefone,cpf,banco,agencia,conta_corrente,password,profile_pic,uid FROM users WHERE uid=:uid");  
          $stmt->bindParam("uid", $uid,PDO::PARAM_INT);
          $stmt->execute();
          $data = $stmt->fetch(PDO::FETCH_OBJ);
          return $data;
          print_r($data);
         }
         catch(PDOException $e) {
          echo '{"error":{"text":'. $e->getMessage() .'}}'; 
          }

     }

     /* Informações Financeiras */
     public function finance($id_investidor)
     {
        try{
          $db = getDB();
          $stmt = $db->prepare("SELECT montante,rentabilidade,saldo FROM info_financeira WHERE id_investidor=:id_investidor");  
          $stmt->bindParam("id_investidor", $id_investidor,PDO::PARAM_INT);
          $stmt->execute();
          $data = $stmt->fetch(PDO::FETCH_OBJ);
          return $data;
          print_r($data);
         }
         catch(PDOException $e) {
          echo '{"error":{"text":'. $e->getMessage() .'}}'; 
          }

     }

  /* Endereço */
     public function endereco($id_investidor)
     {
        try{
          $db = getDB();
          $stmt = $db->prepare("SELECT rua,numero,bairro,cidade,estado,cep,pais FROM enderecos WHERE id_investidor=:id_investidor");  
          $stmt->bindParam("id_investidor", $id_investidor,PDO::PARAM_INT);
          $stmt->execute();
          $data = $stmt->fetch(PDO::FETCH_OBJ);
          return $data;
          print_r($data);
         }
         catch(PDOException $e) {
          echo '{"error":{"text":'. $e->getMessage() .'}}'; 
          }

     }

}
?>