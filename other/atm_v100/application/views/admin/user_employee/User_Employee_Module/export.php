<?php
$filename = "User-Employees-List-" . date('d-m-Y') . ".xls"; header("Content-Disposition: attachment; filename=\"$filename\""); 
header("Content-Type: application/vnd.ms-excel");
//print_r($enquiry_data);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>User Employees List</title>
</head>
<body>
<?
$colspan = 10;
?>
    <table width="100%" border="1" align="center" cellpadding="0" cellspacing="0">
                                    <thead>
                                    <? if(!empty($start_date) || !empty($end_date) ){ ?>
                                        <tr>
                                            <th  colspan="<?=$colspan?>" style="background-color:#CCC" width="*"><br />

                                            Search Record : 
                                            <? if(!empty($start_date)){ echo "From : ".date('d-m-Y' , strtotime($start_date)); } ?>
                                            
                                            <? if(!empty($end_date)){ echo " &nbsp;&nbsp;&nbsp;&nbsp;	 To : ".date('d-m-Y' , strtotime($end_date)); } ?>
<br />&nbsp;
                                            
                                            </th>
                                            
                                        </tr>
                                        <? } ?>
                                        
                                        <tr >
                                            <th style="background-color:#999" width="*">Sl. No.</th>
                                            <th style="background-color:#999" width="*">Name</th>
											<th style="background-color:#999" width="*">Email</th>
											<th style="background-color:#999" width="*">Contact No</th>
											<th style="background-color:#999" width="*">Branch Name</th>
											<th style="background-color:#999" width="*">Password</th>
											<th style="background-color:#999" width="*">Employee Code</th>
											<th style="background-color:#999" width="*">Shift Timing</th>
											<th style="background-color:#999" width="*">Country</th>
											<th style="background-color:#999" width="*">State</th>
											<th style="background-color:#999" width="*">City</th>
											<th style="background-color:#999" width="*">Address</th>
											<th style="background-color:#999" width="*">Pincode</th>
											<th style="background-color:#999" width="*">Added On</th>
											<th style="background-color:#999" width="*">Updated On</th>
											<th style="background-color:#999" width="*">Updated By</th>
											<th style="background-color:#999" width="*">Status</th>
                                        </tr>
                                      </thead>
                                    <tbody>
									<?php 
                                        $count=0;
                                       // echo "count : ".count($ptype_list)." <br>";
                                        if(!empty($user_employee_data))
                                        { //print_r($ptype_list);
                                            foreach($user_employee_data as $row)   
                                            {
                                           //if($row->in_hand > 0 || $row->total_purchase > 0 || $row->total_sold > 0 || $row->total_returned > 0 || $row->to_receive > 0 )
										   { 
										   $count++;


                                    ?>
                                        <tr>
                                            <td width="*"><? echo $count;?></td>
											<td width="*"><? echo $row->name;?></td>
											<td width="*"><? echo $row->email;?></td>
											<td width="*"><? echo $row->contactno;?></td>
											<td width="*"><? echo $row->branch_name;?></td>
											<td width="*"><? echo $row->password;?></td>
											<td width="*"><? echo $row->user_employee_code;?></td>
											<td width="*">  <?php if (!empty($row->login_time)): ?>
															<?= (new DateTime($row->login_time))->format('h:i A'); ?>
														<?php else: ?>
															-
														<?php endif; ?> to <?php if (!empty($row->logout_time)): ?>
															<?= (new DateTime($row->logout_time))->format('h:i A'); ?>
														<?php else: ?>
															-
														<?php endif; ?></td>

											<td width="*"><? echo $row->country_name;?></td>
											<td width="*"><? echo $row->state_name;?></td>
											<td width="*"><? echo $row->city_name;?></td>
											<td width="*"><? echo $row->address;?></td>
											<td width="*"><? echo $row->pincode;?></td>
											<td width="*"><? echo date('d-m-Y h:i:s A' , strtotime($row->added_on));?> &nbsp;</td>
											<td width="*"> <? if(!empty($row->updated_on)){echo date('d-m-Y h:i:s A' , strtotime($row->updated_on));}?> &nbsp;</td>
                                            <td width="*"><? if(!empty($row->updated_by_name)){echo $row->updated_by_name;}?></td>
                                            <td width="*">
											<? if($row->status==1){ ?> Active
                                                <?}else{ ?>Block
                                                <? }?>	
											</td>
                                            
                                        </tr>
									<?php	}}?>
										
                                       
									<?php }else{ ?>
                                            <tr>
                                                <th colspan="<?=$colspan?>">No records to display...</th>
                                            </tr>
                                            
									<?php } ?>
                                    </tbody>
                                    
                                </table>



</body>

</html>
