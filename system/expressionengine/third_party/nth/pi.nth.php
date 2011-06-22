<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * ExpressionEngine - by EllisLab
 *
 * @package		ExpressionEngine
 * @author		ExpressionEngine Dev Team
 * @copyright	Copyright (c) 2003 - 2011, EllisLab, Inc.
 * @license		http://expressionengine.com/user_guide/license.html
 * @link		http://expressionengine.com
 * @since		Version 2.0
 * @filesource
 */
 
// ------------------------------------------------------------------------

/**
 * Nth Plugin
 *
 * @package		ExpressionEngine
 * @subpackage	Addons
 * @category	Plugin
 * @author		Scott Boms
 * @link		http://scottboms.com
 */

$plugin_info = array(
	'pi_name'					=> 'Nth',
	'pi_version'			=> '1.0.1',
	'pi_author'				=> 'Scott Boms (Updated version of the Nth plugin from Booyant)',
	'pi_author_url'		=> 'http://scottboms.com',
	'pi_description'	=> 'Adds a class to every nth element in a set of repeating EE generated elements',
	'pi_usage'				=> Nth::usage()
);


class Nth {

	var $return_data = "";
    
	/**
	 * Constructor
	 */
	public function __construct()
	{
		$this->EE =& get_instance();

		$data = $this->EE->TMPL->tagdata;
		$tmpl = $this->EE->TMPL;

		$class = $tmpl->fetch_param('class');
		$interval = $tmpl->fetch_param('interval');
		$data = $this->rep($data, 1, $class, $interval);

		$this->return_data = $data;
	}

	function rep($text, $i, $class, $interval) {
		$firstpos = stripos($text, '{nth}');
		if($firstpos === false) {
			return $text;
		} else {
			if($i % $interval == 0 ) {
				$text = substr_replace($text, $class, $firstpos, 5);
				$i++;
				return $this->rep($text, $i, $class, $interval);
			} else {
				$text = substr_replace($text, '', $firstpos, 5);
				$i++;
				return $this->rep($text, $i, $class, $interval);
			}
		}
	}
		// ----------------------------------------------------------------

		/**
		 * Plugin Usage
		 */
		public static function usage()
		{
			ob_start();
	?>

	Nth allows you to add a class to the nth element in a repeating set of 
	channel entries. Wrap your {exp:channel:entries} tag in a {exp:nth} tag and 
	use the class and interval parameters to designate the class name and nth 
	index. In the following examples, every 3rd <li> tag would be affected.

	{exp:nth class="last" interval="3"}
	<ul>
		{exp:channel:entries channel="some-content"}
			<li class="{nth}">{title}</li>
		{/exp:channel:entries}
	</ul>
	{/exp:nth}

	The basic use of the class attribute will add an empty class attribute to 
	each <li> element unaffected by the plugin. The basic method allows you 
	to apply multiple classes to an element.

	Alternatively, you can include the entire rendered class attribute into the 
	{exp:nth} class attribute. This is useful if you only need to apply a single 
	class to each output element.

	{exp:nth class=' class="last"' interval="3"}
	<ul>
		{exp:channel:entries channel="some-content"}
			<li {nth}>{title}</li>
		{/exp:channel:entries}
	</ul>
	{/exp:nth}

	<?php
			$buffer = ob_get_contents();
			ob_end_clean();
			return $buffer;
		}
}


/* End of file pi.nth.php */
/* Location: /system/expressionengine/third_party/nth/pi.nth.php */