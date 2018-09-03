$(function() {
	//getting the base url using javascript
	var getUrl = window.location;
	var baseUrl = getUrl .protocol + "//" + getUrl.host + "/" + getUrl.pathname.split('/')[1] + "/" ; // get the base url and split with '/'
	
	// function name (controller path, class name, data-id, title message, success message)
	deleteConfirmationPath('admin/deletestudent','.studentdelete' ,'student-id','Are you sure, you want to delete this student!', 'Student deleted successfully');
	deleteConfirmationPath('admin/deletecouse_subjects', '.moudledelete', 'module-id', 'Are you sure you want to delete this module','Module delete successfully');
	deleteConfirmationPath('admin/deleteknowledgesharelist','.sharelist', 'knowledgeshare-id', 'Are you sure you want to delete this knowledge share', 'knowledge share delete succssfully');
	deleteConfirmationPath('admin/deleteMessage', '.deletemessagelist', 'messagelist-id', 'Are you sure you want to delete this message', 'Message deleted successfully');
	deleteConfirmationPath('admin/deleteLondontecevents', '.deleteevents','event-id', 'Are you sure you want to delete this event', 'Event deleted successfully');
	
	
	/* Delete users in the LMS */
	// function (Class , data-id , table_id, table_name, Model box confirmation message, success message) 
	deleteUsers('.londontecuser', 'londontecuser-id', 'user_id', 'londontec_users', 'Are you sure, you want to delete this Londontec User!', 'User deleted successfully');

	//Delete courses and course modules
	deleteCourse('.londonteccourse', 'course-id', 'course_id', 'course', 'Are you sure you want to delete this course','Course deleted successfully');
});


//This is a function also deleting a record this mechanism use for reduce the line of code
function deleteConfirmationPath($path, $className ,$dataId, $titleMsg, $successMsg) {

	//get base url
	var getUrl = window.location;
	//var baseurl = getUrl .protocol + "//" + getUrl.host + "/" + getUrl.pathname.split('/')[1] + "/";
        
        var baseurl = 'http://www.londonteclms.tk/';

	$($className).click(function(e) {
		e.preventDefault();

		var id = $(this).data($dataId);

		$.confirm({
		    title: 'Confirm!',
		    content: $titleMsg,
		    buttons: {
		        confirm: {
					text: 'Delete Anyway',
					btnClass: 'btn-danger',
		        	action: function () {
		        		//alert(baseurl + $path);
						$.ajax({
							url: baseurl + $path,
							type: 'post',
							data: {'id':id},
							success: function(msg) {
								$.confirm({
								    title: 'Deleted successfully!',
								    type: 'dark',
								    typeAnimated: true,
								    buttons: {
								        tryAgain: {
								            text: 'ok',
								            btnClass: 'dark',
								            action: function(){
								            	location.reload();
								            }
								        },
								        
								    }
								});
							}
						});
					}
    		    },
		        cancel: function () {
		        }
		    }
		});
	});	
}


//delete londontec users
function deleteUsers($className ,$dataId, $field, $table, $titleMsg, $successMsg) {
	var baseurl = 'http://www.londonteclms.tk/';

	$($className).click(function(e) {
		e.preventDefault();

		var id = $(this).data($dataId);
		$.confirm({
		    title: 'Confirm!',
		    content: $titleMsg,
		    buttons: {
		        confirm: {
					text: 'Delete Anyway',
					btnClass: 'label-danger',
		        	action: function () {
						$.ajax({
							url: baseurl + 'admin/deleteuser', 
							type: 'post',
							data: { 'id': id, 'field': $field, 'table': $table},
							success: function(msg) {

								$.confirm({
								    title: 'Deleted successfully!',
								  	
								    type: 'dark',
								    typeAnimated: true,
								    buttons: {
								        tryAgain: {
								            text: 'ok',
								            btnClass: 'dark',
								            action: function(){
								            	location.reload();
								            }
								        },
								        
								    }
								});
							}

						});
					}
    		    },
		        cancel: function () {
		        }
		    }
		});
	});	
}
 
//delete courses with course module
function deleteCourse($className ,$dataId, $field, $table, $titleMsg, $successMsg) {
	var baseurl = 'http://lwww.londonteclms.tk/';

	$($className).click(function(e) {
		e.preventDefault();

		var id = $(this).data($dataId);
		$.confirm({
		    title: 'Confirm!',
		    content: $titleMsg,
		    buttons: {
		        confirm: {
					text: 'Delete Anyway',
					btnClass: 'label-danger',
		        	action: function () {
						$.ajax({
							url: baseurl + 'admin/course_delete', 
							type: 'post',
							data: { 'id': id, 'field': $field, 'table': $table},
							success: function(msg) {

								$.confirm({
								    title: 'Deleted successfully!',
								  	
								    type: 'dark',
								    typeAnimated: true,
								    buttons: {
								        tryAgain: {
								            text: 'ok',
								            btnClass: 'dark',
								            action: function(){
								            	location.reload();
								            }
								        },
								        
								    }
								});
							}

						});
					}
    		    },
		        cancel: function () {
		        }
		    }
		});
	});	
}



