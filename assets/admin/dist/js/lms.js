//date picker 
$( function() {
	$( "#datepicker1" ).datepicker();
});

//Adding more input fields for course table
var counter = 1;
var limit = 30;
function addInput(divName){
     if (counter == limit)  {
          alert("You have reached the limit of adding " + counter + " inputs");
     }
     else {
          var newdiv = document.createElement('div');
          newdiv.innerHTML = "Course module " + (counter + 1) + " <br><input class='form-control' type='text' name='myInputs[]'>";
          document.getElementById(divName).appendChild(newdiv);
          counter++;
     }
}


// Student table filter
$(document).ready(function(){
    $('.search').on('keyup',function(){
        var searchTerm = $(this).val().toLowerCase();
        $('#userTbl tbody tr').each(function(){
            var lineStr = $(this).text().toLowerCase();
            if(lineStr.indexOf(searchTerm) === -1){
                $(this).hide();
            }else{
                $(this).show();
            }
        });
    });
});

// textarea stylish professional field
$(document).ready(function(){
    bkLib.onDomLoaded(function(){
       nicEditors.allTextAreas();
      //new nicEditor({maxWidth : 500}).panelInstance('msgBody');
      jQuery('.ne-except').each(function(){
          $parent = jQuery(this).parent();
          $parent.children('div').hide();
          $parent.children('textarea').show();
      });
    });
});



//Adding more video links
var count = 1;
var limitation = 30;
function addInputurl(divName){
     if (count == limitation)  {
          alert("You have reached the limit of adding " + count + " inputs");
     }
     else {
          var newdiv = document.createElement('div');
          newdiv.innerHTML = "Video Url " + (count + 1) + " <br><input class='form-control' type='text' name='inputfield[]'>";
          document.getElementById(divName).appendChild(newdiv);
          count++;
     }
}

//enable password textbox in edit user
$('#changePasswordcheckbox').change(function(){
    $('#userpassword').attr('disabled',!this.checked);
});

//enable password textbox in edit student
$('#changePasswordcheckbox').change(function(){
    $('#student_password').attr('disabled',!this.checked);
});