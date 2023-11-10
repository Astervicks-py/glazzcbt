<?php

require_once "config.php";
class DB
{
    private $host = "localhost";
    private $username = "astervicks";
    private $password = "astervicks000";
    private $db = "kortana_cbt";


    public function connect()
    {
        $conn = mysqli_connect($this->host, $this->username, $this->password, $this->db);
        return $conn;
    }

    public function read($query)
    {
        $conn = $this->connect();
        $result = mysqli_query($conn,$query);
        if($result)
        {
            $data = false;
            while($row = mysqli_fetch_assoc($result))
            {
                $data[] = $row;
                
            }
            return $data;
        }else
        {
            return false;
        }
    }

    public function save($query)
    {
        $conn = $this->connect();
        $result = mysqli_query($conn,$query);

        if($result)
        {
            return true;
        }else
        {
            return false;
        }
    }
}


class User
{
   
    public function insert_user($username,$email,$tel,$pwd)
    {
        $gen = new Generate();
        $random = $gen->random(10,"mixed");
        $DB = new DB();
        $sql = "INSERT INTO users(user_id,username,tel,email,pwd) VALUES($random,$username,$tel,$email,$pwd)";
        return $DB->save($sql);
    }

    public function user_data($user_id, $section = "*")
    {
        $DB = new DB();
        $sql = "SELECT ".$section." FROM users WHERE user_id = '".$user_id."'";
        // echo ($sql);
        return $DB->read($sql)[0];
    }

}


class Generate
{
    public function random($len,$type = "mixed")
    {
        $random = "";
        $index = false;
        if($type == "mixed"){$characters = "qwertyuiopasdfghjklzxcvbnm1234567890QWERTYUIOPASDFGHJKLZXCVBNM";}
        elseif($type == "int"){$characters = "1234567890";}
        elseif($type == "text"){$characters = "qwertyuiopasdfghjklzxcvbnmQWERTYUIOPASDFGHJKLZXCVBNM";}
        
        for ($i=0; $i < $len; $i++) { 
            $index = rand(0,strlen($characters)-1);
            $random .= $characters[$index];
        }

        return $random;
    }
}


class Vote
{
    public function insert_vote($user_id,$question_id,$section,$my_answer)
    {
        $DB =  new DB();
        $voted = [];
        $my_vote = [];
        $people_that_voted = [];
        $sql = "SELECT `voted`, `".$section."` FROM custom_questions  WHERE id = '".$question_id."'";
        $result =  $DB->read($sql);
        $hasVoted = $this->has_voted($user_id,$question_id);
        

        if(!$hasVoted)
        {
            $my_vote['user_id'] = $user_id;
            $my_vote['my_answer'] = $my_answer;
            $voted[] = $my_vote;
            $voted = json_encode($voted);
            $new_count = $result[0]["$section"] + 1;
            $sql = "UPDATE custom_questions SET `".$section."` = '".$new_count ."', voted = '".$voted."' WHERE id = '".$question_id."'";
            if($DB->save($sql))
            {
                return true;
            }else{
                return "Some thing went wrong";
            }
        }else
        {
            return "user has voted already";
        }
        
       
    }

    public function has_voted($user_id,$question_id)
    {
        $DB = new DB();
        $sql = "SELECT `voted` FROM custom_questions  WHERE id = '".$question_id."'";
        $result = $DB->read($sql);
        $people_that_voted =[];
        if($result != false && !is_null($result[0]['voted']))
        {
            $voted = json_decode($result[0]['voted'], true);
            foreach ($voted as $key) {
                $people_that_voted[] = $key['user_id'];
            }
        }

        if(in_array($user_id, $people_that_voted))
        {
            return true;
        }else{
            return false;
        }
    }
}


class Comment
{
    public function insert_comment($user_id,$question_id,$comm)
    {
        $DB = new DB();
        $avb_comment = [];
        $my_comment = [];
        $sql = "SELECT comments FROM custom_questions WHERE id = '".$question_id."'";
        $result = $DB->read($sql);
        if($result != false && !is_null($result[0]['comments']))
        {
            $avb_comment = json_decode($result[0]['comments']);
        }

        $my_comment['user_id'] = $user_id;
        $my_comment['comment'] = $comm;
        $my_comment['date'] = date("Y:m:d");
        // echo "<pre style='font-size:2rem'>";
        // print_r( $comm);
        // echo "</pre>";
        // die();
        $avb_comment[] = $my_comment;
        $avb_comment = json_encode($avb_comment);

        $sql = "UPDATE custom_questions SET comments = '".$avb_comment."' WHERE id = '".$question_id."'";
        if($DB->save($sql))
        {
            return true;
        }else{
            return false;
        }
        
    }
}


class Like
{

    
    public function insert_like($user_id,$question_id)
    {
        $DB = new DB();
        $liked = $this->peopleThatLiked($user_id,$question_id);
        if(!in_array($user_id,$liked))
        {
            $liked[] = $user_id;          
        }else{
            $key = array_search($user_id,$liked);
            unset($liked[$key]);
        }

        
        $liked = json_encode($liked); 
        $sql = "UPDATE custom_questions SET liked = '".$liked."' WHERE id = '".$question_id."'";
        if($DB->save($sql))
        {
            return true;
        }else{
            return false;
        }
    }

    private function peopleThatLiked($user_id,$question_id)
    {
        $DB = new DB();
        $sql = "SELECT liked FROM custom_questions WHERE id = '".$question_id."'";
        $liked = [];
        if($DB->read($sql))
        {
            $result = $DB->read($sql)[0]['liked'];
            if(!is_null($result))
            {
                $liked = json_decode($result,true);
               
            }
        }

        return $liked;
    }
}


class Follow
{
    public function insert_follow($user_id,$friend_id)
    {
        $DB = new DB();
        // ? IF has followed, unfollow
        $followers = $this->get_followers($friend_id,"followers");
        $following = $this->get_followers($user_id,"following");

        // echo $followers;
        // echo $following;
        // die();
        if(!is_null($followers))
        {
            if(in_array($user_id, $followers))
            {
                $key = array_search($user_id, $followers);
                unset($followers[$key]);
                $key2 = array_search($friend_id,$following);
                unset($following[$key]);
            }else{
                $followers[] = $user_id;
                $following[] = $friend_id;
            }
        }
        

        $followers = json_encode($followers);
        $following = json_encode($following);

        $sql = "UPDATE users SET following = '$following' WHERE user_id = '$user_id'";
        if($DB->save($sql))
        {
            $sql = "UPDATE users SET followers = '$followers' WHERE user_id = '$friend_id'";
            if($DB->save($sql))
            {
                return true;
            }else{
                return false;
            }
        }
       
    }

    public function get_followers($user_id,$section)
    {
        $DB = new DB();
        $followers = [];
        $sql = "SELECT $section FROM users WHERE user_id = '$user_id'";
        // echo $sql . "<br />";
        if($result = $DB->read($sql))
        {
            
            
            $result = $result[0][$section];
            
            if(!is_null($result))
            {
                $followers = json_decode($result,true);
            }
            
        }
        // echo $followers;
        return $followers;
    }
}

class Notification
{
    public function insert_notification($receiver_id,$sender_id,$topic,$extra_id=NULL)
    {
        $DB = NEW DB();
        $message = "";
        $user = new User();
        $sender_username = $user->user_data($sender_id);
        if($topic == "custom_question")
        {
            $message = "".$sender_username['username']." Just added a new question. Let\'s check it out 🙃";
            
        }

        $sql = "INSERT INTO `notification`( `user_id`, `message`, `about`, `topic`, `identify_id`) VALUES ('".$receiver_id."','".$message."','".$sender_id."','".$topic."','".$extra_id."')";
        if($DB->save($sql))
        {
            return true;
        }else{
            return false;
        }
    }

    public function get_notification($user_id)
    {
        $notifications = [];
        $DB = new DB();
        $sql = "SELECT * FROM notification WHERE user_id = '".$user_id."'";
        if($result = $DB->read($sql))
        {
            $notifications = $result;
        }
        
        return $notifications;
    }

    public function number_of_unread_notification($user_id){
        $count = 0;
        $DB = new DB();
        $sql = "SELECT * FROM notification WHERE user_id = '".$user_id."'";
        if($result = $DB->read($sql))
        {
            foreach ($result as $key) {
                if(!$key['read'])
                {
                    $count++;
                }
            }
        }
        
        return $count;
    }
}

class Question
{
    public function is_subjective($id)
    {
        $DB = new DB();
        $sql = "SELECT is_subjective FROM questions WHERE question_id = '".$id."'";
        return $DB->read($sql)[0]['is_subjective'];
    }
}

class ChangeBio
{
    public function changeProfileImage($files,$user_id)
    {
        $DB = new DB();
        $user = new User();
        /** Verify Image type */
        $extension = array('image/jpg','image/png','image/jpeg');
        if(in_array(strtolower($files['profile']['type']),$extension)){

            /**Get exsiting Profile pic name */
            $existing_profile = $user->user_data($user_id,"profile_img")['profile_img'];

                /** Delete Existing Image */
                $first = explode("-",$existing_profile)[0];
                if($first != "profile")
                {
                    unlink("../images/profile_img/".$existing_profile);
                }
                    /** Replace The deleted Image */
                $rand = time();
                $imageName = $files['profile']['name'];
                $imagePath = $rand."_".$imageName;
                move_uploaded_file($files['profile']['tmp_name'],"../images/profile_img/".$imagePath);
                
                $sql = "UPDATE users SET profile_img = '{$imagePath}' WHERE user_id = '$user_id'";
                if($DB->save($sql)){
                    return TRUE;
                }else{
                    return FALSE;
                }
        }
    }
}