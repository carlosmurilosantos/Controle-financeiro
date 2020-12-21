

/**
 * Recebe o nome de um controlador a de um método.
 * Retorna o url do site atual que executa este método.
 * 
 * @param ctrl - nome do controlador
 * @param func - método a ser executado
 * @returns {String} 
 */
function baseURL(uri) {
    return 'http//' + window.location.hostname +
        '/lp2/murilo/' + (uri ? '/' + uri : '');
}

function api(ctrl, func) {
    return baseURL('api/'+ctrl + 'Rest/' + func);
}

