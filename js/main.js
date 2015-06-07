$(document).ready(function(){
	/*Admin Nav*/
	var updateNav = $('#updateNav'),
		usersNav = $('#usersNav'),
		teamsNav = $('#teamsNav'),
		adminUpdate = $('.adminUpdate'),
		adminUsers = $('.adminUsers'),
		dontHave = $("#dontHave")
		yourTeam = $('.yourTeam');

	$(updateNav).on('click', function(){
		adminUpdate.removeClass('hidden');
		adminUsers.addClass('hidden');
	});

	$(usersNav).on('click', function(){
		adminUsers.removeClass('hidden');
		adminUpdate.addClass('hidden');
	});

	$(dontHave).on('click', function(){
		$('.registerform').toggleClass('hidden');
	});

	/*Remove User*/
	var removeUserBtn = $('.removeUserBtn');

	$(removeUserBtn).on('click', function(){
		var t = $(this);
		$.ajax({
			type: "POST",
			url: 'ajax/adminActions.php',
			data:{action:'removeUser', test:t.attr('data-userID')},
			success:function(html) {
				$('.adminUsers').find('#' + t.attr('data-userID')).remove();
			}
		});
    });

	/*Register*/
    var registerBtn = $('#registerBtn');

	$(registerBtn).on('click', function (){
    	regUsername = $('#regUsername').val(),
    	regPassword = $('#regPassword').val(),
    	regRePassword = $('#regRePassword').val();

    	if (regPassword === '') {
			$.ajax({
				success:function(html) {
					$('#regError').text('You need to enter a password!');
				}
			});
		} else if (regPassword === regRePassword) {
			$.ajax({
				type: "POST",
				url: 'ajax/insertUser.php',
				data:{action:'addUser', username:regUsername, password:regPassword},
				success:function(html) {
					window.location.replace("createTeam.php");
				}
			});
		} else {
			$.ajax({
				success:function(html) {
					$('#regError').text('Password does not match!');
				}
			});
		}
	});

	/*Login index*/
	var indexLoginBtn = $('#indexLoginBtn');

	$(indexLoginBtn).on('click', function(){
		indexUsername = $('#indexUsername').val(),
		indexPassword = $('#indexPassword').val();

		$.ajax({
			type: "POST",
			url: 'ajax/loginout.php',
			data:{action:'login', username:indexUsername, password:indexPassword},
			success:function(data) {
				if (data === 'fail') {
					alert(12);
				} else {
					window.location.replace("createTeam.php");
				}
			}
		});
	});

	/*Logout*/
	var logoutBtn = $('#logoutBtn');

	$(logoutBtn).on('click', function(){
		$.ajax({
			type: "POST",
			url: 'ajax/loginout.php',
			data:{action:'logout'},
			success:function(data) {
				if(data === 'noSession'){
					$('#logoutBtn').replaceWith('<button class="button1" id="loginBtn">Login &#65516;</button>');
				}else{
					console.log('NONES');
				}
				
			}
		});
	});

	/*Login box*/
	var loginBtn = $('#loginBtn');

	$(loginBtn).on('click', function(){
		$('.loginBox').toggleClass('hidden');
	});

	/*Header Login*/
	var headerLoginBtn = $('#headerLoginBtn');

	$(headerLoginBtn).on('click', function(){
		var indexUsername = $('#headerUsername').val(),
		indexPassword = $('#headerPassword').val();

		$.ajax({
			type: "POST",
			url: 'ajax/loginout.php',
			data:{action:'login', username:indexUsername, password:indexPassword},
			success:function(data) {
				if (data === 'fail') {
					alert('is fail');
				} else {
					/*window.location.replace("createTeam.php");*/
				}
			}
		});
	});

    /*Add player to team*/
    var addPlayerBtn = $('.addPlayer');

    $(addPlayerBtn).on('click', function(){
    	var t = $(this);
    	
    	$.ajax({
			type: "POST",
			url: 'ajax/insertPlayer.php',
			data:{action:'addPlayer', add:t.attr('data-userID')},
			success:function(data) {
		    	console.log(data);
		    	$('.yourTeam').find('#' + 1).replaceWith(data);
			}
		});
    });

	/*Get your team*/
	var addTeamBtn = $('#submitTeam');

    $(addTeamBtn).on('click', function(){
    		var p1 = $('#hiddenValue1').val(),
    		p2 = $('#hiddenValue2').val(),
    		p3 = $('#hiddenValue3').val(),
    		p4 = $('#hiddenValue4').val(),
    		p5 = $('#hiddenValue5').val();
    	$.ajax({
			type: "POST",
			dataType: 'json',
			url: 'ajax/insertPlayer.php',
			data:{action:'addTeam', add1:p1, add2:p2, add3:p3, add4:p4, add5:p5},
			success:function(data) {

			}
		});
    });

    /*Get remove player*/
    yourTeam.delegate('.button1', 'click', function(){
    	var id = $(this).attr('data-userID'),
    		session_id = $(this).parent().find('input[type=hidden]').attr('id'),
    		text_id = session_id.replace('hiddenValue', '');

    		console.log(text_id);

    	$.ajax({
			type: "POST",
			dataType: 'json',
			url: 'ajax/insertPlayer.php',
			data:{action:'removePlayer', id: text_id},
			success:function(data) {
				console.log(data);
				$('.yourTeam').find('#' + id).replaceWith(data);
			}
		});
    	
    });

    /*Update player*/
    var updatePlayerBtn = $('#updatePlayerBtn');

    $(updatePlayerBtn).on('click', function(){
    	console.log('test')
    	var inputGP = $('#inputGP').val(),
    		hiddenField = $('#hiddenValue').val(),
    		inputKills = $('#inputKills').val(),
    		inputAssists = $('#inputAssists').val(),
    		inputDeaths = $('#inputDeaths').val(),
    		inputFK = $('#inputFK').val(),
    		inputTK = $('#inputTK').val(),
    		input3k = $('#input3k').val(),
    		input4k = $('#input4k').val(),
    		input5k = $('#input5k').val(),
    		inputRW = $('#inputRW').val(),
    		inputRL = $('#inputRL').val(),
    		inputFP = $('#inputFP').val();

    	$.ajax({
			type: "POST",
			url: 'ajax/adminActions.php',
			data:{action:'updatePlayer', input1:inputGP, hidden1:hiddenField, input2:inputKills, input3:inputAssists, input4:inputDeaths, input5:inputFK, input6:inputTK, input7:input3k, input8:input4k, input9:input5k, input10:inputRW, input11:inputRL, input12:inputFP},
			success:function(data) {
				console.log('its working');
			}
		});
    });

});