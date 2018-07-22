

$(document).ready(function() {
  //login form ajax
        $('#loginform').submit(function(event) {
          event.preventDefault();
          var username= $('#username').val();
          var password= $('#password').val();
          var loginbtn= $('#loginbtn').val();

          if (username=='' && password=='') {
            alert('username and password is required');
          }else {

            $.ajax({
              url:'process.php',
              type:'POST',
              data:{username:username, password:password, loginbtn:loginbtn},
              success:function(replymsg){

                if(replymsg=="Invalid login details!!!") {
                  $('#loginreply').html(replymsg);

                } else {
                  location.reload();
                }



              }
            });
          }
        }); // login form submit end

        //logout button ajax
        $('#logout').click(function(e) {
          /* Act on the event */
          e.preventDefault();
          var deletecat= confirm("are you sure you want to log out?");

          if (deletecat==true) {
          var action="logout";
            $.ajax({
            url: 'process.php',
            method: 'POST',
            data: {action: action},
            success: function(data){
              location.reload();

            }
          });

        }else {
          alert("Enjoy your stay");
        }




        }); //logout button ajax

        //automatical logout button ajax
      setTimeout(function () {
        var action="logout";
          $.ajax({
          url: 'process.php',
          method: 'POST',
          data: {action: action},
          success: function(data){
          location.reload();
          alert('You have been booted out. kindly log in back');
          }
        });
      }, 3600000); //automatical logout button ajax




      //project adding ajax
      /*
      $('#createprojectform').submit(function(event) {
        event.preventDefault();

        var sname=$('#sname').val();
        var smatric=$('#smatric').val();
        var ssession=$('#ssession').val();
        var scategory=$('#scategory').val();
        var stitle=$('#stitle').val();
        var sabstract=$('#sabstract').val();
        var sfile=$('#sfile').attr('attribute', 'value');
        var sgrade=$('#sgrade').val();
        var add_project=$('#add_project').val();

        if (sname=="" || smatric=="" || ssession=="" || scategory=="" || stitle=="" || sabstract=="" || sfile=="" || sgrade=="" ) {
            alert('all fields are required');
        } else {
            $.ajax({
              url:'process.php',
              type:'POST',
              data:{sname:sname, smatric:smatric, ssession:ssession, scategory:scategory,stitle:stitle, sabstract:sabstract,sfile:sfile, sgrade:sgrade, add_project:add_project},
              success:function(replymsg){
                $('#projectreply').html(replymsg);
                alert(replymsg);
                //location.reload();
              }
            });
        }

      }); */

      //create category form ajax
            $('#cat_form').submit(function(event) {
              event.preventDefault();
              var cat_name= $('#cat_name').val();
              var cat_des= $('#cat_des').val();
              var Create_cat= $('#Create_cat').val();

              if (cat_name=='' && cat_des=='') {
                alert('ALL FIELDS ARE REQUIRED');
              }else {

                $.ajax({
                  url:'process.php',
                  type:'POST',
                  data:{cat_name:cat_name, cat_des:cat_des, Create_cat:Create_cat},
                  success:function(replymsg){

                          $('#reply_cat').html(replymsg);
                  }
                });
              }
            }); // login form submit end

            //delete category button ajax
            //$('#logout').click(function() {
              /* Act on the event */
              /*var action="delete_cat";
                $.ajax({
                url: 'process.php',
                method: 'POST',
                data: {action: action},
                success: function(data){
                  location.reload();
                  alert('logout');
                }
              });
            }); */ //delete category button ajax


            //delete category button ajax
            $('#cat_delete').submit(function(event){
              /* Act on the event */
              event.preventDefault();
              var deletecat= confirm("are you sure you want to delete this category?");
              if(deletecat==true) {
                var id= $('#cat_id').val();
                var delete_cat= $('#delete_cat').val();

                $.ajax({
                  url: 'process.php',
                  type: 'POST',
                  data: {id: 'id', delete_cat:'delete_cat'},

                  success:function(deletereply){

                          $('#deletereply_cat').html(deletereply);
                  }
                });
              } else {
                alert("not deleted");
              }
            }); //delete category button ajax


            // datatable script goes HERE
             $('#viewalltable').DataTable();
            // datatable script ends HERE

            //projects by category script goes HERE
            $('#category_select').change(function(event){
              /* Act on the event */
              event.preventDefault();
              var category_select = $('#category_select').val();
              var cat_find = $('#cat_find').val();
              if (category_select=="") {
                alert("select category to search");
              }else{

                //AJAX TO LOAD PROJECTS UNDER CATEGORY WHEN CATEGORY IS SELECTED
                $('#pro_by_cat').load('projectsbycategories.php',{
                category_select : category_select, cat_find : cat_find});
              }
            }); //projects by category script ends HERE



            // category delete ajax control






            // category delete ajax control












});
