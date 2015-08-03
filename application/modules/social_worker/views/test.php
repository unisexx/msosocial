<script type="text/javascript" src="media/js/jquery-1.7.2.min.js"></script>
<script type="text/javascript" src="media/js/jquery.validate.min.1.14.0.js"></script>
<script type="text/javascript">
var jQuery_1_7_2 = $.noConflict(true);
</script>
<script>
	// only for demo purposes
	jQuery_1_7_2.validator.setDefaults({
		submitHandler: function() {
			alert("submitted! (skipping validation for cancel button)");
		}
	});

	jQuery_1_7_2().ready(function() {
		jQuery_1_7_2("#form1").validate({
			errorLabelContainer: $("#form1 div.error")
		});

		var container = jQuery_1_7_2('div.container');
		// validate the form when it is submitted
		var validator = jQuery_1_7_2("#form2").validate({
			errorContainer: container,
			errorLabelContainer: jQuery_1_7_2("ol", container),
			wrapper: 'li'
		});

		$(".cancel").click(function() {
			validator.resetForm();
		});
	});
	</script>
<h1 id="banner"><a href="http://jqueryvalidation.org/">jQuery Validation Plugin</a> Demo</h1>
<div id="main">
<form method="get" class="cmxform" id="form1" action="">
<fieldset>
<legend>Login Form</legend>
<p>
<label>Username</label>
<input name="user" title="Please enter your username (at least 3 characters)" required minlength="3">
</p>
<p>
<label>Password</label>
<input type="password" maxlength="12" name="password" title="Please enter your password, between 5 and 12 characters" required minlength="5">
</p>
<div class="error">
</div>
<p>
<input class="submit" type="submit" value="Login">
</p>
</fieldset>
</form>
 
<div class="container">
<h4>There are serious errors in your form submission, please see below for details.</h4>
<ol>
<li>
<label for="email" class="error">Please enter your email address</label>
</li>
<li>
<label for="phone" class="error">Please enter your phone <b>number</b> (between 2 and 8 characters)</label>
</li>
<li>
<label for="address" class="error">Please enter your address (at least 3 characters)</label>
</li>
<li>
<label for="avatar" class="error">Please select an image (png, jpg, jpeg, gif)</label>
</li>
<li>
<label for="cv" class="error">Please select a document (doc, docx, txt, pdf)</label>
</li>
</ol>
</div>
<form class="cmxform" id="form2" method="get" action="">
<fieldset>
<legend>Validating a complete form</legend>
<p>
<label for="email">Email</label>
<input id="email" name="email" required type="email">
</p>
<p>
<label for="agree">Favorite Color</label>
<select id="color" name="color" title="Please select your favorite color!" required>
<option></option>
<option>Red</option>
<option>Blue</option>
<option>Yellow</option>
</select>
</p>
<p>
<label for="phone">Phone</label>
<input id="phone" name="phone" required type="number" rangelength="[2,8]">
</p>
<p>
<label for="address">Address</label>
<input id="address" name="address" required minlength="3">
</p>
<p>
<label for="avatar">Avatar</label>
<input type="file" id="avatar" name="avatar" required>
</p>
<p>
<label for="agree">Please agree to our policy</label>
<input type="checkbox" class="checkbox" id="agree" title="Please agree to our policy!" name="agree" required>
</p>
<p>
<input class="submit" type="submit" value="Submit">
<input class="cancel" type="submit" value="Cancel">
</p>
</fieldset>
</form>
<div class="container">
<h4>There are serious errors in your form submission, please see details above the form!</h4>
</div>
<a href="index.html">Back to main page</a>
</div>