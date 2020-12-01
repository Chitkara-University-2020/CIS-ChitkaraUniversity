<?php

require '../includes/common.php';

$name = $_POST['name'];
$address = $_POST['address'];
$email=$_POST['email'];
$contact=$_POST['contact'];
$password = $_POST['password'];

if(strlen($contact)==10)
{
  if(preg_match("/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix", $email))
  {
    $check_contact_query = "SELECT id FROM hospitals WHERE contact=$contact ;";
    $check_contact_submit = mysqli_query($con, $check_contact_query);
    $check_contact_rows = mysqli_num_rows($check_contact_submit);
    if($check_contact_rows==0)
    {
      if(strlen($password)>=6 && strlen($password)<=16)
      {
        
        $password = MD5(mysqli_real_escape_string($con, $password));
        $address = mysqli_real_escape_string($con, $address);
        $name = mysqli_real_escape_string($con, $name);
        $contact = mysqli_real_escape_string($con, $contact);
        $email = mysqli_real_escape_string($con, $email);
        
        $target_dir = "../storage/";
        $target_file = $target_dir.basename($_FILES["file"]["name"]);
        if ($_FILES["file"]["size"] < 16000000) 
        {
          if(strtolower(pathinfo($target_file,PATHINFO_EXTENSION)) == "pdf") 
          {
            $info='{"tagline": "null","aboutus":"null"}';
            $testimonials='{"testimonialsnumber":"0", "alltestimonials":[]}';
            $social_links='{"facebook":"null","twitter":"null","linkedin":"null","youtube":"null"}';
            $counter_data='{"certificates":"null"}';
            $insert_query = "INSERT INTO hospitals(name,password,contact,email,address,info,testimonials,social_links,counter_data) VALUES('$name','$password','$contact','$email','$address','$info','$testimonials','$social_links','$counter_data');";
            $insert_result = mysqli_query($con, $insert_query) or die(mysqli_error($con));
            
            session_start();
            $_SESSION['email'] = $email;
            $_SESSION['id'] = mysqli_insert_id($con);
            $_SESSION['role'] = 1;
            $id=$_SESSION['id'];
            
            $database=$_SESSION['id'].$name;
            $database=str_replace(array( '\'','/','\\', '"', ',' , ';', '<', '>',' ','@',"'",'?',"~","!","#","$","%","^","^","&","*","(",")","=","+","|",'{','}','[',']' ),'',$database);
            
            $file_new_name=$target_dir.$database.".pdf";
            $file_base_name=$database.".pdf";
            move_uploaded_file($_FILES["file"]["tmp_name"], $file_new_name);
            
            $file_base_name = mysqli_real_escape_string($con, $file_base_name);
            $database = mysqli_real_escape_string($con, $database);
            $update_db_name_query="UPDATE hospitals 
            SET verification_file_name='$file_base_name', db_name='$database'  WHERE hospitals.id=$id;";
            $update_db_query_result=mysqli_query($con,$update_db_name_query) or die(mysqli_error($con));
            $_SESSION['hospital']=$database;
            
            $conn = mysqli_connect($servername, $serverusername, $serverpassword) or die(mysqli_error($conn));
            $create_hospital_query="CREATE DATABASE $database; 
            CREATE TABLE $database.`deparment_symptoms` (
              `id` int(11) NOT NULL,
              `department_id` int(11) NOT NULL,
              `symptom_id` int(11) NOT NULL
              ) ENGINE=InnoDB DEFAULT CHARSET=latin1;
              
              INSERT INTO $database.`deparment_symptoms` (`id`, `department_id`, `symptom_id`) VALUES
              (1, 1, 15),
              (2, 1, 20),
              (3, 1, 8),
              (4, 2, 1),
              (5, 2, 2),
              (6, 2, 19),
              (7, 2, 14),
              (8, 2, 13),
              (9, 3, 9),
              (10, 3, 18),
              (11, 4, 6),
              (12, 4, 3),
              (13, 4, 4),
              (14, 4, 2),
              (15, 4, 5),
              (16, 5, 10),
              (17, 6, 4),
              (18, 7, 1),
              (19, 7, 11),
              (20, 7, 17),
              (21, 7, 14),
              (22, 8, 13),
              (23, 8, 16),
              (24, 9, 12),
              (25, 9, 7),
              (26, 6, 21),
              (27, 6, 22);
              
              CREATE TABLE $database.`departments` (
                `id` int(11) NOT NULL,
                `department` varchar(255) NOT NULL
                ) ENGINE=InnoDB DEFAULT CHARSET=latin1;
                
                INSERT INTO $database.`departments` (`id`, `department`) VALUES
                (1, 'Pediatric Symptom'),
                (2, 'Neurology'),
                (3, 'Urology'),
                (4, 'Cardiology'),
                (5, 'Dental'),
                (6, 'Pulmonary'),
                (7, 'Traumatology'),
                (8, 'Ophthalmologist'),
                (9, 'Gastroenterologist');
                
                CREATE TABLE $database.`doctors` (
                  `id` int(11) NOT NULL AUTO_INCREMENT,
                  `name` varchar(255) NOT NULL,
                  `gender` enum('M','F','O') DEFAULT NULL,
                  `contact` bigint(20) NOT NULL,
                  `email` varchar(255) NOT NULL,
                  `password` varchar(255) NOT NULL,
                  `date_of_birth` date DEFAULT NULL,
                  `date_of_joining` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
                  `address` varchar(255) DEFAULT NULL,
                  `department_id` int(11) NOT NULL,
                  `qualification_id` int(11) NOT NULL
                  ) ENGINE=InnoDB DEFAULT CHARSET=latin1;
                  
                  CREATE TABLE $database.`qualifications` (
                    `id` int(11) NOT NULL,
                    `qualification` varchar(255) NOT NULL
                    ) ENGINE=MyISAM DEFAULT CHARSET=latin1;
                    
                    INSERT INTO $database.`qualifications` (`id`, `qualification`) VALUES
                    (3, 'MD Speciality-Anaesthesiology'),
                    (4, 'MD Speciality-Biochemistry'),
                    (5, 'MD Speciality-Community Health'),
                    (6, 'MD Speciality-Dermatology'),
                    (7, 'MD Speciality-Family Medicine'),
                    (8, 'MD Speciality-Forensic Medicine'),
                    (9, 'MD Speciality-General Medicine'),
                    (10, 'MD Speciality-Paediatrics'),
                    (11, 'MD Speciality-Pathology'),
                    (12, 'MD Speciality-Physiology'),
                    (13, 'MD Speciality-Tuberculosis and Respiratory diseases'),
                    (14, 'MD Speciality-Skin and Vereral diseases'),
                    (15, 'MS Specialty-Ear, Nose and Throat'),
                    (16, 'MS Specialty-General Surgery'),
                    (17, 'MS Specialty-Ophthalmology'),
                    (18, 'MS Specialty-Orthopaedics'),
                    (19, 'MS Specialty-Obstetrics and Gynaecology'),
                    (20, 'MS Specialty-Dermatology, Venerology and Leprosy'),
                    (21, 'DNB Specialty-Anaesthesiology'),
                    (22, 'DNB Specialty-Emergency Medicine'),
                    (23, 'DNB Specialty-Dermatology'),
                    (24, 'DNB Specialty-General Surgery'),
                    (25, 'DNB Specialty-General Medicine'),
                    (26, 'DNB Specialty-Maternal and Child Health'),
                    (27, 'DNB Specialty-Nuclear Medicine'),
                    (28, 'DNB Specialty-Microbiology'),
                    (29, 'DNB Specialty-Ophthalmology'),
                    (30, 'DNB Specialty-Paediatrics'),
                    (31, 'DNB Specialty-Psychiatry'),
                    (32, 'DNB Specialty-Respiratory diseases'),
                    (33, 'Bachelor of Medicine, Bachelor of Surgery - MBBS'),
                    (34, 'Bachelor of Dental Surgery - BDS'),
                    (35, 'Bachelor of Ayurvedic Medicine and Surgery - BAMS'),
                    (36, 'Bachelor of Homeopathic Medicine and Surgery - BHMS'),
                    (37, 'Bachelor of Unani Medicine and Surgery - BUMS'),
                    (38, 'Bachelor of Physiotherapy - B.Pth or BPT'),
                    (39, 'Bachelor of Veterinary Science - B.VSc'),
                    (40, 'Bachelor of Naturopathy and Yoga - BNYS'),
                    (41, 'Bachelor of Siddha Medicine and Surgery - BSMS'),
                    (42, 'Bachelor in Psychology'),
                    (43, 'MD Speciality-Anaesthesiology'),
                    (44, 'MD Speciality-Biochemistry'),
                    (45, 'MD Speciality-Community Health'),
                    (46, 'MD Speciality-Dermatology'),
                    (47, 'MD Speciality-Family Medicine'),
                    (48, 'MD Speciality-Forensic Medicine'),
                    (49, 'MD Speciality-General Medicine'),
                    (50, 'MD Speciality-Paediatrics'),
                    (51, 'MD Speciality-Pathology'),
                    (52, 'MD Speciality-Physiology'),
                    (53, 'MD Speciality-Tuberculosis and Respiratory diseases'),
                    (54, 'MD Speciality-Skin and Vereral diseases'),
                    (55, 'MS Specialty-Ear, Nose and Throat'),
                    (56, 'MS Specialty-General Surgery'),
                    (57, 'MS Specialty-Ophthalmology'),
                    (58, 'MS Specialty-Orthopaedics'),
                    (59, 'MS Specialty-Obstetrics and Gynaecology'),
                    (60, 'MS Specialty-Dermatology, Venerology and Leprosy'),
                    (61, 'DNB Specialty-Anaesthesiology'),
                    (62, 'DNB Specialty-Emergency Medicine'),
                    (63, 'DNB Specialty-Dermatology'),
                    (64, 'DNB Specialty-General Surgery'),
                    (65, 'DNB Specialty-General Medicine'),
                    (66, 'DNB Specialty-Maternal and Child Health'),
                    (67, 'DNB Specialty-Nuclear Medicine'),
                    (68, 'DNB Specialty-Microbiology'),
                    (69, 'DNB Specialty-Ophthalmology'),
                    (70, 'DNB Specialty-Paediatrics'),
                    (71, 'DNB Specialty-Psychiatry'),
                    (72, 'DNB Specialty-Respiratory diseases'),
                    (73, 'Bachelor of Medicine, Bachelor of Surgery - MBBS'),
                    (74, 'Bachelor of Dental Surgery - BDS'),
                    (75, 'Bachelor of Ayurvedic Medicine and Surgery - BAMS'),
                    (76, 'Bachelor of Homeopathic Medicine and Surgery - BHMS'),
                    (77, 'Bachelor of Unani Medicine and Surgery - BUMS'),
                    (78, 'Bachelor of Physiotherapy - B.Pth or BPT'),
                    (79, 'Bachelor of Veterinary Science - B.VSc'),
                    (80, 'Bachelor of Naturopathy and Yoga - BNYS'),
                    (81, 'Bachelor of Siddha Medicine and Surgery - BSMS'),
                    (82, 'Bachelor in Psychology');
                    
                    CREATE TABLE $database.`symptoms` (
                      `id` int(11) NOT NULL,
                      `symptom` varchar(255) NOT NULL
                      ) ENGINE=InnoDB DEFAULT CHARSET=latin1;
                      
                      INSERT INTO $database.`symptoms` (`id`, `symptom`) VALUES
                      (1, 'Headache'),
                      (2, 'Dizziness'),
                      (3, 'Arm Pain'),
                      (4, 'Chest Pain'),
                      (5, 'Fatigue'),
                      (6, 'Anxiety'),
                      (7, 'Diarrhea'),
                      (8, 'Worry a lot'),
                      (9, 'Blood in urine'),
                      (10, 'Bleeding Gums'),
                      (11, 'Hearing Problems'),
                      (12, 'Constipation'),
                      (13, 'Visual Problem'),
                      (14, 'Memory Problem'),
                      (15, 'Spend More Time Alone'),
                      (16, 'Burning or Swollen Eyes'),
                      (17, 'Feeling Sluggish'),
                      (18, 'Changed in Urine Form'),
                      (19, 'Fainting'),
                      (20, 'Tires easily'),
                      (21, 'Difficulty in Breathing'),
                      (22, 'Feeling of Suffoctaion');
                      
                      CREATE TABLE $database.`appointment_requests` (
                        `id` int(11) NOT NULL AUTO_INCREMENT,
                        `doctor_id` int(11) NOT NULL,
                        `patient_id` int(11) NOT NULL,
                        `age` int(11) DEFAULT NULL,
                        `symptoms` varchar(255) DEFAULT NULL,
                        `message` varchar(255) DEFAULT NULL,
                        `datetime_of_appointment` varchar(255) DEFAULT NULL,
                        `request_timestamp` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
                        `status` ENUM('pending','approved','declined') DEFAULT 'pending',
                        PRIMARY KEY (`id`),
                        KEY `patient_id` (`patient_id`),
                        KEY `doctor_id` (`doctor_id`)
                        ) ENGINE=InnoDB DEFAULT CHARSET=latin1;
                        
                        ALTER TABLE $database.`appointment_requests`
                        ADD CONSTRAINT `doctor_id` FOREIGN KEY (`doctor_id`) REFERENCES `doctors` (`id`);
                        
                        ALTER TABLE $database.`deparment_symptoms`
                        ADD PRIMARY KEY (`id`),
                        ADD KEY `department_id` (`department_id`),
                        ADD KEY `symptom_id` (`symptom_id`);
                        
                        ALTER TABLE $database.`departments`
                        ADD PRIMARY KEY (`id`);
                        
                        ALTER TABLE $database.`doctors`
                        ADD PRIMARY KEY (`id`),
                        ADD KEY `department_id` (`department_id`),
                        ADD KEY `qualification_id` (`qualification_id`);
                        
                        ALTER TABLE $database.`qualifications`
                        ADD PRIMARY KEY (`id`);
                        
                        ALTER TABLE $database.`symptoms`
                        ADD PRIMARY KEY (`id`);
                        
                        
                        ALTER TABLE $database.`deparment_symptoms`
                        MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
                        
                        ALTER TABLE $database.`departments`
                        MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
                        
                        ALTER TABLE $database.`doctors`
                        MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
                        
                        ALTER TABLE $database.`qualifications`
                        MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;
                        
                        ALTER TABLE $database.`symptoms`
                        MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
                        
                        
                        ALTER TABLE $database.`deparment_symptoms`
                        ADD CONSTRAINT `department_id` FOREIGN KEY (`department_id`) REFERENCES `departments` (`id`),
                        ADD CONSTRAINT `symptom_id` FOREIGN KEY (`symptom_id`) REFERENCES `symptoms` (`id`);
                        
                        ALTER TABLE $database.`doctors`
                        ADD CONSTRAINT `doctor_department_id` FOREIGN KEY (`department_id`) REFERENCES `departments` (`id`);";
                        
                        $create_hospital = mysqli_multi_query($conn, $create_hospital_query) or die(mysqli_error($conn));
                        
                        header('location:../admin-page.php');
                      }
                      else header("location: ../index.php?document_error=Invalid File Type");
                    }
                    else header("location: ../index.php?document_error=File Size Too Large");
                    
                    
                  }
                  else header('location: ../index.php?password_error=Password must be between 6 and 16 characters');
                }
                else header('location: ../index.php?error=Either email or contact or both is already registered with us');
              }
              else header('location: ../index.php?email_error=Enter valid email');
            }
            else header('location: ../index.php?contact_error=Enter valid contact number');
            
            
            