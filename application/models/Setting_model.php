<?php

class Setting_model extends CI_Model {

	public function __construct()
	{
		$this->load->database();
                $this->load->library('email');
	}

	function Get_language()
	{
		$this->db->select('*');
		$this->db->from('tbl_language');
		$query = $this->db->get();
		$result = $query->result_array();
		foreach( $result as $row)
		{
			$data =  $row;
		}
		return $data['language'];

	}

	function Get_All_DESCENDING($tablename,$rowName)
	{
		$this->db->select('*');
		$this->db->from($tablename);
		$this->db->order_by($rowName, "DESC");
		$query = $this->db->get();
		return $query->result_array();
	}

	function Get_Single_Row($table_name,$where,$id)
	{
		$this->db->where($where,$id);
		$query = $this->db->get($table_name);
		return $result = $query->row();

	}	

	function Get_All_joinAgent($table1,$table2,$where1,$where2,$where3,$orderby)
	{
		$this->db->select('*');
		$this->db->from($table1);
		$this->db->join($table2,$where1, 'inner');
		$this->db->where_in($where2,$where3);
		if($orderby != '')
		{
			$this->db->order_by($orderby, "desc"); 
		}

		$query = $this->db->get();
		return $query->result_array();
		
	}

	function Get_All($tablename)
	{
		$this->db->select('*');
		$this->db->from($tablename);
		$query = $this->db->get();
		return $query->result_array();
	}

	function Get_All_Where($tablename,$field,$id)
	{
		$this->db->select('*');
		$this->db->from($tablename);
		$this->db->where($field,$id);
		$query = $this->db->get();
		return $query->result_array();
	}

	function Get_Count($tablename)
	{
		$this->db->select('*');
		$this->db->from($tablename);
		$query = $this->db->get();
		return $query->num_rows();
	}


	function Get_Single($table_name,$where,$id)
	{
		$this->db->select('*');
		$this->db->from($table_name);
		$this->db->where($where,$id);
		$query = $this->db->get();
		return $query->result_array();

	}

	function update($Data,$table_name,$where,$id)
	{
		$this->db->where($where, $id);
		$this->db->update($table_name, $Data);
	}

	function insert($Data,$table_name)
	{
		$this->db->insert($table_name, $Data);
		$insert_id = $this->db->insert_id();
		return  $insert_id;
		
	}
	

	function delete($table_name,$where,$id )
	{
		$this->db->where($where, $id);
		$this->db->delete($table_name);

	}

	function Get_All_join($table1,$table2,$where1)
	{
		$this->db->select('*');
		$this->db->from($table1);
		$this->db->join($table2,$where1, 'inner');
		$query = $this->db->get();
		return $query->result_array();
		
	}

	function Get_Single_join($table1,$table2,$where1,$where2=NULL,$id=NULL)
	{
		$this->db->select('*');
		$this->db->from($table1);
		$this->db->join($table2,$where1, 'inner');
		//$this->db->where($where2, $id);

		$query = $this->db->get();
		return $query->result_array();
	}


	function upload($inputname, $path) {
		$config['upload_path'] = "./".$path."/"; // path where image will be saved
		$config['allowed_types'] = 'gif|jpg|png|jpeg';
		$config['max_size'] = 3072;
		$config['encrypt_name'] = TRUE;
		$this->upload->initialize($config);
		$this->upload->do_upload($inputname);
		$data_upload_files = $this->upload->data();

		return $image = $data_upload_files['file_name'];		
	}
	function deleteData($table, $field, $id) {
		$this->db->where($field, $id);
		$this->db->delete($table);
	}

	function deleteItems($table_name,$array)
	{	
		$this->db->delete($table_name,$array);

	}

	//delete data from table
	public function delete_data($tablename,$where,$user_id,$limt){
		$this->db->select('*');
		$this->db->from($tablename);
		$this->db->where($where,$user_id);
		$this->db->limit($limit);
		$this->db->delete();

	}
    //multiple image upload (also using in edit too)
	public function multi_image_upload($files,$path){
    	//print_r($files);
		$count = count($_FILES['userfile']['name']);
		for($i=0; $i<$count; $i++)
		{
			$_FILES['userfile']['name']= time().$files['userfile']['name'][$i];
			$_FILES['userfile']['type']= $files['userfile']['type'][$i];
			$_FILES['userfile']['tmp_name']= $files['userfile']['tmp_name'][$i];
			$_FILES['userfile']['error']= $files['userfile']['error'][$i];
			$_FILES['userfile']['size']= $files['userfile']['size'][$i];
			$config['upload_path'] = './upload/'.$path.'/';
			$config['allowed_types'] = 'gif|jpg|png|jpeg|zip|pdf|ppt|pptx|doc|docx|gzip|tar|rar';
			$config['max_size'] = '';
			$config['remove_spaces'] = false;
			$config['overwrite'] = false;
			$config['max_width'] = '';
			$config['max_height'] = '';
			$this->upload->initialize($config);
			$this->upload->do_upload();
			$fileName = $_FILES['userfile']['name'];
			$images[] = $fileName;
		}
		$fileName = implode(',',$images);
		return $fileName;
	}
	

	function Get_All_by_id($table, $field, $id) {
		$this->db->where($field, $id);
		$query = $this->db->get($table);
		return $query->result_array();
	}

	function sendEmail($receiver, $password){

			$from = "admin@londonteclms.tk";    //senders email address
			$subject = 'Londontec LMS Email Verification';  //email subject

			//sending confirmEmail($receiver) function calling link to the user, inside message body
			
                        //$message = 'Dear,<br><br> Please click on the below activation link to verify your Lodontec LMS credintial <br><br>
			//<a href=\'http://www.londonteclms.tk/confirm/confirmEmail/'.md5($receiver).'\'>http://www.londonteclms.tk/confirm/confirmEmail/'.md5($receiver).'</a><br><br>
                        //<p><b>Londontec LMS Login Credintial</b></p>
                        //<hr>
                         //<p>Your LMS login Email is : '.$receiver.'</p>
			//<p>Your LMS password is : '.$password.'</p>
                        //Thanks';
                        
                        $message =  '<table style="width:width: 161%; background:#EEE;padding:40px;border:1px solid #DDD;margin:0 auto;font-family:calibri;">
                                          <tr>
                                            <td>
                                              <table>
                                                <!-- Logo -->
                                                <tr>
                                                  <td style="padding:10px 30px;text-align:center;margin:0">
                                                    <p>
                                                      <a href="#">
                                                        <img src="http://londontec.lk/wp-content/uploads/2017/07/lcc.gif" alt="londonteclogo" style="width: 26%;"/>
                                                      </a>
                                                    </p>
                                                  </td>
                                                </tr>
                                        
                                                <!-- Welcome Salutation -->
                                                <tr>
                                                  <td style="padding:10px 30px;margin:0;font-size:2.5em;color:#4A7BA5;text-align:center;">
                                                    Welcome to Londontec Learning Managment System
                                                  </td>
                                                </tr>
                                                <!-- User Msg -->
                                                <tr>
                                                  <td style="padding:10px 30px;margin:0;text-align:left;">
                                                    <p>Hello Dear</p>
                                                    <p>To activate your profile please follow the below link</p>
                                                  </td>
                                                        
                                                </tr>
                                                <!-- Link Button -->
                                                <tr style="height: 84px;">
                                                  <td style="padding:10px 30px;margin:0;text-align:center;">
                                                  
                                                          
                                                         
                                                                <a href=\'http://www.londonteclms.tk/confirm/confirmEmail/'.md5($receiver).'\'>http://www.londonteclms.tk/confirm/confirmEmail/'.md5($receiver).'</a><br>
                                                                
                                                                <p><b>Londontec LMS Login Credintial</b></p>
                                                                <hr>
                                                                <p>Your LMS login Email is : '.$receiver.'</p>
                                                                <p>Your LMS password is : '.$password.'</p>
                                                                Thanks
                                                          
                                                          </td>
                                                           
                                                </tr>
                                               
                                             
                                                <tr>
                                                         <div style="height:13px;"></div>
                                                 
                                                </tr>
                                              </table>
                                            </td>
                                          </tr>
                                        </table>';

			//print_r(md5($receiver)); 
			//echo $message;

			//config email settings
			$config['protocol'] = 'IMAP';
			$config['smtp_host'] = 'mail.londonteclms.tk';
			$config['smtp_port'] = '143';
			$config['smtp_user'] = $from;
			$config['smtp_pass'] = 'Raheem2269';  //sender's password
			$config['mailtype'] = 'html';
			$config['charset'] = 'utf-8';
			$config['wordwrap'] = 'TRUE';
			$config['newline'] = "\r\n"; 

			$this->load->library('email', $config);
			$this->email->initialize($config);
			//send email
			$this->email->from($from);
			$this->email->to($receiver);
			$this->email->subject($subject);
			$this->email->message($message);

			//this comment by raheem (once you upload to the server then check)
			if($this->email->send()){
				 "sent to: ".$receiver."<br>";
				 "from: ".$from. "<br>";
				 "protocol: ". $config['protocol']."<br>";
				 "message: ".$message;
				return true;
			}else{
				echo $receiver." email send failed";
				return false;
			}

		}

	//status activate user account
    function verifyEmail($key){
        $data = array('verification_status' => 1);
        $this->db->where('md5(email)',$key);
        return $this->db->update('londontec_users', $data);    //update status as 1 to make active user
    }

    /* student Email verification code sender */
    function sendEmailstudent($receiver, $password){

			$from = "admin@londonteclms.tk";    //senders email address
			$subject = 'Londontec LMS Email Verification';  //email subject

			//sending confirmEmail($receiver) function calling link to the user, inside message body
                        /*
			$message = 'Dear student,<br><br> Please click on the below activation link to verify your Lodontec LMS credintial <br><br>
			<a href=\'http://www.londonteclms.tk/confirm/studnetconfirmEmail/'.md5($receiver).'\'>http://www.londonteclms.tk/confirm/studnetconfirmEmail/'.md5($receiver).'</a><br><br>
                        <p><b>Londontec LMS Login Credintial</b></p>
                        <hr>
                        <p>Your LMS login Email is : '.$receiver.'</p>
                        <p>Your LMS password is : '.$password.'</p> 
                        Thanks';
                        */
                        
                        
                        $message =  '<table style="width:width: 161%; background:#EEE;padding:40px;border:1px solid #DDD;margin:0 auto;font-family:calibri;">
                                          <tr>
                                            <td>
                                              <table>
                                                <!-- Logo -->
                                                <tr>
                                                  <td style="padding:10px 30px;text-align:center;margin:0">
                                                    <p>
                                                      <a href="#">
                                                        <img src="http://londontec.lk/wp-content/uploads/2017/07/lcc.gif" alt="londonteclogo" style="width: 26%;"/>
                                                      </a>
                                                    </p>
                                                  </td>
                                                </tr>
                                        
                                                <!-- Welcome Salutation -->
                                                <tr>
                                                  <td style="padding:10px 30px;margin:0;font-size:2.5em;color:#4A7BA5;text-align:center;">
                                                    Welcome to Londontec Learning Managment System
                                                  </td>
                                                </tr>
                                                <!-- User Msg -->
                                                <tr>
                                                  <td style="padding:10px 30px;margin:0;text-align:left;">
                                                    <p>Dear Student</p>
                                                    <p>To activate your profile please follow the below link</p>
                                                  </td>
                                                        
                                                </tr>
                                                <!-- Link Button -->
                                                <tr style="height: 84px;">
                                                  <td style="padding:10px 30px;margin:0;text-align:center;">
                                                  
                                                          
                                                         
                                                               <a href=\'http://www.londonteclms.tk/confirm/studnetconfirmEmail/'.md5($receiver).'\'>http://www.londonteclms.tk/confirm/studnetconfirmEmail/'.md5($receiver).'</a><br>
                                                                
                                                                <p><b>Londontec LMS Login Credintial</b></p>
                                                                <hr>
                                                                <p>Your LMS login Email is : '.$receiver.'</p>
                                                                <p>Your LMS password is : '.$password.'</p>
                                                                Thanks
                                                          
                                                          </td>
                                                           
                                                </tr>
                                               
                                             
                                                <tr>
                                                         <div style="height:13px;"></div>
                                                 
                                                </tr>
                                              </table>
                                            </td>
                                          </tr>
                                        </table>';


			 //print_r(md5($receiver)); 
			 //echo $message;

			//config email settings
			$config['protocol'] = 'IMAP';
			$config['smtp_host'] = 'mail.londonteclms.tk';
			$config['smtp_port'] = '143';
			$config['smtp_user'] = $from;
			$config['smtp_pass'] = 'Raheem2269';  //sender's password
			$config['mailtype'] = 'html';
			$config['charset'] = 'iso-8859-1';
			$config['wordwrap'] = 'TRUE';
			$config['newline'] = "\r\n"; 

			$this->load->library('email', $config);
			$this->email->initialize($config);
			//send email
			$this->email->from($from);
			$this->email->to($receiver);
			$this->email->subject($subject);
			$this->email->message($message);

			//this comment by raheem (once you upload to the server then check)
			if($this->email->send()){
				 "sent to: ".$receiver."<br>";
				 "from: ".$from. "<br>";
				 "protocol: ".$config['protocol']."<br>";
				 "message: ".$message;
				return true;
			}else{
				echo $receiver." email send failed";
				return false;
			}

		}

		//Student Email verification update student table
	    function studentverifyEmail($key){
	        $studentverify = array('verification_status' => 1);
	        $this->db->where('md5(email)',$key);
	        return $this->db->update('students', $studentverify);//update status as 1 to make active student account
	    }

		

		//insert multiple images and data to the table
		//$inputdata 		= array contain the values 
		//$tablename_data 	= table name for insert '$inputdata'
		//$tablename_images = table name for insert images (multiple images|| and files)
		//$filename 		= array contain the names of multiple images|| and files
		//$where_name 		= 'image_name' field of the '$tablename_images' table || and same storing the files
		//$where_id 		= 'image_is' field of the '$tablename_images' table 

		function insert_multi_images_data($inputdata,$tablename_data,$tablename_images,$filename,$where_name,$where_id)
		{
			$this->db->insert($tablename_data, $inputdata); 
			$insert_id = $this->db->insert_id();

			if($filename!='' )
			{
				$filename1 = explode(',',$filename);
				foreach($filename1 as $file)
				{
					$file_data = array(
						$where_name => $file,
						$where_id => $insert_id
						);
					$this->db->insert($tablename_images, $file_data);
				}
			}
		}

		//update multiple images and data to the table
		//$tablename_data 	= table name for insert '$inputdata'
		//$tablename_images = table name for insert images (multiple images)
		//$data_where		= field name of the '$tablename_data' table we going to update
		//$data_id			= id of the '$tablename_data' table we going to update
		//$inputdata 		= array contain the values 
		//$where_name 		= 'image_name' field of the '$tablename_images' table
		//$where_id 		= 'image_is' field of the '$tablename_images' table
		//$filename 		= array contain the names of multiple images
		function update_multi_images_data($tablename_data,$tablename_images,$data_where,$data_id,$inputdata,$where_name,$where_id,$filename =''){
			$this->db->where($data_where, $data_id);
			$this->db->update($tablename_data, $inputdata);

			if($filename!='' )
			{
				$filename1 = explode(',',$filename);
				foreach($filename1 as $file)
				{
					$file_data = array(
						$where_name => $file,
						$where_id => $data_id
						);
					$this->db->insert($tablename_images, $file_data);
				}
			}
		}

		// adding new activity to the db
		function add_instruction($inputdata ,$filename){
			
			$this->db->insert('instructions', $inputdata);
			$insert_id = $this->db->insert_id();

			if($filename!='' ){
				$filename = explode(',',$filename);
				foreach($filename as $file){
					$file_data = array(
						'image' => $file,
						'instruction_id' => $insert_id
						);
					$this->db->insert('instruction_image', $file_data);
				}
			}
		}

		//multiple course meterial upload (also using in edit too)
		public function multi_meterial_upload($files,$path){
	    	//print_r($files);
			$count = count($_FILES['userfile']['name']);
			for($i=0; $i<$count; $i++)
			{
				$_FILES['userfile']['name']= time().$files['userfile']['name'][$i];
				$_FILES['userfile']['type']= $files['userfile']['type'][$i];
				$_FILES['userfile']['tmp_name']= $files['userfile']['tmp_name'][$i];
				$_FILES['userfile']['error']= $files['userfile']['error'][$i];
				$_FILES['userfile']['size']= $files['userfile']['size'][$i];
				$config['upload_path'] = './upload/'.$path.'/';
				$config['allowed_types'] = 'gif|jpg|png|jpeg|pdf|ppt|pptx|doc|docx|mp4|mp3';
				$config['max_size'] = '1000000000000000';
				//max file name size
				$config['max_filename'] = '255';
				//whether file name should be encrypted or not
				$config['encrypt_name'] = FALSE;
				$config['remove_spaces'] = false;
				$config['overwrite'] = false;
				$config['max_width'] = '';
				$config['max_height'] = '';
				$this->upload->initialize($config);
				$this->upload->do_upload();
				$this->upload->data();
				$fileName = $_FILES['userfile']['name'];
				$images[] = $fileName;
			}
			$fileName = implode(',',$images);
			return $fileName;
		}

		// adding new course meterial with id  to the db
		function add_course_meterial($upload_lecture_data ,$filename){
			
			$this->db->insert('course_meterials', $upload_lecture_data);
			$insert_id = $this->db->insert_id();

			if($filename!='' ){
				$filename = explode(',',$filename);
				foreach($filename as $file){
					$file_data = array(
						'meterial_upload_name' => $file,
						'meterial_id' => $insert_id
						);
					$this->db->insert('course_meterial_upload', $file_data);
				}
			}
		}

}