/**
* Realiza uma chamada ajax e executa um callback de acordo com o status de retorno.
* da tabela de caracteres unicode.
* @param  {String} method [metodo http]
* @param  {String} url [metodo http]
* @param  {Function} success [callback para retono success]
* @param  {Function} failure [callback para retono error]
* @return {object XMLHttpRequest}
*/
function ajax(method, url, success, failure) {
    var xhr = new XMLHttpRequest();
    xhr.open(method, url, true);

    xhr.onreadystatechange = function() {
        if(xhr.readyState == XMLHttpRequest.DONE) {
            if(xhr.status >= 200 && xhr.status <= 299) { 
                success(xhr.response);
            } else {
                failure(xhr.response); 
            }
        }
    }
    xhr.send();
    return xhr;
}