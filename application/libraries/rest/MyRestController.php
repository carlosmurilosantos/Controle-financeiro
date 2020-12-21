<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH . '/libraries/rest/RestController.php';

// use isso
// chrome://flags/#allow-insecure-localhost

// mais isso... para evitar o problema de CORS no localhost
$origin = isset($_SERVER['HTTP_ORIGIN']) ? $_SERVER['HTTP_ORIGIN'] : 'http://localhost';
$allowed_domains = [
	'http://localhost', 
	'http://dentalbit.com.br', 
	'http://www.dentalbit.com.br'
];

if (in_array($origin, $allowed_domains)) {
    header('Access-Control-Allow-Origin: ' . $origin);
}

// e não se esqueça de definir as rotas de acesso à API


/**
 * Classe que implementa uma fachada (facade pattern) para a API Rest e nos permite
 * adotar uma abordagem modular para a criacao de plugins do CodeIgniter.
 */

class MyRestController extends RestController {
	protected $nome_curto;

	public function __construct($table){
		parent::__construct();
		$this->nome_curto = $this->uri->segment(1);
		$this->load->model($table.'Model', 'model');
	}


	public function create_post() {
		$resp = array('created'=>'your creation results that must be sent back');
		$this->response($resp, RESTController::HTTP_CREATED);
	}


	public function read_get(){
		$list = array('read'=>'Data read from db or what u want');
		$this->response($list, RESTController::HTTP_OK);
	}


	public function update(){
		$k = 1; // update ok code
		if($k) return $this->response($k, RESTController::HTTP_OK);
		else return $this->response($k, RESTController::HTTP_NOT_FOUND);
	}


	public function delete_post(){
		$k = 1; // deletion ok code
		return $this->response($k, RESTController::HTTP_OK);
    }
    
    public function _remap($object_called, $arguments = []) {
		if ($this->config->item('force_https') && $this->request->ssl === FALSE) {
			$this->response([
				$this->config->item('rest_status_field_name') => FALSE,
				$this->config->item('rest_message_field_name') => $this->lang->line('text_rest_unsupported')
			], self::HTTP_FORBIDDEN);
		}
		$object_called = preg_replace('/^(.*)\.(?:' . implode('|', array_keys($this->_supported_formats)) . ')$/', '$1', $object_called);
		$controller_method = $object_called . '_' . $this->request->method;
		$log_method = !(isset($this->methods[$controller_method]['log']) && $this->methods[$controller_method]['log'] === FALSE);
		$use_key = !(isset($this->methods[$controller_method]['key']) && $this->methods[$controller_method]['key'] === FALSE);
		if ($this->config->item('rest_enable_keys') && $use_key && $this->_allow === FALSE) {
			if ($this->config->item('rest_enable_logging') && $log_method) {
				$this->_log_request();
			}

			$this->response([
				$this->config->item('rest_status_field_name') => FALSE,
				$this->config->item('rest_message_field_name') => sprintf($this->lang->line('text_rest_invalid_api_key'), $this->rest->key)
			], self::HTTP_FORBIDDEN);
		}
		if ($this->config->item('rest_enable_keys') && $use_key && empty($this->rest->key) === FALSE && $this->_check_access() === FALSE) {
			if ($this->config->item('rest_enable_logging') && $log_method) {
				$this->_log_request();
			}

			$this->response([
				$this->config->item('rest_status_field_name') => FALSE,
				$this->config->item('rest_message_field_name') => $this->lang->line('text_rest_api_key_unauthorized')
			], self::HTTP_UNAUTHORIZED);
		}
		if (method_exists($this, $controller_method) === FALSE) {
			$this->response([
				$this->config->item('rest_status_field_name') => FALSE,
				$this->config->item('rest_message_field_name') => $this->lang->line('text_rest_unknown_method')
			], self::HTTP_NOT_FOUND);
		}
		if ($this->config->item('rest_enable_keys') && empty($this->rest->key) === FALSE) {
			if ($this->config->item('rest_enable_limits') && $this->_check_limit($controller_method) === FALSE) {
				$response = [$this->config->item('rest_status_field_name') => FALSE, $this->config->item('rest_message_field_name') => $this->lang->line('text_rest_api_key_time_limit')];
				$this->response($response, self::HTTP_UNAUTHORIZED);
			}
			$level = isset($this->methods[$controller_method]['level']) ? $this->methods[$controller_method]['level'] : 0;
			$authorized = $level <= $this->rest->level;
			if ($this->config->item('rest_enable_logging') && $log_method) {
				$this->_log_request($authorized);
			}
			$response = [$this->config->item('rest_status_field_name') => FALSE, $this->config->item('rest_message_field_name') => $this->lang->line('text_rest_api_key_permissions')];
			$authorized || $this->response($response, self::HTTP_UNAUTHORIZED);
		} elseif ($this->config->item('rest_enable_logging') && $log_method) {
			$this->_log_request($authorized = TRUE);
		}

		// Apenas esse try-catch foi alterado, o resto é exatamento igual ao _remap original
		try {
			call_user_func_array([$this, $controller_method], $arguments);
		} // Esse catch foi adicionado
		catch (HttpException $ex) {
			$this->response(array(
				'code' => $ex->getCode(),
				'error' => $ex->getMessage(),
				'message' => $ex->getLegibleMessage()
			), $ex->getCode());
		} catch (Exception $ex) {
			// If the method doesn't exist, then the error will be caught and an error response shown
			$this->response([
				$this->config->item('rest_status_field_name') => FALSE,
				$this->config->item('rest_message_field_name') => [
					'classname' => get_class($ex),
					'error' => $ex->getMessage(),
					'message' => null
				]
			], self::HTTP_INTERNAL_SERVER_ERROR);
		}
	}

}

