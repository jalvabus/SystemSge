/**
 * Valdiates if theres an user logged
 */
function isLogged() {
    localStorage.getItem('logged');
    return true;
}


if (!isLogged()) {

}
