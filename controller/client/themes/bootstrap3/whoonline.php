<?php

// Данный код создан и распространяется по лицензии GPL v3
// Разработчки: Грибов Павел, (добавляйте себя если что-то делали))
// http://грибовы.рф

                            $crd=date("Y-m-d H:i:s");
                            $SQL = "SELECT unix_timestamp('$crd')-unix_timestamp(lastdt) as res,users_profile.fio as fio,users_profile.jpegphoto FROM users inner join users_profile on users_profile.usersid=users.id";
                            $result = $sqlcn->ExecuteSQL( $SQL ) or die("Не могу выбрать список заходов пользователей!".mysqli_error($sqlcn->idsqlconnection));
                            while($row = mysqli_fetch_array($result)) {                                
                                $res=$row["res"];                                
                                $fio=$row["fio"];                                
                                $jpegphoto=$row["jpegphoto"];                                
                                if (file_exists("photos/$jpegphoto")==false){$jpegphoto="noimage.jpg";};
                                if ($res<10000){                                        
                                    echo '<div class="col-sm-6 col-md-4">';
                                    echo "<div class=thumbnail>";
                                    echo "<img src=photos/$jpegphoto>";
                                    echo "<p align=center>$fio</p>";
                                    echo "</div>";
                                    echo "</div>";                                    
                                };                                
                            };                                                           
                            