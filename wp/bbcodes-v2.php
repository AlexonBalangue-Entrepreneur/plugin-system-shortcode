<?php
/**
 * WordPress API for creating bbcode-like tags or what WordPress calls
 * "shortcodes". The tag and attribute parsing or regular expression code is
 * based on the Textpattern tag parser.
 *
 * A few examples are below:
 *
 * [shortcode /]
 * [shortcode foo="bar" baz="bing" /]
 * [shortcode foo="bar"]content[/shortcode]
 *
 * Shortcode tags support attributes and enclosed content, but does not entirely
 * support inline shortcodes in other shortcodes. You will have to call the
 * shortcode parser in your function to account for that.
 *
 * {@internal
 * Please be aware that the above note was made during the beta of WordPress 2.6
 * and in the future may not be accurate. Please update the note when it is no
 * longer the case.}}
 *
 * To apply shortcode tags to content:
 *
 *     $out = do_bbcodes( $content );
 *
 * @link https://codex.wordpress.org/bbcodes_API
 *
 * @package WordPress
 * @subpackage Shortcodes
 * @since 2.5.0
 */

/**
 * Container for storing shortcode tags and their hook to call for the shortcode
 *
 * @since 2.5.0
 *
 * @name $bbcodes_tags
 * @var array
 * @global array $bbcodes_tags
 */
$bbcodes_tags = array();

/**
 * Adds a new shortcode.
 *
 * Care should be taken through prefixing or other means to ensure that the
 * shortcode tag being added is unique and will not conflict with other,
 * already-added shortcode tags. In the event of a duplicated tag, the tag
 * loaded last will take precedence.
 *
 * @since 2.5.0
 *
 * @global array $bbcodes_tags
 *
 * @param string   $tag      Shortcode tag to be searched in post content.
 * @param callable $callback The callback function to run when the shortcode is found.
 *                           Every shortcode callback is passed three parameters by default,
 *                           including an array of attributes (`$atts`), the shortcode content
 *                           or null if not set (`$content`), and finally the shortcode tag
 *                           itself (`$bbcodes_tag`), in that order.
 */
function add_bbcodes( $tag, $callback ) {
	global $shortcode;

	if ( '' == trim( $tag ) ) {
		return;
	}

	if ( 0 !== preg_match( '@[<>&/\[\]\x00-\x20=]@', $tag ) ) {
		
		return;
	}

	$bbcodes_tags[ $tag ] = $callback;
}

/**
 * Removes hook for shortcode.
 *
 * @since 2.5.0
 *
 * @global array $bbcodes_tags
 *
 * @param string $tag Shortcode tag to remove hook for.
 */
function remove_bbcodes($tag) {
	global $shortcode;

	unset($bbcodes_tags[$tag]);
}

/**
 * Clear all shortcodes.
 *
 * This function is simple, it clears all of the shortcode tags by replacing the
 * shortcodes global by a empty array. This is actually a very efficient method
 * for removing all shortcodes.
 *
 * @since 2.5.0
 *
 * @global array $bbcodes_tags
 */
function remove_all_bbcodes() {
	global $shortcode;

	$bbcodes_tags = array();
}

/**
 * Whether a registered shortcode exists named $tag
 *
 * @since 3.6.0
 *
 * @global array $bbcodes_tags List of shortcode tags and their callback hooks.
 *
 * @param string $tag Shortcode tag to check.
 * @return bool Whether the given shortcode exists.
 */
function bbcodes_exists( $tag ) {
	global $shortcode;
	return array_key_exists( $tag, $bbcodes_tags );
}

/**
 * Whether the passed content contains the specified shortcode
 *
 * @since 3.6.0
 *
 * @global array $bbcodes_tags
 *
 * @param string $content Content to search for shortcodes.
 * @param string $tag     Shortcode tag to check.
 * @return bool Whether the passed content contains the given shortcode.
 */
function has_bbcodes( $content, $tag ) {
	if ( false === strpos( $content, '[' ) ) {
		return false;
	}

	if ( bbcodes_exists( $tag ) ) {
		preg_match_all( '/' . get_bbcodes_regex() . '/', $content, $matches, PREG_SET_ORDER );
		if ( empty( $matches ) )
			return false;

		foreach ( $matches as $shortcode ) {
			if ( $tag === $shortcode[2] ) {
				return true;
			} elseif ( ! empty( $shortcode[5] ) && has_bbcodes( $shortcode[5], $tag ) ) {
				return true;
			}
		}
	}
	return false;
}

/**
 * Search content for shortcodes and filter shortcodes through their hooks.
 *
 * If there are no shortcode tags defined, then the content will be returned
 * without any filtering. This might cause issues when plugins are disabled but
 * the shortcode will still show up in the post or content.
 *
 * @since 2.5.0
 *
 * @global array $bbcodes_tags List of shortcode tags and their callback hooks.
 *
 * @param string $content Content to search for shortcodes.
 * @param bool $ignore_html When true, shortcodes inside HTML elements will be skipped.
 * @return string Content with shortcodes filtered out.
 */
function do_bbcodes( $content ) {
	global $shortcode;

	if ( false === strpos( $content, '[' ) ) {
		return $content;
	}

	if (empty($bbcodes_tags) || !is_array($bbcodes_tags))
		return $content;

	// Find all registered tag names in $content.
	preg_match_all( '@\[([^<>&/\[\]\x00-\x20=]++)@', $content, $matches );
	$tagnames = array_intersect( array_keys( $bbcodes_tags ), $matches[1] );

	if ( empty( $tagnames ) ) {
		return $content;
	}

	//$content = do_bbcodes_in_html_tags( $content, $ignore_html, $tagnames );

	$pattern = get_bbcodes_regex( $tagnames );
	return preg_replace_callback( "/$pattern/", 'do_bbcodes_tag', $content );

	// Always restore square braces so we don't break things like <!--[if IE ]>
	/**
	$content = unescape_invalid_bbcodes( $content );

	return $content;
	**/
}

/**
 * Retrieve the shortcode regular expression for searching.
 *
 * The regular expression combines the shortcode tags in the regular expression
 * in a regex class.
 *
 * The regular expression contains 6 different sub matches to help with parsing.
 *
 * 1 - An extra [ to allow for escaping shortcodes with double [[]]
 * 2 - The shortcode name
 * 3 - The shortcode argument list
 * 4 - The self closing /
 * 5 - The content of a shortcode when it wraps some content.
 * 6 - An extra ] to allow for escaping shortcodes with double [[]]
 *
 * @since 2.5.0
 * @since 4.4.0 Added the `$tagnames` parameter.
 *
 * @global array $bbcodes_tags
 *
 * @param array $tagnames Optional. List of shortcodes to find. Defaults to all registered shortcodes.
 * @return string The shortcode search regular expression
 */
function get_bbcodes_regex( $tagnames = null ) {
	global $shortcode;

	if ( empty( $tagnames ) ) {
		$tagnames = array_keys( $bbcodes_tags );
	}
	$tagregexp = join( '|', array_map('preg_quote', $tagnames) );

	// WARNING! Do not change this regex without changing do_bbcodes_tag() and strip_bbcodes_tag()
	// Also, see bbcodes_unautop() and shortcode.js.
	return
		  '\\['                              // Opening bracket
		. '(\\[?)'                           // 1: Optional second opening bracket for escaping shortcodes: [[tag]]
		. "($tagregexp)"                     // 2: Shortcode name
		. '(?![\\w-])'                       // Not followed by word character or hyphen
		. '('                                // 3: Unroll the loop: Inside the opening shortcode tag
		.     '[^\\]\\/]*'                   // Not a closing bracket or forward slash
		.     '(?:'
		.         '\\/(?!\\])'               // A forward slash not followed by a closing bracket
		.         '[^\\]\\/]*'               // Not a closing bracket or forward slash
		.     ')*?'
		. ')'
		. '(?:'
		.     '(\\/)'                        // 4: Self closing tag ...
		.     '\\]'                          // ... and closing bracket
		. '|'
		.     '\\]'                          // Closing bracket
		.     '(?:'
		.         '('                        // 5: Unroll the loop: Optionally, anything between the opening and closing shortcode tags
		.             '[^\\[]*+'             // Not an opening bracket
		.             '(?:'
		.                 '\\[(?!\\/\\2\\])' // An opening bracket not followed by the closing shortcode tag
		.                 '[^\\[]*+'         // Not an opening bracket
		.             ')*+'
		.         ')'
		.         '\\[\\/\\2\\]'             // Closing shortcode tag
		.     ')?'
		. ')'
		. '(\\]?)';                          // 6: Optional second closing brocket for escaping shortcodes: [[tag]]
}

/**
 * Regular Expression callable for do_bbcodes() for calling shortcode hook.
 * @see get_bbcodes_regex for details of the match array contents.
 *
 * @since 2.5.0
 * @access private
 *
 * @global array $bbcodes_tags
 *
 * @param array $m Regular expression match array
 * @return string|false False on failure.
 */
function do_bbcodes_tag( $m ) {
	global $shortcode;

	// allow [[foo]] syntax for escaping a tag
	if ( $m[1] == '[' && $m[6] == ']' ) {
		return substr($m[0], 1, -1);
	}

	$tag = $m[2];
	$attr = bbcodes_parse_atts( $m[3] );

	if ( ! is_callable( $bbcodes_tags[ $tag ] ) ) {
		
		return $m[0];
	}

	/**
	 * Filters whether to call a shortcode callback.
	 *
	 * Passing a truthy value to the filter will effectively short-circuit the
	 * shortcode generation process, returning that value instead.
	 *
	 * @since 4.7.0
	 *
	 * @param bool|string $return      Short-circuit return value. Either false or the value to replace the shortcode with.
	 * @param string       $tag         Shortcode name.
	 * @param array|string $attr        Shortcode attributes array or empty string.
	 * @param array        $m           Regular expression match array.
	 *
	$return = apply_filters( 'pre_do_bbcodes_tag', false, $tag, $attr, $m );
	if ( false !== $return ) {
		return $return;
	}**/

	$content = isset( $m[5] ) ? $m[5] : null;

	return $m[1] . call_user_func( $bbcodes_tags[ $tag ], $attr, $content, $tag ) . $m[6];

	/**
	 * Filters the output created by a shortcode callback.
	 *
	 * @since 4.7.0
	 *
	 * @param string       $output Shortcode output.
	 * @param string       $tag    Shortcode name.
	 * @param array|string $attr   Shortcode attributes array or empty string.
	 * @param array        $m      Regular expression match array.
	 */
	//return apply_filters( 'do_bbcodes_tag', $output, $tag, $attr, $m );
}


/**
 * Remove placeholders added by do_bbcodes_in_html_tags().
 *
 * @since 4.2.3
 *
 * @param string $content Content to search for placeholders.
 * @return string Content with placeholders removed.
 *
function unescape_invalid_bbcodes( $content ) {
        // Clean up entire string, avoids re-parsing HTML.
        $trans = array( '&#91;' => '[', '&#93;' => ']' );
        $content = strtr( $content, $trans );

        return $content;
}


**
 * Retrieve the shortcode attributes regex.
 *
 * @since 4.4.0
 *
 * @return string The shortcode attribute regular expression
 */
function get_bbcodes_atts_regex() {
	return '/([\w-]+)\s*=\s*"([^"]*)"(?:\s|$)|([\w-]+)\s*=\s*\'([^\']*)\'(?:\s|$)|([\w-]+)\s*=\s*([^\s\'"]+)(?:\s|$)|"([^"]*)"(?:\s|$)|\'([^\']*)\'(?:\s|$)|(\S+)(?:\s|$)/';
}

/**
 * Retrieve all attributes from the shortcodes tag.
 *
 * The attributes list has the attribute name as the key and the value of the
 * attribute as the value in the key/value pair. This allows for easier
 * retrieval of the attributes, since all attributes have to be known.
 *
 * @since 2.5.0
 *
 * @param string $text
 * @return array|string List of attribute values.
 *                      Returns empty array if trim( $text ) == '""'.
 *                      Returns empty string if trim( $text ) == ''.
 *                      All other matches are checked for not empty().
 */
function bbcodes_parse_atts($text) {
	$atts = array();
	$pattern = get_bbcodes_atts_regex();
	$text = preg_replace("/[\x{00a0}\x{200b}]+/u", " ", $text);
	if ( preg_match_all($pattern, $text, $match, PREG_SET_ORDER) ) {
		foreach ($match as $m) {
			if (!empty($m[1]))
				$atts[strtolower($m[1])] = stripcslashes($m[2]);
			elseif (!empty($m[3]))
				$atts[strtolower($m[3])] = stripcslashes($m[4]);
			elseif (!empty($m[5]))
				$atts[strtolower($m[5])] = stripcslashes($m[6]);
			elseif (isset($m[7]) && strlen($m[7]))
				$atts[] = stripcslashes($m[7]);
			elseif (isset($m[8]) && strlen($m[8]))
				$atts[] = stripcslashes($m[8]);
			elseif (isset($m[9]))
				$atts[] = stripcslashes($m[9]);
		}

		// Reject any unclosed HTML elements
		foreach( $atts as &$value ) {
			if ( false !== strpos( $value, '<' ) ) {
				if ( 1 !== preg_match( '/^[^<]*+(?:<[^>]*+>[^<]*+)*+$/', $value ) ) {
					$value = '';
				}
			}
		}
	} else {
		$atts = ltrim($text);
	}
	return $atts;
}

/**
 * Combine user attributes with known attributes and fill in defaults when needed.
 *
 * The pairs should be considered to be all of the attributes which are
 * supported by the caller and given as a list. The returned attributes will
 * only contain the attributes in the $pairs list.
 *
 * If the $atts list has unsupported attributes, then they will be ignored and
 * removed from the final returned list.
 *
 * @since 2.5.0
 *
 * @param array  $pairs     Entire list of supported attributes and their defaults.
 * @param array  $atts      User defined attributes in shortcode tag.
 * @param string $shortcode Optional. The name of the shortcode, provided for context to enable filtering
 * @return array Combined and filtered attribute list.
 */
function bbcodes_atts( $pairs, $atts) {
	$atts = (array)$atts;
	$out = array();
	foreach ($pairs as $name => $default) {
		if ( array_key_exists($name, $atts) )
			$out[$name] = $atts[$name];
		else
			$out[$name] = $default;
	}
	/**
	 * Filters a shortcode's default attributes.
	 *
	 * If the third parameter of the bbcodes_atts() function is present then this filter is available.
	 * The third parameter, $shortcode, is the name of the shortcode.
	 *
	 * @since 3.6.0
	 * @since 4.4.0 Added the `$shortcode` parameter.
	 *
	 * @param array  $out       The output array of shortcode attributes.
	 * @param array  $pairs     The supported attributes and their defaults.
	 * @param array  $atts      The user defined shortcode attributes.
	 * @param string $shortcode The shortcode name.
	 *
	if ( $shortcode ) {
		$out = apply_filters( "bbcodes_atts_{$shortcode}", $out, $pairs, $atts, $shortcode );
	}
	**/

	return $out;
}

/**
 * Remove all shortcode tags from the given content.
 *
 * @since 2.5.0
 *
 * @global array $bbcodes_tags
 *
 * @param string $content Content to remove shortcode tags.
 * @return string Content without shortcode tags.
 */
function strip_bbcodes( $content ) {
	global $shortcode;

	if ( false === strpos( $content, '[' ) ) {
		return $content;
	}

	if (empty($bbcodes_tags) || !is_array($bbcodes_tags))
		return $content;

	// Find all registered tag names in $content.
	preg_match_all( '@\[([^<>&/\[\]\x00-\x20=]++)@', $content, $matches );

	$tags_to_remove = array_keys( $bbcodes_tags );

	/**
	 * Filters the list of shortcode tags to remove from the content.
	 *
	 * @since 4.7.0
	 *
	 * @param array  $tag_array Array of shortcode tags to remove.
	 * @param string $content   Content shortcodes are being removed from.
	 */
	//$tags_to_remove = apply_filters( 'strip_bbcodes_tagnames', $tags_to_remove, $content );

	//$tagnames = array_intersect( $tags_to_remove, $matches[1] );

	//if ( empty( $tagnames ) ) {
		//return $content;
	//}

	//$content = do_bbcodes_in_html_tags( $content, true, $tagnames );

	$pattern = get_bbcodes_regex( $tagnames );
	return preg_replace_callback( "/$pattern/", 'strip_bbcodes_tag', $content );

	// Always restore square braces so we don't break things like <!--[if IE ]>
	/*$content = unescape_invalid_bbcodes( $content );

	return $content;**/
}

/**
 * Strips a shortcode tag based on RegEx matches against post content.
 *
 * @since 3.3.0
 *
 * @param array $m RegEx matches against post content.
 * @return string|false The content stripped of the tag, otherwise false.
 */
function strip_bbcodes_tag( $m ) {
	// allow [[foo]] syntax for escaping a tag
	if ( $m[1] == '[' && $m[6] == ']' ) {
		return substr($m[0], 1, -1);
	}

	return $m[1] . $m[6];
}

 /**
 * Don't auto-p wrap bbcodess that stand alone
 *
 * Ensures that bbcodess are not wrapped in <<p>>...<</p>>.
 *
 * @since 2.9.0
 *
 * @param string $pee The content.
 * @return string The filtered content.
 */
    function bbcodes_unautop( $pee ) {

        global $shortcode;

        if ( empty( $bbcodes_tags ) || !is_array( $bbcodes_tags ) ) {
            return $pee;
        }

        $tagregexp = join( '|', array_map( 'preg_quote', array_keys( $bbcodes_tags ) ) );

        $pattern =
        '/'
        . '<p>'                              // Opening paragraph
        . '\\s*+'                            // Optional leading whitespace
        . '('                                // 1: The bbcodes
        .     '\\['                          // Opening bracket
        .     "($tagregexp)"                 // 2: bbcodes name
        .     '(?![\\w-])'                   // Not followed by word character or hyphen
                                             // Unroll the loop: Inside the opening bbcodes tag
        .     '[^\\]\\/]*'                   // Not a closing bracket or forward slash
        .     '(?:'
        .         '\\/(?!\\])'               // A forward slash not followed by a closing bracket
        .         '[^\\]\\/]*'               // Not a closing bracket or forward slash
        .     ')*?'
        .     '(?:'
        .         '\\/\\]'                   // Self closing tag and closing bracket
        .     '|'
        .         '\\]'                      // Closing bracket
        .         '(?:'                      // Unroll the loop: Optionally, anything between the opening and closing bbcodes tags
        .             '[^\\[]*+'             // Not an opening bracket
        .             '(?:'
        .                 '\\[(?!\\/\\2\\])' // An opening bracket not followed by the closing bbcodes tag
        .                 '[^\\[]*+'         // Not an opening bracket
        .             ')*+'
        .             '\\[\\/\\2\\]'         // Closing bbcodes tag
        .         ')?'
        .     ')'
        . ')'
        . '\\s*+'                            // optional trailing whitespace
        . '<\\/p>'                           // closing paragraph
        . '/s';

        return preg_replace( $pattern, '$1', $pee );
    }

