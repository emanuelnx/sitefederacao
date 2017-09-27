/**
* Remove acentos de caracteres realizando o regexp atraves
* da tabela de caracteres unicode.
* @param  {String} stringComAcento [string que contem os acentos]
* @return {String}                 [string sem acentos]
*/
function removerAcentos(stringComAcento) {
    var string = stringComAcento;
    var expressaoRegular = '';
    var mapaAcentosHex  = {
        a : /[\xE0-\xE6]/g,
        e : /[\xE8-\xEB]/g,
        i : /[\xEC-\xEF]/g,
        o : /[\xF2-\xF6]/g,
        u : /[\xF9-\xFC]/g,
        c : /\xE7/g,
        n : /\xF1/g
    };

    for (var letra in mapaAcentosHex) {
        string = string.replace(mapaAcentosHex[letra], letra);
    }

    return string;
}