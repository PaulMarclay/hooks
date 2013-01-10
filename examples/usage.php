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

    Hook_Manager::add('View_Render->renderize', 'Api','debug', array('nada'));