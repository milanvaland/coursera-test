
$('document').ready(function () 
	{ 
		//forget password link...
		$('#registration_form input,#login_form input,#resetPass_form input').not("[type=submit]").jqBootstrapValidation(); 
		$('#user').blur(function(){
			if($('#user').val() != ''){
				var user = $('#user').val();
				var url = "reset_pass.php?username="+user ;	
				$('#forgetPassUrl').attr('href',url);
			}
		});
		
		//user validation dynamic..
		$('#regUsername').blur(function(){
			if($('#regUsername').val() != '')
			{
				var regUser = $('#regUsername').val() ;
				$.ajax({
					url : "../php/user_avail.php",
					type : "POST" ,
					datatype : "text",
					data : { regUser : regUser} ,
					success : function(data,jqXHR)
					{
						var result = $.trim(data) ;
						console.log(result);
						if(result == "notAvail")
						{
							$('#username_feed').addClass("has-error");
							$('#username_feed').find("#feed").addClass("glyphicon glyphicon-remove");
							$('#username_feed').next('p').text("UserName not available");
							$('#reg_btn').attr('disabled','disabled');
						}
						else if(result == "avail")
						{
							$('#username_feed').addClass("has-success");
							$('#username_feed').find("#feed").addClass("glyphicon glyphicon-ok");
							$('#reg_btn').removeAttr("disabled");
						}
					}
				});
			}
		}).focusin(function(){
							$('#feed').removeAttr("class");
							$('#username_feed').removeClass("has-success");
							$('#username_feed').removeClass("has-error");
							$('#username_feed').next('p').text('');
								
		});
		
		//email valiadtion
	/*	$('#sendLink').click(function(){
			if($('#email').val() != '')
			{
				var user = $('#name').val();
				var email = $('#email').val();
				$.ajax({
					url : "resetSendLink.php",
					type : "POST",
					datatype : text ,
					data : { email : email,user : user },
					success : function(data)
					{
						
					}
				});
			}
		}); */

	}
)	