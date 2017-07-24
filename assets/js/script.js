$(function(){
                    var color = ['#f44336','#e91e63','#9c27b0',
                                 '#673ab7','#3f51b5','#2196f3',
                                 '#03a9f4','#00bcd4','#009688',
                                 '#4caf50','#8bc34a','#cddc39',
                                 '#ffeb3b','#ffc107','#ff9800',
                                 '#ff5722','#795548','#9e9e9e',
                                 '#607d8b','#fce4ec','#f8bbd0',
                                 '#f48fb1','#f06292','#ec407a',
                                 '#e91e63','#d81b60','#c2185b',
                                 '#ad1457','#880e4f','#ff80ab',
                                 '#ff4081','#f50057','#f3e5f5',
                                 '#e1bee7','#ce93d8','#ba68c8',
                                 '#ab47bc','#9c27b0','#8e24aa',
                                 '#7b1fa2','#6a1b9a','#4a148c',
                                 '#ea80fc','#e040fb','#d500f9',
                                 '#ede7f6','#d1c4e9','#b39ddb',
                                 '#9575cd','#7e57c2','#673ab7',
                                 '#5e35b1','#512da8','#4527a0',
                                 '#311b92','#b388ff','#7c4dff',
                                 '#651fff','#e8eaf6','#c5cae9',
                                 '#9fa8da','#7986cb','#5c6bc0',
                                 '#3f51b5','#3949ab','#303f9f',
                                 '#283593','#1a237e','#8c9eff',
                                 '#536dfe','#3d5afe','#e3f2fd',
                                 '#bbdefb','#90caf9','#64b5f6',
                                 '#42a5f5','#2196f3','#1e88e5',
                                 '#1976d2','#1565c0','#0d47a1',
                                 '#82b1ff','#448aff','#2979ff',
                                 '#e1f5fe','#b3e5fc','#81d4fa',
                                 '#4fc3f7','#29b6f6','#03a9f4',
                                 '#039be5','#0288d1','#0277bd',
                                 '#01579b','#80d8ff','#40c4ff',
                                 '#00b0ff','#e0f7fa','#b2ebf2',
                                 '#80deea','#4dd0e1','#26c6da',
                                 '#00bcd4','#00acc1','#0097a7',
                                 '#00838f','#006064','#84ffff',
                                 '#18ffff','#00e5ff','#e0f2f1',
                                 '#b2dfdb','#80cbc4','#4db6ac',
                                 '#26a69a','#009688','#00897b',
                                 '#00796b','#00695c','#004d40',
                                 '#a7ffeb','#64ffda','#1de9b6',
                                 '#e8f5e9','#c8e6c9','#a5d6a7',
                                 '#81c784','#66bb6a','#4caf50',
                                 '#43a047','#388e3c','#2e7d32',
                                 '#1b5e20','#b9f6ca','#69f0ae',
                                 '#00e676','#f1f8e9','#dcedc8',
                                 '#c5e1a5','#aed581','#9ccc65',
                                 '#8bc34a','#7cb342','#689f38',
                                 '#558b2f','#33691e','#ccff90',
                                 '#b2ff59','#76ff03','#f9fbe7',
                                 '#f0f4c3','#e6ee9c','#dce775',
                                 '#d4e157','#cddc39','#c0ca33',
                                 '#afb42b','#9e9d24','#827717',
                                 '#f4ff81','#eeff41','#c6ff00',
                                 '#fffde7','#fff9c4','#fff59d',
                                 '#fff176','#ffee58','#ffeb3b',
                                 '#fdd835','#fbc02d','#f9a825',
                                 '#f57f17','#ffff8d','#ffff00',
                                 '#ffea00','#fff8e1','#ffecb3',
                                 '#ffe082','#ffd54f','#ffca28',
                                 '#ffc107','#ffb300','#ffa000',
                                 '#ff8f00','#ff6f00','#ffe57f',
                                 '#ffd740','#ffc400','#fff3e0',
                                 '#ffe0b2','#ffcc80','#ffb74d',
                                 '#ffa726','#ff9800','#fb8c00',
                                 '#f57c00','#ef6c00','#e65100',
                                 '#ffd180','#ffab40','#ff9100',
                                 '#fbe9e7','#ffccbc','#ffab91',
                                 '#ff8a65','#ff7043','#ff5722',
                                 '#f4511e','#e64a19','#d84315',
                                 '#bf360c','#ff9e80','#ff6e40',
                                 '#ff3d00','#efebe9','#d7ccc8',
                                 '#bcaaa4','#a1887f','#8d6e63',
                                 '#795548','#6d4c41','#5d4037',
                                 '#4e342e','#bf360c','#ff9e80',
                                 '#4e342e','#3e2723','#fafafa',
                                 '#f5f5f5','#eeeeee','#e0e0e0',
                                 '#bdbdbd','#9e9e9e','#757575',
                                 '#616161','#424242','#212121',
                                 '#eceff1','#cfd8dc','#b0bec5',
                                 '#90a4ae','#78909c','#607d8b',
                                 '#546e7a','#455a64','#37474f',
                                 '#263238'];

                        function intervalBackground(){
                          var rand = Math.floor(Math.random()*color.length);
                                $('.ini').css({'background-color':color[rand]});
                                $('.form-input > button').css({'background-color':color[rand]});
                        }
                        setInterval(intervalBackground,100);

   
   
});
$(function(){
     function Convert(){
         this.dateConverttoString = function(date){
             switch(date){
                 case 1:{
                    return "Jan";      
                    break;
                 }
                 case 2:{
                    return "Feb";      
                    break;
                 }
                 case 3:{
                    return "Mar";      
                    break;
                 }
                 case 4:{
                    return "Apr";      
                    break;
                 }
                 case 5:{
                    return "May";      
                    break;
                 }
                 case 6:{
                    return "Jun";      
                    break;
                 }
                 case 7:{
                    return "Jul";      
                    break;
                 }
                 case 8:{
                    return "Aug";      
                    break;
                 }
                 case 9:{
                    return "Sep";      
                    break;
                 }
                 case 10:{
                    return "Oct";      
                    break;
                 }
                 case 11:{
                    return "Nov";      
                    break;
                 }
                 case 12:{
                    return "Dec";      
                    break;
                 }
             }
         };
     }                
     function getData(){
         this.setOutput = function(){
              $.ajax({
                  url:'../../ikigami/include/ajax/query.php?q=setData',
                  dataType:'text',
                  beforeSend:function(){
                      $('.loader').css({'display':'block'});
                  },
                  success:function(data){
                      $('.loader').css({'display':'none'});+
                      $('#getData').html(data);
                  }
              })
         }
         this.searchOutData = function(search_data){
             
             $.ajax({
                  url:'../../ikigami/include/ajax/query?q=searchData',
                  type:'post',
                  data:{to_search_data:search_data},
                  dataType:'text',
                  success:function(data){
                      $('#searchData').html(data);
                  }
              });
         }
         this.getProfile = function(id_profile){
             $.ajax({
                 url:'../../ikigami/include/ajax/query?q=get_profile',
                 type:'post',
                 data:{profile_id:id_profile},
                 dataType:'json',
                 beforeSend:function(){
                     console.log("Loading . . .");
                 },
                 success:function(data){
                     var convertDate = new Convert();
                     var convertToString = convertDate.dateConverttoString(parseInt(data.month_bday));
                     
                     $('#first_name_edit').val(data.first_name);
                     $('#last_name_edit').val(data.last_name);
                     $('#month_date').append($('<option>',{
                         value: data.month_bday,
                         text: convertToString,
                         selected:1,
                         disabled:1
                     }));
                     $('#days_date').append($('<option>',{
                         value: data.day_bday,
                         text: data.day_bday,
                         selected:1,
                          disabled:1
                     }));
                     $('#year_date').append($('<option>',{
                         value: data.year_bday,
                         text: data.year_bday,
                         selected:1,
                          disabled:1
                     }));
                     $('#department_employee').append($('<option>',{
                         value: data.department_position,
                         text: data.department_position,
                         selected:1,
                          disabled:1
                     }));
                     $('#position_employee').append($('<option>',{
                         value: data.employee_position,
                         text: data.employee_position,
                         selected:1,
                          disabled:1
                     })); 
                     
                     if(data.image_user === '' || data.image_user === null){
                         $('#profile_user').attr('src','asset/img/avatar.png');
                     }
                     else{
                          $('#profile_user').attr('src','data:image/jpeg;base64,'+ data.image_user);
                     }
                     
                 }
             })
         }
         this.insertProfile = function(info){
          
            var form_insert_profile = new FormData();
                profile_img_name = info.image_profile.name;
                profile_img_extension = profile_img_name.split('.').pop().toLowerCase();
                profile_img_size = info.image_profile.size;

               if($.inArray(profile_img_extension,['gif','png','jpg','jpeg']) === -1){
                   $('#image-upload_notif').css({'color':'red'}).text("Wrong File");
               }

               if(profile_img_size > 2097152){
                   $('#image-upload_notif').css({'color':'red'}).text("Only 2MB (2097152 kb) allowed");
               }
               else{
                   form_insert_profile.append('image_profile_file',info.image_profile);
                   form_insert_profile.append('image_profile_file_extension',profile_img_extension);
                   form_insert_profile.append('profile_first_name',info.first_name);
                   form_insert_profile.append('profile_last_name',info.last_name);
                   form_insert_profile.append('profile_month_date',info.month_date);
                   form_insert_profile.append('profile_days_date',info.days_date);
                   form_insert_profile.append('profile_year_date',info.year_date);
                   form_insert_profile.append('profile_department',info.department);
                   form_insert_profile.append('profile_position_employee',info.position_employee);
                   
                    $.ajax({
                       url:'../../ikigami/include/ajax/query?q=insert_profile',
                       method:'post',
                       data:form_insert_profile,
                       contentType:false,
                       cache:false,
                       processData:false,
                       beforeSend:function(){
                           $('.loader-insert-data').css({'display':'block'});
                       },
                       success:function(data){
                           if(data === "Already Exist Profile"){
                               $('.loader-insert-data').css({'display':'none'});
                               $('#status_insert').css({'color':'red'}).text("Already Register this Profile");
                           }
                           else{
                               $('.loader-insert-data').css({'display':'none'});
                               $('#status_insert').css({'color':'green'}).text("Success Register");
                           }

                       }
                   })  
               }
        }
        this.deleteUser = function(delete_id){
            $.ajax({
                url:'../../ikigami/include/ajax/query?q=delete_user',
                method:'post',
                data:{del_id:delete_id},
                beforeSend:function(){
                    $('#delete_proceed').css({'display':'none'});
                    $('#delete_modal_close').css({'display':'none'});
                    $('.loader-delete-data').css({'display':'block'});
                },
                success:function(data){
                    $('.loader-delete-data').css({'display':'none'});
                    $('#delete_modal_close_prompt').css({'display':'block'});
                    $('.delete-modal-title > h1').text("Delete Successful");
                    console.log(data);
                }
            });
        }
        this.loginUser = function(login_info){
            $.ajax({
                url:'../../ikigami/include/ajax/query?q=login-user',
                method:'post',
                data:login_info,
                 success:function(data){
                     $('#notif-login').text(data);
                 }
            });
        }
        this.logoutUser = function(){
            $.ajax({
                url:'../../ikigami/include/ajax/query?q=logout-user',
                method:'post',
                success:function(){
                    window.location.reload();
                }
            })
        }
        
     }   

     var setData = new getData();   
      setData.setOutput();
    
    $(document).on('input','#search',function(){
       var search_val = $('#search').val();
      
       if(search_val === null || search_val === ""){
            $('#searchData').removeAttr('id','searchData').attr('id','getData');
            setData.setOutput();
          
       }
       else{
            $('#getData').removeAttr('id','getData').attr('id','searchData');
            setData.searchOutData(search_val);
       }
    });
                     
    var label_username = $('#label_username');
        label_password = $('#label_password');
        username_form = $('#user_ikigami');
        password_form = $('#pass_ikigami');

        
        username_form.blur(function(){
           if( $(this).val() === ''){
               label_username.removeClass('active-label');
           }

        }).focus(function(){
            label_username.addClass('active-label');
        });
                     
                     
        password_form.blur(function(){
            if( $(this).val() === ''){
               label_password.removeClass('active-label');
           }
        }).focus(function(){
            label_password.addClass('active-label');
        })
        
       $('#login').on('submit',function(e){
           setData.loginUser($(this).serialize());
           setData.setOutput();
        });
        
        
        
    var click_error_prompt = $('#close-error-prompt');
    
        click_error_prompt.click(function(){
           $('.error-login-prompt').css({'display':'none'});
        });
        
    var file_check_name = $('#file-csv');
        file_setName = $('#file_name_csv');
    
        file_check_name.click(function(){
           $(this).change(function(){
               var filename = file_check_name.val().replace(/C:\\fakepath\\/i, '');
               file_setName.html(filename);
           }) 
        });
        
    var prompt_file_uplaod = $('#file_modal_prompt');
        modal_file_upload = $('.modal-file-upload');
        modal_file_close = $('#close_prompt_file_modal');
        
        prompt_file_uplaod.click(function(){
            modal_file_upload.css({'display':'block'});
        })
        modal_file_close.click(function(){
            modal_file_upload.css({'display':'none'});
             setData.setOutput();
        })
        
    var prompt_insert_data = $('#insert_data_modal');
        modal_insert_prompt = $('#insert_info_modal');
        modal_insert_close = $('#close_prompt_insert_modal');
        form_insert_data = $('#insert_form');
        prompt_insert_data.click(function(){
            modal_insert_prompt.css({'display':'block'});
        });
        modal_insert_close.click(function(){
            modal_insert_prompt.css({'display':'none'});
            $('input').val("");
            $('#image-upload').text('');
             setData.setOutput();
        });
        
       
        form_insert_data.on('submit',function(e){
            e.preventDefault();
            var data_profile = {
                first_name:$('#first_name').val(),
                last_name: $('#last_name').val(),
                month_date:$('#month_date').val(),
                days_date: $('#days_date').val(),
                year_date: $('#year_date').val(),
                department: $('#department_employee option:selected').text(),
                position_employee: $('#position_employee option:selected').text(),
                image_profile:document.getElementById('file-image').files[0]
            };
            var image_profile_value = document.getElementById('file-image').value;
            
            if(image_profile_value === null || image_profile_value === ""){
                 $('#image-upload_notif').css({'color':'red'}).text("Insert Image/Pictures");
            }
            else{
                setData.insertProfile(data_profile);
            }
            setData.setOutput();
            
        });
        
        
     var file_check_image_name = $('#file-image');
          file_setName = $('#image-upload');
    
         file_check_image_name.click(function(){
           file_check_image_name.change(function(){
               var filename =  file_check_image_name.val().replace(/C:\\fakepath\\/i, '');
               file_setName.html(filename);
           }); 
        });
        
    var modal_edit_prompt = $('.modal-edit-info');
        modal_edit_close = $('#close_prompt_edit_modal');
        prompt_edit_data = $('#button_edit');
        
       $('#getData').on('click','.edit_button',function(){
           var edit_id = $(this).attr('edit-id');
           modal_edit_prompt.css({'display':'block'});
           setData.getProfile(edit_id);
           
           
       });
       
       modal_edit_close.click(function(){
           modal_edit_prompt.css({'display':'none'});
            setData.setOutput();
       });
       
       
    var modal_delete_prompt = $('.modal-delete-info');
    
       $('#getData').on('click','.delete_link',function(){
           var delete_id = $(this).data('delete-id');
               delete_proceed = $('#delete_proceed');
               delete_modal_close = $('#delete_modal_close');
               
               
           modal_delete_prompt.css({'display':'block'});
           
           delete_proceed.click(function(){
               setData.deleteUser(delete_id);
               delete_id = null;
           })
           delete_modal_close.click(function(){
               modal_delete_prompt.css({'display':'none'});
               setData.setOutput();
           })
       });
       
       $('#close_prompt_delete_modal').click(function(){
           modal_delete_prompt.css({'display':'none'});
            setData.setOutput();
       })
       
       $('#delete_modal_close_prompt').css({'display':'none'});
       $('#delete_modal_close_prompt').click(function(){
           $('.delete-modal-title > h1').text("Are you Sure to Delete This? ");
           modal_delete_prompt.css({'display':'none'});
           $('#delete_modal_close_prompt').css({'display':'none'});
           $('#delete_proceed').css({'display':'inline-block'});
           $('#delete_modal_close').css({'display':'inline-block'});
           setData.setOutput();
           
       })
       
       
       $('#logout_modal').click(function(){
           $('.modal-logout').css({'display':'block'});
       })
       $('#logout_close').click(function(){
           $('.modal-logout').css({'display':'none'});
       })

       
       
    var logout_proceed = $('#logout_procced');
        logout_close = $('#logout_close');
        
        logout_proceed.click(function(){
           setData.logoutUser();
        });
        logout_close.click(function(){
            $('.modal-logout').css({'display':'none'});
            setData.setOutput();
        });
       
    $('#options-buttons').change(function(){
        if($(this).is(':checked')){
            $('.options-button-list-position').css({'display':'block'});
        }
        else{
            $('.options-button-list-position').css({'display':'none'});
        }
    });   
    
    var download_csv = $('#download_csv');
        download_pdf = $('#download_pdf');
        download_word = $('#download_word');
        download_excel = $('#download_excel');
        download_print = $('#download_print');
       
});