<?php

/*
 * Taken from: http://www.if-not-true-then-false.com/2010/php-class-for-coloring-php-command-line-cli-scripts-output-php-output-colorizing-using-bash-shell-colors/
 * Edited by Aziz Light
 */
class Colors
{
    /**
     * Foreground colors.
     *
     * @var array
     * @access private
     */
    private $foreground_colors = array();

    /**
     * Background colors.
     *
     * @var array
     * @access private
     */
    private $background_colors = array();

    /**
     * The constructors initialises the colors.
     *
     * @access public
     * @return void
     */
    public function __construct()
    {
        $this->foreground_colors['black'        ] = '0;30';
        $this->foreground_colors['dark_gray'    ] = '1;30';
        $this->foreground_colors['blue'         ] = '0;34';
        $this->foreground_colors['light_blue'   ] = '1;34';
        $this->foreground_colors['green'        ] = '0;32';
        $this->foreground_colors['light_green'  ] = '1;32';
        $this->foreground_colors['cyan'         ] = '0;36';
        $this->foreground_colors['light_cyan'   ] = '1;36';
        $this->foreground_colors['red'          ] = '0;31';
        $this->foreground_colors['light_red'    ] = '1;31';
        $this->foreground_colors['purple'       ] = '0;35';
        $this->foreground_colors['light_purple' ] = '1;35';
        $this->foreground_colors['brown'        ] = '0;33';
        $this->foreground_colors['yellow'       ] = '1;33';
        $this->foreground_colors['light_gray'   ] = '0;37';
        $this->foreground_colors['white'        ] = '1;37';

        $this->background_colors['black'        ] = '40';
        $this->background_colors['red'          ] = '41';
        $this->background_colors['green'        ] = '42';
        $this->background_colors['yellow'       ] = '43';
        $this->background_colors['blue'         ] = '44';
        $this->background_colors['magenta'      ] = '45';
        $this->background_colors['cyan'         ] = '46';
        $this->background_colors['light_gray'   ] = '47';
    }

    /**
     * Add ANSI colors to a string.
     *
     * @param mixed $string  The string that will be colorized.
     * @param mixed $foreground_color The foreground color.
     * @param mixed $background_color The background color.
     * @access public
     * @return string The colorized string.
     */
    public function colorize($string, $foreground_color = null, $background_color = null)
    {
        $colored_string = "";

        // Check if given foreground color found
        if (isset($this->foreground_colors[$foreground_color]))
        {
            $colored_string .= "\033[" . $this->foreground_colors[$foreground_color] . "m";
        }

        // Check if given background color found
        if (isset($this->background_colors[$background_color]))
        {
            $colored_string .= "\033[" . $this->background_colors[$background_color] . "m";
        }

        // Add string and end coloring
        $colored_string .=  $string . "\033[0m";

        return $colored_string;
    }

    /**
     * Returns all foreground color names.
     *
     * @access public
     * @return array
     */
    public function get_foreground_colors()
    {
        return array_keys($this->foreground_colors);
    }

    /**
     * Returns all background color names.
     *
     * @access public
     * @return array
     */
    public function get_background_colors()
    {
        return array_keys($this->background_colors);
    }
}

