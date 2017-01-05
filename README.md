# Advanced Custom Fields Viewer [![WordPress Version](https://img.shields.io/wordpress/plugin/v/advanced-custom-fields-viewer.svg)](https://wordpress.org/plugins/advanced-custom-fields-viewer/) [![Donate](https://img.shields.io/badge/donate-PayPal-brightgreen.svg)](https://www.paypal.me/whitetaildevelopment)

View Advanced Custom Fields data on the front end of your theme while developing.

If you are working with a large number of fields in [Advanced Custom Fields](https://github.com/elliotcondon/acf), chances are you manually wrap `print_r` inside of `<pre>` tags while building themes. Sometimes you just need all the fields you are working with more accessible and out of the way. You will be able to bounce back and forth between fields on your current page and the options page if available, and quickly close the menu once done.

### Features

* Viewer button hidden until needed in the top left corner of your theme.
* 3 different color schemes for the front end viewer - Dark, Light, & Transparent.
* Keyboard shortcuts! `shift` + `v` toggles viewer.

### Advanced Features

Use the function `acfv( $array )` to view non ACF arrays in the viewer.
