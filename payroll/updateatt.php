<?php 


function UpdateAtt($badge_no,$rowid,$tot_days_absent,$tot_days_work,$tot_lates,$total_undertime,$total_adjstmenthrs,$tot_overtime_reg,$night_differential,$night_differential_ot,$tot_regholiday,$tot_overtime_regholiday,$tot_regholiday_nightdiff,$tot_overtime_regholiday_nightdiff,$tot_spholiday,$tot_overtime_spholiday,$tot_spholiday_nightdiff,$tot_overtime_spholiday_nightdiff,$tot_rest,$tot_overtime_rest,$night_differential_rest,$night_differential_ot_rest,$tot_overtime_rest_regholiday,$night_differential_rest_regholiday,$tot_overtime_night_diff_rest_regholiday,$tot_overtime_sprestholiday,$tot_sprestholiday_nightdiff,$tot_overtime_sprestholiday_nightdiff,$workfromhome,$offbusiness,
    $sick_leave,$vacation_leave,$sick_leave_nopay,$vacation_leave_nopay)
    {
            global $connL;

            $cmd = $connL->prepare("UPDATE dbo.att_summary SET 
                tot_days_absent = :tot_days_absent,
                tot_days_work = :tot_days_work,   
                tot_lates = :tot_lates,    
                total_undertime = :total_undertime,   
                total_adjstmenthrs = :total_adjstmenthrs,              
                tot_overtime_reg  = :tot_overtime_reg,
                night_differential = :night_differential,
                night_differential_ot = :night_differential_ot,
                tot_regholiday = :tot_regholiday,
                tot_overtime_regholiday = :tot_overtime_regholiday,
                tot_regholiday_nightdiff = :tot_regholiday_nightdiff,
                tot_overtime_regholiday_nightdiff = :tot_overtime_regholiday_nightdiff,
                tot_spholiday = :tot_spholiday,
                tot_overtime_spholiday = :tot_overtime_spholiday,
                tot_spholiday_nightdiff = :tot_spholiday_nightdiff,
                tot_overtime_spholiday_nightdiff = :tot_overtime_spholiday_nightdiff,
                tot_rest = :tot_rest,
                tot_overtime_rest = :tot_overtime_rest,
                night_differential_rest = :night_differential_rest,
                night_differential_ot_rest = :night_differential_ot_rest,
                tot_overtime_rest_regholiday = :tot_overtime_rest_regholiday,
                night_differential_rest_regholiday = :night_differential_rest_regholiday,
                tot_overtime_night_diff_rest_regholiday = :tot_overtime_night_diff_rest_regholiday,
                tot_overtime_sprestholiday = :tot_overtime_sprestholiday,
                tot_sprestholiday_nightdiff = :tot_sprestholiday_nightdiff,
                tot_overtime_sprestholiday_nightdiff = :tot_overtime_sprestholiday_nightdiff,
                workfromhome = :workfromhome,
                offbusiness = :offbusiness,
                sick_leave = :sick_leave,
                vacation_leave = :vacation_leave,
                sick_leave_nopay = :sick_leave_nopay,
                vacation_leave_nopay = :vacation_leave_nopay                                                
                where badge_no = :badge_no and rowid = :rowid");
                $cmd->bindValue('badge_no',$badge_no);
                $cmd->bindValue('rowid',$rowid);
                $cmd->bindValue('tot_days_absent',$tot_days_absent);
                $cmd->bindValue('tot_days_work',$tot_days_work);  
                $cmd->bindValue('tot_lates',$tot_lates);   
                $cmd->bindValue('total_undertime',$total_undertime);   
                $cmd->bindValue('total_adjstmenthrs',$total_adjstmenthrs);           
                $cmd->bindValue('tot_overtime_reg',$tot_overtime_reg);
                $cmd->bindValue('night_differential',$night_differential);
                $cmd->bindValue('night_differential_ot',$night_differential_ot);
                $cmd->bindValue('tot_regholiday',$tot_regholiday);
                $cmd->bindValue('tot_overtime_regholiday',$tot_overtime_regholiday);
                $cmd->bindValue('tot_regholiday_nightdiff',$tot_regholiday_nightdiff);
                $cmd->bindValue('tot_overtime_regholiday_nightdiff',$tot_overtime_regholiday_nightdiff);
                $cmd->bindValue('tot_spholiday',$tot_spholiday);
                $cmd->bindValue('tot_overtime_spholiday',$tot_overtime_spholiday);
                $cmd->bindValue('tot_spholiday_nightdiff',$tot_spholiday_nightdiff);
                $cmd->bindValue('tot_overtime_spholiday_nightdiff',$tot_overtime_spholiday_nightdiff);
                $cmd->bindValue('tot_rest',$tot_rest);
                $cmd->bindValue('tot_overtime_rest',$tot_overtime_rest);
                $cmd->bindValue('night_differential_rest',$night_differential_rest);
                $cmd->bindValue('night_differential_ot_rest',$night_differential_ot_rest);
                $cmd->bindValue('tot_overtime_rest_regholiday',$tot_overtime_rest_regholiday);
                $cmd->bindValue('night_differential_rest_regholiday',$night_differential_rest_regholiday);
                $cmd->bindValue('tot_overtime_night_diff_rest_regholiday',$tot_overtime_night_diff_rest_regholiday);
                $cmd->bindValue('tot_overtime_sprestholiday',$tot_overtime_sprestholiday);
                $cmd->bindValue('tot_sprestholiday_nightdiff',$tot_sprestholiday_nightdiff);
                $cmd->bindValue('tot_overtime_sprestholiday_nightdiff',$tot_overtime_sprestholiday_nightdiff);
                $cmd->bindValue('workfromhome',$workfromhome);
                $cmd->bindValue('offbusiness',$offbusiness);
                $cmd->bindValue('sick_leave',$sick_leave);            
                $cmd->bindValue('vacation_leave',$vacation_leave);                           
                $cmd->bindValue('sick_leave_nopay',$sick_leave_nopay);            
                $cmd->bindValue('vacation_leave_nopay',$vacation_leave_nopay);                  
                $cmd->execute();
    }


?>
