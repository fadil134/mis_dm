<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dist extends CI_Controller {

	public function index_0() {
		$data = array(
			'title' => "General Dashboard"
		);
		$this->load->view('dist/index-0', $data);
	}

	public function layout_default() {
		$data = array(
			'title' => "Layout &rsaquo; Default"
		);
		$this->load->view('dist/layout-default', $data);
	}

	public function components_article() {
		$data = array(
			'title' => "Article"
		);
		$this->load->view('dist/components-article', $data);
	}

	public function blank() {
		$data = array(
			'title' => "Blank Page"
		);
		$this->load->view('dist/blank', $data);
	}

	public function components_gallery() {
		$data = array(
			'title' => "Components &rsaquo; Gallery"
		);
		$this->load->view('dist/components-gallery', $data);
	}

	public function components_multiple_upload() {
		$data = array(
			'title' => "Components &rsaquo; Multiple Upload"
		);
		$this->load->view('dist/components-multiple-upload', $data);
	}

	public function components_user() {
		$data = array(
			'title' => "Components &rsaquo; User"
		);
		$this->load->view('dist/components-user', $data);
	}

	public function components_wizard() {
		$data = array(
			'title' => "Components &rsaquo; Wizard"
		);
		$this->load->view('dist/components-wizard', $data);
	}

	public function forms_advanced_form() {
		$data = array(
			'title' => "Forms &rsaquo; Advanced Forms"
		);
		$this->load->view('dist/forms-advanced-form', $data);
	}

	public function forms_editor() {
		$data = array(
			'title' => "Forms &rsaquo; Editor"
		);
		$this->load->view('dist/forms-editor', $data);
	}

	public function forms_validation() {
		$data = array(
			'title' => "Forms &rsaquo; Validation"
		);
		$this->load->view('dist/forms-validation', $data);
	}

	public function modules_calendar() {
		$data = array(
			'title' => "Modules &rsaquo; Calendar"
		);
		$this->load->view('dist/modules-calendar', $data);
	}

	public function modules_owl_carousel() {
		$data = array(
			'title' => "Modules &rsaquo; Owl Carousel"
		);
		$this->load->view('dist/modules-owl-carousel', $data);
	}

	public function modules_sparkline() {
		$data = array(
			'title' => "Modules &rsaquo; Sparkline"
		);
		$this->load->view('dist/modules-sparkline', $data);
	}

	public function assign_role() {
		$data = array(
			'title' => "Role Setting"
		);
		$this->load->view('assign-role', $data);
	}

	public function auth_forgot_password() {
		$data = array(
			'title' => "Forgot Password"
		);
		$this->load->view('dist/auth-forgot-password', $data);
	}

	public function auth_login() {
		$data = array(
			'title' => "Login"
		);
		$this->load->view('dist/auth-login', $data);
	}

	public function auth_register() {
		$data = array(
			'title' => "Register"
		);
		$this->load->view('dist/auth-register', $data);
	}

	public function auth_reset_password() {
		$data = array(
			'title' => "Reset Password"
		);
		$this->load->view('dist/auth-reset-password', $data);
	}

	public function features_activities() {
		$data = array(
			'title' => "Activities"
		);
		$this->load->view('dist/features-activities', $data);
	}

	public function features_post_create() {
		$data = array(
			'title' => "Post Create"
		);
		$this->load->view('dist/features-post-create', $data);
	}

	public function features_posts() {
		$data = array(
			'title' => "Posts"
		);
		$this->load->view('dist/features-posts', $data);
	}

	public function features_profile() {
		$data = array(
			'title' => "Profile"
		);
		$this->load->view('dist/features-profile', $data);
	}

	public function features_settings() {
		$data = array(
			'title' => "Settings"
		);
		$this->load->view('dist/features-settings', $data);
	}

	public function features_setting_detail() {
		$data = array(
			'title' => "Setting Detail"
		);
		$this->load->view('dist/features-setting-detail', $data);
	}

	public function utilities_contact() {
		$data = array(
			'title' => "Contact"
		);
		$this->load->view('dist/utilities-contact', $data);
	}
}
