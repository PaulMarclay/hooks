<?php
	/*
	*	Hooks version 1.0
	*
	*	Imagina - Plugin.
	*
	*
	*	Copyright (c) 2012 Dolem Labs
	*
	*	Authors:	Paul Marclay (paul.eduardo.marclay@gmail.com)
	*
	*/

    declare(ticks = 1);
    register_tick_function(array(new Hook_Manager, 'hookManager'),true);
