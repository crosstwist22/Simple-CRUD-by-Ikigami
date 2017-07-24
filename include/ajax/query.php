<?php
header('Content-Type: image/jpeg');
    
    spl_autoload_register(function($class){
        require '../class/'.$class.'.php';
    });
       $query = new Query();   
       $session = new Session();
       
           date_default_timezone_set('Asia/Manila');
        date_default_timezone_get();
    
    if(isset($_GET['q'])){
        switch(Input::__getURL('q')){
            case 'setData':{
                header('Content-type: image/jpeg');
                    $dom_data = '<thead>
                            <th>ID NO</th>
                            <th>Pictures</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>BirthDate</th>
                            <th>Age</th>
                            <th>Department</th>
                            <th>Position</th>
                            <th>Posted</th>
                             <th>Action</th>
                        </thead>
                        <tbody>';
                    foreach( $query->__getInfo(Query::GET_DB) as $data){
                      $dom_data .=  '<tr>'
                                . '<td>'.$data['id'].'</td>'
                                . '<td>'.(empty($data['image'])? '<img class="profile-avatar-img" src="asset/img/avatar.png">':'<img class="profile-avatar-img" src="data:image/jpeg;base64,'. base64_encode($data['image']).'">').'</td>'
                                . '<td>'.$data['first_name'].'</td>'
                                . '<td>'.$data['last_name'].'</td>'
                                . '<td>'.$data['birthdate_info'].'</td>'
                                . '<td>'.$data['age_info'].'</td>'
                                . '<td>'.$data['department_position'].'</td>'
                                . '<td>'.$data['employee_position'].'</td>'
                                . '<td>'. Date_Elapsion::timelapse($data['date_posted']).'</td>'
                                . '<td id="edit_data"><button type="button" class="edit_button" edit-id="'.$data['id'].'"><i class="fa fa-user"></i></button></td>'
                                . '<td><a id="delete_info" class="delete_link" data-delete-id="'.$data['id'].'"><i class="fa fa-close"></i></a></td>'
                                . '<input type="hidden" id="value_id" value="'.$data['id'].'">'
                            . '</tr>';
                    }

                    echo $dom_data;
                    
                
                break;
            }
            case 'searchData':{
                    $dom_data = '<thead>
                            <th>ID NO</th>
                            <th>Pictures</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>BirthDate</th>
                            <th>Age</th>
                            <th>Department</th>
                            <th>Position</th>
                            <th>Posted</th>
                             <th>Action</th>
                        </thead>
                        <tbody >';
                    $search_data_row = $query->__searchRow(Query::GET_DB, array(
                        'first_name' => Input::__post('to_search_data'),
                        'last_name' => Input::__post('to_search_data'),
                        'birthdate_info' => Input::__post('to_search_data'),
                        'age_info' => Input::__post('to_search_data'),
                        'department_position' => Input::__post('to_search_data'),
                        'employee_position' => Input::__post('to_search_data'),
                    ),'OR');
                    $search_Data = $query-> __searchData(Query::GET_DB, array(
                        'first_name' => Input::__post('to_search_data'),
                        'last_name' => Input::__post('to_search_data'),
                        'birthdate_info' => Input::__post('to_search_data'),
                        'age_info' => Input::__post('to_search_data'),
                        'department_position' => Input::__post('to_search_data'),
                        'employee_position' => Input::__post('to_search_data'),
                    ),'OR');
                    
                    
                     if($search_data_row > 0){
                        foreach($search_Data as $data_search){
                            $dom_data .=  '<tr>'
                                        . '<td>'.$data_search['id'].'</td>'
                                        . '<td>'.(empty($data_search['image'])? '<img class="profile-avatar-img" src="asset/img/avatar.png">':'<img  class="profile-avatar-img" src="data:image/jpeg;base64,'. base64_encode($data_search['image']).'">').'</td>'
                                        . '<td contenteditable>'.$data_search['first_name'].'</td>'
                                        . '<td contenteditable>'.$data_search['last_name'].'</td>'
                                        . '<td contenteditable>'.$data_search['birthdate_info'].'</td>'
                                        . '<td contenteditable>'.$data_search['age_info'].'</td>'
                                        . '<td contenteditable>'.$data_search['department_position'].'</td>'
                                        . '<td contenteditable>'.$data_search['employee_position'].'</td>'
                                        . '<td contenteditable>'. Date_Elapsion::timelapse($data_search['date_posted']).'</td>'
                                        . '<td id="edit_data"><button type="button" class="edit_button" edit-id="'.$data_search['id'].'"><i class="fa fa-user"></i></button></td>'
                                        . '<td><a id="delete_info" class="delete_link" data-delete-id="'.$data_search['id'].'"><i class="fa fa-close"></i></a></td>'
                                    . '</tr>';
                            }
                            $dom_data .= "</tbody></table>";
                            echo $dom_data;
                     }
                     else{
                         echo '<h1 style="text-align:center;font-weight:200;">Cannot Be Found</h1>';
                     }
                break;
            }
            case 'get_profile':{
                $profile_get = $query->__getInfo(Query::GET_DB, array(
                    'id' => Input::__post('profile_id')
                ));
                foreach($profile_get as $profile_data){
                    $date_bday = explode('/',$profile_data['birthdate_info']);
                    
                    $set_profile_data = array(
                        'image_user' => base64_encode($profile_data['image']),
                        'first_name' => $profile_data['first_name'],
                        'last_name' => $profile_data['last_name'],
                        'month_bday' =>  $date_bday[0],
                        'day_bday' => $date_bday[1],
                        'year_bday' => $date_bday[2],
                        'age_info' => $profile_data['age_info'],
                        'department_position' => $profile_data['department_position'],
                        'employee_position' => $profile_data['employee_position']
                    );
                    
                }
                
                echo json_encode($set_profile_data);
                
                break;
            }
            case 'insert_profile':{
                
                $bday_record = Input::__post('profile_month_date') . "/" . Input::__post('profile_days_date') . "/" . Input::__post('profile_year_date');
                $get_age_profile = (int)date('Y') - (int)Input::__post('profile_year_date');
                $profile_img = file_get_contents(Input::__fileTmp('image_profile_file'));
                $get_exist_profile = $query->__rowCount(Query::GET_DB, array(
                    'first_name' => Input::__post('profile_first_name'),
                    'last_name' => Input::__post('profile_last_name')
                ),'AND');
                
                
                if($get_exist_profile > 0){
                   echo "Already Exist Profile";
                }
                else{
                        $query->__insertData(Query::GET_DB, array(
                           'image' => $profile_img,
                           'first_name' => Input::__post('profile_first_name'),
                           'last_name' => Input::__post('profile_last_name'),
                           'birthdate_info' => $bday_record,
                           'age_info' => $get_age_profile,
                           'department_position' => Input::__post('profile_department'),
                           'employee_position' => Input::__post('profile_position_employee')
                       ));
                }
                
               
               
                break;
            }
            case 'delete_user':{
                
                $query->__deleteData(Query::GET_DB, Input::__post('del_id'),'id');
                
                    
                break;
            }
            case 'login-user':{
                
                if(Token::__validateLoginToken(Input::__post('token_ikigami_login'))){
                    $login_credentials = $query->__rowCount(Query::GET_DB_LOG, array(
                      'user' => Encrypt::__encodeInfo(Input::__post('ikigami_login_user')),
                      'pass' => Encrypt::__encodePassword(Input::__post('ikigami_login_pass'))
                    ),'AND');
                    
                    if($login_credentials > 0){
                        Session::__insert('ikigami_login', true);
                    }
                    else{
                        echo Encrypt::__encodeInfo(Input::__post('ikigami_login_user')) . PHP_EOL . Encrypt::__encodePassword(Input::__post('ikigami_login_pass')) . PHP_EOL . $login_credentials;
                    }
                }
                else{
                    echo "Invalid Token";
                }
                
                break;
            }
            case 'logout-user':{
                
                Session::__destroy();
                break;
            }
            default:{
                
                break;
            }
        }
    }
