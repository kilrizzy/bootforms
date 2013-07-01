# Bootforms

Bootstrap form field generator for Laravel 4. Bootforms will add "controls", labels, and "group" html elements to your form fields to make integration with Bootstrap quicker and easier.

Turning This:

    {{ Bootform::field(array(
  	'label'       => "Email Address",
		'name'        => "email",
		'input-prepend' => '<i class="icon-envelope"></i>',
		'input-attributes' => array('placeholder' => "example@example.com"),
		'input-class' => "input-large"
	  )) }}

Into This:

    <div class="control-group field-group-text control-group-email">
      <label for="email" class="control-label">Email Address</label>

      <div class="controls input-prepend">
        <input class="input-large" placeholder="example@example.com" name="email" type="text" value="" />
      </div>
    </div>
    
Bootforms uses Laravel's Form class to generate form fields.

## Installation

Add `kilrizzy/bootforms` to `composer.json`.

    "kilrizzy/bootforms": "dev-master"
    
Run `composer update` to pull down the latest version of Bootforms.

Open `app/config/app.php` and add service provider:

    'kilrizzy\bootforms\BootformsServiceProvider',

In `app/config/app.php` add alias:

    'Bootform' => 'Kilrizzy\Bootforms\BootformsFacade',
    
## Usage

Pass an array of field data to Bootforms to generate html.

## Demo
