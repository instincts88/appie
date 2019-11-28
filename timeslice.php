<?php
include "mainprocess.php";
                        $dateofappointment = $_POST['datevalue'];
                        $individdoa = explode(' ', $dateofappointment);
                        $individd = $individdoa[0];
                        $individm = $individdoa[1];
                        $individy = $individdoa[2];
                        
                        $timesessionquery = "SELECT * FROM TimeSession INNER JOIN TimeTable_Appoint ON TimeSession.TimeSessionID = TimeTable_Appoint.TimeSessionID WHERE PhysicianID = ? AND DayTT = ? AND MonthTT = ? and YearTT = ?";
                        $selecttimesession = sqlsrv_query($connection, $timesessionquery, array($_SESSION['ChosenPhysicianID'], $individd, $individm, $individy), array( "Scrollable" => SQLSRV_CURSOR_KEYSET ));
                        //$selecttimeslice = sqlsrv_query($connection, "SELECT TimeSlice_Appoint.DifferenceValue, TimeSlice_Appoint.PatientsPerHour from TimeSlice_Appoint inner join MedicalStaff on timeslice_Appoint.TimeSliceID = MedicalStaff.TimeSliceID where MID = ?", array($_SESSION['ChosenPhysicianID']), array( "Scrollable" => SQLSRV_CURSOR_KEYSET ));
                        $selecttimeslice = sqlsrv_query($connection, "SELECT * FROM TimeSlice_Appoint", array(), array( "Scrollable" => SQLSRV_CURSOR_KEYSET ));
                     
                     
                        while ($chosentimesession = sqlsrv_fetch_array($selecttimesession)){
                                while($chosentimeslice = sqlsrv_fetch_array($selecttimeslice)){
                                        $ChosenTimeStartarray1 = explode(':00.', $chosentimesession['EffectStart']);
                                        $ChosenTimeStartwait = $ChosenTimeStartarray1[0];
                                        $ChosenTimeStar = date('h:i:s a', strtotime($ChosenTimeStartwait));
                                        $ChosenTimeStartarray = explode(':00 ', $ChosenTimeStar);
                                        $ChosenTimeStartobj = $ChosenTimeStartarray[0] . $ChosenTimeStartarray[1];
                                        $ChosenTimeStart = new DateTime($ChosenTimeStartobj);
                                        $ChosenTimeStartagain = new DateTime($ChosenTimeStartobj);
                     
                                        $ChosenTimeEndarray1 = explode(':00.', $chosentimesession['EffectEnd']);
                                        $ChosenTimeEndwait = $ChosenTimeEndarray1[0];
                                        $ChosenTimeEn = date('h:i:s a', strtotime($ChosenTimeEndwait));
                                        $ChosenTimeEndarray = explode(':00 ', $ChosenTimeEn);
                                        $ChosenTimeEndobj = $ChosenTimeEndarray[0] . $ChosenTimeEndarray[1];
                                        $ChosenTimeEnd = new DateTime($ChosenTimeEndobj);
                                        $ChosenTimeEndagain = new DateTime($ChosenTimeEndobj);
                                        
                                       // $ChosenTimeStart = $chosentimesession['EffectStart'];
                                     //   $ChosenTimeEnd = $chosentimesession['EffectEnd'];
                                        $ChosenTimeSlicearray = explode(':00.', $chosentimeslice['DifferenceValue']);
                                        $ChosenTimeSlicefull = explode(':', $ChosenTimeSlicearray[0]);
                                        $ChosenTimeSliceHour = $ChosenTimeSlicefull[0];
                                        $ChosenTimeSliceMinute = $ChosenTimeSlicefull[1];   
                                        $one = 'PT' . $ChosenTimeSliceHour . 'H' . $ChosenTimeSliceMinute . 'M';
                                        // echo $one;
                                       
                     
                                        $PatientsPerHour = $chosentimeslice['PatientsperHour'];
                     
                                        
                     
                                        $SessionName = $chosentimesession['SessionName'];
                                        $SessionDesc = $chosentimesession['Description'];
                                        $SessionID = $chosentimesession['TimeSessionID'];
                                }
                     
                        }
                     

                    echo "<p class><strong>Period Of Work:" . $SessionName . " (" . $SessionDesc . ")</strong></p>";

                    echo "<select class='form-control' required=yes id = 'slices' name = 'timeselected'>";
                    echo " <option value='None' disabled selected>Select An Appointment Slot</option>";      
                    while($ChosenTimeStart<=$ChosenTimeEnd){
                      $currenttime = $ChosenTimeStart->format('H:i:s');
                      $sessiondetails = $ChosenTimeStartagain->format('g:i A') . " - " . $ChosenTimeStartagain->add(new DateInterval($one))->format('g:i A');
                      //echo "<th class = 'text-center'>" . $ChosenTimeStart ."</th>";
                      // $ChosenTimeStart += New DateInterval('P10D');
                     
                      //$selectslots = sqlsrv_query($connection, "SELECT * FROM HypAppointments WHERE MedicalOfficerID = ? AND AppointmentDate = ? AND AppointmentTime = ? AND IsCancelled = ?", array($_SESSION['ChosenPhysicianID'], $dateofappointment, $currenttime, 0), array( "Scrollable" => SQLSRV_CURSOR_KEYSET ));
                      //$slots = sqlsrv_num_rows($selectslots);
                      //$slotsleft = $PatientsPerHour - $slots;       
                      $selectslots = sqlsrv_query($connection, "SELECT * FROM TimeSliceVacancySummary WHERE MedicalOfficerID = ? AND ClinicID = ? AND EffectiveDate = ? AND TimeSessionID = ? AND TimeSliceDetails = ?", array($_SESSION['ChosenPhysicianID'], "1", $dateofappointment, $SessionID, $sessiondetails), array( "Scrollable" => SQLSRV_CURSOR_KEYSET ));
                      $slots = sqlsrv_num_rows($selectslots);
                      
                      //$slotsleft = $PatientsPerHour - $slots;

                      while ($getvacancy = sqlsrv_fetch_array($selectslots)){
                        $slotMed = $getvacancy['Medical'];
                        $vacancy = $getvacancy['Vacancy'];
                      }
                      
                        
                        echo "<option id = " . $vacancy . " value= " . $sessiondetails  . ">" . $ChosenTimeStart->format('g:i A') . " - " . $ChosenTimeStart->add(new DateInterval($one))->format('g:i A') . " (Available booking space - <span id='slots'>" . $vacancy . "</span>)</option>";

                          //echo "<option id = '' value= " . $currenttime . ">" . $ChosenTimeStart->format('g:i A') . " - " . $ChosenTimeStart->add(new DateInterval($one))->format('g:i A') . " (Available booking space - <span id='slots'></span>)</option>";

                        //echo "<script>$('#slices option#0').remove();</script>";
                        //echo "<script>$('#slices option:gt(0)').remove();</script>";
                        //echo "<script>$('#slices option[id='0']').remove();</script>";
                          echo "<script>$('#slices option#0').remove();</script>";
                      
                    }
                    echo "</select>";

      
                    


?>