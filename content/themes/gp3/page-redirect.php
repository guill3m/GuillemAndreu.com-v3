<?php
/**
 * @package WordPress
 * @subpackage GuillemAndreu.com
 * @since GuillemAndreu.com 3.0.0
 Template Name: Redirect
 */


/*
 * Redirect to default language: Catalan
 */

$target = 'http://guillemandreu.com/ca/';
Header("Location: $target");