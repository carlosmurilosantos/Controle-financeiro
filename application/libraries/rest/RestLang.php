<?php
defined ( 'BASEPATH' ) or exit ( 'No direct script access allowed' );

/**
 * Classe criada para substituir a abordagem original do plugin Rest
 * que usava o carregamento de arquivo de linguagem a partir do
 * diret�rio language/english
 *
 * @author Reginaldo do Prado
 */
class RestLang {
	function __construct() {
		$ci = & get_instance ();
		$this->run ( $ci );
	}
	
	/**
	 * Define os valores de configura��o de linguagem necess�rios a
	 * gera��o/exibi��o de mensagens do plugin Rest.
	 *
	 * @param CodeIgniter instance $ci
	 */
	function run($ci) {
		$ci->lang->language ['text_rest_invalid_api_key'] = 'Invalid API key %s'; // %s is the REST API key
		$ci->lang->language ['text_rest_invalid_credentials'] = 'Invalid credentials';
		$ci->lang->language ['text_rest_ip_denied'] = 'IP denied';
		$ci->lang->language ['text_rest_ip_unauthorized'] = 'IP unauthorized';
		$ci->lang->language ['text_rest_unauthorized'] = 'Unauthorized';
		$ci->lang->language ['text_rest_ajax_only'] = 'Only AJAX requests are allowed';
		$ci->lang->language ['text_rest_api_key_unauthorized'] = 'This API key does not have access to the requested controller';
		$ci->lang->language ['text_rest_api_key_permissions'] = 'This API key does not have enough permissions';
		$ci->lang->language ['text_rest_api_key_time_limit'] = 'This API key has reached the time limit for this method';
		$ci->lang->language ['text_rest_unknown_method'] = 'Unknown method';
		$ci->lang->language ['text_rest_unsupported'] = 'Unsupported protocol';
	}
}
