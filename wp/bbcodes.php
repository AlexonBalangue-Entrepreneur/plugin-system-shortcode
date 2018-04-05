<?php
    /**
    * WordPress API for creating bbcode like tags or what WordPress calls
    * "bbcodess." The tag and attribute parsing or regular expression code is
    * based on the Textpattern tag parser.
    *
    * A few examples are below:
    *
    * [bbcodes /]
    * [bbcodes foo="bar" baz="bing" /]
    * [bbcodes foo="bar"]content[/bbcodes]
    *
    * bbcodes tags support attributes and enclosed content, but does not entirely
    * support inline bbcodess in other bbcodess. You will have to call the
    * bbcodes parser in your function to account for that.
    *
    * {@internal
    * Please be aware that the above note was made during the beta of WordPress 2.6
    * and in the future may not be accurate. Please update the note when it is no
    * longer the case.}}
    *
    * To apply bbcodes tags to content:
    *
    * <code>
    * $out = do_bbcodes($content);
    * </code>
    *
    * @link http://codex.wordpress.org/bbcodes_API
    *
    * @package WordPress
    * @subpackage bbcodess
    * @since 2.5
    */

    /**
    * Container for storing bbcodes tags and their hook to call for the bbcodes
    *
    * @since 2.5
    * @name $shortcode->bbcodes_tags
    * @var array
    * @global array $shortcode->bbcodes_tags
    */
    //$shortcode->bbcodes_tags = array();

    /**
    * Add hook for bbcodes tag.
    *
    * There can only be one hook for each bbcodes. Which means that if another
    * plugin has a similar bbcodes, it will override yours or yours will override
    * theirs depending on which order the plugins are included and/or ran.
    *
    * Simplest example of a bbcodes tag using the API:
    *
    * <code>
    * // [footag foo="bar"]
    * function footag_func($atts) {
    *     return "foo = {$atts[foo]}";
    * }
    * add_bbcodes('footag', 'footag_func');
    * </code>
    *
    * Example with nice attribute defaults:
    *
    * <code>
    * // [bartag foo="bar"]
    * function bartag_func($atts) {
    *     extract(bbcodes_atts(array(
    *         'foo' => 'no foo',
    *         'baz' => 'default baz',
    *     ), $atts));
    *
    *     return "foo = {$foo}";
    * }
    * add_bbcodes('bartag', 'bartag_func');
    * </code>
    *
    * Example with enclosed content:
    *
    * <code>
    * // [baztag]content[/baztag]
    * function baztag_func($atts, $content='') {
    *     return "content = $content";
    * }
    * add_bbcodes('baztag', 'baztag_func');
    * </code>
    *
    * @since 2.5
    * @uses $shortcode->bbcodes_tags
    *
    * @param string $tag bbcodes tag to be searched in post content.
    * @param callable $func Hook to run when bbcodes is found.
    */
    function add_bbcodes($tag, $func) {
        global $shortcode;

        if ( is_callable($func) )
            $shortcode->bbcodes_tags[$tag] = $func;
    }

    /**
    * Removes hook for bbcodes.
    *
    * @since 2.5
    * @uses $shortcode->bbcodes_tags
    *
    * @param string $tag bbcodes tag to remove hook for.
    */
    function remove_bbcodes($tag) {
        global $shortcode;

        unset($shortcode->bbcodes_tags[$tag]);
    }

    /**
    * Clear all bbcodess.
    *
    * This function is simple, it clears all of the bbcodes tags by replacing the
    * bbcodess global by a empty array. This is actually a very efficient method
    * for removing all bbcodess.
    *
    * @since 2.5
    * @uses $shortcode->bbcodes_tags
    */
    function remove_all_bbcodess() {
        global $shortcode;

        $shortcode->bbcodes_tags = array();
    }

    /**
    * Search content for bbcodess and filter bbcodess through their hooks.
    *
    * If there are no bbcodes tags defined, then the content will be returned
    * without any filtering. This might cause issues when plugins are disabled but
    * the bbcodes will still show up in the post or content.
    *
    * @since 2.5
    * @uses $shortcode->bbcodes_tags
    * @uses get_bbcodes_regex() Gets the search pattern for searching bbcodess.
    *
    * @param string $content Content to search for bbcodess
    * @return string Content with bbcodess filtered out.
    */
    function do_bbcodes($content) {

        global $shortcode;
        
        if (empty($shortcode->bbcodes_tags) || !is_array($shortcode->bbcodes_tags))
            return $content;

        $pattern = get_bbcodes_regex();
        return preg_replace_callback( "/$pattern/s", 'do_bbcodes_tag', $content );
    }

    /**
    * Retrieve the bbcodes regular expression for searching.
    *
    * The regular expression combines the bbcodes tags in the regular expression
    * in a regex class.
    *
    * The regular expression contains 6 different sub matches to help with parsing.
    *
    * 1 - An extra [ to allow for escaping bbcodess with double [[]]
    * 2 - The bbcodes name
    * 3 - The bbcodes argument list
    * 4 - The self closing /
    * 5 - The content of a bbcodes when it wraps some content.
    * 6 - An extra ] to allow for escaping bbcodess with double [[]]
    *
    * @since 2.5
    * @uses $shortcode->bbcodes_tags
    *
    * @return string The bbcodes search regular expression
    */
    function get_bbcodes_regex() {
        global $shortcode;
        $tagnames = array_keys($shortcode->bbcodes_tags);
        $tagregexp = join( '|', array_map('preg_quote', $tagnames) );

        // WARNING! Do not change this regex without changing do_bbcodes_tag() and strip_bbcodes_tag()
        // Also, see bbcodes_unautop() and bbcodes.js.
        return
        '\\['                              // Opening bracket
        . '(\\[?)'                           // 1: Optional second opening bracket for escaping bbcodess: [[tag]]
        . "($tagregexp)"                     // 2: bbcodes name
        . '(?![\\w-])'                       // Not followed by word character or hyphen
        . '('                                // 3: Unroll the loop: Inside the opening bbcodes tag
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
        .         '('                        // 5: Unroll the loop: Optionally, anything between the opening and closing bbcodes tags
        .             '[^\\[]*+'             // Not an opening bracket
        .             '(?:'
        .                 '\\[(?!\\/\\2\\])' // An opening bracket not followed by the closing bbcodes tag
        .                 '[^\\[]*+'         // Not an opening bracket
        .             ')*+'
.         ')'
        .         '\\[\\/\\2\\]'             // Closing bbcodes tag
        .     ')?'
. ')'
        . '(\\]?)';                          // 6: Optional second closing brocket for escaping bbcodess: [[tag]]
    }

    /**
    * Regular Expression callable for do_bbcodes() for calling bbcodes hook.
    * @see get_bbcodes_regex for details of the match array contents.
    *
    * @since 2.5
    * @access private
    * @uses $shortcode->bbcodes_tags
    *
    * @param array $m Regular expression match array
    * @return mixed False on failure.
    */
    function do_bbcodes_tag( $m ) {
        global $shortcode;

        // allow [[foo]] syntax for escaping a tag
        if ( $m[1] == '[' && $m[6] == ']' ) {
            return substr($m[0], 1, -1);
        }

        $tag = $m[2];
        $attr = bbcodes_parse_atts( $m[3] );

        if ( isset( $m[5] ) ) {
            // enclosing tag - extra parameter
            return $m[1] . call_user_func( $shortcode->bbcodes_tags[$tag], $attr, $m[5], $tag ) . $m[6];
        } else {
            // self-closing tag
            return $m[1] . call_user_func( $shortcode->bbcodes_tags[$tag], $attr, null,  $tag ) . $m[6];
        }
    }

    /**
    * Retrieve all attributes from the bbcodess tag.
    *
    * The attributes list has the attribute name as the key and the value of the
    * attribute as the value in the key/value pair. This allows for easier
    * retrieval of the attributes, since all attributes have to be known.
    *
    * @since 2.5
    *
    * @param string $text
    * @return array List of attributes and their value.
    */
    function bbcodes_parse_atts($text) {
        $atts = array();
        $pattern = '/(\w+)\s*=\s*"([^"]*)"(?:\s|$)|(\w+)\s*=\s*\'([^\']*)\'(?:\s|$)|(\w+)\s*=\s*([^\s\'"]+)(?:\s|$)|"([^"]*)"(?:\s|$)|(\S+)(?:\s|$)/';
        $text = preg_replace("/[\x{00a0}\x{200b}]+/u", " ", $text);
        if ( preg_match_all($pattern, $text, $match, PREG_SET_ORDER) ) {
            foreach ($match as $m) {
                if (!empty($m[1]))
                    $atts[strtolower($m[1])] = stripcslashes($m[2]);
                elseif (!empty($m[3]))
                    $atts[strtolower($m[3])] = stripcslashes($m[4]);
                elseif (!empty($m[5]))
                    $atts[strtolower($m[5])] = stripcslashes($m[6]);
                elseif (isset($m[7]) and strlen($m[7]))
                    $atts[] = stripcslashes($m[7]);
                elseif (isset($m[8]))
                    $atts[] = stripcslashes($m[8]);
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
    * @since 2.5
    *
    * @param array $pairs Entire list of supported attributes and their defaults.
    * @param array $atts User defined attributes in bbcodes tag.
    * @return array Combined and filtered attribute list.
    */
    function bbcodes_atts($pairs, $atts) {
        $atts = (array)$atts;
        $out = array();
        foreach($pairs as $name => $default) {
            if ( array_key_exists($name, $atts) )
                $out[$name] = $atts[$name];
            else
                $out[$name] = $default;
        }
        return $out;
    }

    /**
    * Remove all bbcodes tags from the given content.
    *
    * @since 2.5
    * @uses $shortcode->bbcodes_tags
    *
    * @param string $content Content to remove bbcodes tags.
    * @return string Content without bbcodes tags.
    */
    function strip_bbcodess( $content ) {
        global $shortcode;

        if (empty($shortcode->bbcodes_tags) || !is_array($shortcode->bbcodes_tags))
            return $content;

        $pattern = get_bbcodes_regex();

        return preg_replace_callback( "/$pattern/s", 'strip_bbcodes_tag', $content );
    }

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

        if ( empty( $shortcode->bbcodes_tags ) || !is_array( $shortcode->bbcodes_tags ) ) {
            return $pee;
        }

        $tagregexp = join( '|', array_map( 'preg_quote', array_keys( $shortcode->bbcodes_tags ) ) );

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

