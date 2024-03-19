<?php
	/**
	 * hotelic separator sanitization
	 * return nunll
	 */
    if ( ! function_exists( 'hotelic_separator_sanitize' ) ) {
        function hotelic_separator_sanitize() {
            $hotelic_separator = null;
            return $hotelic_separator;
        }
    }

	/**
	 * hotelic boolean sanitization
	 * return nunll
	 */

    if ( ! function_exists( 'hotelic_boolean_sanitize' ) ) {
        function hotelic_boolean_sanitize($input) {
            $hotelic_boolean = is_bool($input) ? $input : false;
            return $hotelic_boolean;
        }
    }
    

    if ( ! function_exists( 'hotelic_checkbox_sanitize' ) ) {
        function hotelic_checkbox_sanitize($input) {
            $hotelic_checkbox = $input ? true : false;
            return $hotelic_checkbox;
        }
    }
    if ( ! function_exists( 'hotelic_float_sanitize' ) ) {
        function hotelic_float_sanitize($input) {
            return floatval($input);
        }
    }