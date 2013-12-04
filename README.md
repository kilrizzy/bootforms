##Heads Up!

I built this package as a helper to make my projects easier, since then I have found a package that seems to do what bootforms aims for and much more. 

I highly recommend taking a peek at [Anahkiasen/former](https://github.com/Anahkiasen/former) to see if this better suits your project

# Bootforms

Bootstrap form field generator for Laravel 4. Bootforms will add "controls", labels, and "group" html elements to your form fields to make integration with Bootstrap quicker and easier.

Turning This:

    {{ Bootform::field(array(
      'label'       => "Full Name",
      'name'        => "name",
    )) }}
    {{ Bootform::field(array(
    	'label'       => "Email Address",
  		'name'        => "email",
  		'input-prepend' => '<i class="icon-envelope"></i>',
  		'input-attributes' => array('placeholder' => "example@example.com"),
  		'input-class' => "input-large"
	  )) }}

Into This:

    <div class="control-group field-group-text control-group-name">
      <label for="name" class="control-label ">Full Name</label>
      <div class="controls" >
        <input class="" name="name" type="text" value="">
      </div>
    </div>
    <div class="control-group  field-group-text control-group-email">
      <label for="email" class="control-label ">Email Address</label>
      <div class="controls input-prepend" >
        <span class="add-on"><i class="icon-envelope"></i></span>
        <input class="input-large" placeholder="example@example.com" name="email" type="text" value="">
      </div>
    </div>
    
Bootforms uses Laravel's Form class to generate form fields.

## Installation

Add `kilrizzy/bootforms` to `composer.json`.

    "kilrizzy/bootforms": "dev-master"
    
Run `composer update` to pull down the latest version of Bootforms.

Open `app/config/app.php` and add service provider:

    'Kilrizzy\Bootforms\BootformsServiceProvider',

In `app/config/app.php` add alias:

    'Bootform' => 'Kilrizzy\Bootforms\BootformsFacade',
    
## Usage

Pass an array of field data to Bootforms to generate html using the following options:

    $options = array(
      'type' => "text", //field input type (text, textarea, password, select, checkbox, radio, file)
      'name' => "", //field input name
      'id' => "", //field input id
      'value' => "", //field input value
      'label' => "", //field label
      'help' => "", //field help display text
      'label-class' => "", //label class
      'group' => true, //wrap group
      'group-class' => "", //class applied to the group container
      'group-attributes' => array(), //additional group attributes
      'controls' => true, //wrap controls
      'controls-class' => "", //class applied to the controls container
      'controls-attributes' => array(), //additional controls attributes
      'input-class' => "", //class applied to the input
      'input-attributes' => array(), //additional input attributes
      'input-prepend' => "", //prepend control data
      'input-append' => "", //append control data
    );

Take a look at demo/bootforms.blade.php for an example view


[![Bitdeli Badge](https://d2weczhvl823v0.cloudfront.net/kilrizzy/bootforms/trend.png)](https://bitdeli.com/free "Bitdeli Badge")

