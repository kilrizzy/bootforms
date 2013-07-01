<!DOCTYPE html>
<html>
<head>
	<title>Bootforms Demo</title>
	<link href="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/css/bootstrap-combined.min.css" rel="stylesheet">

	<script src="//code.jquery.com/jquery-1.10.1.min.js"></script>
	<script src="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/js/bootstrap.min.js"></script>
</head>
<body>
	<div id="page" class="container">
	<h1>Bootforms Demo</h1>

	{{ Form::open(array('files' => true)) }}

	<div class="row">
		<div class="span4"> 
			{{ Bootform::field(array(
				'label'       => "First Name",
				'name'        => "fname",
			)) }}
		</div>
		<div class="span4"> 
			{{ Bootform::field(array(
				'label'       => "Last Name",
				'name'        => "lname",
			)) }}
		</div>
	</div>
	{{ Bootform::field(array(
		'label'       => "Email Address",
		'name'        => "email",
		'input-prepend' => '<i class="icon-envelope"></i>',
		'input-attributes' => array('placeholder' => "example@example.com"),
		'input-class' => "input-large"
	)) }}

	{{ Bootform::field(array(
		'label'       => "Desired Password",
		'name'        => "password",
		'type'        => "password",
	)) }}

	<div class="row">
		<div class="span4"> 
			{{ Bootform::field(array(
				'label'       => "Interests",
				'name'        => "interests[]",
				'value'       => array('item2'),
				'type' 	      => 'checkbox',
				'options'     => array('item1'=>"Item 1",'item2'=>"Item 2")
			)) }}
		</div>
		<div class="span4"> 
			{{ Bootform::field(array(
				'label'       => "Primary Interest",
				'name'        => "primary",
				'value'       => 'item2',
				'type' 	      => 'radio',
				'options'     => array('item1'=>"Item 1",'item2'=>"Item 2")
			)) }}
		</div>
	</div>
	{{ Bootform::field(array(
		'label'       => "How did you find us?",
		'name'        => "referrer",
		'value'       => 'item2',
		'type' 	      => 'select',
		'options'     => array('item1'=>"Item 1",'item2'=>"Item 2")
	)) }}

	{{ Bootform::field(array(
		'label'       => "Message",
		'name'        => "message",
		'type' 	      => 'textarea',
		'options'     => array('item1'=>"Item 1",'item2'=>"Item 2"),
		'input-class' => "input-xxlarge"
	)) }}


	<p>{{ Form::submit('Send',array('class'=>"btn btn-primary")) }}</p>




	{{ Form::close() }}

	</div>

</body>
</html>