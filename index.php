<?php
    spl_autoload_register(function($class){
        include 'include/class/'.$class.'.php';
    });
    date_default_timezone_set('Asia/Manila');
    date_default_timezone_get();
    
    $session = new Session();
    
    
    $if_log = '';
    if(!Session::__exists('ikigami_login')){
        $if_log = 'block';
    }
    else{
        $if_log = 'none';
    }
    

    
    
    
?>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Ikigami CRUD</title>
        <link rel="icon"  href="asset/img/ikigami-logo.ico" />
        <link rel="stylesheet" href="asset/css/style.css">
        <link rel="stylesheet" href="asset/css/font-awesome.css">
        <link rel="stylesheet" href="asset/css/grid-style.css">
        <link rel="stylesheet" href="asset/css/color.css">
       

    </head>
    <body class="">
        <div class="main-container">
            <div class="img-title-container">
                <img src="asset/img/ikigami-logo.png">
            </div>
            <div class="main-card">
                <div class="container">
                    <div class="search-bar-position">
                        <input type="text" id="search" placeholder="Search . . ">

                    </div>
                   
                     <div class="loader-position">
                        <div class="loader">
                            
                        </div>
                    </div>
                    <table class="bordered" id="getData">
                        

                    </table>  
                    <div class="options-button-position">
                        <input type="checkbox" id="options-buttons">
                        <label for="options-buttons">OPTIONS <i class="fa fa-chevron-down"></i></label>
                    </div>
                    <p class="download-button-label">Download file Via FF.</p>
                    <div class="options-button-list-position">
                        <a target="_blank" id="download_csv"><i class="fa fa-file-archive-o"></i>CSV</a>
                        <a target="_blank" id="download_pdf"><i class="fa fa-file-pdf-o"></i>PDF</a>
                        <a target="_blank" id="download_word"><i class="fa fa-file-word-o"></i>MS WORD</a>
                        <a target="_blank" id="download_excel"><i class="fa fa-file-excel-o"></i>MS EXCEL</a>
                        <a target="_blank" id="download_print"><i class="fa fa-print"></i>PRINT</a>
                    </div>
                         
                </div>
            </div>
        </div>
        <div class="footer-links">
            <button type="button" id="file_modal_prompt"><i class="fa fa-file-excel-o"></i></button>
        </div>
        <div class="footer-links-left">
            <button type="button" id='insert_data_modal'><i class="fa fa-user-plus"></i></button>
        </div>
        <div class="footer-links-logout">
            <button type="button" id='logout_modal'><i class="fa fa-power-off"></i></button>
        </div>
        
        
        <div class="login-modal" style="display: <?php echo $if_log; ?>" id="modal_login">
            <div class="login-modal-card">
                <div class="">
                     <div class="img-title-container">
                        <img src="asset/img/ikigami-logo.png">
                    </div>
                    <div class="form-login">
                        <h1>Login</h1>
                        <div class="error-login-prompt">
                            <a id="close-error-prompt"><i class="fa fa-close"></i></a>
                            <p><i class="fa fa-exclamation-circle"></i>Warning</p>
                        </div>
                        <form method="post" id="login">
                            <div class="form-input">
                                <input type="text" name="ikigami_login_user" class="validate" id="user_ikigami">
                                <label id="label_username" for="user_ikigami">Username</label>
                            </div>
                            <div class="form-input">
                                <input type="password" name="ikigami_login_pass" class="validate" id="pass_ikigami">
                                <label id="label_password" for="pass_ikigami">Password</label>
                            </div>
                            <div class="form-input-button">
                                <input type="hidden" name="token_ikigami_login" value="<?php echo Token::__generateLogin(); ?>">
                                <button type="submit" name="ikigami_submit_login">LOGIN</button>
                            </div>
                        </form>
                            
                        <p id="notif_login"></p>
                    </div>
                </div>
            </div>  
        </div>
        
        <div class="modal-file-upload">
            <div class="file-modal-card">
                <span id="close_prompt_file_modal"><i class="fa fa-close"></i></span>
                <h1>File CSV Upload</h1>
                <div class="form-file-upload">
                    <form method="post" enctype="multipart/form-data">
                        <div class="file-form-input-position">
                            <input type="file" id="file-csv">
                            <label for="file-csv">UPLOAD</label>
                        </div>
                        <p id="file_name_csv"></p>
                    </form>
                </div>
                <div class="loader-position">
                    <div class="loader">
                        
                    </div>
                </div>
                <div class="file-upload-content">
                    <div class="container">
                        <table>
                            <thead>
                                
                            </thead>
                            <tbody>
                                
                            </tbody>
                        </table>
                    </div>
                </div>
                
            </div>
        </div>
        
        <div class="modal-edit-info" id="edit_info_modal">
            <div class="edit-info-card">
                <span id="close_prompt_edit_modal"><i class="fa fa-close"></i></span>
                <div class="container">
                    <h1>Profile</h1>
                    
                    <form method="post" id="edit_form" enctype="multipart/form-data">
                        <div class="grid-row">
                            <div class="grid-col grid-desktop-a-6 grid-desktop-b-6 grid-tablet-a-6 grid-tablet-b-6 grid-phone-a-12 grid-phone-b-12">
                                <div class="form-container">
                                    <img src="asset/img/avatar.png" id="profile_user">
                                </div>
                                <div class="file-image-position">
                                    <input type="file" id="file-image-edit">
                                    <label for="file-image-edit">UPLOAD</label>
                                    
                                </div>
                                <p id="image-upload_edit"></p>
                                <p id="image-upload_notif_edit"></p>
                                <div class="loader-position">
                                    <div class="loader">
                                        
                                    </div>
                                </div>
                            </div>
                            <div class="grid-col grid-desktop-a-6 grid-desktop-b-6 grid-tablet-a-6 grid-tablet-b-6 grid-phone-a-12 grid-phone-b-12">
                                <div class="grid-row">
                                    <div class="grid-col grid-desktop-a-6 grid-desktop-b-6 grid-tablet-a-6 grid-tablet-b-6 grid-phone-a-12 grid-phone-b-12">
                                        <div class="input-form">
                                            <input type="text" class="form-insert-input" id="first_name_edit" name="edit_first_name" placeholder="First Name"> 
                                        </div>
                                    </div>
                                    <div class="grid-col grid-desktop-a-6 grid-desktop-b-6 grid-tablet-a-6 grid-tablet-b-6 grid-phone-a-12 grid-phone-b-12">
                                        <div class="input-form">
                                            <input type="text" class="form-insert-input" id="last_name_edit" name="edit_last_name" placeholder="Last Name"> 
                                        </div>
                                    </div>
                                </div>
                                <p>Birthdate</p>
                                <div class="grid-row">

                                    <div class="grid-col grid-desktop-a-4 grid-desktop-b-4 grid-tablet-a-4 grid-tablet-b-4 grid-phone-a-12 grid-phone-b-12">
                                        <select id="month_date_edit" name="date_month_edit" class="select_form">
                                            
                                            <?php
                                                $month = ['Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dec'];
                                                for($i = 0;$i < 12;$i++){
                                                    echo "<option value='".($i+1)."'>".$month[$i]." </option>";
                                                }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="grid-col grid-desktop-a-4 grid-desktop-b-4 grid-tablet-a-4 grid-tablet-b-4 grid-phone-a-12 grid-phone-b-12">
                                        <select id="days_date_edit" name="date_date_edit" class="select_form">
                                             <?php
                                                $day = range(1,31);
                                                for($day_count = 0;$day_count < count($day);$day_count++){
                                                    echo "<option value='".($day_count+1)."'>".$day[$day_count]." </option>";
                                                }
                                             ?>
                                        </select>
                                    </div>
                                    <div class="grid-col grid-desktop-a-4 grid-desktop-b-4 grid-tablet-a-4 grid-tablet-b-4 grid-phone-a-12 grid-phone-b-12">
                                        <select id="year_date_edit" name="date_year_edit" class="select_form">
                                            <?php
                                                $year = range(1905,2017);
                                                $year_rsort = array_reverse($year);
                                                foreach($year_rsort  as $year_count => $yearly_count){
                                                     echo "<option value='".$yearly_count."'>".$yearly_count." </option>";
                                                }
                                             ?>
                                        </select>
                                    </div>
                                </div>
                                 <p>Department</p>
                                <div class="grid-row">
                                    <div class="grid-col grid-desktop-a-12 grid-desktop-b-12 grid-tablet-a-12 grid-tablet-b-12 grid-phone-a-12 grid-phone-b-12">
                                        <select id="department_employee_edit" name="department_position_edit" class="select_form">
                                            <option value="ICT">ICT</option>
                                            <option value="Accounting">Accounting</option>
                                            <option value="Finanace">Finance</option>
                                            <option value="Audit">Audit</option>
                                            <option value="Audit">Records</option>
                                        </select>
                                    </div>
                                </div>
                                  <p>Employee Position</p>
                                 <div class="grid-row">
                                    <div class="grid-col grid-desktop-a-12 grid-desktop-b-12 grid-tablet-a-12 grid-tablet-b-12 grid-phone-a-12 grid-phone-b-12">
                                        <select id="position_employee_edit" name="employee_position_edit" class="select_form">
                                            
                                            <option value="Staff">Staff</option>
                                            <option value="Supervisor">Supervisor</option>
                                            <option value="Manager">Manager</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="button-submit-position">
                                    <button type="submit"><i class="fa fa-upload"></i> SUBMIT</button>
                                </div>
                                  
                            </div>
                        </div>
                        
                    </form>
                </div>
            </div>
        </div>
        
        
         <div class="modal-insert-info" id="insert_info_modal">
            <div class="insert-info-card">
                <span id="close_prompt_insert_modal"><i class="fa fa-close"></i></span>
                <div class="container">
                    <h1>Register</h1>
                    
                    <form method="post" id="insert_form" enctype="multipart/form-data">
                        <div class="grid-row">
                            <div class="grid-col grid-desktop-a-6 grid-desktop-b-6 grid-tablet-a-6 grid-tablet-b-6 grid-phone-a-12 grid-phone-b-12">
                                <div class="form-container">
                                    <img src="asset/img/avatar.png">
                                </div>
                                <div class="file-image-position">
                                    <input type="file" id="file-image">
                                    <label for="file-image">UPLOAD</label>
                                    
                                </div>
                                <p id="image-upload"></p>
                                <p id="image-upload_notif"></p>
                                <div class="loader-position">
                                    <div class="loader">
                                        
                                    </div>
                                </div>
                            </div>
                            <div class="grid-col grid-desktop-a-6 grid-desktop-b-6 grid-tablet-a-6 grid-tablet-b-6 grid-phone-a-12 grid-phone-b-12">
                                <div class="grid-row">
                                    <div class="grid-col grid-desktop-a-6 grid-desktop-b-6 grid-tablet-a-6 grid-tablet-b-6 grid-phone-a-12 grid-phone-b-12">
                                        <div class="input-form">
                                            <input type="text" class="form-insert-input" id="first_name" placeholder="First Name" required="1"> 
                                        </div>
                                    </div>
                                    <div class="grid-col grid-desktop-a-6 grid-desktop-b-6 grid-tablet-a-6 grid-tablet-b-6 grid-phone-a-12 grid-phone-b-12">
                                        <div class="input-form">
                                            <input type="text" class="form-insert-input" id="last_name" placeholder="Last Name" required="1"> 
                                        </div>
                                    </div>
                                </div>
                                <p>Birthdate</p>
                                <div class="grid-row">

                                    <div class="grid-col grid-desktop-a-4 grid-desktop-b-4 grid-tablet-a-4 grid-tablet-b-4 grid-phone-a-12 grid-phone-b-12">
                                        <select id="month_date" name="date_month" class="select_form" required="1">
                                            <option value="0" selected="1" disabled>Month</option>
                                            <?php
                                                $month_register = array('Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dec');
                                                for($i = 0;$i < 12;$i++){
                                                    echo "<option value='".($i+1)."'>".$month_register[$i]." </option>";
                                                }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="grid-col grid-desktop-a-4 grid-desktop-b-4 grid-tablet-a-4 grid-tablet-b-4 grid-phone-a-12 grid-phone-b-12">
                                        <select id="days_date" name="date_date" class="select_form" required="1">
                                            <option value="0" selected="1" disabled>Day</option>
                                             <?php
                                                $day_register_bday = range(1,31);
                                                for($day_count = 0;$day_count < count($day);$day_count++){
                                                    echo "<option value='".($day_count+1)."'>".$day_register_bday[$day_count]." </option>";
                                                }
                                             ?>
                                        </select>
                                    </div>
                                    <div class="grid-col grid-desktop-a-4 grid-desktop-b-4 grid-tablet-a-4 grid-tablet-b-4 grid-phone-a-12 grid-phone-b-12">
                                        <select id="year_date" name="date_year" class="select_form" required="1">
                                            <option value="0" selected="1" disabled>Year</option>
                                            <?php
                                                $year_bday_register = range(1905,2017);
                                                $year_rsort = array_reverse($year_bday_register);
                                                foreach($year_rsort  as $year_count => $yearly_count){
                                                     echo "<option value='".$yearly_count."'>".$yearly_count." </option>";
                                                }
                                             ?>
                                        </select>
                                    </div>
                                </div>
                                 <p>Department</p>
                                <div class="grid-row">
                                    <div class="grid-col grid-desktop-a-12 grid-desktop-b-12 grid-tablet-a-12 grid-tablet-b-12 grid-phone-a-12 grid-phone-b-12">
                                        <select id="department_employee" name="department_position" class="select_form" required="1">
                                            <option disabled selected="1">Select Department</option>
                                            <option value="ICT">ICT</option>
                                            <option value="Accounting">Accounting</option>
                                            <option value="Finanace">Finance</option>
                                            <option value="Audit">Audit</option>
                                            <option value="Audit">Records</option>
                                        </select>
                                    </div>
                                </div>
                                  <p>Employee Position</p>
                                 <div class="grid-row">
                                    <div class="grid-col grid-desktop-a-12 grid-desktop-b-12 grid-tablet-a-12 grid-tablet-b-12 grid-phone-a-12 grid-phone-b-12">
                                        <select id="position_employee" name="employee_position" class="select_form" required="1">
                                            <option disabled selected="1">Select Employee Position</option>
                                            <option value="Staff">Staff</option>
                                            <option value="Supervisor">Supervisor</option>
                                            <option value="Manager">Manager</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="button-submit-position">
                                        <button type="submit"><i class="fa fa-upload"></i> SUBMIT</button>
                                </div>
                                  <div class="loader-insert-position">
                                      <div class="loader-insert-data">
                                          
                                      </div>
                                  </div>
                                  <p id="status_insert"></p>
                            </div>
                        </div>
                        
                    </form>
                </div>
            </div>
        </div>
       
        
         <div class="modal-delete-info" id="delete_info_modal">
            <div class="delete-info-card">
                <span id="close_prompt_delete_modal"><i class="fa fa-close"></i></span>

                <div class="delete-modal-title">
                     <h1>Are you Sure to Delete This Profile? </h1>
                </div>
                 <div class="button-logout-choose">
                    <button type="button" id="delete_proceed">DELETE</button>
                    <button type="button" id="delete_modal_close">CLOSE</button>
                    <div class="loader-delete-position">
                        <div class="loader-delete-data">
                                          
                        </div>
                    </div>
                </div>
                <div class="button-delete-position">
                    <button type="button" id="delete_modal_close_prompt">CLOSE</button>
                </div>
                
            </div>
        </div>
        <div class="modal-logout">
            <div class="modal-logout-card">
                 <div class="logout-title">
                     <h1>Logout</h1>
                </div>
                
                <div class="button-logout-choose">
                    <button type="button" id="logout_procced">LOGOUT</button>
                    <button type="button" id="logout_close">CLOSE</button>
                </div>
            </div>
        </div>
         <script type="text/javascript" src="asset/js/jquery.js"></script>
        <script type="text/javascript" src="asset/js/script.js"></script>
    </body>
</html>
