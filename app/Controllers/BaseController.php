<?php

namespace App\Controllers;

use App\Libraries\SiteInfoLibraries;

use CodeIgniter\Controller;
use CodeIgniter\HTTP\CLIRequest;
use CodeIgniter\HTTP\IncomingRequest;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use Psr\Log\LoggerInterface;

/**
 * Class BaseController
 *
 * BaseController provides a convenient place for loading components
 * and performing functions that are needed by all your controllers.
 * Extend this class in any new controllers:
 *     class Home extends BaseController
 *
 * For security be sure to declare any new methods as protected or private.
 */

class BaseController extends Controller
{
	/**
	 * Instance of the main Request object.
	 *
	 * @var IncomingRequest|CLIRequest
	 */
	protected $request;
	/**
	 * An array of helpers to be loaded automatically upon
	 * class instantiation. These helpers will be available
	 * to all other controllers that extend BaseController.
	 *
	 * @var array
	 */
	protected $helpers = ['url','form','session','html'];


	/**
	 * Holds error messages. ( Set in the controller)
	 *
	 * @var array
	 */
	protected $errors = [];


	/**
	 * Constructor.
	 *
	 * @param RequestInterface  $request
	 * @param ResponseInterface $response
	 * @param LoggerInterface   $logger
	 */
	public function initController(RequestInterface $request, ResponseInterface $response, LoggerInterface $logger)
	{
		// Do Not Edit This Line
		parent::initController($request, $response, $logger);

		//--------------------------------------------------------------------
		// Preload any models, libraries, etc, here.
		//--------------------------------------------------------------------
		// E.g.: $this->session = \Config\Services::session();
	}
	/**
	 * Render views with Account layout
	 *
	 * @param string $page View file path not including 'admin/'
	 * @param string $page_title Page title
	 * @param array $controller_data Passed data
	 * @param array $css Loaded stylesheets for this view
	 * @param array $js Loaded scripts for this view
	 * @return void
	 */
	protected function loadTemplate($page , $page_title, $data = [] , $css = [] , $js = [] ) {
		$siteinfo = SiteInfoLibraries::create();

		// echo APPPATH . 'Views/' . $page . '.php';
		if ( !is_file(APPPATH . 'Views/' . $page . '.php') ) {
			// Whoops, we don't have a page for that!
			throw new \CodeIgniter\Exceptions\PageNotFoundException('Views/' . $page);
		}

		// prep.  data
		$content['view_file'] = $page;

		$content['page_title'] = $page_title;

		$content['controller_data'] = $data;

		$content['logoWebSite'] =  $siteinfo['logoWebSite'];

		$content['iconWebSite'] =  $siteinfo['iconWebSite'];
		$content['css'] = $css;

		$content['js'] = $js;

		$content['errors'] = $this->errors;

	    echo view('layout/app', $content);

		return;

	}
}
