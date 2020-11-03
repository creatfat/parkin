<?php

   
        require_once __DIR__ . '/../connect/database.php';
     
        $sql = "SELECT the.therapyID, the.User_IDpatient, the.TherapyList_IDtherapylist,user.userId, user.username, user.Lat, user.Long, o.name as organization, thl.name as thl_name, thl.Dosage, med.name as med_name, n.note, n.noteID FROM therapy the LEFT JOIN user ON the.User_IDpatient = user.userID LEFT JOIN organization o ON o.organizationID = user.Organization LEFT JOIN therapy_list thl ON thl.therapy_listID = the.TherapyList_IDtherapylist LEFT JOIN medicine med ON med.medicineID = thl.Medicine_IDmedicine LEFT JOIN note n ON n.User_IDmed = the.User_IDmed WHERE username='patient2' "; 
        $result = $conn->query($sql);
        $patients_data = array();
        
         
        while($row = $result->fetch_assoc()){
         
            $therapyID = $row['therapyID'];
          $index = array('note'=>$row['note'], 'therapyID'=>$row['therapyID'], 'patient_name' => $row['username'], 'org' => $row['organization'], 'therapy' => $row['thl_name'], 'dosage' => $row['Dosage'], 'medicine'=>$row['med_name'], 'lat'=>$row['Lat'], 'long'=>$row['Long'],'noteID'=>$row['noteID']);
          $sql = "SELECT tst.testID, tst.dateTime FROM test tst WHERE tst.Therapy_IDtherapy='$therapyID'";
          $result_detail = $conn->query($sql);
          while($row_detail = $result_detail->fetch_assoc()){
            $index['testID'] = $row_detail['testID'];
            $index['dateTime'] = $row_detail['dateTime'];
            
              $testID = $index['testID'];
              $sql = "SELECT * FROM test_session WHERE Test_IDtest='$testID'";
              $test_detail = $conn->query($sql);
              while($test = $test_detail->fetch_assoc()){
                $index['test_session_ID'] = $test['test_SessionID'];
                $index['dataURL'] = $test['DataURL'];
                array_push($patients_data, $index);
                
              }
         
          }
        
        }
         
?>
