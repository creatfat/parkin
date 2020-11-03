<?php
        require_once __DIR__ . '/../connect/database.php';
        $sql = "SELECT the.therapyID, the.User_IDpatient, the.TherapyList_IDtherapylist, user.loc,user.username, user.note, user.Lat, user.Long, o.name as organization, thl.name as thl_name, thl.Dosage, med.name as med_name FROM therapy the LEFT JOIN user ON the.User_IDpatient = user.userID LEFT JOIN organization o ON o.organizationID = user.Organization LEFT JOIN therapy_list thl ON thl.therapy_listID = the.TherapyList_IDtherapylist LEFT JOIN medicine med ON med.medicineID = thl.Medicine_IDmedicine";
        $result = $conn->query($sql);
        $get_data = array();
         
        while($obj = $result->fetch_assoc()){
          
          
          $therapyID = $obj['therapyID'];
          $index = array('note'=>$obj['note'] ,'loc' => $obj['loc'],'therapyID'=>$obj['therapyID'], 'patient_name' => $obj['username'], 'organization' => $obj['organization'], 'therapy' => $obj['thl_name'], 'dosage' => $obj['Dosage'], 'doctor_name'=>$obj['med_name']);
          $sql = "SELECT tst.testID, tst.dateTime FROM test tst WHERE tst.Therapy_IDtherapy='$therapyID'";
          $result_detail = $conn->query($sql);
          while($row_detail = $result_detail->fetch_assoc()){
            $index['testID'] = $row_detail['testID'];
            $index['TIME'] = $row_detail['dateTime'];
            
              $tID = $index['testID'];
              $sql = "SELECT * FROM test_session WHERE Test_IDtest='$tID'";
              $test_detail = $conn->query($sql);
              while($test = $test_detail->fetch_assoc()){
                $index['test_session_ID'] = $test['test_SessionID'];
                $index['data'] = $test['DataURL'];
                array_push($get_data, $index);
                
              }
         
          }
        }
         
?>
